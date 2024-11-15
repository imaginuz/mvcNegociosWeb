<?php

namespace Controllers\Usuarios;

use Controllers\PublicController;
use Views\Renderer;
use Utilities\Site;
use Dao\Usuarios\Usuarios;
use Utilities\Validators;

class UsuariosForm extends PublicController
{
    private $viewData = [];
    private $modeDscArr =
    [
        "INS" => "Crear nuevo usuario",
        "UPD" => "Editando a %s (%s)",
        "DSP" => "Detalle de %s (%s)",
        "DEL" => "Eliminando a %s (%s)",
    ];

    private $mode = '';

    private $errors = [];

    private $xssToken = '';

    private function addError($error, $context='global')
    {
        if(isset($this->errors[$context]))
        {
            $this->errors[$context] [] = $error;
        }

        else
        {
            $this->errors[$context] = [$error];
        }
    }

    private $usuario =
    [
        "usercod" => 0,
        "useremail" => '',
        "username" => '',
        "userpswd" => '',
        "userfching" => '',
        "userpswdest" => 'ACT',
        "userpswdexp" => '',
        "userest" => 'ACT',
        "useractcod" => '',
        "userpswdchg" => '',
        "usertipo" => 'ADM',
    ];

    public function run(): void
    {
        $this->inicializarForm();

        if ($this->isPostBack()) {
            $this->cargarDatosDelFormulario();
            
            if($this->validarDatos())
            {
                $this->procesarAccion();
            }
        }

        $this->generarViewData();
        Renderer::render('usuarios/usuarios_form', $this->viewData);
    }

    private function inicializarForm()
    {
        if (isset($_GET["mode"]) && isset($this->modeDscArr)) {
            $this->mode = $_GET["mode"];
        } else {
            Site::redirectToWithMsg("index.php?page=Usuarios-UsuariosList", "Algo sucedió mal. Intente de nuevo.");
            die();
        }

        if ($this->mode !== 'INS' && isset($_GET["usercod"])) {
            $this->usuario["usercod"] = $_GET["usercod"];
            $this->cargarDatosUsuarios();
        }
    }

    private function cargarDatosUsuarios()
    {
        $tmpUsuario = Usuarios::ObtenerUsuariosPorID($this->usuario["usercod"]);
        $this->usuario = $tmpUsuario;
    }

    private function cargarDatosDelFormulario()
    {
        $this->usuario["usercod"] = $_POST["usercod"];
        $this->usuario["useremail"] = $_POST["useremail"];
        $this->usuario["username"] = $_POST["username"];
        $this->usuario["userpswd"] = $_POST["userpswd"];
        $this->usuario["userfching"] = $_POST["userfching"];
        $this->usuario["userpswdest"] = $_POST["userpswdest"];
        $this->usuario["userpswdexp"] = $_POST["userpswdexp"];
        $this->usuario["userest"] = $_POST["userest"];
        $this->usuario["useractcod"] = $_POST["useractcod"];
        $this->usuario["userpswdchg"] = $_POST["userpswdchg"];
        $this->usuario["usertipo"] = $_POST["usertipo"];

        $this->xssToken = $_POST["xssToken"];
    }

    private function validarDatos()
    {
        if(!$this->validarAntiXSSToken())
        {
            \Utilities\Site::redirectToWithMsg("index.php?page=Usuarios-UsuariosList", "Error al procesar la solicitud");
        }

        if(Validators::IsEmpty($this->usuario["username"]))
        {
            $this->addError("El usuario no puede ir vacío", "username");
        }

        if(Validators::IsEmpty($this->usuario["useremail"]))
        {
            $this->addError("El correo no puede ir vacío", "useremail");
        }

        if(Validators::IsEmpty($this->usuario["userpswd"]))
        {
            $this->addError("La contraseña no puede ir vacía", "userpswd");
        }

        if($this->usuario["useractcod"] > 999)
        {
            $this->addError("No se encuentra dentro del rango");
        }

        return count ($this->errors) === 0;
    }

    private function procesarAccion()
    {
        switch($this->mode)
        {
            case 'INS':
                $result = Usuarios::agregarUsuario($this->usuario);
                if($result)
                {
                    Site::redirectToWithMsg("index.php?page=Usuarios-UsuariosList", "Usuario registrado satifactoriamente");
                }
                break;

            case 'UPD':
                $result = Usuarios::actualizarUsuario($this->usuario);
                if($result)
                {
                    Site::redirectToWithMsg("index.php?page=Usuarios-UsuariosList", "Usuario actualizado satifactoriamente");
                }
                break;

            case 'DEL':
                $result = Usuarios::eliminarUsuario($this->usuario['usercod']);
                if($result)
                {
                    Site::redirectToWithMsg("index.php?page=Usuarios-UsuariosList", "Usuario eliminado satifactoriamente");
                }
                break;
        }
    }

    private function generateAntiXSSToken()
    {
        $_SESSION["Usuarios_Form_XSST"] = hash("sha256", time()."USUARIO_FORM");
        $this->xssToken = $_SESSION["Usuarios_Form_XSST"];
    }

    private function validarAntiXSSToken()
    {
        if(isset($_SESSION["Usuarios_Form_XSST"]))
        {
            if($this->xssToken === $_SESSION["Usuarios_Form_XSST"])
            {
                return true;
            }

            return false;
        }
    }

    private function generarViewData()
    {
        $this->viewData["mode"] = $this->mode;

        $this->viewData["modes_dsc"] = sprintf(
            $this->modeDscArr[$this->mode],
            $this->usuario["username"],
            $this->usuario["usercod"]
        );

        $this->viewData["usuario"] = $this->usuario;

        $this->viewData["readonly"] =
            ($this->viewData["mode"] === 'DEL' ||
             $this->viewData["mode"] === 'DSP') ? 'readonly': '';

        foreach($this->errors as $context=>$errores)
        {
            $this->viewData[$context.'_error'] = $errores;
            $this->viewData[$context.'_haserror'] = count($errores) > 0;
        }

        $this->viewData["showConfirm"] = ($this->viewData["mode"] !== 'DSP');

        $this->generateAntiXSSToken();

        $this->viewData["xssToken"] = $this->xssToken;
    }
}
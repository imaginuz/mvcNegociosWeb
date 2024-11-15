<?php

namespace Controllers\Roles;

use Controllers\PublicController;
use Views\Renderer;
use Utilities\Site;
use Dao\Roles\Roles;
use Utilities\Validators;

class RolesForm extends PublicController
{
    private $viewData = [];
    private $modeDscArr =
    [
        "INS" => "Crear nuevo rol",
        "UPD" => "Editando el rol %s (%s)",
        "DSP" => "Detalle del rol %s (%s)",
        "DEL" => "Eliminando el rol %s (%s)",
    ];

    private $mode = '';
    private $errors = [];
    private $xssToken = '';

    private function addError($error, $context = 'global')
    {
        if (isset($this->errors[$context])) {
            $this->errors[$context][] = $error;
        } else {
            $this->errors[$context] = [$error];
        }
    }

    private $rol =
    [
        "rolescod" => 'ROL001',
        "rolesdsc" => '',
        "rolesest" => 'ACT',
    ];

    public function run(): void
    {
        $this->inicializarForm();

        if ($this->isPostBack()) {
            $this->cargarDatosDelFormulario();

            if ($this->validarDatos()) {
                $this->procesarAccion();
            }
        }

        $this->generarViewData();
        Renderer::render('roles/roles_form', $this->viewData);
    }

    private function inicializarForm()
    {
        if (isset($_GET["mode"]) && isset($this->modeDscArr)) {
            $this->mode = $_GET["mode"];
        } else {
            Site::redirectToWithMsg("index.php?page=Roles-RolesList", "Algo sucedió mal. Intente de nuevo.");
            die();
        }

        if ($this->mode !== 'INS' && isset($_GET["rolescod"])) {
            $this->rol["rolescod"] = $_GET["rolescod"];
            $this->cargarDatosRol();
        }
    }

    private function cargarDatosRol()
    {
        $tmpRol = Roles::ObtenerRolesPorID($this->rol["rolescod"]);
        $this->rol = $tmpRol;
    }

    private function cargarDatosDelFormulario()
    {
        $this->rol["rolescod"] = $_POST["rolescod"];
        $this->rol["rolesdsc"] = $_POST["rolesdsc"];
        $this->rol["rolesest"] = $_POST["rolesest"];

        $this->xssToken = $_POST["xssToken"];
    }

    private function validarDatos()
    {
        if (!$this->validarAntiXSSToken()) {
            Site::redirectToWithMsg("index.php?page=Roles-RolesList", "Error al procesar la solicitud");
        }

        if (Validators::IsEmpty($this->rol["rolescod"])) {
            $this->addError("El código del rol no puede ir vacío", "rolescod");
        }

        if (Validators::IsEmpty($this->rol["rolesdsc"])) {
            $this->addError("La descripción del rol no puede ir vacía", "rolesdsc");
        }

        return count($this->errors) === 0;
    }

    private function procesarAccion()
    {
        switch ($this->mode) {
            case 'INS':
                $result = Roles::agregarRoles($this->rol);
                if ($result === "exists") {
                    $this->addError("El código ya existe.", "rolescod");
                } elseif ($result) {
                    Site::redirectToWithMsg("index.php?page=Roles-RolesList", "Rol registrado satisfactoriamente");
                }
                break;

            case 'UPD':
                $result = Roles::actualizarRoles($this->rol);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=Roles-RolesList", "Rol actualizado satisfactoriamente");
                }
                break;

            case 'DEL':
                $result = Roles::eliminarRoles($this->rol['rolescod']);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=Roles-RolesList", "Rol eliminado satisfactoriamente");
                }
                break;
        }
    }

    private function generateAntiXSSToken()
    {
        $_SESSION["Roles_Form_XSST"] = hash("sha256", time() . "ROL_FORM");
        $this->xssToken = $_SESSION["Roles_Form_XSST"];
    }

    private function validarAntiXSSToken()
    {
        if (isset($_SESSION["Roles_Form_XSST"])) {
            return $this->xssToken === $_SESSION["Roles_Form_XSST"];
        }
        return false;
    }

    private function generarViewData()
    {
        $this->viewData["mode"] = $this->mode;
        $this->viewData["modes_dsc"] = sprintf(
            $this->modeDscArr[$this->mode],
            $this->rol["rolesdsc"],
            $this->rol["rolescod"]
        );
        $this->viewData["rol"] = $this->rol;

        $this->viewData["readonly_rolescod"] = (
            $this->viewData["mode"]) ? 'readonly' : '';
        
            $this->viewData["readonly"] = (
            $this->viewData["mode"] === 'DEL' ||
            $this->viewData["mode"] === 'DSP') ? 'readonly' : '';

        foreach ($this->errors as $context => $errores) {
            $this->viewData[$context . '_error'] = $errores;
            $this->viewData[$context . '_haserror'] = count($errores) > 0;
        }

        $this->viewData["showConfirm"] = ($this->viewData["mode"] !== 'DSP');
        $this->generateAntiXSSToken();
        $this->viewData["xssToken"] = $this->xssToken;
    }
}
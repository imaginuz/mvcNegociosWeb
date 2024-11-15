<?php

namespace Controllers\Funciones;

use Controllers\PublicController;
use Views\Renderer;
use Utilities\Site;
use Dao\Funciones\Funciones;
use Utilities\Validators;

class FuncionesForm extends PublicController
{
    private $viewData = [];
    private $modeDscArr = [
        "INS" => "Crear nueva función",
        "UPD" => "Editando la función %s (%s)",
        "DSP" => "Detalle de la función %s (%s)",
        "DEL" => "Eliminando la función %s (%s)",
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

    private $funcion = [
        "fncod" => 'FUNC001',
        "fndsc" => '',
        "fnest" => 'ACT',
        "fntyp" => '',
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
        Renderer::render('funciones/funciones_form', $this->viewData);
    }

    private function inicializarForm()
    {
        if (isset($_GET["mode"]) && isset($this->modeDscArr)) {
            $this->mode = $_GET["mode"];
        } else {
            Site::redirectToWithMsg("index.php?page=Funciones-FuncionesList", "Algo sucedió mal. Intente de nuevo.");
            die();
        }

        if ($this->mode !== 'INS' && isset($_GET["fncod"])) {
            $this->funcion["fncod"] = $_GET["fncod"];
            $this->cargarDatosFuncion();
        }
    }

    private function cargarDatosFuncion()
    {
        $tmpFuncion = Funciones::obtenerFuncionPorID($this->funcion["fncod"]);
        $this->funcion = $tmpFuncion;
    }

    private function cargarDatosDelFormulario()
    {
        $this->funcion["fncod"] = $_POST["fncod"];
        $this->funcion["fndsc"] = $_POST["fndsc"];
        $this->funcion["fnest"] = $_POST["fnest"];
        $this->funcion["fntyp"] = $_POST["fntyp"];

        $this->xssToken = $_POST["xssToken"];
    }

    private function validarDatos()
    {
        if (!$this->validarAntiXSSToken()) {
            Site::redirectToWithMsg("index.php?page=Funciones-FuncionesList", "Error al procesar la solicitud");
        }

        if (Validators::IsEmpty($this->funcion["fncod"])) {
            $this->addError("El código de la función no puede ir vacío", "fncod");
        }

        if (Validators::IsEmpty($this->funcion["fndsc"])) {
            $this->addError("La descripción de la función no puede ir vacía", "fndsc");
        }

        return count($this->errors) === 0;
    }

    private function procesarAccion()
    {
        switch ($this->mode) {
            case 'INS':
                $result = Funciones::agregarFuncion($this->funcion);
                if ($result === "exists") {
                    $this->addError("El código ya existe.", "fncod");
                } elseif ($result) {
                    Site::redirectToWithMsg("index.php?page=Funciones-FuncionesList", "Función registrada satisfactoriamente");
                }
                break;

            case 'UPD':
                $result = Funciones::actualizarFuncion($this->funcion);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=Funciones-FuncionesList", "Función actualizada satisfactoriamente");
                }
                break;

            case 'DEL':
                $result = Funciones::eliminarFuncion($this->funcion['fncod']);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=Funciones-FuncionesList", "Función eliminada satisfactoriamente");
                }
                break;
        }
    }

    private function generateAntiXSSToken()
    {
        $_SESSION["Funciones_Form_XSST"] = hash("sha256", time() . "FUNC_FORM");
        $this->xssToken = $_SESSION["Funciones_Form_XSST"];
    }

    private function validarAntiXSSToken()
    {
        if (isset($_SESSION["Funciones_Form_XSST"])) {
            return $this->xssToken === $_SESSION["Funciones_Form_XSST"];
        }
        return false;
    }

    private function generarViewData()
    {
        $this->viewData["mode"] = $this->mode;
        $this->viewData["modes_dsc"] = sprintf(
            $this->modeDscArr[$this->mode],
            $this->funcion["fndsc"],
            $this->funcion["fncod"]
        );
        $this->viewData["funcion"] = $this->funcion;

        $this->viewData["readonly_fncod"] = ($this->mode !== 'INS') ? 'readonly' : '';
        $this->viewData["readonly"] = ($this->mode === 'DEL' || $this->mode === 'DSP') ? 'readonly' : '';

        foreach ($this->errors as $context => $errores) {
            $this->viewData[$context . '_error'] = $errores;
            $this->viewData[$context . '_haserror'] = count($errores) > 0;
        }

        $this->viewData["showConfirm"] = ($this->mode !== 'DSP');
        $this->generateAntiXSSToken();
        $this->viewData["xssToken"] = $this->xssToken;
    }
}
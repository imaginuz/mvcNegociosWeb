<?php

namespace Controllers\Funciones;

use Controllers\PublicController;
use Dao\Funciones\Funciones;
use Views\Renderer;

class FuncionesForm extends PublicController
{
    private $viewData = [];
    private $modeDscArr = [
        "INS" => "Crear Nueva Función",
        "UPD" => "Editar Función %s",
        "DEL" => "Eliminar Función %s",
    ];

    public function run(): void
    {
        $this->init();
        if (!$this->isPostBack()) {
            $this->prepareView();
            Renderer::render("funciones_form", $this->viewData);
            return;
        }

        $this->processPost();
        if (empty($this->viewData["errors"])) {
            $this->executeAction();
        }
        $this->prepareView();
        Renderer::render("funciones_form", $this->viewData);
    }

    private function init()
    {
        $this->viewData["mode"] = $_GET["mode"] ?? "INS";
        $this->viewData["fncod"] = $_GET["fncod"] ?? null;
        $this->viewData["fndsc"] = "";
        $this->viewData["fnest"] = "";
        $this->viewData["fntyp"] = "";
        $this->viewData["errors"] = [];
    }

    private function prepareView()
    {
        $mode = $this->viewData["mode"];
        $this->viewData["mode_dsc"] = sprintf($this->modeDscArr[$mode], $this->viewData["fncod"]);
        if ($mode === "UPD" || $mode === "DEL") {
            $funcion = Funciones::obtenerPorId($this->viewData["fncod"]);
            $this->viewData = array_merge($this->viewData, $funcion);
        }
    }

    private function processPost()
    {
        if ($this->viewData["mode"] === "DEL") {
            return;
        }

        $this->viewData["fncod"] = $_POST["fncod"] ?? "";
        $this->viewData["fndsc"] = $_POST["fndsc"] ?? "";
        $this->viewData["fnest"] = $_POST["fnest"] ?? "";
        $this->viewData["fntyp"] = $_POST["fntyp"] ?? "";

        if (empty($this->viewData["fncod"])) {
            $this->viewData["errors"][] = "El código de la función es obligatorio.";
        }
        if (empty($this->viewData["fndsc"])) {
            $this->viewData["errors"][] = "La descripción de la función es obligatoria.";
        }
    }

    private function executeAction()
    {
        switch ($this->viewData["mode"]) {
            case "INS":
                Funciones::insertar(
                    $this->viewData["fncod"],
                    $this->viewData["fndsc"],
                    $this->viewData["fnest"],
                    $this->viewData["fntyp"]
                );
                break;
            case "UPD":
                Funciones::actualizar(
                    $this->viewData["fncod"],
                    $this->viewData["fndsc"],
                    $this->viewData["fnest"],
                    $this->viewData["fntyp"]
                );
                break;
            case "DEL":
                Funciones::eliminar($this->viewData["fncod"]);
                break;
        }
    }
}
?>

<?php

namespace Controllers\Roles;

use Controllers\PublicController;
use Dao\Roles\Roles;
use Views\Renderer;

class RolesForm extends PublicController
{
    private $viewData = [];
    private $modeDscArr = [
        "INS" => "Crear Nuevo Rol",
        "UPD" => "Editar Rol %s",
        "DEL" => "Eliminar Rol %s",
    ];

    public function run(): void
    {
        $this->init();
        if (!$this->isPostBack()) {
            $this->prepareView();
            Renderer::render("roles_form", $this->viewData);
            return;
        }

        $this->processPost();
        if (empty($this->viewData["errors"])) {
            $this->executeAction();
        }
        $this->prepareView();
        Renderer::render("roles_form", $this->viewData);
    }

    private function init()
    {
        $this->viewData["mode"] = $_GET["mode"] ?? "INS";
        $this->viewData["rolescod"] = $_GET["rolescod"] ?? null;
        $this->viewData["rolesdsc"] = "";
        $this->viewData["rolesest"] = "";
        $this->viewData["errors"] = [];
    }

    private function prepareView()
    {
        $mode = $this->viewData["mode"];
        $this->viewData["mode_dsc"] = sprintf($this->modeDscArr[$mode], $this->viewData["rolescod"]);
        if ($mode === "UPD" || $mode === "DEL") {
            $rol = Roles::obtenerPorId($this->viewData["rolescod"]);
            $this->viewData = array_merge($this->viewData, $rol);
        }
    }

    private function processPost()
    {
        if ($this->viewData["mode"] === "DEL") {
            return;
        }

        $this->viewData["rolescod"] = $_POST["rolescod"] ?? "";
        $this->viewData["rolesdsc"] = $_POST["rolesdsc"] ?? "";
        $this->viewData["rolesest"] = $_POST["rolesest"] ?? "";

        if (empty($this->viewData["rolescod"])) {
            $this->viewData["errors"][] = "El código del rol es obligatorio.";
        }
        if (empty($this->viewData["rolesdsc"])) {
            $this->viewData["errors"][] = "La descripción del rol es obligatoria.";
        }
    }

    private function executeAction()
    {
        switch ($this->viewData["mode"]) {
            case "INS":
                Roles::insertar(
                    $this->viewData["rolescod"],
                    $this->viewData["rolesdsc"],
                    $this->viewData["rolesest"]
                );
                break;
            case "UPD":
                Roles::actualizar(
                    $this->viewData["rolescod"],
                    $this->viewData["rolesdsc"],
                    $this->viewData["rolesest"]
                );
                break;
            case "DEL":
                Roles::eliminar($this->viewData["rolescod"]);
                break;
        }
    }
}
?>

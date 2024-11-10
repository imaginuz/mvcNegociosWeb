<?php

namespace Controllers\Usuarios;

use Controllers\PublicController;
use Dao\Usuarios\Usuarios;
use Views\Renderer;

class UsuariosForm extends PublicController
{
    private $viewData = [];
    private $modeDscArr = [
        "INS" => "Crear Nuevo Usuario",
        "UPD" => "Editar Usuario %s",
        "DEL" => "Eliminar Usuario %s",
    ];

    public function run(): void
    {
        $this->init();
        if (!$this->isPostBack()) {
            $this->prepareView();
            Renderer::render("usuarios_form", $this->viewData);
            return;
        }

        $this->processPost();
        if (empty($this->viewData["errors"])) {
            $this->executeAction();
        }
        $this->prepareView();
        Renderer::render("usuarios_form", $this->viewData);
    }

    private function init()
    {
        $this->viewData["mode"] = $_GET["mode"] ?? "INS";
        $this->viewData["usercod"] = $_GET["usercod"] ?? null;
        $this->viewData["useremail"] = "";
        $this->viewData["username"] = "";
        $this->viewData["userpswd"] = "";
        $this->viewData["userfching"] = date("Y-m-d H:i:s");
        $this->viewData["userest"] = "";
        $this->viewData["usertipo"] = "";
        $this->viewData["errors"] = [];
    }

    private function prepareView()
    {
        $mode = $this->viewData["mode"];
        $this->viewData["mode_dsc"] = sprintf($this->modeDscArr[$mode], $this->viewData["username"]);
        if ($mode === "UPD" || $mode === "DEL") {
            $usuario = Usuarios::obtenerPorId($this->viewData["usercod"]);
            $this->viewData = array_merge($this->viewData, $usuario);
        }
    }

    private function processPost()
    {
        if ($this->viewData["mode"] === "DEL") {
            return;
        }

        $this->viewData["useremail"] = $_POST["useremail"] ?? "";
        $this->viewData["username"] = $_POST["username"] ?? "";
        $this->viewData["userpswd"] = $_POST["userpswd"] ?? "";
        $this->viewData["userest"] = $_POST["userest"] ?? "";
        $this->viewData["usertipo"] = $_POST["usertipo"] ?? "";

        if (empty($this->viewData["useremail"])) {
            $this->viewData["errors"][] = "El correo electrónico es obligatorio.";
        }
        if (empty($this->viewData["username"])) {
            $this->viewData["errors"][] = "El nombre de usuario es obligatorio.";
        }
    }

    private function executeAction()
    {
        switch ($this->viewData["mode"]) {
            case "INS":
                Usuarios::insertar(
                    $this->viewData["useremail"],
                    $this->viewData["username"],
                    password_hash($this->viewData["userpswd"], PASSWORD_DEFAULT),
                    $this->viewData["userfching"],
                    $this->viewData["userest"],
                    date("Y-m-d H:i:s", strtotime("+3 months")),
                    $this->viewData["userest"],
                    null, 
                    null,
                    $this->viewData["usertipo"]
                );
                break;
            case "UPD":
                Usuarios::actualizar(
                    $this->viewData["usercod"],
                    $this->viewData["useremail"],
                    $this->viewData["username"],
                    password_hash($this->viewData["userpswd"], PASSWORD_DEFAULT),
                    $this->viewData["userfching"],
                    $this->viewData["userest"],
                    date("Y-m-d H:i:s", strtotime("+3 months")),
                    $this->viewData["userest"],
                    null,
                    null,
                    $this->viewData["usertipo"]
                );
                break;
            case "DEL":
                Usuarios::eliminar($this->viewData["usercod"]);
                break;
        }
    }
}
?>

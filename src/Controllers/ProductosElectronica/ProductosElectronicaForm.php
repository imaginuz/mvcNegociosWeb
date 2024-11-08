<?php

namespace Controllers\ProductosElectronica;

use Controllers\PublicController;
use Views\Renderer;
use Dao\ProductosElectronica\ProductosElectronica;
use Utilities\Validators;

class ProductosElectronicaForm extends PublicController
{
    private $viewData = [];
    private $modeDscArr = [
        "INS" => "Crear nuevo Producto Electrónico",
        "UPD" => "Editando %s",
        "DSP" => "Detalle de %s",
        "DEL" => "Eliminando %s",
    ];
    private $mode = '';
    private $errors = [];

    private function addErrorMessage($msg)
    {
        $this->errors[] = $msg;
    }

    public function run(): void
    {
        $this->init();
        if (!$this->isPostBack()) {
            Renderer::render("productoselectronica_form", $this->viewData);
            return;
        }

        $this->processPost();
        if (empty($this->errors)) {
            $this->executeAction();
        }
        Renderer::render("productoselectronica_form", $this->viewData);
    }

    private function init()
    {
        $this->viewData["mode"] = $_POST["mode"] ?? "INS";
        $this->viewData["id_producto"] = $_POST["id_producto"] ?? 0;
        $this->viewData["nombre"] = $_POST["nombre"] ?? "";
        $this->viewData["tipo"] = $_POST["tipo"] ?? "";
        $this->viewData["precio"] = $_POST["precio"] ?? 0.0;
        $this->viewData["marca"] = $_POST["marca"] ?? "";
        $this->viewData["fecha_lanzamiento"] = $_POST["fecha_lanzamiento"] ?? "";
    }

    private function processPost()
    {
        if (Validators::isEmpty($this->viewData["nombre"])) {
            $this->addErrorMessage("El nombre no puede estar vacío.");
        }
        if (!is_numeric($this->viewData["precio"]) || $this->viewData["precio"] < 0) {
            $this->addErrorMessage("El precio debe ser un número positivo.");
        }
    }

    private function executeAction()
    {
        switch ($this->viewData["mode"]) {
            case "INS":
                ProductosElectronica::insertar(
                    $this->viewData["nombre"],
                    $this->viewData["tipo"],
                    $this->viewData["precio"],
                    $this->viewData["marca"],
                    $this->viewData["fecha_lanzamiento"]
                );
                break;
            case "UPD":
                ProductosElectronica::actualizar(
                    $this->viewData["id_producto"],
                    $this->viewData["nombre"],
                    $this->viewData["tipo"],
                    $this->viewData["precio"],
                    $this->viewData["marca"],
                    $this->viewData["fecha_lanzamiento"]
                );
                break;
            case "DEL":
                ProductosElectronica::eliminar($this->viewData["id_producto"]);
                break;
        }
    }
}
?>

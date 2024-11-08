<?php

namespace Controllers\ProductosElectronica;

use Controllers\PublicController;
use Dao\ProductosElectronica\ProductosElectronica;
use Views\Renderer;

class ProductosElectronicaList extends PublicController
{
    public function run(): void
    {
        $productos = ProductosElectronica::obtenerTodos();
        Renderer::render("productoselectronica_list", array("productos" => $productos));
    }
}
?>

<?php

namespace Controllers\Funciones;

use Controllers\PublicController;
use Dao\Funciones\Funciones;
use Views\Renderer;

class FuncionesList extends PublicController
{
    public function run(): void
    {
        $funciones = Funciones::obtenerTodos();
        Renderer::render("funciones_list", array("funciones" => $funciones));
    }
}
?>

<?php

namespace Controllers\Funciones;

use Controllers\PublicController;
use Dao\Funciones\Funciones;
use Views\Renderer;

class FuncionesList extends PublicController
{
    public function run(): void
    {
        $funcionesDao = Funciones::obtenerFunciones();
        $viewFunciones = [];

        foreach ($funcionesDao as $funcion) {
            $viewFunciones[] = $funcion;
        }

        $viewData = [
            "funcion" => $viewFunciones
        ];

        Renderer::render('funciones/funciones_list', $viewData);
    }
}
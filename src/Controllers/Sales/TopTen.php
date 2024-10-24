<?php

namespace Controllers\Sales;

use Controllers\PublicController;
use Views\Renderer;

class TopTen extends PublicController{
    public function run() :void{
        $viewData = [
            "nombre_programado"=>'Jordy S Pineda',
            "clases" =>[
                "Programacion de Portales Web I",
                "Programacion de Portales Web II",
                "Programacion de Negocios Web"
            ],
            "contactos" =>[
                [
                    "nombre" =>"Fulanito de tal",
                    "telefono" =>"09051353"
                ],
                [
                    "nombre" =>"Mentanito de tal",
                    "telefono" =>"09051353"
                ],
                [
                    "nombre" =>"Susanito de tal",
                    "telefono" =>"09051353"
                ],
            ]
        ];
        if ($this->isPostBack()) {
            $txtNombre = $_POST["txtNombre"];
            $rsltMessage = strtoupper($txtNombre) . " Procesado!!!!";
            $viewData["txtNombre"] = $txtNombre;
            $viewData["rsltMessage"] = $rsltMessage;
        }

        Renderer::render('sales/top10', $viewData);
    }
}
<?php

namespace Controllers\Sales;

use Controllers\PublicController;
use Views\Renderer;

class TopTen extends PublicController{
    public function run():void{
        $viewData = 
            [
                "nombre_programador" => "Ricardo Y Zuniga",
                "clases" => 
                    [
                        "Programacion de Portales Web 1",
                        "Programacion de Portales Web 2",
                        "Programacion de Negocios Web"
                    ],
                "contactos" => 
                    [
                        [
                            "nombre" => "Elizabeth Olsen",
                            "telefono" => "9999-9999",
                        ],
                        [
                            "nombre" => "Robert Downey Jr",
                            "telefono" => "8888-8888",
                        ],
                        [
                            "nombre" => "Scarlett Johansson",
                            "telefono" => "1111-1111",
                        ],
                    ]
            ];

            if( $this->isPostBack()) {
                $txtNombre = $_POST["txtNombre"];
                $rsltMessage = strtoupper($txtNombre) . " Procesado!!!";
                $viewData["txtNombre"] = $txtNombre;
                $viewData["rsltMessage"] = $rsltMessage;
            }

            Renderer::render("sales/top10", $viewData);
    }
}
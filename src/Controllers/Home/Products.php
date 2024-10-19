<?php

namespace Controllers\Home;

use Controllers\PublicController;
use Views\Renderer;

class Products extends PublicController{
    public function run():void{
        $viewData = 
            [
                "productos" => 
                    [
                        [
                            "nombre" => "Coca Cola",
                            "cantidad" => "10 en Stock",
                            "precio" => "100.Lps",
                            "imagen" => "https://source.unsplash.com/random",

                        ],
                        [
                            "nombre" => "Pepsi",
                            "cantidad" => "5 en Stock",
                            "precio" => "80.Lps",
                        ],
                        [
                            "nombre" => "Fanta",
                            "cantidad" => "15 en Stock",
                            "precio" => "50.Lps",
                        ],

                    ]
            ];

            Renderer::render("home/home", $viewData);
    }
}
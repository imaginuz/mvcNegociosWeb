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
                            "imagen" => "https://picsum.photos/300/200?random=1"

                        ],
                        [
                            "nombre" => "Pepsi",
                            "cantidad" => "5 en Stock",
                            "precio" => "80.Lps",
                            "imagen" => "https://picsum.photos/300/200?random=2"
                        ],
                        [
                            "nombre" => "Fanta",
                            "cantidad" => "15 en Stock",
                            "precio" => "50.Lps",
                            "imagen" => "https://picsum.photos/300/200?random=3"
                        ],
                        [
                            "nombre" => "Sprite",
                            "cantidad" => "20 en Stock",
                            "precio" => "70.Lps",
                            "imagen" => "https://picsum.photos/300/200?random=4"
                        ],
                        [
                            "nombre" => "7up",
                            "cantidad" => "25 en Stock",
                            "precio" => "60.Lps",
                            "imagen" => "https://picsum.photos/300/200?random=5"
                        ],
                        [
                            "nombre" => "Mirinda",
                            "cantidad" => "30 en Stock",
                            "precio" => "40.Lps",
                            "imagen" => "https://picsum.photos/300/200?random=6"
                        ],
                        [
                            "nombre" => "Monster",
                            "cantidad" => "30 en Stock",
                            "precio" => "40.Lps",
                            "imagen" => "https://picsum.photos/300/200?random=7"
                        ],

                    ]
            ];

            Renderer::render("home/home", $viewData);
    }
}
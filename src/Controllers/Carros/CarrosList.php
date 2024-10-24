<?php

namespace Controllers\Carros;

use Controllers\PublicController;
use Dao\Carros\Carros;
use Views\Renderer;

class CarrosList extends PublicController
{
    public function run(): void
    {
        $carrosDao = Carros::obtenerCarros();
        $viewCarros = [];
        $estadosDsCarr = [
            "DSP" => "Disponible",
            "RSV" => "Reservado",
            "SLD" => "Vendido"
        ];
        foreach ($carrosDao as $carro) {
            $carro["estadoDesc"] = $estadosDsCarr[$carro["estado"]];
            $viewCarros[] = $carro;
        }
        $viewData = [
            "carros" => $viewCarros
        ];

        Renderer::render('carros/carros_list', $viewData);
    }
}
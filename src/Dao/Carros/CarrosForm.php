<?php

namespace Controllers\Carros;

use Controllers\PublicController;
use Views\Renderer;
use Utilities\Site;

class CarrosForm extends PublicController
{
    private $viewData = [];
    private $modeDscArr = [
        "INS" => "Crear nuevo Carro",
        "UPD" => "Editando %s (%s)",
        "DSP" => "Detalle de %s (%s)",
        "DEL" => "Eliminando %s (%s)"
    ];
    private $mode= '';

    //Estructura del producto
    private $carro =[
    "codigo"=> 0,
    "modelo"=> '',
    "marca"=> '',
    "anio"=> 0,
    "kilometraje"=> 0,
    "chasis"=>'',
    "color"=>'',
    "registro"=>'',
    "cilindraje"=>0,
    "notas"=>0,
    "rodaje"=>'',
    "estado" =>'ACT',
    "creado"=>null,
    "precioventa"=>0,
    "preciocontado"=>0,
    "precominicio" =>0,
    "actualizado"=>null
    ];


    public function run(): void
    {
        // Ciclo de Vida del Formulario
        // 1) Obtener variables del GET
        // 2) Si hay código de Carro y no es INS
        // buscar el registro de carro por código
        // 3) Si existe POSTBACK
        // capturar los datos del formulario
        // validar los datos del formulario
        // INS: insertar registro
        // UPD: actualizar registro
        // DEL: Eliminar registro
        // Regresar a la lista actualizada
        // 4) Generar $viewData
        // 5) Rendirizar formulario

        $this->inicializarForm();
        Renderer::render('carros/carros_form', $this->viewData);
    }

    private function inicializarform(){
        if(isset($_GET["mode"]) && isset($this->modeDscArr[$_GET["mode"]])) {
            $this->mode = $_GET["mode"];
        } else{
            Site::redirectToWithMsg("index.php?page=Carros-CarrosList","Algo Sucedio Mal. Intente de nuevo");
            die();
        }
        if($this->mode!=='INS' && isset($_GET["codigo"])){
            $this->carro["codigo"] = $_GET["codigo"];
            $this->cargarDatosCarro();
        }
    }
    private function CargarDatosCarro(){
        
    }
}

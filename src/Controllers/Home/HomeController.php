<?php
namespace Controllers\Home;

use Controllers\PublicController;
use Views\Renderer;
use Controllers\Home\Products;

class HomeController extends PublicController {
    public function index(): void {
        $productos = Products::getProducts();
        Renderer::render('home/home', [
            'productos' => $productos
        ]);
    }
}

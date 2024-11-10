<?php

namespace Controllers\Usuarios;

use Controllers\PublicController;
use Dao\Usuarios\Usuarios;
use Views\Renderer;

class UsuariosList extends PublicController
{
    public function run(): void
    {
        $usuarios = Usuarios::obtenerTodos();
        Renderer::render("usuarios_list", array("usuarios" => $usuarios));
    }
}
?>

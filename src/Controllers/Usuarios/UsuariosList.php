<?php

namespace Controllers\Usuarios;

use Controllers\PublicController;
use Dao\Usuarios\Usuarios;
use Views\Renderer;

class UsuariosList extends PublicController
{
    public function run(): void
    {
        $usuariosDao = Usuarios::ObtenerUsuarios();
        $viewUsuarios = [];

        $estadosPswArr =
        [
            "ACT" => "Activa",
            "DES" => "Desactiva"
        ];

        $estadosUserArr =
        [
            "ACT" => "Activo",
            "DES" => "Desactivo"
        ];

        $usuarioTipoArr =
        [
            "ADM" => "Administrador",
            "BAS" => "Básico",
            "INV" => "Invitado"
        ];

        foreach ($usuariosDao as $usuario)
        {
            $usuario["estadosPsw"] = $estadosPswArr[$usuario["userpswdest"]];
            $usuario["estadosUser"] = $estadosUserArr[$usuario["userest"]];
            $usuario["usuarioTipo"] = $usuarioTipoArr[$usuario["usertipo"]];

            $viewUsuarios[] = $usuario;
        }
        $viewData =
        [
            "usuario" => $usuariosDao
        ];

        Renderer::render('usuarios/usuarios_list', $viewData);
    }
}
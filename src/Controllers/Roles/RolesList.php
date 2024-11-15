<?php

namespace Controllers\Roles;

use Controllers\PublicController;
use Dao\Roles\Roles;
use Views\Renderer;

class RolesList extends PublicController
{
    public function run(): void
    {
        $rolesDao = Roles::ObtenerRoles();
        $viewRoles = [];

        foreach ($rolesDao as $rol) {
            $viewRoles[] = $rol;
        }

        $viewData = [
            "rol" => $viewRoles
        ];

        Renderer::render('roles/roles_list', $viewData);
    }
}
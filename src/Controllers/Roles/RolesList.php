<?php

namespace Controllers\Roles;

use Controllers\PublicController;
use Dao\Roles\Roles;
use Views\Renderer;

class RolesList extends PublicController
{
    public function run(): void
    {
        $roles = Roles::obtenerTodos();
        Renderer::render("roles_list", array("roles" => $roles));
    }
}
?>

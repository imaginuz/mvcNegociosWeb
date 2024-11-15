<?php

namespace Dao\Roles;

use Dao\Table;

class Roles extends Table
{
    public static function ObtenerRoles()
    {
        $sqlstr = 'SELECT * FROM roles';
        $roles = self::obtenerRegistros($sqlstr, []);
        return $roles;
    }

    public static function ObtenerRolesPorID($id)
    {
        $sqlstr = 'SELECT * FROM roles WHERE rolescod=:rolescod;';
        $roles = self::obtenerUnRegistro($sqlstr, ["rolescod" => $id]);
        return $roles;
    }
    
    public static function agregarRoles($rol)
    {
      $existingRole = self::ObtenerRolesPorID($rol['rolescod']);
      if ($existingRole)
        {
          return "exists";
        }

      $sqlstr =
      'INSERT INTO roles (
      rolescod, 
      rolesdsc, 
      rolesest
      )
      VALUES
      (
      :rolescod,
      :rolesdsc,
      :rolesest
      );';

    return self::executeNonQuery($sqlstr, $rol);
  }

    public static function actualizarRoles($roles)
    {
      $sqlstr = "UPDATE roles SET
      rolesdsc = :rolesdsc,  
      rolesest = :rolesest
      WHERE rolescod = :rolescod;";

      return self::executeNonQuery($sqlstr, $roles);
    }

    public static function eliminarRoles($rolescod)
    {
      $sqlstr = "DELETE FROM roles WHERE rolescod =:rolescod;";
      return self::executeNonQuery($sqlstr, ["rolescod"=>$rolescod]);
    }
}
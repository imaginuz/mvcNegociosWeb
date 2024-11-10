<?php

namespace Dao\Usuarios;

use Dao\Table;

class Usuarios extends Table
{
    public static function obtenerTodos()
    {
        $sqlstr = 'SELECT * FROM usuario;';
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function obtenerPorId($usercod)
    {
        $sqlstr = 'SELECT * FROM usuario WHERE usercod = :usercod;';
        return self::obtenerUnRegistro($sqlstr, ["usercod" => $usercod]);
    }

    public static function insertar($useremail, $username, $userpswd, $userfching, $userpswdest, $userpswdexp, $userest, $useractcod, $userpswdchg, $usertipo)
    {
        $sqlstr = 'INSERT INTO usuario (useremail, username, userpswd, userfching, userpswdest, userpswdexp, userest, useractcod, userpswdchg, usertipo) 
                   VALUES (:useremail, :username, :userpswd, :userfching, :userpswdest, :userpswdexp, :userest, :useractcod, :userpswdchg, :usertipo);';
        return self::executeNonQuery($sqlstr, [
            "useremail" => $useremail,
            "username" => $username,
            "userpswd" => $userpswd,
            "userfching" => $userfching,
            "userpswdest" => $userpswdest,
            "userpswdexp" => $userpswdexp,
            "userest" => $userest,
            "useractcod" => $useractcod,
            "userpswdchg" => $userpswdchg,
            "usertipo" => $usertipo
        ]);
    }

    public static function actualizar($usercod, $useremail, $username, $userpswd, $userfching, $userpswdest, $userpswdexp, $userest, $useractcod, $userpswdchg, $usertipo)
    {
        $sqlstr = 'UPDATE usuario 
                   SET useremail = :useremail, username = :username, userpswd = :userpswd, userfching = :userfching, 
                       userpswdest = :userpswdest, userpswdexp = :userpswdexp, userest = :userest, useractcod = :useractcod, 
                       userpswdchg = :userpswdchg, usertipo = :usertipo 
                   WHERE usercod = :usercod;';
        return self::executeNonQuery($sqlstr, [
            "usercod" => $usercod,
            "useremail" => $useremail,
            "username" => $username,
            "userpswd" => $userpswd,
            "userfching" => $userfching,
            "userpswdest" => $userpswdest,
            "userpswdexp" => $userpswdexp,
            "userest" => $userest,
            "useractcod" => $useractcod,
            "userpswdchg" => $userpswdchg,
            "usertipo" => $usertipo
        ]);
    }

    public static function eliminar($usercod)
    {
        $sqlstr = 'DELETE FROM usuario WHERE usercod = :usercod;';
        return self::executeNonQuery($sqlstr, ["usercod" => $usercod]);
    }
}
?>

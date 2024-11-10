<?php

namespace Dao\Funciones;

use Dao\Table;

class Funciones extends Table
{
    public static function obtenerTodos()
    {
        $sqlstr = 'SELECT * FROM funciones;';
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function obtenerPorId($fncod)
    {
        $sqlstr = 'SELECT * FROM funciones WHERE fncod = :fncod;';
        return self::obtenerUnRegistro($sqlstr, ["fncod" => $fncod]);
    }

    public static function insertar($fncod, $fndsc, $fnest, $fntyp)
    {
        $sqlstr = 'INSERT INTO funciones (fncod, fndsc, fnest, fntyp) 
                   VALUES (:fncod, :fndsc, :fnest, :fntyp);';
        return self::executeNonQuery($sqlstr, [
            "fncod" => $fncod,
            "fndsc" => $fndsc,
            "fnest" => $fnest,
            "fntyp" => $fntyp
        ]);
    }

    public static function actualizar($fncod, $fndsc, $fnest, $fntyp)
    {
        $sqlstr = 'UPDATE funciones 
                   SET fndsc = :fndsc, fnest = :fnest, fntyp = :fntyp 
                   WHERE fncod = :fncod;';
        return self::executeNonQuery($sqlstr, [
            "fncod" => $fncod,
            "fndsc" => $fndsc,
            "fnest" => $fnest,
            "fntyp" => $fntyp
        ]);
    }

    public static function eliminar($fncod)
    {
        $sqlstr = 'DELETE FROM funciones WHERE fncod = :fncod;';
        return self::executeNonQuery($sqlstr, ["fncod" => $fncod]);
    }
}
?>

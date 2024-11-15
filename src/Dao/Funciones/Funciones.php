<?php

namespace Dao\Funciones;

use Dao\Table;

class Funciones extends Table
{
    public static function obtenerFunciones()
    {
        $sqlstr = 'SELECT * FROM funciones';
        $funciones = self::obtenerRegistros($sqlstr, []);
        return $funciones;
    }

    public static function obtenerFuncionPorID($id)
    {
        $sqlstr = 'SELECT * FROM funciones WHERE fncod = :fncod;';
        $funcion = self::obtenerUnRegistro($sqlstr, ["fncod" => $id]);
        return $funcion;
    }
    
    public static function agregarFuncion($funcion)
    {
        $existingFunction = self::obtenerFuncionPorID($funcion['fncod']);
        if ($existingFunction) {
            return "exists";
        }

        $sqlstr = 'INSERT INTO funciones (
            fncod,
            fndsc,
            fnest,
            fntyp
        ) VALUES (
            :fncod,
            :fndsc,
            :fnest,
            :fntyp
        );';

        return self::executeNonQuery($sqlstr, $funcion);
    }

    public static function actualizarFuncion($funcion)
    {
        $sqlstr = 'UPDATE funciones SET
            fndsc = :fndsc,
            fnest = :fnest,
            fntyp = :fntyp
        WHERE fncod = :fncod;';

        return self::executeNonQuery($sqlstr, $funcion);
    }

    public static function eliminarFuncion($fncod)
    {
        $sqlstr = 'DELETE FROM funciones WHERE fncod = :fncod;';
        return self::executeNonQuery($sqlstr, ["fncod" => $fncod]);
    }
}
<?php

namespace Dao\ProductosElectronica;

use Dao\Table;

class ProductosElectronica extends Table
{
    public static function obtenerTodos()
    {
        $sqlstr = 'SELECT * FROM ProductosElectronica;';
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function obtenerPorId($id)
    {
        $sqlstr = 'SELECT * FROM ProductosElectronica WHERE id_producto = :id;';
        return self::obtenerUnRegistro($sqlstr, ["id" => $id]);
    }

    public static function insertar($nombre, $tipo, $precio, $marca, $fecha_lanzamiento)
    {
        $sqlstr = 'INSERT INTO ProductosElectronica (nombre, tipo, precio, marca, fecha_lanzamiento) 
                   VALUES (:nombre, :tipo, :precio, :marca, :fecha_lanzamiento);';
        return self::executeNonQuery($sqlstr, [
            "nombre" => htmlspecialchars($nombre),
            "tipo" => htmlspecialchars($tipo),
            "precio" => $precio,
            "marca" => htmlspecialchars($marca),
            "fecha_lanzamiento" => $fecha_lanzamiento
        ]);
    }

    public static function actualizar($id, $nombre, $tipo, $precio, $marca, $fecha_lanzamiento)
    {
        $sqlstr = 'UPDATE ProductosElectronica 
                   SET nombre = :nombre, tipo = :tipo, precio = :precio, marca = :marca, fecha_lanzamiento = :fecha_lanzamiento
                   WHERE id_producto = :id;';
        return self::executeNonQuery($sqlstr, [
            "id" => $id,
            "nombre" => htmlspecialchars($nombre),
            "tipo" => htmlspecialchars($tipo),
            "precio" => $precio,
            "marca" => htmlspecialchars($marca),
            "fecha_lanzamiento" => $fecha_lanzamiento
        ]);
    }

    public static function eliminar($id)
    {
        $sqlstr = 'DELETE FROM ProductosElectronica WHERE id_producto = :id;';
        return self::executeNonQuery($sqlstr, ["id" => $id]);
    }
}
?>

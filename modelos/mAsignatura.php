<?php
include_once 'configdb.php';

class Asignatura extends ConfigDB {

    function consultarTodas() {
        $sql = "SELECT * FROM asignatura";
        $resultado = $this->conexion->query($sql);
        $asignaturas = [];

        while ($fila = $resultado->fetch_array()) {
            $asignaturas[] = $fila;
        }

        return $asignaturas;
    }

    function guardarNueva($nombre, $color) {
        $sql = "INSERT INTO asignatura (nombre, color) VALUES ('$nombre', '$color')";
        return $this->conexion->query($sql);
    }

    function consultarPorCodigo($codigo) {
        $sql = "SELECT * FROM asignatura WHERE codigo = $codigo";
        $resultado = $this->conexion->query($sql);
        return $resultado->fetch_array();
    }

    function guardarCambios($codigo, $nombre, $color) {
        $sql = "UPDATE asignatura SET nombre = '$nombre', color = '$color' WHERE codigo = $codigo";
        return $this->conexion->query($sql);
    }

    function borrarPorCodigo($codigo) {
        $sql = "DELETE FROM asignatura WHERE codigo = $codigo";
        return $this->conexion->query($sql);
    }
}
?>

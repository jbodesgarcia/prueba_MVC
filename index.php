<?php
    $controlador = $_GET["controlador"];
    $metodo = $_GET["metodo"];

    include 'controladores/' . $controlador . '.php';

    $objeto = new $controlador;
    $datos = $objeto->$metodo();
    $asignaturas = $datos;
    include $objeto->vista;
?>

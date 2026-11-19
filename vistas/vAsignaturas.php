<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver asignaturas</title>
    <link rel="stylesheet" href="./estilos.css">
</head>
<body>
    <h2>Listado de asignaturas</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Color</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
        <?php
        foreach ($asignaturas as $fila) {
            echo '<tr>';
            echo '<td>'.$fila['codigo'].'</td>';
            echo '<td>'.$fila['nombre'].'</td>';
            echo '<td>'.$fila['color'].'</td>';
            echo '<td><a href="index.php?controlador=CAsignaturas&metodo=obtenerAsignaturaModificar&id='.$fila['codigo'].'">Modificar</a></td>';
            echo '<td><a href="index.php?controlador=CAsignaturas&metodo=obtenerAsignaturaEliminar&id='.$fila['codigo'].'">Eliminar</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <br>
    <a href="vistas/vIntroducir.html">Introducir asignatura</a>
</body>
</html>

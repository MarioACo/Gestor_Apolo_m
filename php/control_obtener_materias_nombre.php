<?php
    require_once '../app/conexion.php';
    $conexion = conexion();
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];
    $clave = $_POST['clave'];
    $query = "SELECT nombre
              FROM materia
              WHERE carrera = '$carrera' AND semestre = '$semestre' AND clave = '$clave'";
    $result = mysqli_query($conexion, $query);
    $m = mysqli_fetch_array($result);
    echo $m['nombre'];
?>
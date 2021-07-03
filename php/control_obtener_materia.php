<?php
    require_once '../app/conexion.php';
    $conexion = conexion();
    $semestre = $_POST['semestre'];
    $carrera = $_POST['carrera'];
    $query = "SELECT nombre_materia
              FROM materias
              WHERE semestre = '$semestre' AND carrera = '$carrera'";
    $result = mysqli_query($conexion, $query);
    $lista = '<option selected disabled value="0">Nombre Materia</option>';
    while($nombre = mysqli_fetch_row($result)){
      $lista .= "<option value='$nombre[0]'>$nombre[0]</option>";
    }
    echo $lista;
?>
<?php
    require_once '../app/conexion.php';
    $conexion = conexion();
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];
    $query = "SELECT clave
              FROM materia
              WHERE carrera = '$carrera' AND semestre = '$semestre'";
    $result = mysqli_query($conexion, $query);
    $lista = '<option selected disabled value="">Matricula Materia</option>';
    while($no_control = mysqli_fetch_row($result)){
      $lista .= "<option value='$no_control[0]'>$no_control[0]</option>";
    }
    echo $lista;
?>
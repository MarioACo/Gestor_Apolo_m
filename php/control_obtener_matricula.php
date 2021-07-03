<?php
    require_once '../app/conexion.php';
    $conexion = conexion();
    $ocupacion = $_POST['ocupacion'];
    $carrera = $_POST['carrera'];
    $query = "SELECT no_control
              FROM usuarios
              WHERE ocupacion = '$ocupacion' AND carrera = '$carrera'";
    $result = mysqli_query($conexion, $query);
    $lista = '<option selected disabled value="0">Matricula Usuario</option>';
    while($matricula = mysqli_fetch_row($result)){
      $lista .= "<option value='$matricula[0]'>$matricula[0]</option>";
    }
    echo $lista;
?>
<?php
    require_once '../app/conexion.php';
    $conexion = conexion();
    $ocupacion = $_POST['ocupacion'];
    $query = "SELECT no_control
              FROM usuarios
              WHERE ocupacion = '$ocupacion'";
    $result = mysqli_query($conexion, $query);
    $lista = '<option selected value="">Matricula Profesor</option>';
    while($no_control = mysqli_fetch_row($result)){
      $lista .= "<option value='$no_control[0]'>$no_control[0]</option>";
    }
    echo $lista;
?>
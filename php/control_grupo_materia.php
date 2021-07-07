<?php
    require_once '../app/conexion.php';
    $conexion = conexion();
    $grupo = $_POST['grupo'];
    $query = "SELECT nombre_materia
              FROM materias
              WHERE grupo = '$grupo'";
    $result = mysqli_query($conexion, $query);
    $lista = '<option disabled value="">Materia</option>';
    while($no_control = mysqli_fetch_row($result)){
      $lista .= "<option value='$no_control[0]'>$no_control[0]</option>";
    }
    echo $lista;
?>
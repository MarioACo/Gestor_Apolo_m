<?php
  require_once '../app/conexion.php';
  $conexion = conexion();
  $carrera = $_POST['carrera'];
  $query = "SELECT grupo FROM materias WHERE carrera = '$carrera'";
  $result = mysqli_query($conexion, $query);
  $lista = '<option selected disabled value="">Grupo</option>';
  while($grupo = mysqli_fetch_row($result)){
    $lista .= "<option value='$grupo[0]'>$grupo[0]</option>";
  }
  echo $lista;
?>
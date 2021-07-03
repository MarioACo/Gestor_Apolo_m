<?php
  require_once '../app/conexion.php';
  $conexion = conexion();
  $n_control = $_POST['n_control'];
  $query = "SELECT carrera FROM usuarios WHERE no_control = '$n_control'";
  $result = mysqli_query($conexion, $query);
  $m = mysqli_fetch_row($result);
  echo $m[0]; 
?>
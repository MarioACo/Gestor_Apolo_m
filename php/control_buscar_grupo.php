<?php
  session_start();
  require_once '../app/conexion.php';
  $conexion = conexion();
  $no_control = $_SESSION['no_control'];
  $query = "SELECT grupo FROM archivos WHERE profesor_no = '$no_control'";
  $result = mysqli_query($conexion, $query);
  $lista = '<option selected disabled value="">Grupo</option>';
  while($grupo = mysqli_fetch_row($result)){
    $lista .= "<option value='$grupo[0]'>$grupo[0]</option>";
  }
  echo $lista;
?>
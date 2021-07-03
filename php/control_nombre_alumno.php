<?php
  require_once '../app/conexion.php';
  $conexion = conexion();
  $no_control = $_POST['no_control'];
  $query = "SELECT nombre_usuario,
                  apellido_paterno_usuario,
                  apellido_materno_usuario
                FROM usuarios
                WHERE no_control = '$no_control'";
  $result = mysqli_query($conexion, $query);
  $m = mysqli_fetch_row($result);
  echo $m[0]." ".$m[1]." ".$m[2]; 
?>
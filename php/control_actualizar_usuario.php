<?php
  
  require_once '../app/conexion.php';

  $conexion = conexion();

  $id_usuario = $_POST['id_usuario'];
  $control = $_POST['control'];
  $usuario = $_POST['nombre'];
  $ap = $_POST['apellido_paterno'];
  $am = $_POST['apellido_materno'];
  $ocupacion = $_POST['ocupacion'];
  $carrera = $_POST['carrera'];
  $email = $_POST['correo'];

  

  $query = "UPDATE usuarios SET no_control = ?,
                                nombre_usuario = ?,
                                apellido_paterno_usuario = ?,
                                apellido_materno_usuario = ?,
                                ocupacion = ?,
                                carrera = ?,
                                email = ?
                            WHERE id_usuario = '$id_usuario'";
  $sql = $conexion->prepare($query);
  $sql->bind_param("sssssss", $control, $usuario, $ap, $am, $ocupacion, $carrera, $email);
  $sql->execute();

  if($sql){
      echo 1;
  }else{
      echo 0;
  }
  $conexion->close();

?>
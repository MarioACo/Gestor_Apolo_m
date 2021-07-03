<?php
  session_start();
  require_once "../app/conexion.php";
  $conexion = conexion();
  $id_usuario = $_SESSION['no_control'];
  $operacion = $_POST['operacion'];
  $query = "SELECT no_archivos_s, id_archivo FROM archivos WHERE profesor_no = '$id_usuario' ORDER BY no_archivos_s DESC LIMIT 1";
  $result = mysqli_query($conexion, $query);
  $numero_archivo = mysqli_fetch_row($result);
  $n_a = $numero_archivo[0];
  $archivo = $numero_archivo[1];
  if($operacion == "suma"){
    if($n_a == 0){
      $n_a = 1;
    }else{
      $n_a ++;
    }
  }else if($operacion == "resta"){
    if($n_a == 0){
      $n_a = 0;
    }else{
      $n_a --;
    }
  }
 
  $actualizar_query = "UPDATE contador SET no_archivos_s = ? WHERE id_archivo = ?";
  $sql = $conexion->prepare($actualizar_query);
  $sql->bind_param("ii", $n_a, $archivo);
  $sql->execute();
  

  $conexion->close();
?>
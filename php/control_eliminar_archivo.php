<?php
  session_start();
  require_once '../app/conexion.php';
  $conexion = conexion();
  $no_control = $_SESSION['no_control'];
  $id_archivo = $_POST['id_archivo'];
  $archivo = $_POST['nombre'];
  $materia = $_POST['materia'];
  $grupo = $_POST['grupo'];
  $unidad = $_POST['unidad'];
  $semestre = $_POST['semestre'];
  $ruta = "../archivos/". $no_control . "/Semestre_" . $semestre."/" . $materia . "/Grupo_" . $grupo ."/Unidad_" . $unidad . "/" . $archivo;
  
 
  if(unlink($ruta)){
    
    $query = "DELETE FROM archivos WHERE id_archivo = ?";
    $sql = $conexion->prepare($query);
    $sql->bind_param('i', $id_archivo);
    $sql->execute();
    echo $sql;
    $conexion->close();
  }else{
   
  }
  
    
    
  
  
  
  
?>
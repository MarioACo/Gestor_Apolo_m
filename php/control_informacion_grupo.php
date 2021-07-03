<?php
  require_once '../app/conexion.php';
  
  $conexion = conexion();
  $grupo = $_POST['grupo'];
  $query = "SELECT semestre,
                  profesor_no
                FROM materias
                WHERE grupo = '$grupo'";
  $result = mysqli_query($conexion, $query);
  $m = mysqli_fetch_array($result);
  $datos = array(
    "semestre" => $m['semestre'],
    "profesor_no" => $m['profesor_no'],
  );
  echo json_encode($datos);
?>
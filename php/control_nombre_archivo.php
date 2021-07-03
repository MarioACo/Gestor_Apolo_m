<?php
  session_start();
  require_once '../app/conexion.php';
  $conexion = conexion();
  $no_control  = $_SESSION['no_control'];
  $matricula = $_POST['matricula'];
  $query = "SELECT nombre_materia,
                  semestre,
                  grupo
                FROM materias
                WHERE clave_materia = '$matricula' AND profesor_no = '$no_control'";
  $result = mysqli_query($conexion, $query);
  $m = mysqli_fetch_array($result);
  $datos = array(
    "nombre_materia" => $m['nombre_materia'],
    "semestre" => $m['semestre'],
    "grupo" => $m['grupo']
  );
  echo json_encode($datos);
?>
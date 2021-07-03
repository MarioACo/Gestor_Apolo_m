<?php
    session_start();
    require_once '../app/conexion.php';
    $conexion = conexion();
    $matricula  = $_SESSION['no_control'];
    $query = "SELECT clave_materia
              FROM materias
              WHERE profesor_no = '$matricula'";
    $result = mysqli_query($conexion, $query);
    $lista = '<option selected disabled value="0">Matricula de la Materia</option>';
    while($materia = mysqli_fetch_row($result)){
      $lista .= "<option value='$materia[0]'>$materia[0]</option>";
    }
    echo $lista;
?>
<?php

    require_once '../app/conexion.php';

    $conexion = conexion();
    $id_asignar = $_POST['id_asignar'];
    $query = "SELECT id_asg_materia,
                    profesor_no,
                    no_control,
                    nombre_alumno,
                    carrera,
                    tipo_clase,
                    semestre,
                    nombre_materia,
                    grupo
              FROM asignar_materia
              WHERE id_asg_materia = '$id_asignar'";
    $result = mysqli_query($conexion, $query);
    $categoria = mysqli_fetch_array($result);
    $datos = array(
      "id_asg_materia" => $categoria['id_asg_materia'],
      "profesor_no" => $categoria['profesor_no'],
      "no_control" => $categoria['no_control'],
      "nombre_alumno" => $categoria['nombre_alumno'],
      "carrera" => $categoria['carrera'],
      "tipo_clase" => $categoria['tipo_clase'],
      "semestre" => $categoria['semestre'],
      "nombre_materia" => $categoria['nombre_materia'],
      "grupo" => $categoria['grupo'],
    );
    echo json_encode($datos);
?>
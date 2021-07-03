<?php

    require_once '../app/conexion.php';

    $conexion = conexion();
    $id_usuario = $_POST['id_usuario'];
    $query = "SELECT id_usuario,
                    no_control,
                    nombre_usuario,
                    apellido_paterno_usuario,
                    apellido_materno_usuario,
                    ocupacion, 
                    carrera, 
                    email, 
                    pass 
              FROM usuarios
              WHERE id_usuario = '$id_usuario'";
    $result = mysqli_query($conexion, $query);
    $categoria = mysqli_fetch_array($result);
    $datos = array(
      "id_usuario" => $categoria['id_usuario'],
      "no_control" => $categoria['no_control'],
      "nombre_usuario" => $categoria['nombre_usuario'],
      "apellido_paterno_usuario" => $categoria['apellido_paterno_usuario'],
      "apellido_materno_usuario" => $categoria['apellido_materno_usuario'],
      "ocupacion" => $categoria['ocupacion'],
      "carrera" => $categoria['carrera'],
      "email" => $categoria['email']
    );
    echo json_encode($datos);
?>
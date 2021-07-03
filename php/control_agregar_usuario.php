<?php

    require_once '../app/conexion.php';

    $conexion = conexion();

    $control = $_POST['control'];
    $usuario = $_POST['nombre'];
    $ap = $_POST['apellido_paterno'];
    $am = $_POST['apellido_materno'];
    $ocupacion = $_POST['ocupacion'];
    $carrera = $_POST['carrera'];
    $email = $_POST['correo'];
    $pass = sha1($_POST['pass']);

    $query = "INSERT INTO usuarios( no_control,
                                    nombre_usuario,
                                    apellido_paterno_usuario,
                                    apellido_materno_usuario,
                                    ocupacion,
                                    carrera,
                                    email,
                                    pass)
                                VALUE(?,?,?,?,?,?,?,?)";
    $sql = $conexion->prepare($query);
    $sql->bind_param('ssssssss', $control,$usuario, $ap, $am, $ocupacion, $carrera, $email, $pass);
    $sql->execute();

    if($sql){
        echo 1;
    }else{
        echo 0;
    }

    $conexion->close();

?>
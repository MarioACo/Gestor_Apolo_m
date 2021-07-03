<?php

    session_start();

    require_once "../app/conexion.php";

    $conexion = conexion();

    $email = $_POST['email'];

    $pass = sha1($_POST['pass']);

    $sql = "SELECT nombre_usuario,ocupacion,no_control FROM usuarios WHERE email = ? AND pass = ?";

    $result = $conexion->prepare($sql);
    
    $result -> bind_param('ss', $email, $pass);

    $result -> execute();

    $result = $result -> get_result();

    $result = $result -> fetch_assoc();

    if($result){
        
        if($result['ocupacion'] == "Administrador"){

            $_SESSION['no_control'] = $result['no_control'];
            echo 1;

        }else if ($result['ocupacion'] == "Profesor"){

            $_SESSION['no_control'] = $result['no_control'];
            echo 2;

        }else if($result['ocupacion'] == "Estudiante"){

            $_SESSION['no_control'] = $result['no_control'];
            echo 3;

        }
        

    }

    $conexion -> close();









?>
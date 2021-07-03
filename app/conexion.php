<?php

    function conexion(){
        $servidor = "localhost";
        $usuario = "root";
        $contraseña = "";
        $database = "apolo";

        $conexion = new  mysqli($servidor, $usuario, $contraseña, $database);

        if($conexion->connect_errno){
            echo 'Error en la conexion'.$conexion->connect_error;
        }

        $conexion->set_charset("utf8");

        return $conexion;

    }
    



   
    
?>  


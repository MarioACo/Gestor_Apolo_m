<?php

    require_once '../app/conexion.php';

    $conexion = conexion();

    $id_usuario = $_POST['id_usuario'];

    $query = "DELETE FROM usuarios WHERE id_usuario = ?";
    $sql = $conexion->prepare($query);
    $sql->bind_param('i', $id_usuario);
    $sql->execute();
    $conexion->close();

?>
<?php

    require_once '../app/conexion.php';

    $conexion = conexion();

    $id_materia = $_POST['id_materia'];

    $query = "DELETE FROM materias WHERE id_materia = ?";
    $sql = $conexion->prepare($query);
    $sql->bind_param('i', $id_materia);
    $sql->execute();
    $conexion->close();

?>
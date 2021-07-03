<?php

    require_once '../app/conexion.php';

    $conexion = conexion();

    $id_asg_materia = $_POST['id_asg_materia'];

    $query = "DELETE FROM asignar_materia WHERE id_asg_materia = ?";
    $sql = $conexion->prepare($query);
    $sql->bind_param('i', $id_asg_materia);
    $sql->execute();
    $conexion->close();

?>
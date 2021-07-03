<?php

    require_once '../app/conexion.php';

    $conexion = conexion();

    $inputNControl = $_POST['inputNControl'];
    $inputNombreAlumno = $_POST['inputNombreAlumno'];
    $inputCarrera = $_POST['inputCarrera'];
    $inputGrupo = $_POST['inputGrupo'];
    $inputSemestre = $_POST['inputSemestre'];
    $inputMateria = $_POST['inputMateria'];
    $inputTipoClase = $_POST['inputTipoClase'];
    $inputNProfesor = $_POST['inputNProfesor'];
    
    $query = "INSERT INTO asignar_materia( profesor_no, no_control, nombre_alumno, carrera, tipo_clase, semestre, nombre_materia, grupo) VALUE (?,?,?,?,?,?,?,?)";
    $sql = $conexion->prepare($query);
    $sql->bind_param('ssssssss', $inputNProfesor, $inputNControl, $inputNombreAlumno, $inputCarrera, $inputTipoClase, $inputSemestre, $inputMateria, $inputGrupo);
    $sql->execute();

    if($sql){
        echo 1;
    }else{
        echo 0;
    }

    $conexion->close();

?>
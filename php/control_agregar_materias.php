<?php

    require_once '../app/conexion.php';

    $conexion = conexion();
    $datos = array(
        "matricula" => $_POST['inputMatricula'],
        "materia" => $_POST['inputMateria'],
        "i_ce" => $_POST['inputICicloEscolar'],
        "f_ce" => $_POST['inputFCicloEscolar'],
        "semestre" => $_POST['inputSemestre'],
        "carrera" => $_POST['inputCarrera'],
        "grupo" => $_POST['inputGrupo'],
        "m_p" => $_POST['inputMatriculaProfesor'],
        "n_p" => $_POST['inputNombreProfesor'],
        "l_i" => $_POST['lunesInicio'],
        "l_f" => $_POST['lunesFin'],
        "ma_i" => $_POST['martesInicio'],
        "ma_f" => $_POST['martesFin'],
        "mi_i" => $_POST['miercolesInicio'],
        "mi_f" => $_POST['miercolesFin'],
        "j_i" => $_POST['juevesInicio'],
        "j_f" => $_POST['juevesFin'],
        "v_i" => $_POST['viernesInicio'],
        "v_f" => $_POST['viernesFin']
    );
    $horario = "";
    if($datos['l_i'] != "" && $datos['l_f'] != ""):
        $horario .= "L ".$datos['l_i']."-".$datos['l_f']."\n";
    endif;
    if($datos['ma_i'] != "" && $datos['ma_f'] != ""):
        $horario .= "Ma ".$datos['ma_i']."-".$datos['ma_f']."\n";
    endif;
    if($datos['mi_i'] != "" && $datos['mi_f'] != ""):
        $horario .= "Mi ".$datos['mi_i']."-".$datos['mi_f']."\n";
    endif;
    if($datos['j_i'] != "" && $datos['j_f'] != ""):
        $horario .= "J ".$datos['j_i']."-".$datos['j_f']."\n";
    endif;
    if($datos['v_i'] != "" && $datos['v_f'] != ""):
        $horario .= "V ".$datos['v_i']."-".$datos['v_f']."\n";
    endif;
    $query = "INSERT INTO materias( clave_materia,
                                    nombre_materia,
                                    ciclo_escolar_inicio,
                                    ciclo_escolar_final,
                                    semestre,
                                    carrera,
                                    grupo,
                                    profesor_no,
                                    profesor_nombre,
                                    horario)
                                VALUE(?,?,?,?,?,?,?,?,?,?)";
    $sql = $conexion->prepare($query);
    $sql->bind_param('ssssssssss', $datos['matricula'], $datos['materia'], $datos['i_ce'], $datos['f_ce'], $datos['semestre'], $datos['carrera'], $datos['grupo'], $datos['m_p'], $datos['n_p'], $horario);
    $sql->execute();

    if($sql){
        echo 1;
    }else{
        echo 0;
    }

    $conexion->close();

?>
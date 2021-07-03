<?php

  require_once '../app/conexion.php';

  $conexion = conexion();

  $id_materia = $_POST['idMateria'];
  $m_materia = $_POST['inputMatricula'];
  $n_materia = $_POST['inputMateria'];
  $ic = $_POST['inputICicloEscolar'];
  $fc = $_POST['inputFCicloEscolar'];
  $semestre = $_POST['inputSemestre'];
  $carrera = $_POST['inputCarrera'];
  $grupo = $_POST['inputGrupo'];
  $matricula_profe = $_POST['inputMatriculaProfesor'];
  $nombre_profe = $_POST['inputNombreProfesor'];
  $l_i = $_POST['lunesInicio'];
  $l_f = $_POST['lunesFin'];
  $ma_i = $_POST['martesInicio'];
  $ma_f = $_POST['martesFin'];
  $mi_i = $_POST['miercolesInicio'];
  $mi_f = $_POST['miercolesFin'];
  $j_i = $_POST['juevesInicio'];
  $j_f = $_POST['juevesFin'];
  $v_i = $_POST['viernesInicio'];
  $v_f = $_POST['viernesFin'];
  $horario = "";
    if($l_i != "" && $l_f != ""):
        $horario .= "L ".$l_i."-".$l_f."\n";
    endif;
    if($ma_i != "" && $ma_f != ""):
        $horario .= "Ma ".$ma_i."-".$ma_f."\n";
    endif;
    if($mi_i != "" && $mi_f != ""):
        $horario .= "Mi ".$mi_i."-".$mi_f."\n";
    endif;
    if($j_i != "" && $j_f != ""):
        $horario .= "J ".$j_i."-".$j_f."\n";
    endif;
    if($v_i != "" && $v_f != ""):
        $horario .= "V ".$v_i."-".$v_f."\n";
    endif;

  $query = "UPDATE materias SET clave_materia = ?,
                                nombre_materia = ?,
                                ciclo_escolar_inicio = ?,
                                ciclo_escolar_final = ?,
                                semestre = ?,
                                carrera = ?,
                                grupo = ?,
                                profesor_no = ?,
                                profesor_nombre = ?,
                                horario = ?
                            WHERE id_materia = '$id_materia'";
  $sql = $conexion->prepare($query);
  $sql->bind_param('ssssssssss', $m_materia, $n_materia, $ic, $fc, $semestre, $carrera, $grupo, $matricula_profe, $nombre_profe,$horario);
  $sql->execute();

  if($sql){
      echo 1;
  }else{
      echo 0;
  }

  $conexion->close();

?>
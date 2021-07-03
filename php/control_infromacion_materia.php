<?php

    require_once '../app/conexion.php';

    $conexion = conexion();
    $id_materia = $_POST['id_materia'];
    $query = "SELECT id_materia,
                    clave_materia,
                    nombre_materia,
                    ciclo_escolar_inicio,
                    ciclo_escolar_final,
                    semestre,
                    carrera,
                    grupo,
                    profesor_no,
                    profesor_nombre,
                    horario
              FROM materias
              WHERE id_materia = '$id_materia'";
    $result = mysqli_query($conexion, $query);
    $categoria = mysqli_fetch_array($result);
    $horario = $categoria['horario'];
    $horario = explode("-", $horario);
    $horario = implode(" ", $horario);
    $horario = explode("\n", $horario);
    $horario = implode(" ", $horario);
    $horario = explode(" ", $horario);
    $compara = $horario;
    $lunesI = "";
    $lunesF = "";
    $martesI = "";
    $martesF = "";
    $miercolesI = "";
    $miercolesF = "";
    $juevesI = "";
    $juevesF = "";
    $viernesI = "";
    $viernesF = "";
    for($i = 0; $i < count($horario); $i++){
      if($compara[$i] == "L"){
        $lunesI = $horario[$i+1]." ".$horario[$i+2];
        $lunesF = $horario[$i+3]." ".$horario[$i+4];
      }else if($compara[$i] == "Ma"){
        $martesI = $horario[$i+1]." ".$horario[$i+2];
        $martesF = $horario[$i+3]." ".$horario[$i+4];
      }else if($compara[$i] == "Mi"){
        $miercolesI = $horario[$i+1]." ".$horario[$i+2];
        $miercolesF = $horario[$i+3]." ".$horario[$i+4];
      }else if($compara[$i] == "J"){
        $juevesI = $horario[$i+1]." ".$horario[$i+2];
        $juevesF = $horario[$i+3]." ".$horario[$i+4];
      }else if($compara[$i] == "V"){
        $viernesI = $horario[$i+1]." ".$horario[$i+2];
        $viernesF = $horario[$i+3]." ".$horario[$i+4];
      }
    }
    
    $datos = array(
      "id_materia" => $categoria['id_materia'],
      "clave_materia" => $categoria['clave_materia'],
      "nombre_materia" => $categoria['nombre_materia'],
      "ciclo_escolar_inicio" => $categoria['ciclo_escolar_inicio'],
      "ciclo_escolar_final" => $categoria['ciclo_escolar_final'],
      "semestre" => $categoria['semestre'],
      "carrera" => $categoria['carrera'],
      "grupo" => $categoria['grupo'],
      "profesor_no" => $categoria['profesor_no'],
      "profesor_nombre" => $categoria['profesor_nombre'],
      "lunesI" => $lunesI,
      "lunesF" => $lunesF,
      "martesI" => $martesI,
      "martesF" => $martesF,
      "miercolesI" => $miercolesI,
      "miercolesF" => $miercolesF,
      "juevesI" => $juevesI,
      "juevesF" => $juevesF,
      "viernesI" => $viernesI,
      "viernesF" => $viernesF
    );
    echo json_encode($datos);
    
?>
<?php
  session_start();
  require_once '../app/conexion.php';
  $conexion = conexion();
  $no_control = $_SESSION['no_control'];
  $id_archivo = $_POST['id_archivo'];
  $archivo = $_POST['nombre'];
  $materia = $_POST['materia'];
  $grupo = $_POST['grupo'];
  $unidad = $_POST['unidad'];
  $semestre = $_POST['semestre'];
  $ruta = "archivos/".$no_control ."/Semestre_".$semestre."/".$materia."/Grupo_" .$grupo."/Unidad_".$unidad."/".$archivo;
  
  $extencion = explode(".", $archivo);
  switch($extencion[1]){
    case 'png':
      echo '<img src="'.$ruta.'" style="width: 100%;">';
      break;
    case 'jpg':
      echo '<img src="'.$ruta.'" style="width: 100%;">';
      break;
    case 'pdf':
      echo '<embed src="'.$ruta.'#toolbar=0&navpanes=0&crollbar=0" type="application/pdf" width="100%" height="450px">';
      break;
    case 'mp3':
      echo '<video width="100%" controls src="'.$ruta.'"></video>';
      break;
    case 'mp4':
      echo '<video src="'.$ruta.'" width="100%" control></video>';
      break;
    default:
      echo "lo siento solo tengo visible: PNG, JPG, PDF, MP3, MP4";
      break;
  }
?>
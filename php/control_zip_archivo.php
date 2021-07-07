<?php
session_start();
require_once '../app/conexion.php';
$conexion = conexion();
$no_control = $_SESSION['no_control'];

$zip = new ZipArchive();

$archivo = "zip/" . $no_control. ".zip";

if($zip->open($archivo,ZipArchive::CREATE) == true){
    $query = "SELECT id_archivo, profesor_no, matricula, nombre_archivo, materia, grupo, unidad, semestre, visible FROM archivos WHERE profesor_no = $no_control";
    $result = mysqli_query($conexion, $query);
    while($archivos = mysqli_fetch_array($result)){
        $rutaDescarga = "../archivos/". $archivos['profesor_no'] . "/Semestre_" . $archivos['semestre']."/" . $archivos['materia'] . "/Grupo_". $archivos['grupo'] . "/Unidad_" . $archivos['unidad'] . "/" . $archivos['nombre_archivo'];
            echo $archivos['profesor_no'];
    $zip->addfile($rutaDescarga);
    }
    $zip->close();
    $archivos = mysqli_fetch_array($result);
    
    
    
}


?>
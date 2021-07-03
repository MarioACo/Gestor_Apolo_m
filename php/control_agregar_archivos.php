<?php
    session_start();
    require_once '../app/conexion.php';
    $conexion = conexion();
    $no_control = $_SESSION['no_control'];
    $matricula = $_POST['inputMatricula'];
    $query_1 = "SELECT nombre_materia,
                  semestre,
                  grupo
                FROM materias
                WHERE clave_materia = '$matricula' AND profesor_no = '$no_control'";
    $result_1 = mysqli_query($conexion, $query_1);
    $m = mysqli_fetch_array($result_1);
    $archivo = $_FILES['inputArchivo']['name'];
    $materia = $m['nombre_materia'];
    $grupo = $m['grupo'];
    $unidad = $_POST['inputUnidad'];
    $semestre = $m['semestre'];
    $visible = $_POST['visible'];
    $carpeta_usuario = "../archivos/". $no_control . "/Semestre_" . $semestre."/" . $materia . "/Grupo_". $grupo . "/Unidad_" . $unidad;
    if($_FILES['inputArchivo']['size'] > 0){
        if(!file_exists($carpeta_usuario)){
            mkdir($carpeta_usuario, 0777, true);
        }
        $rutainicial = $_FILES['inputArchivo']['tmp_name'];
        $rutafinal = $carpeta_usuario ."/". $archivo;
        move_uploaded_file($rutainicial, $rutafinal);
    }
    $query = "INSERT INTO archivos( profesor_no,
                                    matricula,
                                    nombre_archivo,
                                    materia,
                                    grupo,
                                    unidad,
                                    semestre,
                                    visible)
                            VALUE(?,?,?,?,?,?,?,?)";
    $sql = $conexion->prepare($query);
    $sql->bind_param('ssssssss', $no_control, $matricula, $archivo, $materia, $grupo, $unidad, $semestre, $visible);
    $sql->execute();

    
    echo 1;
    

    $conexion->close();
?>
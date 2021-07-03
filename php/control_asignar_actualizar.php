<?php
  
  require_once '../app/conexion.php';

  $conexion = conexion();

  $idAsignado = $_POST['idAsignado'];
  $inputNControlActualizar = $_POST['inputNControlActualizar'];
  $inputNombreAlumnoActualizar = $_POST['inputNombreAlumnoActualizar'];
  $inputCarreraActualizar = $_POST['inputCarreraActualizar'];
  $inputGrupoActualizar = $_POST['inputGrupoActualizar'];
  $inputSemestreActualizar = $_POST['inputSemestreActualizar'];
  $inputMateriaActualizar = $_POST['inputMateriaActualizar'];
  $inputNProfesorActualizar = $_POST['inputNProfesorActualizar'];
  $inputTipoClaseActualizar = $_POST['inputTipoClaseActualizar'];

  $query = "UPDATE asignar_materia SET profesor_no = ?,#yajalalosdatos
                                no_control = ?,
                                nombre_alumno = ?,
                                carrera = ?,
                                tipo_clase = ?,
                                semestre = ?,
                                nombre_materia = ?,
                                grupo = ?
                            WHERE id_asg_materia = '$idAsignado'";
  $sql = $conexion->prepare($query);
  $sql->bind_param('ssssssss', $inputNProfesorActualizar, $inputNControlActualizar, $inputNombreAlumnoActualizar, $inputCarreraActualizar, $inputTipoClaseActualizar, $inputSemestreActualizar, $inputMateriaActualizar, $inputGrupoActualizar);
  $sql->execute();

  if($sql){
      echo 1;
  }else{
      echo 0;
  }
  $conexion->close();

?>
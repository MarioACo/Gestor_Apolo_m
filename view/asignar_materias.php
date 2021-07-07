<?php
    if(isset($_SESSION['no_control'])){
?>
<link rel="stylesheet" href="<?=SERVIDOR?>css/form.css">
<?php
    require_once 'app/conexion.php';
    $conexion = conexion();
    $query = "SELECT id_asg_materia,no_control, nombre_alumno, carrera, tipo_clase, semestre, nombre_materia, grupo FROM asignar_materia";
    $result = mysqli_query($conexion, $query);
?>
<div class="container mt-3">
    <button type="button" class="btn btn-outline-dark rounded-pill mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Asignar Materia
    </button>
    <div class="row mt-2" style="text-align:center;">

        <table class="table table-dark table-hover table-bordered border-white opacidad" id="tabla_asignar_materias">
            <thead>
                <td>N° Control Alumno</td>
                <td>Nombre del alumno</td>
                <td>Carrera</td>
                <td>Tipo de clase</td>
                <td>Semestre</td>
                <td>Nombre de la Materia</td>
                <td>Grupo</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </thead>
            <tbody>
                <?php
                    while($asignacion = mysqli_fetch_array($result)){
                ?>
                <tr>  
                    <th><?php echo $asignacion['no_control'];?></th>
                    <th><?php echo $asignacion['nombre_alumno'];?></th>
                    <th><?php echo $asignacion['carrera'];?></th>
                    <th><?php echo $asignacion['tipo_clase'];?></th>
                    <th><?php echo $asignacion['semestre'];?></th>
                    <th><?php echo $asignacion['nombre_materia'];?></th>
                    <th><?php echo $asignacion['grupo'];?></th>
                    <th>
                        <span id="btn_editar"
                            class="btn btn-outline-warning btn-sm"
                            type="button"
                            data-bs-toggle="modal" data-bs-target="#actualizar_asignado"
                            onclick="infoAsignar(<?php echo $asignacion['id_asg_materia'];?>)">
                            <i class="far fa-edit"></i>
                        </span>
                    </th>

                    <th>
                        <span id="btn_eliminar" class="btn btn-outline-danger btn-sm" type="button"
                            onclick="eliminarAsignado(<?php echo $asignacion['id_asg_materia'];?>,`<?php echo $asignacion['no_control'];?>`,`<?php echo $asignacion['nombre_materia'];?>`)">
                            <i class="fas fa-trash"></i>
                        </span>
                    </th>

                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

    </div>
</div>
<!--Modal Asignar Materias-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <h3 class="login-heading mb-4">Asignar Materia</h3>
                            <form action="" id="frm_asignar_materia">
                                <div class="form-label-group">
                                    <select class="form-control rounded-pill" aria-label=".form-select-lg example" id="inputNControl" name="inputNControl">
                                    </select>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="inputNombreAlumno" name="inputNombreAlumno" class="form-control"  required autofocus>
                                    <label for="inputNombreAlumno">Nombre del Alumno</label>
                                </div>
                                <div class="form-label-group">
                                    <input disabled type="text" id="inputCarrera" name="inputCarrera" readonly="" class="form-control"  required autofocus>
                                    <label for="inputCarrera">Carrera</label>
                                </div>
                                <div class="form-label-group">
                                    <select class="form-control rounded-pill" aria-label=".form-select-lg example" id="inputGrupo" name="inputGrupo">
                                        <option valua=""> </option>
                                    </select>
                                </div>
                                <div class="form-label-group">
                                    <input disabled type="text" id="inputSemestre" name="inputSemestre" readonly="" class="form-control"  required autofocus>
                                    <label for="inputSemestre">Semestre</label>
                                </div>
                                <div class="form-label-group">
                                    <select class="form-control rounded-pill" aria-label=".form-select-lg example" id="inputMateria" name="inputMateria">
                                        <option valua=""> </option>
                                    </select>
                                </div>
                                <div class="form-label-group">
                                    <input disabled type="text" id="inputNProfesor" name="inputNProfesor" readonly="" class="form-control"  required autofocus>
                                    <label for="inputNProfesor">NProfesor</label>
                                </div>
                                <div class="form-label-group">
                                    <select class="form-control rounded-pill" aria-label=".form-select-lg example" id="inputTipoClase" name="inputTipoClase">
                                        <option selected value="">Tipo de Clase</option>
                                        <option value="Ordinario">Ordinario</option>
                                        <option value="Recursamiento">Recursamiento</option>
                                        <option value="Especial">Especial</option>
                                        <option value="Vacaciones">Vacaciones</option>
                                    </select>
                                </div>
                            </form>
                        </div>  
                    </div>    
                </div>       
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_guardar_materias">Guardar </button>
            </div>
        </div>
    </div>
</div>

    <!--Modal Actualizar Asignado-->
    
<div class="modal fade" id="actualizar_asignado" tabindex="-1" aria-labelledby="actualizar_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <h3 class="login-heading mb-4">Asignar Materia</h3>
                            <form action="" id="frm_asignar_materias_actualizar">
                                <div>
                                    <input type="hidden" id="idAsignado" name="idAsignado">
                                </div>
                                <div class="form-label-group">
                                    <select class="form-control rounded-pill" aria-label=".form-select-lg example" id="inputNControlActualizar" name="inputNControlActualizar">
                                    </select>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="inputNombreAlumnoActualizar" name="inputNombreAlumnoActualizar" class="form-control"  required autofocus>
                                    <label for="inputNombreAlumnoActualizar">Nombre del Alumno</label>
                                </div>
                                <div class="form-label-group">
                                    <input disabled type="text" id="inputCarreraActualizar" name="inputCarreraActualizar" readonly="" class="form-control"  required autofocus>
                                    <label for="inputCarreraActualizar">Carrera</label>
                                </div>
                                <div class="form-label-group">
                                    <select class="form-control rounded-pill" aria-label=".form-select-lg example" id="inputGrupoActualizar" name="inputGrupoActualizar">
                                    </select>
                                </div>
                                <div class="form-label-group">
                                    <input disabled type="text" id="inputSemestreActualizar" name="inputSemestreActualizar" readonly="" class="form-control"  required autofocus>
                                    <label for="inputSemestreActualizar">Semestre</label>
                                </div>
                                <div class="form-label-group">
                                    <select class="form-control rounded-pill" aria-label=".form-select-lg example" id="inputMateriaActualizar" name="inputMateriaActualizar">
                                    </select>
                                </div>
                                <div class="form-label-group">
                                    <input disabled type="text" id="inputNProfesorActualizar" name="inputNProfesorActualizar" readonly="" class="form-control"  required autofocus>
                                    <label for="inputNProfesorActualizar">NProfesor</label>
                                </div>
                                <div class="form-label-group">
                                    <select class="form-control rounded-pill" aria-label=".form-select-lg example" id="inputTipoClaseActualizar" name="inputTipoClaseActualizar">
                                        <option selected value="">Tipo de Clase</option>
                                        <option value="Ordinario">Ordinario</option>
                                        <option value="Recursamiento">Recursamiento</option>
                                        <option value="Especial">Especial</option>
                                        <option value="Vacaciones">Vacaciones</option>
                                    </select>
                                </div>
                            </form>
                        </div>  
                    </div>    
                </div>  Actualizar
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_actualizar_materias">Actualizar </button>
            </div>
        </div>
    </div>
</div> 
<script src="<?=SERVIDOR?>js/admin/asignar_materias.js"></script>
<?php

    }else{
        header("location:login");
    }
?>
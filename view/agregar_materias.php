<?php

    if(isset($_SESSION['no_control'])){

    

?>
<link rel="stylesheet" href="<?=SERVIDOR?>css/form.css">

        <?php
            require_once 'app/conexion.php';

            $conexion = conexion();
            
            $query = "SELECT id_materia, clave_materia, nombre_materia, ciclo_escolar_inicio, ciclo_escolar_final, semestre, carrera, grupo, profesor_no, profesor_nombre, horario FROM materias";
            $result = mysqli_query($conexion, $query);
        ?>
<div class="container mt-4">
    <button id="btn_agregar_mater" type="button" class="btn btn-outline-dark rounded-pill mb-4" data-bs-toggle="modal" data-bs-target="#agregar_materia">
        Agregar Materia
    </button>
    <div class="row mt-2" style="text-align:center;">

        <table class="table table-dark table-hover table-bordered border-white opacidad" id="tabla_agregar_materia">
            <thead>
                <td>Matricula de la Materia</td>
                <td>Materia</td>
                <td>Ciclo Escolar</td>
                <td>Semestre</td>
                <td>Carrera</td>
                <td>Grupo</td>
                <td>Numero de Control Profesor</td>
                <td>Nombre del Profesor</td>
                <td>Horario</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </thead>
            <tbody>
                <?php
                    while($materia = mysqli_fetch_array($result)){
                ?>

                <tr>
                    <th><?php echo $materia['clave_materia'];?></th>
                    <th><?php echo $materia['nombre_materia'];?></th>
                    <th><?php echo $materia['ciclo_escolar_inicio'] . '/' . $materia['ciclo_escolar_final'];?></th>
                    <th><?php echo $materia['semestre'];?></th>
                    <th><?php echo $materia['carrera'];?></th>
                    <th><?php echo $materia['grupo'];?></th>
                    <th><?php echo $materia['profesor_no'];?></th>
                    <th><?php echo $materia['profesor_nombre'];?></th>
                    <th><?php echo $materia['horario'];?></th>
                    <th>
                        <span id="btn_editar"
                            class="btn btn-outline-warning btn-sm"
                            type="button"
                            onclick="infoMateria(<?php echo $materia['id_materia'];?>)"
                            data-bs-toggle="modal" data-bs-target="#actualizar_materia">
                                <i class="far fa-edit"></i>
                        </span>
                    </th>
                    <th>
                        <span id="btn_eliminar"
                            class="btn btn-outline-danger btn-sm"
                            type="button"
                            onclick="eliminarMateria(<?php echo $materia['id_materia'];?>,`<?php echo $materia['nombre_materia'];?>`)" >
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

<!-- Modal Agregar Materia -->

<div class="modal fade" id="agregar_materia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="POST" id="frm_agregar_materias">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="login-heading mb-4">Agregar Materias</h3>
                                        <div class="form-label-group">
                                            <select class="form-control rounded-pill" id="inputCarrera" name="inputCarrera">
                                                <option selected value="">Carrera</option>
                                                <option value="sistemas"> Sistemas Computacionales</option>
                                                <option value="gestion"> Gestion Empresarial</option>
                                                <option value="industrial"> Industrial</option>
                                            </select>
                                        </div>
                                        <div class="form-label-group">
                                            <select class="form-control rounded-pill" id="inputSemestre" name="inputSemestre">
                                                <option selected value="">Semestre</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-label-group">
                                            <select id="inputMatricula" name="inputMatricula" class="form-control">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-label-group">
                                            <input disabled type="text" id="inputMateria" name="inputMateria" class="form-control" required autofocus>
                                            <label for="inputMateria">Nombre de la Materia</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="text" id="inputICicloEscolar" name="inputICicloEscolar" readonly="" class="form-control" required autofocus>
                                            <label for="inputICicloEscolar">Inicio del Ciclo Escolar</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="text" id="inputFCicloEscolar" name="inputFCicloEscolar" readonly="" class="form-control" required autofocus>
                                            <label for="inputFCicloEscolar">Fin del Ciclo Escolar</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="text" id="inputGrupo" name="inputGrupo" class="form-control" required autofocus>
                                            <label for="inputGrupo">Grupo</label>
                                        </div>
                                        <div class="form-label-group">
                                            <select class="form-control rounded-pill" id="inputMatriculaProfesor" name="inputMatriculaProfesor">
                                            </select>
                                        </div>
                                        <div class="form-label-group">
                                            <input disabled type="text" id="inputNombreProfesor" name="inputNombreProfesor" class="form-control" required autofocus>
                                            <label for="inputNombreProfesor">Nombre Profesor</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3 class="login-heading mb-4">Horario</h3> 
                                        <label>Lunes </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="lunes" type="radio" id="lunesSi" value="si">
                                            <label class="form-check-label" for="lunesSi"> si </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="lunes" type="radio" id="lunesNo" value="no">
                                            <label class="form-check-label" for="lunesNo"> no </label>
                                        </div>
                                        <div>
                                            <input disabled id="lunesInicio" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown"> a
                                            <input disabled id="lunesFin" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown">
                                        </div>
                                        <br><br>
                                        <label>Martes </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="martes" type="radio" id="martesSi" value="si">
                                            <label class="form-check-label" for="martesSi">si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="martes" type="radio" id="martesNo" value="no">
                                            <label class="form-check-label" for="martesNo">no</label>
                                        </div>
                                        <div>
                                            <input disabled id="martesInicio" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown"> a
                                            <input disabled id="martesFin" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown">
                                        </div>
                                        <br><br>
                                        <label>Miercoles </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="miercoles" type="radio" id="miercolesSi" value="si">
                                            <label class="form-check-label" for="miercolesSi">si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="miercoles" type="radio" id="miercolesNo" value="no">
                                            <label class="form-check-label" for="miercolesN">no</label>
                                        </div>
                                        <div>
                                            <input disabled id="miercolesInicio" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown"> a
                                            <input disabled id="miercolesFin" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown">
                                        </div>
                                        <br><br>
                                        <label>Jueves </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="jueves" type="radio" id="juevesSi" value="si">
                                            <label class="form-check-label" for="juevesSi">si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="jueves" type="radio" id="juevesNo" value="no">
                                            <label class="form-check-label" for="juevesNo">no</label>
                                        </div>
                                        <div>
                                            <input disabled id="juevesInicio" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown"> a
                                            <input disabled id="juevesFin" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown">
                                        </div>
                                        <br><br>
                                        <label>Viernes </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="viernes" type="radio" id="viernesSi" value="si">
                                            <label class="form-check-label" for="viernesSI">si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="viernes" type="radio" id="viernesNo" value="no">
                                            <label class="form-check-label" for="viernesNo">no</label>
                                        </div>
                                        <div>
                                            <input disabled id="viernesInicio" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown"> a
                                            <input disabled id="viernesFin" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown">
                                        </div>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span id="btn_cerrar" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
                <span id="btn_guardar" type="button" class="btn btn-primary">Guardar </span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actualizar Materia -->

<div class="modal fade" id="actualizar_materia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="POST" id="frm_actualizar_materias">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="login-heading mb-4">Agregar Materias</h3>
                                        <div>
                                            <input type="hidden" id="idMateriaActualizar" name="idMateriaActualizar">
                                        </div>
                                        <div class="form-label-group">
                                            <select class="form-control rounded-pill" id="inputCarreraActualizar" name="inputCarreraActualizar">
                                                <option selected value="">Carrera</option>
                                                <option value="sistemas"> Sistemas Computacionales</option>
                                                <option value="gestion"> Gestion Empresarial</option>
                                                <option value="industrial"> Industrial</option>
                                            </select>
                                        </div>
                                        <div class="form-label-group">
                                            <select class="form-control rounded-pill" id="inputSemestreActualizar" name="inputSemestreActualizar">
                                                <option selected value="0">Semestre</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-label-group">
                                            <select type="text" id="inputMatriculaActualizar" name="inputMatriculaActualizar" class="form-control" required autofocus>
                                            </select>
                                        </div>
                                        <div class="form-label-group">
                                            <input disabled type="text" id="inputMateriaActualizar" name="inputMateriaActualizar" class="form-control" required autofocus>
                                            <label for="inputMateriaActualizar">Nombre de la Materia</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="text" id="inputICicloEscolarActualizar" name="inputICicloEscolarActualizar" readonly="" class="form-control" required autofocus>
                                            <label for="inputICicloEscolarActualizar">Inicio del Ciclo Escolar</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="text" id="inputFCicloEscolarActualizar" name="inputFCicloEscolarActualizar" readonly="" class="form-control" required autofocus>
                                            <label for="inputFCicloEscolarActualizar">Fin del Ciclo Escolar</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="text" id="inputGrupoActualizar" name="inputGrupoActualizar" class="form-control" required autofocus>
                                            <label for="inputGrupoActualizar">Grupo</label>
                                        </div>
                                        <div class="form-label-group">
                                            <select class="form-control rounded-pill" id="inputMatriculaProfesorActualizar" name="inputMatriculaProfesorActualizar">
                                            </select>
                                        </div>
                                        <div class="form-label-group">
                                            <input disabled type="text" id="inputNombreProfesorActualizar" name="inputNombreProfesorActualizar" class="form-control" required autofocus>
                                            <label for="inputNombreProfesorActualizar">Nombre Profesor</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3 class="login-heading mb-4">Horario</h3> 
                                        <label>Lunes </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="lunesActualizar" type="radio" id="lunesSiActualizar" value="si">
                                            <label class="form-check-label" for="lunesSiActualizar"> si </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="lunesActualizar" type="radio" id="lunesNoActualizar" value="no">
                                            <label class="form-check-label" for="lunesNoActualizar"> no </label>
                                        </div>
                                        <div>
                                            <input disabled id="lunesInicioActualizar" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown"> a
                                            <input disabled id="lunesFinActualizar" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown">
                                        </div>
                                        <br><br>
                                        <label>Martes </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="martesActualizar" type="radio" id="martesSiActualizar" value="si">
                                            <label class="form-check-label" for="martesSiActualizar">si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="martesActualizar" type="radio" id="martesNoActualizar" value="no">
                                            <label class="form-check-label" for="martesNoActualizar">no</label>
                                        </div>
                                        <div>
                                            <input disabled id="martesInicioActualizar" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown"> a
                                            <input disabled id="martesFinActualizar" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown">
                                        </div>
                                        <br><br>
                                        <label>Miercoles </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="miercolesActualizar" type="radio" id="miercolesSiActualizar" value="si">
                                            <label class="form-check-label" for="miercolesSiActualizar">si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="miercolesActualizar" type="radio" id="miercolesNoActualizar" value="no">
                                            <label class="form-check-label" for="miercolesNoActualizar">no</label>
                                        </div>
                                        <div>
                                            <input disabled id="miercolesInicioActualizar" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown"> a
                                            <input disabled id="miercolesFinActualizar" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown">
                                        </div>
                                        <br><br>
                                        <label>Jueves </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="juevesActualizar" type="radio" id="juevesSiActualizar" value="si">
                                            <label class="form-check-label" for="juevesSiActualizar">si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="juevesActualizar" type="radio" id="juevesNoActualizar" value="no">
                                            <label class="form-check-label" for="juevesNoActualizar">no</label>
                                        </div>
                                        <div>
                                            <input disabled id="juevesInicioActualizar" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown"> a
                                            <input disabled id="juevesFinActualizar" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown">
                                        </div>
                                        <br><br>
                                        <label>Viernes </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="viernesActualizar" type="radio" id="viernesSiActualizar" value="si">
                                            <label class="form-check-label" for="viernesSiActualizar">si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="viernesActualizar" type="radio" id="viernesNoActualizar" value="no">
                                            <label class="form-check-label" for="viernesNoActualizar">no</label>
                                        </div>
                                        <div>
                                            <input disabled id="viernesInicioActualizar" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown"> a
                                            <input disabled id="viernesFinActualizar" type="timepicker" readonly="" value="" class="timepicker timepicker-with-dropdown">
                                        </div>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span id="btn_cerrar" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
                <span id="btn_actualizar" type="button" class="btn btn-primary">Actualizar </span>
            </div>
        </div>
    </div>
</div>
<script src="<?=SERVIDOR?>js/admin/agregar_materias.js"></script>

<?php

    }else{
        header("location:login");
    }
?>
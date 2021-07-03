<?php

    
    if(isset($_SESSION['no_control'])){

    


?>
<link rel="stylesheet" href="<?=SERVIDOR?>css/form.css">
        <?php
            require_once 'app/conexion.php';
            $no_control = $_SESSION['no_control'];
            $conexion = conexion();
            
            $query = "SELECT id_archivo, profesor_no, matricula, nombre_archivo, materia, grupo, unidad, semestre, visible FROM archivos WHERE profesor_no = $no_control";
            $result = mysqli_query($conexion, $query);
            
        ?>

    <div class="container mt-4">
        <div class="row mt-2" style="text-align:center";>
            <div class="col">
                <h1 class="lead text-center">Archivos</h1>
                <button  type="button" class="btn btn-outline-info mb-2 mt-2" data-bs-toggle="modal" data-bs-target="#modal_subida"> <span class="fas fa-plus-circle"></span> Agregar</span></button>
                <hr>
                <br>
                <table class="table table-dark opacidad" id="table_archivos" class="hover" style="width:100%">
                    <thead>
                        <td>Numero de Control del Profesor</td>
                        <td>Matricula</td>
                        <td>Archivo</td>
                        <td>Materia</td>
                        <td>Grupo</td>
                        <td>Unidad</td>
                        <td>Semestre </td>
                        <td>Visible</td>
                        <td>Descarga</td>
                        <td>Visualizar</td>
                        <td>Eliminar</td>
                    </thead>
                    <tbody>

                        <?php
                            while($archivos = mysqli_fetch_array($result)){
                            $rutaDescarga = "archivos/". $archivos['profesor_no'] . "/Semestre_" . $archivos['semestre']."/" . $archivos['materia'] . "/Grupo_". $archivos['grupo'] . "/Unidad_" . $archivos['unidad'] . "/" . $archivos['nombre_archivo'];
                        ?>
                        
                        <tr>
                            <th><?php echo $archivos['profesor_no'];?></th>
                            <th><?php echo $archivos['matricula'];?></th>
                            <th><?php echo $archivos['nombre_archivo'];?></th>
                            <th><?php echo $archivos['materia'];?></th>
                            <th><?php echo $archivos['grupo'];?></th>
                            <th><?php echo $archivos['unidad'];?></th>
                            <th><?php echo $archivos['semestre'];?></th>
                            <th><?php echo $archivos['visible'];?></th>
                            <th><a id="btn_editar" class="btn btn-outline-warning btn-sm" href="<?php echo $rutaDescarga?>" download="<?php echo $archivos['nombre_archivo']?>"><i class="fas fa-download"></i></a></th>
                            <th>
                                <span id="btn_ver"
                                class="btn btn-outline-warning btn-sm"
                                type="button"
                                data-bs-toggle="modal" data-bs-target="#ver_archivo"
                                onclick="verArchivo(<?php echo $archivos['id_archivo'];?>,`<?php echo $archivos['nombre_archivo'];?>`,`<?php echo $archivos['semestre'];?>`,`<?php echo $archivos['materia'];?>`,`<?php echo $archivos['grupo']?>`,`<?php echo $archivos['unidad'];?>`)">
                                    <i class="far fa-eye"></i>
                                </span>
                            </th>
                            <th>
                                <span id="btn_eliminar"
                                class="btn btn-outline-danger btn-sm"
                                type="button"
                                onclick="eliminarArchivo(<?php echo $archivos['id_archivo'];?>,`<?php echo $archivos['nombre_archivo'];?>`,`<?php echo $archivos['semestre'];?>`,`<?php echo $archivos['materia'];?>`,`<?php echo $archivos['grupo']?>`,`<?php echo $archivos['unidad'];?>`)">
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
        <!--Descarga-->
        <div class="row">
            <div class="col-sm-3 offset-9">
                <hr>
                <h1 class="lead">Descarga total en formato zip</h1>
                
                <a class="btn btn-success mt-3" id="descargarZip" href=<?php echo $rutaDescarga = 'php/zip/'. $no_control . ".zip"?> download="<?php echo $no_control . ".zip"?>"> <i class="far fa-file-archive"></i> Descarga</a>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------------------------------------------------------------------------------->
    <!-- Modal Subir Archivo -->
    <div class="modal fade" id="modal_subida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="login-heading mb-4">Subir Archivo</h3>
                    <form method="POST" id="frm_subir_archivos" enctype="multipart/form-data">
                        <div class="form-label-group">
                            <select class="form-control rounded-pill" aria-label=".form-select-lg example" id="inputMatricula" name="inputMatricula">
                            </select>
                        </div>
                        <div class="form-label-group">
                            <input type="file" id="inputArchivo" name="inputArchivo" class="form-control-file form-control mt-2" required
                                autofocus> 
                            <label for="inputArchivo" class="ml-4">Archivo</label>
                        </div>
                        <div class="form-label-group">
                            <input disabled type="text" id="inputMateria" name="inputMateria" class="form-control" placeholder="Materia" required
                                autofocus>
                            <label for="inputMateria">Nombre de la Materia</label>
                        </div>
                        <div class="form-label-group">
                            <input disabled type="text" id="inputGrupo" name="inputGrupo" class="form-control" placeholder="Grupo" required
                                autofocus>
                            <label for="inputGrupo">Grupo</label>
                        </div>
                        <div class="form-label-group">
                            <select class="form-control rounded-pill" aria-label=".form-select-lg example" id="inputUnidad" name="inputUnidad">
                                <option selected value="">Unidad</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-label-group">
                            <input disabled type="text" id="inputSemestre" name="inputSemestre" class="form-control" placeholder="Grupo" required
                                autofocus>
                            <label for="inputGrupo">Semestre</label>
                        </div>
                        <div id="visible" value="">
                            <label> Visible para el alumno</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visible" id="radioSI" value="si">
                                <label class="form-check-label" for="radioSI">si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visible" id="radioNO" value="no">
                                <label class="form-check-label" for="radioNO">no</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <span id="btn_cerrar" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
                    <span id="btn_guardar" type="button" class="btn btn-primary">Guardar </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal descarga -->
    <div class="modal fade" id="ver_archivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="archivo_observar"></div>
                    <div class="modal-footer">
                        <span id="btn_cerrar" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</span>
                        <span id="btn_guardar" type="button" class="btn btn-primary"> <a href="download/" download=""></a>Descargar </span>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <script src="<?=SERVIDOR?>js/profesor/agregar_archivos.js"></script>
    <script src="<?=SERVIDOR?>js/profesor/descarga.js"></script>

<?php
    }else{
        header("location:login");
    }
?>
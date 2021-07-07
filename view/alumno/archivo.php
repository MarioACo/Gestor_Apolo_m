<?php

    if(isset($_SESSION['no_control'])){
        require_once 'app/conexion.php';
        $no_control = $_SESSION['no_control'];
    
        $conexion = conexion();
        $no_control = $_SESSION['no_control'];
        $query = "SELECT nombre_materia,profesor_no FROM asignar_materia WHERE no_control = $no_control";
        $result = mysqli_query($conexion, $query);  
        
            
        while($nombre_materia = mysqli_fetch_array($result)){
            $nombre[] = $nombre_materia['nombre_materia'];
            $profesor[] = $nombre_materia['profesor_no'];
        }    
        
        
?>



<div class="container mt-4">
    <div class="row justify-content-around">
        <div class="col-md-12 text-center py-5">
            <h1 class="">ARCHIVOS</h1>
        </div>
        <div class="col-md-10">
            <table id="contenidoHero" class="table table-striped table-custom table-bordered table-lg table-responsive-lg text-center">
                <thead>
                    <tr>
                        <th>Nom_archivo</th>
                        <th>Materia</th>
                        <th>Semestre</th>
                        <th>Descarga</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                  for($i = 0; $i < count($profesor) ; $i++){
                    $datos = $nombre[$i];
                    $qr = "SELECT id_archivo, profesor_no, matricula, nombre_archivo, materia, grupo, unidad, semestre, visible FROM archivos WHERE materia = "."'".$nombre[$i]."'"."AND"."'". $profesor[$i]."'" ."AND visible = 'si'";
                    $r = mysqli_query($conexion,$qr);
                    
                  
                  
                  while($archivo = mysqli_fetch_array($r)){
                    $rutaDescarga = "archivos/". $archivo['profesor_no'] . "/Semestre_" . $archivo['semestre']."/" . $archivo['materia'] . "/Grupo_". $archivo['grupo'] . "/Unidad_" . $archivo['unidad'] . "/" . $archivo['nombre_archivo'];
                    
                ?>  
                    <tr class="text-center">
                        <td><?php echo $archivo['nombre_archivo'];?></td>
                        <td><?php echo $archivo['materia'];?></td>
                        <td><?php echo $archivo['semestre'];?></td>
                        <td>
                            <a class="btn btn-descarga btn-block" href="<?php echo $rutaDescarga?>" download="<?php echo $archivo['nombre_archivo']?>"><i class="far fa-arrow-alt-circle-down"></i></a>
                        </td>
                        <td>
                            <span class="btn btn-ver btn-block" type="button"
                                data-bs-toggle="modal" data-bs-target="#ver_archivo"
                                onclick="verArchivo(<?php echo $archivo['id_archivo'];?>,`<?php echo $archivo['profesor_no'];?>`,`<?php echo $archivo['nombre_archivo'];?>`,`<?php echo $archivo['semestre'];?>`,`<?php echo $archivo['materia'];?>`,`<?php echo $archivo['grupo']?>`,`<?php echo $archivo['unidad'];?>`)"><i class="far fa-eye"></i></span>
                        </td>
                    </tr>     
                <?php
                        
                  }
                  }
                
                    
                ?>     
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<div class="modal fade" id="ver_archivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="archivo_observar"></div>
                    <div class="modal-footer">
                        <span id="btn_cerrar" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</span>
                    </div>
                </div>    
            </div>
        </div>
    </div>
<?php

    }else{
        header("location:login");
    }
?>
<script src="<?=SERVIDOR?>js/alumno/table_horario.js"></script>
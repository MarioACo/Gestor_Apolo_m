<?php
    if(isset($_SESSION['no_control'])){

        require_once 'app/conexion.php';
        $no_control = $_SESSION['no_control'];
    
        $conexion = conexion();
        $no_control = $_SESSION['no_control'];
        $query = "SELECT profesor_no, tipo_clase, semestre, nombre_materia, grupo FROM asignar_materia WHERE no_control = $no_control";
        $result = mysqli_query($conexion, $query);
            

?>



<div class="container mt-5 py-5">
    <div class="row justify-content-around">
        <div class="col-md-10">
            <table id="table_horario" class="table table-striped table-custom table-bordered table-hover table-lg table-responsive-lg text-center">
                <thead>
                    <tr>
                        <td>Nombre Profesor</td>
                        <td>Tipo de Clase</td>
                        <td>Semestre</td>
                        <td>Nombre de Materia</td>
                        <td>Grupo</td>
                        <td>Horario</td>
                    </tr>
                </thead>
                <tbody>
                
                    
                    <?php
                    while($horario = mysqli_fetch_array($result)){
                        $hour = $horario['profesor_no'];
                        $query = "SELECT horario, profesor_nombre FROM materias WHERE profesor_no = $hour";
                        $r = mysqli_query($conexion, $query);
                        $horar = mysqli_fetch_array($r);
                        
                    ?>
                        <tr class="text-center">
                        <th><?php echo $horar['profesor_nombre'];?></th>
                        <th><?php echo $horario['tipo_clase'];?></th>
                        <th><?php echo $horario['semestre'];?></th>
                        <th><?php echo $horario['nombre_materia'];?></th>
                        <th><?php echo $horario['grupo'];?></th>
                        <th><?php echo $horar['horario'];?></th>
                        </tr>
                        
                    <?php

                    }

                    ?>
                        
                    
                    
                
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="<?=SERVIDOR?>js/alumno/table_horario.js"></script>

<?php
    }else{
        header("location:login");
    }
?>
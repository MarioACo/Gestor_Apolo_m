<?php

    if(isset($_SESSION['no_control'])){
    
        require_once 'app/conexion.php';
    
        $conexion = conexion();
            $no_control = $_SESSION['no_control'];
            $query = "SELECT nombre_materia, ciclo_escolar_inicio, ciclo_escolar_final, semestre, carrera, grupo, horario FROM materias WHERE profesor_no = $no_control";
            $result = mysqli_query($conexion, $query);
    

?>
<link rel="stylesheet" href="<?=SERVIDOR?>css/style_profesores.css">


<div class="container">
    <!--Tabla-->
    <div class="row mt-4">
        <div class="col">
            <h1 class="lead text-center">Materias</h1>
            <hr>
            <table id="table_materias" class="table table-striped table-bordered mt-2" style="width:100%">
                <thead>
                    <tr>
                        <td>Materia</td>
                        <td>Ciclo Escolar</td>
                        <td>Semestre</td>
                        <td>Carrera</td>
                        <td>Grupo</td>
                        <td>Horario</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                    while($materia = mysqli_fetch_array($result)){
                    ?>

                        <th><?php echo $materia['nombre_materia'];?></th>
                        <th><?php echo $materia['ciclo_escolar_inicio'] . '/' . $materia['ciclo_escolar_final'];?></th>
                        <th><?php echo $materia['semestre'];?></th>
                        <th><?php echo $materia['carrera'];?></th>
                        <th><?php echo $materia['grupo'];?></th>
                        <th><?php echo $materia['horario'];?></th>

                    </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?=SERVIDOR?>js/profesor/materias.js"></script>

<?php

    }else{
        header("location:login");
    }

?>
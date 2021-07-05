

<?php 

if(isset($_SESSION['no_control'])){

    
    require_once 'app/conexion.php';

    $conexion = conexion();
    
    $query = "SELECT matricula_materia, nombre_materia, profesor_no, grupo, numero_archivos FROM contador";
    $result = mysqli_query($conexion, $query);


?>

<div class="container mt-4">
    <div class="row" style="text-align:center;">

        <table class="table table-dark table-hover table-bordered border-white opacidad">
            <thead>
                <td>Matricula de la Materia</td>
                <td>Nombre de la Materia</td>
                <td>Nombre del Profesor</td>
                <td>Grupo</td>
                <td>Numero de archivos</td>
            </thead>
            <tbody>
                <tr>
                <?php
                    while($archivos = mysqli_fetch_array($result)){
                ?>
                    <th><?php echo $archivos['matricula_materia'];?></th>
                    <th><?php echo $archivos['nombre_materia'];?></th>
                    <th><?php echo $archivos['profesor_no'];?></th>
                    <th><?php echo $archivos['grupo'];?></th>
                    <th><?php echo $archivos['numero_archivos'];?></th>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

    </div>
</div>

<?php

}else{
    header('location:login');
}
?>
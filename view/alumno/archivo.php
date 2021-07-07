<?php

    if(isset($_SESSION['no_control'])){
        require_once 'app/conexion.php';
        $no_control = $_SESSION['no_control'];
    
        $conexion = conexion();
        $no_control = $_SESSION['no_control'];
        $query = "SELECT 
                asignar_materia.profesor_no as profesor_no,
                archivos.nombre_archivo as nombre_archivo,
                asignar_materia.semestre as semestre,
                asignar_materia.nombre_materia as nombre_materia,
                archivos.materia as materia,
                archivos.semestre as semestre,
                archivos.visible as fecha
            FROM
                asignar_materia AS asignar_materia
            INNER JOIN
                archivos AS archivos ON asignar_materia.profesor_no = archivos.profesor_no AND asignar_materia.no_control = $no_control AND ";
        $result = mysqli_query($conexion, $query);  
    

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
                    while($archivo = mysqli_fetch_array($result)){
                        
                        echo var_dump($archivo);
                        
                
                        if($visible == 'si'){
                        
                        

                ?>  
                    <tr class="text-center">
                        <td><?php echo $horar['nombre_archivo'];?></td>
                        <td><?php echo $horar['materia'];?></td>
                        <td><?php echo $horar['semestre'];?></td>
                        <td>
                            <span class="btn btn-descarga btn-block"><i class="far fa-arrow-alt-circle-down"></i></span>
                        </td>
                        <td>
                            <span class="btn btn-ver btn-block"><i class="far fa-eye"></i></span>
                        </td>
                    </tr>     
                <?php
                        }
                    
                    }
                ?>     
                </tbody>
            </table>
        </div>
        <div class="col-md-10 text-right text-end">
            <p class="text-muted">Descargar total en formato zip</p>
            <span class="btn btn-success " style="width: 25%;"><i class="far fa-arrow-alt-circle-down"></i> Descargar</span>
        </div>
    </div>
</div>

<?php

    }else{
        header("location:login");
    }
?>
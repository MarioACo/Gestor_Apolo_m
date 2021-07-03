<?php
    session_start();
    
  require_once '../app/conexion.php';
 
    $conexion = conexion();
    $no_profesor = $_SESSION['no_control'];
    $operacion = $_POST['operacion'];

    $query = "SELECT profesor_no, matricula, materia, grupo FROM archivos WHERE profesor_no = '$no_profesor'";
    $result = mysqli_query($conexion, $query);
    $profesor = mysqli_fetch_row($result);
    
    $query = "SELECT profesor_no, numero_archivos FROM contador WHERE profesor_no = '$no_profesor'";
    $result = mysqli_query($conexion, $query);
    $profesor1 = mysqli_fetch_row($result);
   
    
    if($operacion == "suma"){
        if($profesor1[1] == 0){
          $profesor1[1] = 1;
        }else{
          $profesor1[1] ++;
        }
      }else if($operacion == "resta"){
        if($profesor1[1] == 0){
          $profesor1[1] = 0;
        }else{
          $profesor1[1] --;
        }
      }
    if($profesor1[0] != "" || $profesor1[0] == $no_profesor){
       
        $actualizar_query = "UPDATE contador SET numero_archivos = ? WHERE profesor_no = ?";
        $sql = $conexion->prepare($actualizar_query);
        $sql->bind_param("is", $profesor1[1], $profesor1[0]);
        $sql->execute();
        echo 1;
       
    }else{
        $n_a = 1;
        $query = "INSERT INTO contador( matricula_materia,
                                    nombre_materia,
                                    profesor_no,
                                    grupo,
                                    numero_archivos)
                                VALUE(?,?,?,?,?)";
        $sql = $conexion->prepare($query);
        $sql->bind_param('ssssi', $profesor[1], $profesor[2], $profesor[0], $profesor[3], $n_a);
        $sql->execute();
    

        if($sql){
            echo $profesor[3];
        }else{
            echo 0;
        }
        
           
      
        

    }

    $conexion->close();

?>
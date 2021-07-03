<?php 

  require_once 'app/config.php';
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <?php require_once 'app/dependencias.php';  ?>
</head>

<body>


  <?php
  session_start();
  if(isset($_SESSION['no_control'])){
    require_once 'view/navbar.php';
  }


    if(isset($_GET['vista_solicitada'])){

      switch($_GET['vista_solicitada']){

        case 'login':{
          
          require_once 'view/login.php';
          break;
        }

        case 'inicio':{
            require_once 'view/inicio_admin.php';
            break;
        }

        case 'asignar_materias':{
            require_once 'view/asignar_materias.php';
            break;
        }

        case 'agregar_usuario':{
          require_once 'view/agregar_usuario.php';
          break;
        }

        case 'agregar_materias':{
          require_once 'view/agregar_materias.php';
          break;
        }

        case 'inicio_alumno':{
          require_once 'view/alumno/inicio.php';
          break;
        }

        case 'horario_alumno':{
          require_once 'view/alumno/horario.php';
          break;
        }

        case 'archivos_alumno':{
          require_once 'view/alumno/archivo.php';
          break;
        }

        case 'inicio_prof':{
          require_once 'view/profesores/inicio_prof.php';
          break;
        }

        case 'archivos_prof':{
          require_once 'view/profesores/archivos_prof.php';
          break;
        }
        
        case 'materias_prof':{
          require_once 'view/profesores/materias_prof.php';
          break;
        }

        
        
        default:{ 
          require_once 'view/login.php';
          break;
        }
      
      }

    }else{

      require_once 'view/login.php';

    }
  
  ?>

</body>

</html>
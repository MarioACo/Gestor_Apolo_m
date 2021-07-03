<link rel="stylesheet" href="<?= SERVIDOR ?>css/navbar.css">

<?php
require_once "app/conexion.php";

$conexion = conexion();

$sql = "SELECT ocupacion FROM usuarios WHERE no_control = ?";

$result = $conexion->prepare($sql);

$result->bind_param('s', $_SESSION['no_control']);

$result->execute();

$result = $result->get_result();

$result = $result->fetch_assoc();
?>
<nav class="navbar navbar-expand-lg nave navbar-dark">
  <div class="container-fluid">
  <?php
    if($result['ocupacion'] == "Administrador"){
      echo ' <a class="navbar-brand" href="inicio">
            <p class="fab fa-asymmetrik"></p>
            </a>';
    }else if($result['ocupacion'] == "Profesor"){
      echo ' <a class="navbar-brand" href="inicio_prof">
             <p class="fab fa-asymmetrik"></p>
             </a>';
    }else if($result['ocupacion'] == "Estudiante"){
      echo ' <a class="navbar-brand" href="inicio_alumno">
             <p class="fab fa-asymmetrik"></p>
             </a>';
    }
  ?>
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">


      <?php

      if ($result['ocupacion'] == "Administrador") {
        echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
      
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="inicio">
                                <p><i class="fas fa-home"></i> Inicio</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="asignar_materias">
                                <p> <i class="fas fa-chalkboard-teacher"></i> Asignar Materias</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="agregar_materias">
                                <p><i class="fas fa-book"></i> Agregar Materias</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="agregar_usuario">
                                <p><i class="fas fa-user-plus"></i> Agregar Usuario</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <span class="nav-link active" aria-current="page" type="button" id="btn_salir">
                                <p class="salir"><i class="fas fa-door-open"></i> Salir</p>
                              </span>
                            </li>
                    
                    
                          </ul>';
      } else if ($result['ocupacion'] == "Profesor") {
        echo '
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="inicio_prof">
                                <p><i class="fas fa-home"></i> Inicio</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="materias_prof">
                                <p><i class="fas fa-book"></i> Materias</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="archivos_prof">
                                <p><i class="fas fa-folder-open"></i>Archivos</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <span class="nav-link active" aria-current="page" id="btn_salir" type="button">
                                <p class="salir"><i class="fas fa-door-open"></i> Salir</p>
                              </span>
                            </li>
                    
                    
                          </ul>';
      } else if ($result['ocupacion'] == "Estudiante") {
        echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="inicio_alumno">
                                <p><i class="fas fa-home"></i> Inicio</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="horario_alumno">
                                <p> <i class="fas fa-chalkboard-teacher"></i>Materias</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="archivos_alumno">
                                <p><i class="fas fa-book"></i>Archivos</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <span class="nav-link active" aria-current="page" id="btn_salir" type="button">
                                <p class="salir"><i class="fas fa-door-open"></i> Salir</p>
                              </span>
                            </li>
                    
                    
                          </ul>
                          ';
      }
      $conexion->close();
      ?>


    </div>


  </div>
</nav>
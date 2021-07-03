<?php

    if(!(isset($_SESSION['no_control']))){

  

?>
<link rel="stylesheet" href="<?=SERVIDOR?>css/login.css">

<form class="login-form" id="login_form" action="POST">
    <p class="login-text">
        <span class="fa-stack fa-lg">
            <i class="fab fa-asymmetrik"></i>
        </span>
    </p>
    <input type="email" class="login-username" placeholder="Email" id="email"  name="email"/>
    <input type="password" class="login-password" placeholder="Password" id="password" name="pass"/>
    <div class="d-grid">
        <span type="button" class="btn btn-outline-light centrar " id="btn_logueo">Entrar</span>
    </div>
</form>
<div class="underlay-photo"></div>
<div class="underlay-black"></div>


<?php

    }else{
        if($result['ocupacion'] == "Estudiante"){
            header('location:inicio_alumno');
        }else if($result['ocupacion'] == "Administrador"){
            header('location:inicio');
        }else if($result['ocupacion'] == "Profesor"){
            header('location:inicio_prof');
        }
        
    }

?>
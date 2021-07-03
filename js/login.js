function success_sw(titulo, ventana){
    Swal.fire({
        icon: "success",
        title: `Bienvenido ${titulo}`,
        text: '\n\n Estas siendo redirigido automaticamente, no desesperes (^.^)',
        showConfirmButton: false,
        toast: true,
        timer: 2000,
    }).then((value)=>{
        window.location = ventana;
    });
}


function valida_vacios(){

    if($('#email').val() == ""){
        Swal.fire({
            icon: 'error',
            title: `Oooops`,
            text: '\n\n Falta ingresar el correo',
            showConfirmButton: true,
            toast: true,
            
        });
        return false;
    }else if($('#password').val() == ""){
        Swal.fire({
            icon: "error",
            title: `Oooops`,
            text: '\n\n Falta ingresar la contraseña',
            showConfirmButton: true,
            toast: true,
            
        });
        return false; 
    }else{
        login();
    }
   
}

function login_success(vista){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Logueado con exito',
        showConfirmButton: false,
        timer: 2000,
        toast: true
      }).then(() =>{
        window.location = "" + vista;
      });
}

function login(){

    $.ajax({
        type: "POST",
        data: $('#login_form').serialize(),
        url: "php/control_sesion.php",
        success(resultado){
            console.log(resultado);
            if(resultado == 1){
                vista = "inicio";
                login_success(vista);
            
            }else if(resultado == 2){
                vista = "inicio_prof";
                login_success(vista);
            }else if(resultado == 3){
                vista = "inicio_alumno";
                login_success(vista);
            }else{
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error al ingresar sus datos de email o contraseña',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true
                  }).then(() =>{
                    return false;
                  });
            }
            
            
            
        }



    });




}




$(document).ready(function(){

    $("#login_form").keypress((e)=> {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
          valida_vacios();
        }
    });


    $('#btn_logueo').click(function(){
        valida_vacios();
    });

   


});



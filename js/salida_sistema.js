function salir(){

    $.ajax({
       url: "php/control_salir.php",
       success(r){
           if(r){
            Swal.fire({
                icon: "success",
                title: `Vuelva pronto`,
                text: '\n\n Saliendo del sistema',
                showConfirmButton: true,
                toast: true,
                
            }).then(() =>{
                window.location='login';
            });
           }
       }




    });

}

$(document).ready(function(){

    $('#btn_salir').click(function(){
        salir();
    });

});


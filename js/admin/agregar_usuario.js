function validar_vacios(){

  indice = document.getElementById("inputOcupacion").selectedIndex;
  indiceCarrera = document.getElementById("inputCarrera").selectedIndex;

  if($('#inputControl').val() == "" ||/^\s+$/.test($('#inputUsuario').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el numero de control del usuario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputUsuario').val() == "" || /^\s+$/.test($('#inputUsuario').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el nombre del usuario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputApellido_p').val() == "" || /^\s+$/.test($('#inputApellido_p').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el Apellido Paterno',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputApellido_m').val() == "" || /^\s+$/.test($('#inputApellido_m').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el Apellido Materno',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputCorreo').val() == "" || /^\s+$/.test($('#inputCorreo').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el correo',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if(indice == null || indice == 0){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar la ocupacion del usuario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if(indiceCarrera == null || indiceCarrera == 0){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar la carrera del usuario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputContraseña').val() == "" || /^\s+$/.test($('#inputContraseña').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar la contraseña del usuario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else{
    valida_construccion_datos();
  }
}

function informacionUsuario(id_usuario){
  $.ajax({
    type : "POST",
    data : "id_usuario=" + id_usuario,
    url : "php/control_infromacion_usuario.php",
    success : (respuesta) => {
      console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      $("#id_usuario_actualizar").val(respuesta['id_usuario']);
      $("#inputControlActualizar").val(respuesta['no_control']);
      $("#inputUsuarioActualizar").val(respuesta['nombre_usuario']);
      $("#inputApellido_pActualizar").val(respuesta['apellido_paterno_usuario']);
      $("#inputApellido_mActualizar").val(respuesta['apellido_materno_usuario']);
      $("#inputCorreoActualizar").val(respuesta['email']);
      $("#inputOcupacionActualizar").val(respuesta['ocupacion']);
      $("#inputCarreraActualizar").val(respuesta['carrera']);
    }
  });  
}

function eliminarUsuario(id_usuario, nombre){
  Swal.fire({
    position: 'center',
    title: `¡¡Borrar!!`,
    text: `¿Estas seguro de borrar a ${nombre}?`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#39FF14',
    cancelButtonColor: '#ff0000',
    confirmButtonText: '¡Borrar!',
    cancelButtonText: 'Salir'
  }).then((respuesta) => {
    if (respuesta.isConfirmed) {
      $.ajax({
        type : "POST",
        data : "id_usuario=" + id_usuario,
        url : "php/control_eliminar_usuario.php",
        success : (resultado) => {
          console.log(resultado)
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Borrado con exito',
            showConfirmButton: false,
            timer: 1000,
            toast: true
          }).then(() =>{
            window.location.reload();
          });
        }
      });
    }
  }); 
}

function valida_construccion_datos(){
  cadena = $('#inputCorreo').val();
  if($('#inputOcupacion').val() == "Estudiante"){
    if(!(/^l[0-9]{9,9}@milpaalta2.tecnm.mx/.test(cadena))){
      Swal.fire({
        icon: 'error',
        title: `Oooops`,
        text: '\n\n El correo debe seguir una estructura \n\n Ejemplo: lnumerocontrol@milpaalta2.tecnm.mx',
        showConfirmButton: true,
        toast: true,
        
      });
      return false;
    }
  }else if($('#inputOcupacion').val() == "Administrador"){
    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(cadena))){
      Swal.fire({
          icon: 'error',
          title: `Oooops`,
          text: 'Ingresa un email valido por favor \n\n Ejemplo: email@miextensionemail.com',
          showConfirmButton: true,
          toast: true,
          
      });
      
      return false;
    }
  }else if($('#inputOcupacion').val() == "Profesor"){
    if(!(/^\w+([\.-]?\w+)*@milpaalta2.tecnm.mx/.test(cadena))){
      Swal.fire({
        icon: 'error',
        title: `Oooops`,
        text: 'Ingresa un email valido por favor \n\n Ejemplo: email@milpaalta2.tecnm.mx',
        showConfirmButton: true,
        toast: true,
        
    });
    
    return false;
    }
  }
  if(!(/^[A-Z].[a-z]*/.test($('#inputUsuario').val()))){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Solo se admiten letras en el nombre del usuario la primera letra del nombre debe ser mayuscula',
      showConfirmButton: true,
      toast: true,
      
    });
  }else{
    ajaxUsuarios();
    $('#agregar_usuario').modal('hide');
  }
}

function validar_vacios_actualizar(){

  indice = document.getElementById("inputOcupacionActualizar").selectedIndex;
  indiceCarrera = document.getElementById("inputCarreraActualizar").selectedIndex;

  if($('#inputControlActualizar').val() == "" || /^\s+$/.test($('#inputControlActualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el numero de control del usuario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputUsuarioActualizar').val() == "" || /^\s+$/.test($('#inputUsuarioActualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el nombre del usuario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputApellido_pActualizar').val() == "" || /^\s+$/.test($('#inputApellido_pActualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el Apellido Paterno',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputApellido_mActualizar').val() == "" || /^\s+$/.test($('#inputApellido_mActualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el Apellido Materno',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputCorreoActualizar').val() == "" || /^\s+$/.test($('#inputCorreoActualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el correo',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if(indice == null || indice == 0){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar la ocupacion del usuario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if(indiceCarrera == null || indiceCarrera == 0){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar la carrera del usuario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputContraseñaActualizar').val() == "" || /^\s+$/.test($('#inputContraseñaActualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar la contraseña del usuario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else{
    valida_construccion_datos_actualizar();
  }
}

function valida_construccion_datos_actualizar(){
  cadena = $('#inputCorreoActualizar').val();
  cadena2 = $('#inputUsuarioActualizar').val();
  expresionRegular = /[a-zA-Z]/;
  if($('#inputOcupacionActualizar').val() == "Estudiante"){
    if(!(/^l[0-9]{9,9}@milpaalta2.tecnm.mx/.test(cadena))){
      Swal.fire({
        icon: 'error',
        title: `Oooops`,
        text: '\n\n El correo debe seguir una estructura \n\n Ejemplo: lnumerocontrol@milpaalta2.tecnm.mx',
        showConfirmButton: true,
        toast: true,
        
      });
      return false;
    }
  }else if($('#inputOcupacionActualizar').val() == "Administrador"){
    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(cadena))){
      Swal.fire({
          icon: 'error',
          title: `Oooops`,
          text: 'Ingresa un email valido por favor \n\n Ejemplo: email@miextensionemail.com',
          showConfirmButton: true,
          toast: true,
          
      });
      
      return false;
    }
  }else if($('#inputOcupacionActualizar').val() == "Profesor"){
    if(!(/^\w+([\.-]?\w+)*@milpaalta2.tecnm.mx/.test(cadena))){
      Swal.fire({
        icon: 'error',
        title: `Oooops`,
        text: 'Ingresa un email valido por favor \n\n Ejemplo: email@milpaalta2.tecnm.mx',
        showConfirmButton: true,
        toast: true,
        
    });
    
    return false;
    }
  }
  if($('#inputControlActualizar').val().lenght < 9){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n El numero de control debe tener solo 9 digitos',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else{
    ajaxActualizarUsuarios();
    $('#actualizar_usuario').modal('hide');
    
  }
}


function ajaxUsuarios() {
  $.ajax({
    type : "POST",
    data : {
      "control"          : $('#inputControl').val(),
      "nombre"           : $('#inputUsuario').val(),
      "apellido_paterno" : $('#inputApellido_p').val(),
      "apellido_materno" : $('#inputApellido_m').val(),
      "correo"           : $('#inputCorreo').val(),
      "ocupacion"        : $('#inputOcupacion').val(),
      "carrera"          : $('#inputCarrera').val(),
      "pass"             : $('#inputContraseña').val()
    },
    url : "php/control_agregar_usuario.php",
    success : (resultado) => {
      console.log(resultado);
      if(resultado == 1){
        Swal.fire({
          position: 'center',
          icon: "success",
          title: "Guardado con exito",
          text: "El usuario fue guardo corectamente",
          showConfirmButton: false,
          toast: true,
          timer: 2000
        }).then(() =>{
          $('#frm_agregar_usuario')[0].reset();
          window.location.reload();
        });
      }else{
        Swal.fire({
          position: 'bottom-end',
          icon: "error",
          title: "fallo al guardar",
          text: "No quiero trabajar 😈 \njajajaja",
          showConfirmButton: false,
          toast: true,
          timer: 2000
        });
      }
    }
  }); 
}

function ajaxActualizarUsuarios() {
  $.ajax({
    type : "POST",
    data : {
      "id_usuario"       : $('#id_usuario_actualizar').val(), 
      "control"          : $('#inputControlActualizar').val(),
      "nombre"           : $('#inputUsuarioActualizar').val(),
      "apellido_paterno" : $('#inputApellido_pActualizar').val(),
      "apellido_materno" : $('#inputApellido_mActualizar').val(),
      "correo"           : $('#inputCorreoActualizar').val(),
      "ocupacion"        : $('#inputOcupacionActualizar').val(),
      "carrera"          : $('#inputCarreraActualizar').val()
    },
    url : "php/control_actualizar_usuario.php",
    success : (resultado) => {
      console.log(resultado);
      if(resultado == 1){
        $('#frm_actualizar_usuario')[0].reset();
        Swal.fire({
          position: 'center',
          icon: "success",
          title: "Actualizado con exito",
          text: "El usuario fue actualizado corectamente",
          showConfirmButton: false,
          toast: true,
          timer: 2000
        }).then(() =>{
          $('#frm_actualizar_usuario')[0].reset();
          window.location.reload();
        });
      }else{
        Swal.fire({
          position: 'bottom-end',
          icon: "error",
          title: "fallo al guardar",
          text: "No quiero trabajar 😈 \njajajaja",
          showConfirmButton: false,
          toast: true,
          timer: 2000
        });
      }
    }
  }); 
}

$(document).ready(function(){
  $('#tabla_agregar_usuario').DataTable({
    scrollX: true,
    scrollY:        '50vh',
    scrollCollapse: true,
    paging:         false,
    language: {
      url: 'json/spanish-Mexico.json'
    }
});

  $('#inputControlActualizar').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
  });
  $('#inputUsuarioActualizar').on('input', function() {
    this.value = this.value.replace(/[^a-zA-Z]/g, '');
  });
  $('#inputApellido_pActualizar').on('input', function() {
    this.value = this.value.replace(/[^a-zA-Z]/g, '');
  });
  $('#inputApellido_mActualizar').on('input', function() {
    this.value = this.value.replace(/[^a-zA-Z]/g, '');
  });

  $('#inputControl').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
  });
  $('#inputUsuario').on('input', function() {
    this.value = this.value.replace(/[^a-zA-Z]/g, '');
  });
  $('#inputApellido_p').on('input', function() {
    this.value = this.value.replace(/[^a-zA-Z]/g, '');
  });
  $('#inputApellido_m').on('input', function() {
    this.value = this.value.replace(/[^a-zA-Z]/g, '');
  });



  $('#btn_guardar_info').click(function(){
    
      validar_vacios();
      
    
  });

  $('#btn_actualizar_info').click(() => {
    validar_vacios_actualizar();
  })
});

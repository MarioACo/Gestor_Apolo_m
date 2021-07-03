function validaEspaciosSubida(){
    if($('#inputMatricula') == "" || /^\s+$/.test($('#inputMatricula').val())){
        Swal.fire({
            icon: 'error',
            title: `Oooops`,
            text: '\n\n Falta ingresar la matricula de la materia',
            showConfirmButton: true,
            toast: true,
            
        });
        return false;
    }else if($('#inputArchivo') == ""){
        Swal.fire({
            icon: 'error',
            title: `Oooops`,
            text: '\n\n Falta ingresar tu archivo',
            showConfirmButton: true,
            toast: true,
            
        });
        return false;
    }else if($('#inputMateria') == "" || /^\s+$/.test($('#inputMateria').val())){
        Swal.fire({
            icon: 'error',
            title: `Oooops`,
            text: '\n\n Falta ingresar el nombre de la materia',
            showConfirmButton: true,
            toast: true,
            
        });
        return false;
    }else if($('#inputUnidad') == "" ){
        Swal.fire({
            icon: 'error',
            title: `Oooops`,
            text: '\n\n Falta ingresar la unidad',
            showConfirmButton: true,
            toast: true,
            
        });
        return false;
    }else if($('#inputSemestre') == "" ){
        Swal.fire({
            icon: 'error',
            title: `Oooops`,
            text: '\n\n Falta ingresar el semestre',
            showConfirmButton: true,
            toast: true,
            
        });
        return false;
    }else if($('#visible') == "" ){
        Swal.fire({
            icon: 'error',
            title: `Oooops`,
            text: '\n\n Falta ingresar si tu archivo sera visible o no para el alumno',
            showConfirmButton: true,
            toast: true,
            
        });
        return false; 
    }else{
        return true;
    }          
}

function eliminarArchivo(id_archivo,nombre,semestre,materia,grupo,unidad){
    Swal.fire({
      position: 'center',
      title: `¡¡Borrar!!`,
      text: `¿Estas seguro de borrar  ${nombre}?`,
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
          data : {
              "id_archivo": id_archivo,
              "nombre": nombre,
              "semestre": semestre,
              "materia": materia,
              "grupo": grupo,
              "unidad": unidad
          },
          url : "php/control_eliminar_archivo.php",
          success : (resultado) => {
            
            $.ajax({
                type : "POST",
                data : {"operacion":"resta"},
                url : "php/control_agregar_contador.php",
                success:(r) =>{
                    console.log(r);
                }
            });
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

function zip(){
    $.ajax({
        url: "php/control_zip_archivo.php",
        success: (r) =>{
            console.log(r);
        }
        
    });
}

function ajaxSubirArchivos(){
    let formData = new FormData(document.getElementById('frm_subir_archivos'));
    $.ajax({
        url: "php/control_agregar_archivos.php",
        type: "POST",
        datatype: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (resultado) => {
            console.log(resultado)
            if (resultado == 1) {
                Swal.fire({
                    position: 'top-end',
                    icon: "success",
                    title: "Subido con exito",
                    text: "El archivo fue subido con exito",
                    showConfirmButton: false,
                    toast: true,
                    timer: 2000
                }).then(() => {
                    $.ajax({
                        type : "POST",
                        data: {"operacion":"suma"},
                        url : "php/control_agregar_contador.php",
                        success:(r) =>{
                            console.log(r);
                            window.location.reload();
                            $('#frm_subir_archivos')[0].reset();
                        }
                    });
                });
               
            } else {
                $('#frm_subir_archivos')[0].reset();
                Swal.fire({
                    position: 'bottom-end',
                    icon: "error",
                    title: "fallo al guardar",
                    text: "No quiero trabajar 💩 \njajajaja",
                    showConfirmButton: false,
                    toast: true,
                    timer: 2000
                });
            }
        }
    });
}
function verArchivo(id_archivo,nombre,semestre,materia,grupo,unidad){
    $.ajax({
        type: "POST",
        data: {
            "id_archivo" : id_archivo,
            "nombre" : nombre,
            "semestre": semestre,
            "materia": materia,
            "grupo": grupo,
            "unidad": unidad
        },
        url: "php/control_ver_archivo.php",
        success: function(respuesta) {
            $('#archivo_observar').html(respuesta);
        }
    });
}
$(document).ready(() => {

    $.ajax({
        type : "POST",
        url : "php/control_obtener_matricula_archivo.php",
        success : (r) => {
            $('#inputMatricula').html(r);
        }
    });

    $('#inputMatricula').on('change', () => {
        $.ajax({
            type: "POST",
            data: "matricula=" + $('#inputMatricula').val(),
            url: "php/control_nombre_archivo.php",
            success: (r) => {
                r = jQuery.parseJSON(r);
                $('#inputMateria').val(`${r['nombre_materia']}`);
                $('#inputSemestre').val(`${r['semestre']}`);
                $('#inputGrupo').val(`${r['grupo']}`);
                $('#inputMateria').attr('value', `${r['nombre_materia']}`);
                $('#inputSemestre').attr('value', `${r['semestre']}`);
                $('#inputGrupo').attr('value', `${r['grupo']}`);
            }
        });
    });
      
    $(document).ready(function() {
        $('#table_archivos').DataTable();
    } );
    
    $('#btn_guardar').click(() => {
        ajaxSubirArchivos();
    });
    $('#descargarZip').click(() => {
        zip();
    });
});



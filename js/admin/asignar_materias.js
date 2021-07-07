let mensaje = ""
let mensaje_alerta = false

function vacio(id, nombre) {
    if ($(id).val() != "") {
        $(id).addClass('is-valid')
        $(id).removeClass('is-invalid')
    } else {
        $(id).addClass('is-invalid')
        $(id).removeClass('is-valid')
        mensaje += `${nombre}, `
        mensaje_alerta = true
    }
}

function swal_vacio(mensaje_vacio) {
    Swal.fire({
        icon: 'warning',
        html: `
            <p class="fs-2">Te faltan los siguientes campos:</p>
            <p class="fs-5">${mensaje_vacio}</p>
        `,
        showClass: {
            popup: 'animate__animated animate__fadeInDownBig'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutDownBig'
        }
    }).then(() => {
        mensaje = ""
        mensaje_alerta = false
    })
}

function validar_vacios_actualizar(){
  if($('#inputMateria_actualizar').val() == "" || /^\s+$/.test($('#inputMateria_actualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el nombre de la materia',
      showConfirmButton: true,
      toast: true,
      
    });
  return false;

  }else if($('#inputUsuario_actualizar').val() == "" || /^\s+$/.test($('#inputUsuario_actualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el nombre del usuario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputOcupacion_actualizar').val() == "" ){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar la ocupacion',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputIHorario_actualizar').val() == "" ){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el horario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;
  }else if($('#inputFHorario_actualizar').val() == "" ){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el horario',
      showConfirmButton: true,
      toast: true,
      
    });
    return false;  
  }else{
    asignar_materias();
    $('#exampleModal').modal('hide');
  }
}
function eliminarAsignado(id_asg_materia, nombre, materia){
  Swal.fire({
    position: 'center',
    title: `¡¡Borrar!!`,
    text: `¿Estas seguro de borrar a ${nombre} de la materia ${materia}?`,
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
        data : "id_asg_materia=" + id_asg_materia,
        url : "php/control_eliminar_asignado.php",
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

function infoAsignar(id_asignar){
  $.ajax({
    type : "POST",
    data : "id_asignar=" + id_asignar,
    url : "php/control_infromacion_asignar.php",
    success : (respuesta) => {
      respuesta = JSON.parse(respuesta);
      $('#idAsignado').val(respuesta['id_asg_materia']);
      $('#inputNControlActualizar').val(respuesta['no_control']);
      $('#inputNombreAlumnoActualizar').val(respuesta['nombre_alumno']);
      $('#inputCarreraActualizar').val(respuesta['carrera']);
      $('#inputGrupoActualizar').val(respuesta['grupo']);
      $('#inputSemestreActualizar').val(respuesta['semestre']);
      $('#inputMateriaActualizar').val(respuesta['nombre_materia']);
      $('#inputNProfesorActualizar').val(respuesta['profesor_no']);
      $('#inputTipoClaseActualizar').val(respuesta['tipo_clase']);
      let l = respuesta['grupo'];
      let m = respuesta['nombre_materia'];
      let n = respuesta['nombre_alumno'];
      $.ajax({
          type: "POST",
          data: "n_control=" + $('#inputNControlActualizar').val(),
          url: "php/control_informacion_carrera.php",
          success: (r) => {
              r = r.trim();
              $('#inputCarreraActualizar').val(r);
              $.ajax({
                  type : "POST",
                  data: "carrera=" + $('#inputCarreraActualizar').val(),
                  url : "php/control_obtener_grupo.php",
                  success : (r) => {
                    console.log(r);
                    $('#inputGrupoActualizar').html(r);
                    $(`#inputGrupoActualizar > option[value='${l}']`).attr("selected", true);
                }
              });
            }
      });
      $.ajax({
        type : "POST",
        data : "grupo=" + l,
        url : "php/control_grupo_materia.php",
        success : (r) => {
          $('#inputMateriaActualizar').html(r);
          $(`#inputMateriaActualizar > option[value='${m}']`).attr("selected", true);
        }
      });
      $.ajax({
        type: "POST",
        data: "no_control=" + $('#inputNControlActualizar').val(),
        url: "php/control_nombre_alumno.php",
        success: (r) => {
            r = r.trim();
            $('#inputNombreAlumnoActualizar').val(r);
            $(`#inputNombreAlumnoActualizar > option[value='${n}']`).attr("selected", true);
        }
      });
    }
  });  
}

function editarAsignado(){
  $.ajax({
    type : "POST",
    data : {
      "idAsignado" : $("#idAsignado").val(),
      "inputNControlActualizar" : $("#inputNControlActualizar").val(),
      "inputNombreAlumnoActualizar" : $("#inputNombreAlumnoActualizar").val(),
      "inputCarreraActualizar" : $("#inputCarreraActualizar").val(),
      "inputGrupoActualizar" : $("#inputGrupoActualizar").val(),
      "inputSemestreActualizar" : $("#inputSemestreActualizar").val(),
      "inputMateriaActualizar" : $("#inputMateriaActualizar").val(),
      "inputNProfesorActualizar" : $("#inputNProfesorActualizar").val(),
      "inputTipoClaseActualizar" : $("#inputTipoClaseActualizar").val()
    },
    url : "php/control_asignar_actualizar.php",
    success : (resultado) => {  
    console.log(resultado);
    if(resultado == 1){
     
      Swal.fire({
          position: 'top-end',
          icon: "success",
          title: "Asignado con exito",
          text: "Materia Asignada con exito",
          showConfirmButton: false,
          toast: true,
          timer: 2000
      }).then(() =>{
          $('#frm_asignar_materias_actualizar')[0].reset();
          window.location.reload();
      });
    }else{
        $('#frm_asignar_materias_actualizar')[0].reset();
      Swal.fire({
          position: 'bottom-end',
          icon: "error",
          title: "Hubo un problema al asignar",
          text: "Error al asignar la materia",
          showConfirmButton: false,
          toast: true,
          timer: 2000
      });
    }
  }
});
}

function asignar_materias(){
    $.ajax({
      type : "POST",
      data : {
        "inputNControl" : $("#inputNControl").val(),
        "inputNombreAlumno" : $("#inputNombreAlumno").val(),
        "inputCarrera" : $("#inputCarrera").val(),
        "inputGrupo" : $("#inputGrupo").val(),
        "inputSemestre" : $("#inputSemestre").val(),
        "inputMateria" : $("#inputMateria").val(),
        "inputTipoClase" : $("#inputTipoClase").val(),
        "inputNProfesor" : $("#inputNProfesor").val()
      },
      url : "php/control_asignar_materia.php",
      success : (resultado) => {
      console.log(resultado);
      if(resultado == 1){
       
        Swal.fire({
            position: 'top-end',
            icon: "success",
            title: "Asignado con exito",
            text: "Materia Asignada con exito",
            showConfirmButton: false,
            toast: true,
            timer: 2000
        }).then(() =>{
            $('#frm_asignar_materia')[0].reset();
            window.location.reload();
        });
      }else{
          $('#frm_asignar_materias')[0].reset();
        Swal.fire({
            position: 'bottom-end',
            icon: "error",
            title: "Hubo un problema al asignar",
            text: "Error al asignar la materia",
            showConfirmButton: false,
            toast: true,
            timer: 2000
        });
      }
    }
  });
}

function fechas(){
  var minDate = new Date();
  minDateF = minDate;
	$("#inputICicloEscolar").datepicker({
		showAnim: 'drop',
		numberOfMonth:1,
		minDate: minDate,
		dateFormat: 'yy/mm/dd',
		onClose: function (selectedDate){
			$('#inputFCicloEscolar').datepicker("option","minDate",selectedDate);
		}
	});
	$("#inputFCicloEscolar").datepicker({
		showAnim: 'drop',
		numberOfMonth:1,
		minDate: minDateF,
		dateFormat: 'yy/mm/dd',
	});
}
function fechasActualizar(){
  var minDate = new Date();

	$("#inputICicloEscolar_actualizar").datepicker({
		showAnim: 'drop',
		numberOfMonth:1,
		minDate: minDate,
		dateFormat: 'yy/mm/dd',
		onClose: function (selectedDate){
			$('#inputFCicloEscolar_actualizar').datepicker("option","minDate",selectedDate);
		}
	});

	$("#inputFCicloEscolar_actualizar").datepicker({
		showAnim: 'drop',
		numberOfMonth:1,
		minDate: minDate,
		dateFormat: 'yy/mm/dd',
	});
}

$(document).ready(() => {
  
  $('#tabla_asignar_materias').DataTable({
      scrollX: false,
      scrollY:        '50vh',
      scrollCollapse: true,
      paging:         false,
      language: {
        url: 'json/spanish-Mexico.json'
      }
  });

  $.ajax({
    type : "POST",
    data: {"ocupacion" : "Estudiante"},
    url : "php/control_obtener_alumnos.php",
    success : (r) => {
      $('#inputNControl').html(r);
      $('#inputNControlActualizar').html(r);
    }
  });

  $('#inputNControl').on('change', () => {
    $.ajax({
        type: "POST",
        data: "n_control=" + $('#inputNControl').val(),
        url: "php/control_informacion_carrera.php",
        success: (r) => {
            r = r.trim();
            $('#inputCarrera').val(r);
            $('#inputCarreraActualizar').val(r);
            $.ajax({
              type : "POST",
              data: "carrera=" + $('#inputCarrera').val(),
              url : "php/control_obtener_grupo.php",
              success : (r) => {
                console.log(r);
                $('#inputGrupo').html(r);
                $('#inputGrupoActualizar').html(r);
              }
            });
          }
    });
  });

  $('#inputNControlActualizar').on('change', () => {
    $.ajax({
        type: "POST",
        data: "n_control=" + $('#inputNControlActualizar').val(),
        url: "php/control_informacion_carrera.php",
        success: (r) => {
            r = r.trim();
            $('#inputCarreraActualizar').val(r);
            $.ajax({
              type : "POST",
              data: "carrera=" + $('#inputCarreraActualizar').val(),
              url : "php/control_obtener_grupo.php",
              success : (r) => {
                console.log(r);
                $('#inputGrupoActualizar').html(r);
              }
          });
        }
    });
  });

  $('#inputGrupoActualizar').on('change', () => {
    $.ajax({
        type: "POST",
        data: "grupo=" + $('#inputGrupoActualizar').val(),
        url: "php/control_informacion_grupo.php",
        success: (r) => {
          r = jQuery.parseJSON(r);
            $('#inputSemestreActualizar').val(r['semestre']);
            $('#inputNProfesorActualizar').val(r['profesor_no']);
            $.ajax({
              type : "POST",
              data : "grupo=" + $('#inputGrupoActualizar').val(),
              url : "php/control_grupo_materia.php",
              success : (r) => {
                $('#inputMateriaActualizar').html(r);
              }
            });
          }
    });
  });

  $('#inputGrupo').on('change', () => {
    $.ajax({
        type: "POST",
        data: "grupo=" + $('#inputGrupo').val(),
        url: "php/control_informacion_grupo.php",
        success: (r) => {
          r = jQuery.parseJSON(r);
            $('#inputSemestre').val(r['semestre']);
            $('#inputNProfesor').val(r['profesor_no']);
            $('#inputSemestreActualizar').val(r['semestre']);
            $('#inputNProfesorActualizar').val(r['profesor_no']);
            $.ajax({
              type : "POST",
              data : "grupo=" + $('#inputGrupo').val(),
              url : "php/control_grupo_materia.php",
              success : (r) => {
                $('#inputMateria').html(r);
                $('#inputMateriaActualizar').html(r);
              }
            });
          }
    });
  });

  $('#inputNControl').on('change', () => {
    $.ajax({
        type: "POST",
        data: "no_control=" + $('#inputNControl').val(),
        url: "php/control_nombre_alumno.php",
        success: (r) => {
            r = r.trim();
            $('#inputNombreAlumno').val(r);
            $('#inputNombreAlumnoActualizar').val(r);
        }
    });
  });

  $('#inputNControlActualizar').on('change', () => {
    $.ajax({
        type: "POST",
        data: "no_control=" + $('#inputNControlActualizar').val(),
        url: "php/control_nombre_alumno.php",
        success: (r) => {
            r = r.trim();
            $('#inputNombreAlumnoActualizar').val(r);
        }
    });
  });
  
    $('#btn_guardar_materias').click(() => {
      vacio('#inputNControl', 'Numero de Control')
      vacio('#inputNombreAlumno', 'Nombre del Alumno')
      vacio('#inputCarrera', 'Carrera')
      vacio('#inputGrupo', 'Grupo')
      vacio('#inputSemestre', 'Semestre')
      vacio('#inputMateria', 'Materia')
      vacio('#inputNProfesor', 'Profesor')
      vacio('#inputTipoClase', 'Tipo de clase')
      if (mensaje_alerta) {
        mensaje = mensaje.substring(0, mensaje.length - 2)
        swal_vacio(mensaje)
      } else {
        asignar_materias();
      }
    });

    $('#btn_actualizar_materias').click(() => {
      vacio('#inputNControlActualizar', 'Numero de Control')
      vacio('#inputNombreAlumnoActualizar', 'Nombre del Alumno')
      vacio('#inputCarreraActualizar', 'Carrera')
      vacio('#inputGrupoActualizar', 'Grupo')
      vacio('#inputSemestreActualizar', 'Semestre')
      vacio('#inputMateriaActualizar', 'Materia')
      vacio('#inputNProfesorActualizar', 'Profesor')
      vacio('#inputTipoClaseActualizar', 'Tipo de clase')
      if (mensaje_alerta) {
        mensaje = mensaje.substring(0, mensaje.length - 2)
        swal_vacio(mensaje)
      } else {
        editarAsignado();
      }
    });
  });
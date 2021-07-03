function validar_vacios(){
  if($('#inputMatricula').val() == "" || /^\s+$/.test($('#inputMatricula').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar la matricula',
      showConfirmButton: true,
      toast: true,
      
    });
  }else if($('#inputMateria').val() == "" || /^\s+$/.test($('#inputMateria').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el nombre de la materia',
      showConfirmButton: true,
      toast: true,
    });
  }else if ($('#inputICicloEscolar').val() == "" || /^\s+$/.test($('#inputICicloEscolar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el inicio del Ciclo escolar',
      showConfirmButton: true,
      toast: true,
    });
  }else if ($('#inpuFCicloEscolar').val() == "" || /^\s+$/.test($('#inputFCicloEscolar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el fin del Ciclo escolar',
      showConfirmButton: true,
      toast: true,
    });
  }else if($('#inputSemestre').val() == ""){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el Semestre',
      showConfirmButton: true,
      toast: true,
    });
  }else if($('#inputCarrera').val() == "" || /^\s+$/.test($('#inputCarrera').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar la el nombre de la carrera',
      showConfirmButton: true,
      toast: true,
    });
  }else{
    ajaxMateria();
    $('#exampleModal').modal('hide');
  }
}

function infoMateria(id_materia){
  $.ajax({
    type : "POST",
    data : "id_materia=" + id_materia,
    url : "php/control_infromacion_materia.php",
    success : (respuesta) => {
      console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      $('#idMateriaActualizar').val(respuesta['id_materia']);
      $('#inputMatriculaActualizar').val(respuesta['clave_materia']);
      $('#inputMateriaActualizar').val(respuesta['nombre_materia']);
      $('#inputICicloEscolarActualizar').val(respuesta['ciclo_escolar_inicio']);
      $('#inputFCicloEscolarActualizar').val(respuesta['ciclo_escolar_final']);
      $('#inputSemestreActualizar').val(respuesta['semestre']);
      $('#inputCarreraActualizar').val(respuesta['carrera']);
      $('#inputGrupoActualizar').val(respuesta['grupo']);
      $('#inputMatriculaProfesorActualizar').val(respuesta['profesor_no']);
      $('#inputNombreProfesorActualizar').val(respuesta['profesor_nombre']);
      $('#lunesInicioActualizar').val(respuesta['lunesI']);
      $('#lunesFinActualizar').val(respuesta['lunesF']);
      $('#martesInicioActualizar').val(respuesta['martesI']);
      $('#martesFinActualizar').val(respuesta['martesF']);
      $('#miercolesInicioActualizar').val(respuesta['miercolesI']);
      $('#miercolesFinActualizar').val(respuesta['miercolesF']);
      $('#juevesInicioActualizar').val(respuesta['juevesI']);
      $('#juevesFinActualizar').val(respuesta['juevesF']);
      $('#viernesInicioActualizar').val(respuesta['viernesI']);
      $('#viernesFinActualizar').val(respuesta['viernesF']);
      let l_i =  $('#lunesInicioActualizar').val();;
      let l_f =  $('#lunesFinActualizar').val();;
      let ma_i =  $('#martesInicioActualizar').val();;
      let ma_f =  $('#martesFinActualizar').val();;
      let mi_i =  $('#miercolesInicioActualizar').val();;
      let mi_f =  $('#miercolesFinActualizar').val();;
      let j_i =  $('#juevesInicioActualizar').val();;
      let j_f =  $('#juevesFinActualizar').val();;
      let v_i =  $('#viernesInicioActualizar').val();;
      let v_f = $('#viernesFinActualizar').val();
      if(l_i == "" && l_f == ""){
        $('#lunesSiActualizar').attr('checked', false);
        $('#lunesNoActualizar').attr('checked', true);
      }else{
        $('#lunesSiActualizar').attr('checked', true);
        $('#lunesNoActualizar').attr('checked', false);
      }
      if(ma_i == "" && ma_f == ""){
        $('#martesSiActualizar').attr('checked', false);
        $('#martesNoActualizar').attr('checked', true);
      }else{
        $('#martesSiActualizar').attr('checked', true);
        $('#martesNoActualizar').attr('checked', false);
      }
      if(mi_i == "" && mi_f == ""){
        $('#miercolesSiActualizar').attr('checked', false);
        $('#miercolesNoActualizar').attr('checked', true);
      }else{
        $('#miercolesSiActualizar').attr('checked', true);
        $('#miercolesNoActualizar').attr('checked', false);
      }
      if(j_i == "" && j_f == ""){
        $('#juevesSiActualizar').attr('checked', false);
        $('#juevesNoActualizar').attr('checked', true);
      }else{
        $('#juevesSiActualizar').attr('checked', true);
        $('#juevesNoActualizar').attr('checked', false);
      }
      if(v_i == "" && v_f == ""){
        $('#viernesSiActualizar').attr('checked', false);
        $('#viernesNoActualizar').attr('checked', true);
      }else{
        $('#viernesSiActualizar').attr('checked', true);
        $('#viernesNoActualizar').attr('checked', false);
      }
    }
  });  
}

function eliminarMateria(id_materia, nombre){
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
          data : "id_materia=" + id_materia,
          url : "php/control_eliminar_materia.php",
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


function ajaxMateria(){
  $.ajax({
    type : "POST",
    data : {
      "inputMatricula": $('#inputMatricula').val(),
      "inputMateria": $('#inputMateria').val(),
      "inputICicloEscolar": $('#inputICicloEscolar').val(),
      "inputFCicloEscolar": $('#inputFCicloEscolar').val(),
      "inputSemestre": $('#inputSemestre').val(),
      "inputCarrera": $('#inputCarrera').val(),
      "inputGrupo": $('#inputGrupo').val(),
      "inputMatriculaProfesor": $('#inputMatriculaProfesor').val(),
      "inputNombreProfesor": $('#inputNombreProfesor').val(),
      "lunesInicio": $('#lunesInicio').val(),
      "lunesFin": $('#lunesFin').val(),
      "martesInicio": $('#martesInicio').val(),
      "martesFin": $('#martesFin').val(),
      "miercolesInicio": $('#miercolesInicio').val(),
      "miercolesFin": $('#miercolesFin').val(),
      "juevesInicio": $('#juevesInicio').val(),
      "juevesFin": $('#juevesFin').val(),
      "viernesInicio": $('#viernesInicio').val(),
      "viernesFin": $('#viernesFin').val()
    },
    url : "php/control_agregar_materias.php",
    success : (resultado) => {
      console.log(resultado);
      if(resultado == 1){
        Swal.fire({
          position: 'center',
          icon: "success",
          title: "Guardado con exito",
          text: "la materia fue guarda corectamente",
          showConfirmButton: false,
          toast: true,
          timer: 3000
        }).then(() =>{
          $('#frm_agregar_materias')[0].reset();
          window.location.reload();
        });
      }else{
        $('#frm_agregar_materias')[0].reset();
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

function validar_vacios_actualizar(){
  if($('#inputMatricula_actualizar').val() == "" || /^\s+$/.test($('#inputMatricula_actualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar la nueva matricula',
      showConfirmButton: true,
      toast: true,
    });
  }else if($('#inputMateria_actualizar').val() == "" || /^\s+$/.test($('#inputMateria_actualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el nuevo nombre de la materia',
      showConfirmButton: true,
      toast: true,
    });
  }else if ($('#inputICicloEscolar_actualizar').val() == "" || /^\s+$/.test($('#inputICicloEscolar_actualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el nuevo inicio del Ciclo escolar',
      showConfirmButton: true,
      toast: true,
    });
  }else if ($('#inputFCicloEscolar_actualizar').val() == "" || /^\s+$/.test($('#inputFCicloEscolar_actualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el nuevo fin del Ciclo escolar',
      showConfirmButton: true,
      toast: true,
    });
  }else if($('#inputSemestre_actualizar').val() == ""){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el nuevo Semestre',
      showConfirmButton: true,
      toast: true,
    });
  }else if($('#inputCarrera_actualizar').val() == "" || /^\s+$/.test($('#inputCarrera_actualizar').val())){
    Swal.fire({
      icon: 'error',
      title: `Oooops`,
      text: '\n\n Falta ingresar el nuevo nombre de la carrera',
      showConfirmButton: true,
      toast: true,
    });
  }else{
    ajaxActualizarMateria();
    $('#exampleModal').modal('hide');
  }
}

function ajaxActualizarMateria(){
  
  $.ajax({
    type : "POST",
    data : {
      "idMateria": $('#idMateriaActualizar').val(),
      "inputMatricula": $('#inputMatriculaActualizar').val(),
      "inputMateria": $('#inputMateriaActualizar').val(),
      "inputICicloEscolar": $('#inputICicloEscolarActualizar').val(),
      "inputFCicloEscolar": $('#inputFCicloEscolarActualizar').val(),
      "inputSemestre": $('#inputSemestreActualizar').val(),
      "inputCarrera": $('#inputCarreraActualizar').val(),
      "inputGrupo": $('#inputGrupoActualizar').val(),
      "inputMatriculaProfesor": $('#inputMatriculaProfesorActualizar').val(),
      "inputNombreProfesor": $('#inputNombreProfesorActualizar').val(),
      "lunesInicio": $('#lunesInicioActualizar').val(),
      "lunesFin": $('#lunesFinActualizar').val(),
      "martesInicio": $('#martesInicioActualizar').val(),
      "martesFin": $('#martesFinActualizar').val(),
      "miercolesInicio": $('#miercolesInicioActualizar').val(),
      "miercolesFin": $('#miercolesFinActualizar').val(),
      "juevesInicio": $('#juevesInicioActualizar').val(),
      "juevesFin": $('#juevesFinActualizar').val(),
      "viernesInicio": $('#viernesInicioActualizar').val(),
      "viernesFin": $('#viernesFinActualizar').val()

    },
    url : "php/control_actualizar_materias.php",
    success : (resultado) => {
      console.log(resultado);
      if(resultado == 1){
        Swal.fire({
          position: 'center',
          icon: "success",
          title: "Actualizado con exito",
          text: "la materia fue actualizado corectamente",
          showConfirmButton: false,
          toast: true,
          timer: 2000
        }).then(() =>{
          $('#frm_actualizar_materias')[0].reset();
          window.location.reload();
        });
      }else{
        $('#frm_actualizar_materias')[0].reset();
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
function fechasactualizar(){
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

function horas(){
  $("#lunesInicio,#martesInicio,#miercolesInicio,#juevesInicio,#viernesInicio,#lunesInicioActualizar,#martesInicioActualizar,#miercolesInicioActualizar,#juevesInicioActualizar,#viernesInicioActualizar").timepicker({
  zindex: 9999999,
   timeFormat: 'hh:mm p',
   interval: 60,
   minTime: '06',
   maxTime: '17',
   defaultTime: '07',
   startTime: '07',
   dynamic: false,
   dropdown: true,
   scrollbar: false,
});
$("#lunesFin,#martesFin,#miercolesFin,#juevesFin,#viernesFin,#lunesFinActualizar,#martesFinActualizar,#miercolesFinActualizar,#juevesFinActualizar,#viernesFinActualizar").timepicker({
   zindex: 9999999,
   timeFormat: 'hh:mm p',
   interval: 60,
   minTime: '07',
   maxTime: '17',
   defaultTime: '08',
   startTime: '08',
   dynamic: false,
   dropdown: true,
   scrollbar: false
});


}

function activador(name_radio, id_1, id_h_1, id_h_2){
  $(`input[name='${name_radio}']`).click(() => {
    if($(id_1).is(":checked")){
      $(id_h_1).removeAttr("disabled").focus();
      $(id_h_2).removeAttr("disabled").focus();
    }else{
      $(id_h_1).attr("disabled", "diabled").val("");
      $(id_h_2).attr("disabled", "diabled").val("");
    }
  });
}
$(document).ready(() => {
  horas();
  $('#tabla_agregar_materia').DataTable();
  $.ajax({
    type : "POST",
    data: {"ocupacion" : "Profesor"},
    url : "php/control_obtener_docentes.php",
    success : (r) => {
      $('#inputMatriculaProfesor').html(r);
      $('#inputMatriculaProfesorActualizar').html(r);
    }
  });

  $('#inputMatriculaProfesorActualizar').on('change', () => {
    $.ajax({
        type: "POST",
        data: "no_control=" + $('#inputMatriculaProfesorActualizar').val(),
        url: "php/control_nombre_profesor.php",
        success: (r) => {
            r = r.trim();
            $('#inputNombreProfesorActualizar').val(r);
        }
    });
});

  $('#inputMatriculaProfesor').on('change', () => {
    $.ajax({
        type: "POST",
        data: "no_control=" + $('#inputMatriculaProfesor').val(),
        url: "php/control_nombre_profesor.php",
        success: (r) => {
            r = r.trim();
            $('#inputNombreProfesor').val(r);
        }
    });
});
  activador('lunes', '#lunesSi', '#lunesInicio', '#lunesFin');
  activador('martes', '#martesSi', '#martesInicio', '#martesFin');
  activador('miercoles', '#miercolesSi', '#miercolesInicio', '#miercolesFin');
  activador('jueves', '#juevesSi', '#juevesInicio', '#juevesFin');
  activador('viernes', '#viernesSi', '#viernesInicio', '#viernesFin');
  activador('lunesActualizar', '#lunesSiActualizar', '#lunesInicioActualizar', '#lunesFinActualizar');
  activador('martesActualizar', '#martesSiActualizar', '#martesInicioActualizar', '#martesFinActualizar');
  activador('miercolesActualizar', '#miercolesSiActualizar', '#miercolesInicioActualizar', '#miercolesFinActualizar');
  activador('juevesActualizar', '#juevesSiActualizar', '#juevesInicioActualizar', '#juevesFinActualizar');
  activador('viernesActualizar', '#viernesSiActualizar', '#viernesInicioActualizar', '#viernesFinActualizar');
  fechas();
  fechasactualizar();

  $('#inputMateria').on('input', function() {
    this.value = this.value.replace(/[^a-zA-Z]/g, '');
  });

  $('#inputMateriaActualizar').on('input', function() {
    this.value = this.value.replace(/[^a-zA-Z]/g, '');
  });



  $('#btn_guardar').click(() => {
    validar_vacios();
  });

  $('#btn_actualizar').click(() => {
    validar_vacios_actualizar();
  });

});
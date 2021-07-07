function verArchivo(id_archivo,profesor_no,nombre,semestre,materia,grupo,unidad){
  $.ajax({
      type: "POST",
      data: {
          "id_archivo" : id_archivo,
          "profesor_no" : profesor_no,
          "nombre" : nombre,
          "semestre": semestre,
          "materia": materia,
          "grupo": grupo,
          "unidad": unidad
      },
      url: "php/control_ver_archivo_alumno.php",
      success: function(respuesta) {
          $('#archivo_observar').html(respuesta);
      }
  });
}



$(document).ready(function(){
    
    $('#table_horario').DataTable({
        scrollX: true,
        scrollY:        '50vh',
        scrollCollapse: true,
        paging:         false,
        language: {
          url: 'json/spanish-Mexico.json'
        }
    });
        


});
  
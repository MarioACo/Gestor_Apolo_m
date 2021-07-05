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
  
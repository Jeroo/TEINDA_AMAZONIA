$(document).ready(function() {
    
  $('#listaLibros').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
        /*,
        "sDom": '<"bottom"flp>rt<"top"i><"clear">'*/
    },
    );
    
} );
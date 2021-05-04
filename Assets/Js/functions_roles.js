var tableRoles;
document.addEventListener('DOMContentLoaded', function () {
    tableRoles = $('#tableRoles').DataTable({//referencia a la tabla TableRoles
        "aProcessing": true,
        "aServerSide": true,
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json" },
        "ajax": {
            "url": base_url + "Roles/getRoles",//ruta del metodo getRoles
            "dataSrc": ""
        },
        "columns": [
            { "data": "idrol" },
            { "data": "nombrerol" },
            { "data": "descripcion" },
            { "data": "status" }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});

$('#tableRoles').DataTable();

function openModal() {
    $('#modalFormRol').modal('show');
}
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
            { "data": "status" },
            { "data": "options" }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
    //nuevo rol
    var formRol = document.querySelector("#formRol");
    formRol.onsubmit = function (e) {
        e.preventDefault();

        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intStatus = document.querySelector('#listStatus').value;
        if (strNombre == '' || strDescripcion == '' || intStatus == '') {
            swal("atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        //envio de información
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + 'Roles/setRol';
        var formData = new FormData(formRol);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalFormRol').modal('hide');
                    console.log(formRol);
                    formRol.reset();
                    swal("Roles de usuario", objData.msg, "success");
                    //tableRoles.api().ajax.reload(function () {
                    tableRoles.ajax.reload(function () {
                    });
                } else {
                    swal("error", objData.msg, "error");
                }
            }
        }
    }
});

$('#tableRoles').DataTable();

function openModal() {
    $('#modalFormRol').modal('show');
}
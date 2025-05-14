let table = null; // Solo inicializamos una vez

$(document).ready(function () {
    //ver_movimientos_sincro()
});

function ver_movimientos_sincro() {
    const fecha = $('#datefecha').val();
    const url = URL_PY + 'movimientos/sincro?fecha=' + encodeURIComponent(fecha);
    $.ajaxblock();
    $('#tbl_sincromovi tbody').empty();

    table = $('#tbl_sincromovi').DataTable({
        "destroy": true,
        "responsive": true,
        "autoWidth": true,
        "ajax": {
            'url': url,
            'method': 'GET',
            'dataSrc': function (json) {
                //console.log("Datos recibidos del servidor:", json);
                $.ajaxunblock();
                return json.data;
            },
        },
        "columns": [
            { "data": 'titulo' },
            { "data": 'enviado_a' },
            { "data": 'fecha_y_hora' },
            { "data": 'monto' },
            { "data": 'moneda' },
            { "data": 'noperacion' }
        ],
        order: [[2, 'desc']],
        "language": {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
}
function insertarMovimientos() {
    const table = $('#tbl_sincromovi').DataTable();
    const datos = table.rows().data().toArray();

    const movimientos = datos.map(item => ({
        "nombre_depositante": item.titulo || '',
        "observacion": item.enviado_a || '',
        "fecha_hora": item.fecha_y_hora || '',
        "monto": item.monto || '',
        "moneda": item.moneda || '',
        "noperacion": item.noperacion || '-'
    }));
    if (movimientos.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'ERROR AL REGISTRAR',
            text: 'No hay datos para registrar.',
        });
        return;
    }
    $.ajax({
    url: URL_PY + "movimientos/insertar_sincromov",
    type: 'POST',
    data: JSON.stringify({ movimientos: movimientos }),  
    success: function (response) {
        if (response.status === 'OK') {
            Swal.fire({
                icon: 'success',
                title: '¡REGISTRO EXITOSO!',
                text: response.message,
            }).then(() => {table.clear().draw();
            });
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'ERROR AL REGISTRAR',
                text: response.message,
            });
        }
    },
});
}


let terminoActual = "";
let filaSeleccionada = null;
let pagina = 1;

var table = "";

$(document).ready(function () {
    $("#buscador").keyup(function () {
        terminoActual = $(this).val();
        pagina = 1; // Reiniciar la paginación
        buscarDestinatarios(true);
    });
    // 1. Evento para limpiar campos al cambiar de pestaña
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        var targetTab = $(e.target).attr('href'); // Obtiene el ID del tab activo

        // 2. Decide qué función de limpieza ejecutar según el tab
        if (targetTab === '#tabentrada') {
            obtenerMovimientos(); // Recarga datos si es necesario
        } else if (targetTab === '#tabsalida') {
            obtenerMovimientoSalida(); // Recarga datos si es necesario
        }
    });
    $("#cargarMas").click(function () {
        pagina++; // Aumentar la página
        buscarDestinatarios(false);
    });
    $("#datefecha").change(function () {
        obtenerMovimientos();
    });
    $("#datefecha2").change(function () {
        obtenerMovimientoSalida();
    });
    $("#cmbdetentempresa").change(function () {
        obtenerMovimientos();
    });
    $("#cmbdetentempresa2").change(function () {
        obtenerMovimientoSalida();
    });
    obtenerMovimientos();
});
function elegirDestinatario() {
    filaSeleccionada = $(this).closest("tr");
    $('#buscador').val('');
    $('#resultados').html('');
    let totalPaginas = 0;
    $("#cargarMas").toggle(pagina < totalPaginas);
    $('#mdleledestinatario').modal('show');
}

function abrirModalPDF() {
    $('#lbltitulos').html('Generar reporte');
    $('#mdlpdf').modal('show');
}

function abrirModalSaldo() {
    $('#lbltitulo3').html('Ingresar Saldo');
    $('#mdlingsaldo').modal('show');
    limpiarSaldo();
}

function buscarDestinatarios(limpiar) {
    if (terminoActual.length >= 1) {
        $.ajax({
            url: URL_PY + "destinatarios/busc_destinatarios",
            method: "GET",
            data: { q: terminoActual, page: pagina },
            dataType: "json",
            success: function (data) {
                //console.log(data);

                if (limpiar) $("#resultados").html(""); // Limpiar resultados si es una nueva búsqueda

                $.each(data.destinatarios, function (index, destinatarios) {
                    $("#resultados").append(`
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><strong>${destinatarios.nombre}</strong> <br> 
                                
                            </span>
                            <button class="btn btn-6 btn-yellow active btn-pill w-10 escogerDestinatario" 
                                data-id="${destinatarios.iddestinatario}" 
                                data-nombre="${destinatarios.nombre}">
                                <i class="fas fa-check"></i>&nbsp;ELEGIR
                            </button>
                        </li>
                    `);
                });

                let totalPaginas = Math.ceil(data.total / data.limite);
                $("#cargarMas").toggle(pagina < totalPaginas);
            },
            error: function () {
                //console.error("Error en la búsqueda.");
            }
        });
    }
}

$(document).on("click", ".escogerDestinatario", function () {
    let iddestinatario = $(this).data("id");
    let nombreDestinatario = $(this).data("nombre");
    $("#txtiddest").val(iddestinatario);
    $("#txtdestinatario").val(nombreDestinatario);
    $("#mdleledestinatario").modal('hide');
});

$(document).on("click", ".escogerDestinatario", function () {
    let iddestinatario = $(this).data("id");
    let nombreDestinatario = $(this).data("nombre");
    $("#txtiddest2").val(iddestinatario);
    $("#txtdestinatario2").val(nombreDestinatario);
    $("#mdleledestinatario").modal('hide');
});

function registrarMovEntrada() {
    var parametros =
        'Destinatario=' + $('#txtiddest').val() +
        '&Cuenta=' + $('#cmbdetentempresa').val() +
        '&Observacion=' + $('#txtobservacion').val() +
        '&Fecha=' + $('#datefecha').val() +
        '&Monto=' + $('#txtmonto').val() +
        '&Tipo=ENTRADA' +
        '&Noperacion=' + $('#txtnoperacion').val();
    $.ajax({
        type: "POST",
        url: URL_PY + 'movimientos/registrar_xml',
        data: parametros,
        success: function (response) {
            //console.log(response);
            if (response.includes('MOVIMIENTO FINANCIERO REGISTRADO')) {
                Swal.fire({
                    icon: 'success',
                    title: 'REGISTRO DE MOVIMIENTOS',
                    text: response,
                }).then(function () {
                    obtenerMovimientos();
                    limpiar();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR AL REGISTRAR',
                    text: response
                });
            }
        },
    });
}

function registrarMovSalida() {
    var parametros =
        'Destinatario=' + $('#txtiddest2').val() +
        '&Cuenta=' + $('#cmbdetentempresa2').val() +
        '&Observacion=' + $('#txtobservacion2').val() +
        '&Fecha=' + $('#datefecha2').val() +
        '&Monto=' + $('#txtmonto2').val() +
        '&Tipo=SALIDA' + 
        '&Noperacion=' + $('#txtnoperacion2').val();
    $.ajax({
        type: "POST",
        url: URL_PY + 'movimientos/registrar_xml',
        data: parametros,
        success: function (response) {
            //console.log(response);
            if (response.includes('MOVIMIENTO FINANCIERO REGISTRADO')) {
                Swal.fire({
                    icon: 'success',
                    title: 'REGISTRO DE MOVIMIENTOS',
                    text: response
                }).then(function () {
                    obtenerMovimientoSalida();
                    limpiar2();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR AL REGISTRAR',
                    text: response
                });
            }
        },
    });
}

function obtenerMovimientos() {
    var fecha = $('#datefecha').val();
    var entidad = $('#cmbdetentempresa').val();

    $.ajax({
        type: "GET",
        url: URL_PY + 'movimientos/movEntradaXfecha',
        data: { fecha: fecha, entidad: entidad },
        success: function (response) {

            //console.log(response);
            var movimientos = response[0];
            //console.log('Respuesta completa del servidor:', response);
            $('#tblmovimientos tbody').empty();
            if (Array.isArray(movimientos)) {
                movimientos.forEach(function (movimientos) {
                    var fila = '<tr>' +
                        '<td>' + movimientos.destinatario + '</td>' +
                        '<td>' + movimientos.observacion + '</td>' +
                        '<td>' + movimientos.fecha + '</td>' +
                        '<td>' + movimientos.monto + '</td>' +
                        '<td>' + movimientos.noperacion + '</td>' +
                        '<td><button class="btn btn-2 btn-danger btn-pill w-80" onclick="eliminarEntrada(' + movimientos.idmov_finanzas + ')">' +
                        '<i class="fa-solid fa-trash"></i></button></td>'
                    '</tr>';
                    $('#tblmovimientos').append(fila);
                });
            }
        },
        error: function (xhr, status, error) {
            //console.error("Error en la solicitud:", status, error);
        }
    });
}

function obtenerMovimientoSalida() {
    var fecha = $('#datefecha2').val();
    var entidad = $('#cmbdetentempresa2').val();

    $.ajax({
        type: "GET",
        url: URL_PY + 'movimientos/movSalidaXfecha',
        data: { fecha: fecha, entidad: entidad },
        success: function (response) {

            //console.log(response);
            var movimientos = response[0];
            $('#tblmovimientos tbody').empty();
            if (Array.isArray(movimientos)) {
                movimientos.forEach(function (movimientos) {
                    var fila = '<tr>' +
                        '<td>' + movimientos.destinatario + '</td>' +
                        '<td>' + movimientos.observacion + '</td>' +
                        '<td>' + movimientos.fecha + '</td>' +
                        '<td>' + movimientos.monto + '</td>' +
                        '<td>' + movimientos.noperacion + '</td>' +
                        '<td><button class="btn btn-2 btn-danger btn-pill w-80" onclick="eliminarEntrada(' + movimientos.idmov_finanzas + ')">' +
                        '<i class="fa-solid fa-trash"></i></button></td>'
                    '</tr>';
                    $('#tblmovimientos').append(fila);
                });
            }
        },
        error: function (xhr, status, error) {
            //console.error("Error en la solicitud:", status, error);
        }
    });
}


function eliminarEntrada(idmov_finanzas) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Esta acción no se puede deshacer.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: URL_PY + 'movimientos/eliminar',
                data: { idmovfinanzas: idmov_finanzas },
                success: function (response) {
                    if (response.error) {
                        Swal.fire({
                            icon: "error",
                            title: "ELIMINACIÓN FALLIDA",
                            text: response.error
                        });
                    } else {
                        Swal.fire({
                            icon: "success",
                            title: "REGISTRO ELIMINADO",
                            text: response.message
                        }).then(() => {
                            // Elimina la fila manualmente del HTML (sin recargar toda la tabla)
                            $(`button[onclick="eliminarEntrada(${idmov_finanzas})"]`)
                                .closest("tr").remove();
                        });
                    }
                },
            });
        }
    });
}

function limpiar() {
    $('#cmbdetentempresa').val('1');
    $('#txtiddest').val('');
    $('#txtdestinatario').val('');
    $('#txtmonto').val('');
    $('#txtobservacion').val('');
    $('#txtnoperacion').val('');
}

function limpiar2() {
    $('#cmbdetentempresa2').val('1');
    $('#txtiddest2').val('');
    $('#txtdestinatario2').val('');
    $('#txtmonto2').val('');
    $('#txtobservacion2').val('');
    $('#txtnoperacion2').val('');
}

function limpiarSaldo() {
    $('#txtobservacionS').val('');
    $('#txtsaldo').val('');
    $('#txtnoperacionS').val('');
}

function reportePDFmovimientos() {
    // Crear un formulario temporal
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = URL_PY + 'movimientos/reporte_movimientos', //${URL_PY}movimientos/reporte_movimientos;
        form.target = '_blank'; // Abrir en una nueva ventana

    // Crear campos de formulario para los datos
    const inputInicio = document.createElement('input');
    inputInicio.type = 'hidden';
    inputInicio.name = 'i';
    inputInicio.value = $('#dtpfechaini').val();
    form.appendChild(inputInicio);

    const inputFin = document.createElement('input');
    inputFin.type = 'hidden';
    inputFin.name = 'f';
    inputFin.value = $('#dtpfechafin').val();
    form.appendChild(inputFin);


    // Agregar el formulario al documento y enviarlo
    document.body.appendChild(form);
    form.submit();

    // Eliminar el formulario después de enviarlo
    document.body.removeChild(form);
}

function registrarMovSaldo() {
    var parametros =
        'Observacion=' + $('#txtobservacionS').val() +
        '&Cuenta=' + $('#cmbdetentempresa').val() +
        '&Fecha=' + $('#datefecha').val() +
        '&Saldo=' + $('#txtsaldo').val() +
        '&Tipo=SALDO' +
        '&Noperacion=' + $('#txtnoperacionS').val();
    $.ajax({
        type: "POST",
        url: URL_PY + 'movimientos/registrar_saldo',
        data: parametros,
        success: function (response) {
            //console.log(response);
            if (response.includes('MOVIMIENTO FINANCIERO REGISTRADO')) {
                Swal.fire({
                    icon: 'success',
                    title: 'REGISTRO DE MOVIMIENTOS',
                    text: response,
                }).then(function () {
                    obtenerMovimientos();
                    $("#mdlingsaldo").modal('hide')
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR AL REGISTRAR',
                    text: response
                });
            }
        },
    });
}

function reporteExcelMovimientos() {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = URL_PY + 'movimientos/reporte_excel_movimientos';
    form.target = '_blank';

    const inputInicio = document.createElement('input');
    inputInicio.type = 'hidden';
    inputInicio.name = 'i';
    inputInicio.value = $('#dtpfechaini').val();
    form.appendChild(inputInicio);

    const inputFin = document.createElement('input');
    inputFin.type = 'hidden';
    inputFin.name = 'f';
    inputFin.value = $('#dtpfechafin').val();
    form.appendChild(inputFin);

    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}

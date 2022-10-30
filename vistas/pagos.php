<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pagos / Verificar Pagos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Pagos / Verificar Pagos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">

    <div class="container-fluid">



        <!-- row para criterios de busqueda -->
        <div class="row">

            <div class="col-lg-12">

                <div class="card card-info">

                    <div class="card-header">
                        <h3 class="card-title">CRITERIOS DE BÚSQUEDA</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool text-danger" id="btnLimpiarBusqueda">
                                <i class="fas fa-times"></i>
                            </button>
                        </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="d-none d-md-flex col-md-12 ">
                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="number" id="iptRuc" class="form-control" data-index="5">
                                    <label for="iptRuc">RUC</label>
                                </div>
                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="number" id="iptCodigo" class="form-control" data-index="5">
                                    <label for="iptCodigo">Codigo Pago</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- ./ end card-body -->
            </div>

        </div>

    </div>

    <!-- row para listado de pagos/vetificar pagos -->
    <div class="row">
        <div class="col-lg-12">
            <table id="tbl_pagos" class="table table-striped w-100 shadow">
                <thead class="bg-info">
                    <tr style="font-size: 15px;">
                        <th></th>
                        <th>ID</th>
                        <th>Ruc</th>
                        <th>Empresa</th>
                        <th>Rubro</th>
                        <th>Monto</th>
                        <th>Codigo Pago</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>pdf</th>
                        <th>Estado</th>
                        <th class="text-cetner">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-small">
                </tbody>
            </table>
        </div>
    </div>

</div><!-- /.container-fluid -->

</div>
<!-- /.content -->

<!-- Ventana Modal para registrar un Pago -->
<div class="modal fade" id="mdlGestionarPago" role="dialog">

    <div class="modal-dialog modal-lg">

        <!-- contenido del modal -->
        <div class="modal-content">

            <!-- cabecera del modal -->
            <div class="modal-header bg-gray py-1">

                <h5 class="modal-title">Pago</h5>

                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" data-bs-dismiss="modal"
                    id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>

            </div>

            <!-- cuerpo del modal -->
            <div class="modal-body">

                <form class="needs-validation" novalidate>
                    <!-- Abrimos una fila -->
                    <div class="row">


                         <!--Columna para ingresar el codigo pago   -->
                         <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="iptCodigoReg"><span class="small">
                                        Codigo Pago</span><span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm" id="iptCodigoReg"
                                    placeholder="Codigo Pago">
                                <div class="invalid-feedback" id="validate_codigo">Debe ingresar el Codigo Pago</div>
                            </div>
                        </div>
                        <!-- Columna para registro de la descripción del producto -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="selEmpresaReg"> <span class="small">Empresa</span><span
                                        class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-sm" id="selEmpresaReg">
                                </select>
                                <div class="invalid-feedback" id="validate_empresa">Debe ingresar en nombre de la Empresa</div>
                            </div>
                        </div>

                        <!-- Columna para registro del Ruc -->
                        <div class="col-12  col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptRucReg"><span class="small">Ruc</span><span
                                        class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control form-control-sm" step="0.01"
                                    id="iptRucReg" placeholder="RUC" disabled>
                                <span class="invalid-feedback" id="validate_ruc">Debe ingresar el RUC</span>
                            </div>
                        </div>

                        <!-- Columna para registro del Rubro -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptRubroReg"></i> <span class="small">Rubro
                                    </span><span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="iptRubroReg"
                                    placeholder="Rubro" disabled>
                                <div class="invalid-feedback" id="validate_rubro">Debe ingresar el Rubro</div>
                            </div>
                        </div>

                        <!-- Columna para registro del Importe -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptPagoReg"><span class="small">Pago</span><span
                                        class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control form-control-sm" id="iptPagoReg"
                                    placeholder="Pago" required>
                                <div id="validate_pago" class="invalid-feedback">Debe ingresar el Pago</div>
                            </div>
                        </div>

                        <!-- Columna para registro descripcion -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="iptDescripcionReg"> <span class="small">
                                        Descripcion</span><span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="iptDescripcionReg"
                                    placeholder="Informe">
                                <div class="invalid-feedback"id="validate_descripcion"></div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="selEstadoReg"><span class="small">Estado</span></label>
                                <select name="estado" id="selEstadoReg" class="form-control selectbs2">
                                    <option value="0">Aprovado</option>
                                    <option value="1">En Proceso</option>
                                    <option value="2">Completado</option>
                                </select>
                                <span id="validate_estado"></span>
                            </div>
                        </div>

                        <!--FOOTER DEL MODAL-->
                        <!-- creacion de botones para cancelar y guardar el pago -->
                        <button type="button" class="btn btn-danger mt-3 mx-2" style="width:170px;"
                            data-bs-dismiss="modal" id="btnCancelarRegistro">Cancelar</button>
                        <button type="button" style="width:170px;" class="btn btn-primary mt-3 mx-2" id="btnGuardarPago"
                            onclick="btnGuardarPago">Guardar Pago</button>
                        <!-- <button class="btn btn-default btn-success" type="submit" name="submit" value="Submit">Save</button> -->

                    </div>
                </form>

            </div>

        </div>
    </div>


</div>

<!-- Ventana Modal para editar un Pago -->
<div class="modal fade" id="mdlEditarPago" role="dialog">

    <div class="modal-dialog modal-lg">

        <!-- contenido del modal -->
        <div class="modal-content">

            <!-- cabecera del modal -->
            <div class="modal-header bg-gray py-1">

                <h5 class="modal-title">Pago</h5>

                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" data-bs-dismiss="modal"
                    id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>

            </div>

            <!-- cuerpo del modal -->
            <div class="modal-body">

                <form class="needs-validation" novalidate>
                    <!-- Abrimos una fila -->
                    <div class="row">


                         <!--Columna para ingresar el codigo pago   -->
                         <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="iptCodigoReg"><span class="small">
                                        Codigo Pago</span><span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm" id="iptCodigoReg"
                                    placeholder="Codigo Pago">
                                <div class="invalid-feedback" id="validate_codigo">Debe ingresar el Codigo Pago</div>
                            </div>
                        </div>
                        <!-- Columna para registro de la descripción del producto -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="selEmpresaReg"> <span class="small">Empresa</span><span
                                        class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-sm" id="selEmpresaReg">
                                </select>
                                <div class="invalid-feedback" id="validate_empresa">Debe ingresar en nombre de la Empresa</div>
                            </div>
                        </div>

                        <!-- Columna para registro del Ruc -->
                        <div class="col-12  col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptRucReg"><span class="small">Ruc</span><span
                                        class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control form-control-sm" step="0.01"
                                    id="iptRucReg" placeholder="RUC" disabled>
                                <span class="invalid-feedback" id="validate_ruc">Debe ingresar el RUC</span>
                            </div>
                        </div>

                        <!-- Columna para registro del Rubro -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptRubroReg"></i> <span class="small">Rubro
                                    </span><span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="iptRubroReg"
                                    placeholder="Rubro" disabled>
                                <div class="invalid-feedback" id="validate_rubro">Debe ingresar el Rubro</div>
                            </div>
                        </div>

                        <!-- Columna para registro del Importe -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptPagoReg"><span class="small">Pago</span><span
                                        class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control form-control-sm" id="iptPagoReg"
                                    placeholder="Pago" required>
                                <div id="validate_pago" class="invalid-feedback">Debe ingresar el Pago</div>
                            </div>
                        </div>

                        <!-- Columna para registro descripcion -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptDescripcionReg"> <span class="small">
                                        Descripcion</span><span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="iptDescripcionReg"
                                    placeholder="Informe">
                                <div class="invalid-feedback"id="validate_descripcion"></div>
                            </div>
                        </div>

                        <!--Columna para ingresar el pdf   -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptPdfReg"><span class="small">
                                        PDF</span><span class="text-danger">
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="selEstadoReg"><span class="small">Estado</span></label>
                                <select name="estado" id="selEstadoReg" class="form-control selectbs2">
                                    <option value="0">Aprovado</option>
                                    <option value="1">En Proceso</option>
                                    <option value="2">Completado</option>
                                </select>
                                <span id="validate_estado"></span>
                            </div>
                        </div>

                        <!--FOOTER DEL MODAL-->
                        <!-- creacion de botones para cancelar y guardar el pago -->
                        <button type="button" class="btn btn-danger mt-3 mx-2" style="width:170px;"
                            data-bs-dismiss="modal" id="btnCancelarRegistro">Cancelar</button>
                        <button type="button" style="width:170px;" class="btn btn-primary mt-3 mx-2" id="btnGuardarPago"
                            onclick="btnEditarModalPago">Guardar Pago</button>
                        <!-- <button class="btn btn-default btn-success" type="submit" name="submit" value="Submit">Save</button> -->

                    </div>
                </form>

            </div>

        </div>
    </div>


</div>

<script>
var accion;
var tablePagos;

/*===================================================================*/
//INICIALIZAMOS EL MENSAJE DE TIPO TOAST (EMERGENTE EN LA PARTE SUPERIOR)
/*===================================================================*/

$(document).ready(function() {

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    //SOLICITUD PARA CARGAR SELECT DE EMPRESA
    $.ajax({
        url: "ajax/empresas.ajax.php",
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta){
            var options = '<option selected values="">Seleccione a una Empresa</option>';

            for (let index = 0; index < respuesta.length; index++) {
                options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';                
            }
            $("#selEmpresaReg").append(options);
        }
    });



    /*===================================================================*/
    // CARGA DEL LISTADO CON EL PLUGIN DATATABLE JS
    /*===================================================================*/
    var tablePagos = $("#tbl_pagos").DataTable({
        dom: 'Bfrtip',
        buttons: [{
                text: 'Agregar Pago',
                className: 'addNewRecord',
                action: function(e, dt, node, config) {
                    $("#mdlGestionarPago").modal('show');
                    accion = 2; //registrar
                }
            },
            'excel', 'print', 'pageLength',
        ],
        pageLength: [5, 10, 15, 30, 50, 100],
        pageLength: 10,
        ajax: {
            url: "ajax/pagos.ajax.php",
            dataSrc: '',
            type: "POST",
            data: {
                'accion': 1 //1: LISTAR PRODUCTOS
            },

        },
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [{
                targets: 0,
                orderable: false,
                className: 'control'
            },
            {
                targets: 1,
                visible: false
            },
            {
                targets: 6,
                visible: false
            },
            {
                targets: 7,
                visible: false
            },
            {
                targets: 10,
                sortable: false,
                render: function(data, type, full, meta) {

                    if (data == 1) {
                        return "<div class='bg-primary color-palette text-center'>APROVADO</div> "
                    } else if (data == 2) {
                        return "<div class='bg-warning color-palette text-center'>En Proceso</div> "
                    } else {
                        return "<div class='bg-danger color-palette text-center'>Completado</div> "
                    }

                }
            },
            {
                targets: 11,
                orderable: false,
                render: function(data, type, full, meta) {
                    return "<center>" +
                        "<span class='btnVer text-primary px-1' style='cursor:pointer;'>" +
                        "<i class='fa fa-light fa-eye fs-5'></i>" +
                        "</span>" +
                        "<span class='btnEditarPago text-primary px-1' style='cursor:pointer;'>" +
                        "<i class='fas fa-pencil-alt fs-5'></i>" +
                        "</span>"
                    "</center>"
                }
            }

        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });

    /*===================================================================*/
    // EVENTOS PARA CRITERIOS DE BUSQUEDA (Pagos)
    /*===================================================================*/
    $("#iptRuc").keyup(function() {

        table.columns($(this).data('index')).search(this.value).draw();
    })

    
    

    /*===================================================================*/
    // EVENTO PARA LIMPIAR INPUTS DE CRITERIOS DE BUSQUEDA
    /*===================================================================*/
    $("#btnLimpiarBusqueda").on('click', function() {

        $("#iptRuc").val('')
        $("#iptCodigo").val('')

        tablePagos.search('').columns().search('').draw();
    })

    $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() {

        $("#validate_empresa").css("display", "none");
        $("#validate_ruc").css("display", "none");
        $("#validate_rubro").css("display", "none");
        $("#validate_pago").css("display", "none");
        $("#validate_descripcion").css("display", "none");
        $("#validate_estado").css("display", "none");

        $("#iptCodigoReg").val("");
        $("#selEmpresaReg").val(0);
        $("#iptRucReg").val("");
        $("#iptRubroReg").val("");
        $("#iptPagoReg").val("");
        $("#iptDescripcionReg").val("");
        $("#selEstadoReg").val(0);
    })



    /* ======================================================================================
    EVENTO AL DAR CLICK EN EL BOTON EDITAR PAGO
    =========================================================================================*/
    $('#tbl_pagos tbody').on('click', '.btnEditarPago', function() {

        accion = 4; //seteamos la accion para editar



        $("#mdlEditarPago").modal('show');

        
        var data =  ( $(this).parents('tr').hasClass('child') )
         ? table.row($(this).parents().prev('tr')).data()
        : table.row($(this).parents('tr')).data();
        
        $("#iptIdReg").val(data["id"]);
        $("#iptRucReg").val(data[3]);
        $("#iptRubroReg").val(data[5]);
        $("#iptPagoReg").val(data[6]);
        $("#iptCodigoReg").val(data[7]);
        $("#iptDescripcionReg").val(data[9]);
        $("#iptPdfReg").val(data[10]);
        $("#selEdtadoReg").val(data[11]);

    })

    /* ======================================================================================
      EVENTO AL DAR CLICK EN EL VER PAGO
      =========================================================================================*/
    $('#tbl_pagos tbody').on('click', '.btnVer', function() {
        

    })

    /*===================================================================*/
    //EVENTO QUE GUARDA LOS DATOS DEL PRODUCTO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
    /*===================================================================*/
    document.getElementById("btnGuardarPago").addEventListener("click", function() {

        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {

            if (form.checkValidity() === true) {

                console.log("Listo para registrar el pago")

                Swal.fire({
                    title: 'Está seguro de registrar el pago?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, deseo registrarlo!',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {

                    if (result.isConfirmed) {

                        var datos = new FormData();

                        datos.append("accion", accion);
                        datos.append("id", $("#iptIdReg").val()); //id
                        datos.append("codigo", $("#iptCodigoReg").val()); //codigo_transaccion
                        datos.append("id_empresa", $("#selEmpresaReg").val()); //id_empresa
                        datos.append("ruc", $("#iptRucReg").val()); //ruc_empresa
                        datos.append("rubro", $("#iptRubroReg").val()); //rubro
                        datos.append("importe", $("#iptPagoReg").val()); //pago
                        datos.append("descripcion", $("#iptDescripcionReg").val()); //descripcion
                        datos.append("informe", $("#iptPfdReg").val()); //informe
                        datos.append("estado", $("#selEstadoReg").val()); //estado

                        if (accion == 2) {
                            var titulo_msj = "El pago se registró correctamente"
                        }

                        if (accion == 4) {
                            var titulo_msj = "El pago se actualizó correctamente"
                        }

                        $.ajax({
                            url: "ajax/pagos.ajax.php",
                            method: "POST",
                            data: datos,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(respuesta) {

                                if (respuesta == "ok") {

                                    Toast.fire({
                                        icon: 'success',
                                        title: titulo_msj
                                    });

                                    table.ajax.reload();

                                    $("#mdlGestionarPago").modal(
                                    'hide');

                                    $("#iptCodigoReg").val("");
                                    $("#selEmpresaReg").val(0);
                                    $("#iptRucReg").val("");
                                    $("#iptRubroReg").val("");
                                    $("#iptPagoReg").val("");
                                    $("#iptDescripcionReg").val("");
                                    $("#iptPdfReg").val("");
                                    $("#selEstadoReg").val(0);

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'El pago no se pudo registrar'
                                    });
                                }

                            }
                        });

                    }
                })
            } else {
                console.log("No paso la validacion")
            }

            form.classList.add('was-validated');

        });
    });

});

/*===================================================================*/
//EVENTO QUE LIMPIA LOS MENSAJES DE ALERTA DE INGRESO DE DATOS DE CADA INPUT AL CANCELAR LA VENTANA MODAL
/*===================================================================*/
document.getElementById("btnCancelarRegistro").addEventListener("click", function() {
    $(".needs-validation").removeClass("was-validated");
})

</script>
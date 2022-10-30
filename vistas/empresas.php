<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h4 class="m-0">Empresas</h4>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Empresas</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content pb-2">
    <div class="row p-0 m-0">

        <!--LISTADO DE CATEGORIAS -->
        <div class="col-md-8">
            <div class="card card-info card-outline shadow">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list"></i> Listado de Empresas</h3>
                </div>
                <div class="card-body">
                    <table id="lstEmpresas" class="display nowrap table-striped w-100 shadow rounded">
                        <thead class="bg-info text-left">
                            <th>id</th>
                            <th>Ruc</th>
                            <th>Razon Social</th>
                            <th>Rubro</th>
                            <th class="text-center">Opciones</th>
                        </thead>
                        <tbody class="small text left">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--FORMULARIO PARA REGISTRO Y EDICION -->
        <div class="col-md-4">
            <div class="card card-info card-outline shadow">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Registro de Empresas</h3>
                </div>
                <div class="card-body">

                    <form class="needs-validation" novalidate>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group mb-2">

                                    <label class="col-form-label" for="iptRuc">
                                        <i class="fas fa-dumpster fs-6"></i>
                                        <span class="small">Ruc</span><span class="text-danger">*</span>
                                    </label>

                                    <input type="number" class="form-control form-control-sm" id="iptRuc" name="iptRuc"
                                        placeholder="Ingrese el Ruc" minlength="11" required>
                                    <div class="invalid-feedback">Debe ingresar el Ruc</div>
                                </div>

                                <div class="form-group mb-2">

                                    <label class="col-form-label" for="iptRazonSocial">
                                        <i class="fas fa-dumpster fs-6"></i>
                                        <span class="small">Razon Social</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="iptRazonSocial"
                                        name="iptRazonSocial" placeholder="Ingrese la Razon" required>
                                    <div class="invalid-feedback">Debe ingresar la Razon Social</div>
                                </div>
                                <div class="form-group mb-2">

                                    <label class="col-form-label" for="iptRubro">
                                        <i class="fas fa-dumpster fs-6"></i>
                                        <span class="small">Rubro</span><span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control form-control-sm" id="iptRubro"
                                        name="iptRubro" placeholder="Ingrese el Rubro" required>

                                    <div class="invalid-feedback">Debe ingresar el Rubro</div>

                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group m-0 mt-2">
                                    <a style="cursor:pointer;" class="btn btn-primary btn-sm w-100"
                                        id="btnRegistrarEmpresa">Registrar Empresa
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

<script>
var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});

$(document).ready(function() {

    //variables para registrar o editar la empresa
    var idEmpresa = 0;
    var ruc = "";
    var empresa = "";
    var rubro = "";

    var tableEmpresas = $('#lstEmpresas').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print', 'pageLength',
        ],
        ajax: {
            url: 'ajax/empresas.ajax.php',
            dataSrc: ""
        },
        columnDefs: [{
                targets: 0,
                visible: false,
            },
            {
                targets: 4,
                sortable: false,
                render: function(data, type, full, meta) {
                    return "<center>" +
                        "<span class='btnVerEmpresas text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Ver Empresa'> " +
                        "<i class='fa fa-light fa-eye fs-5'></i> " +
                        "</span> " +
                        "<span class='btnEditarEmpresas text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Empresa'> " +
                        "<i class='fas fa-pencil-alt fs-5'> </i> " +
                        "</span>" +
                        "</center>";
                }
            }
        ],
        "order": [
            [0, 'desc']
        ],
        lengthMenu: [0, 5, 10, 15, 20, 50],
        "pageLength": 15,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });

    $('#lstEmpresas tbody').on('click', '.btnEditarEmpresas', function() {

        var data= tableEmpresas.row($(this).parents('tr')).data();

        if ($(this).parents('tr').hasClass('selected')) {
            
            $(this).parents('tr').removeClass('selected');

            idEmpresa = 0;
            $("#iptRuc").val("");
            $("#iptRazonSocial").val("");
            $("#iptRubro").val("");
        
        }else{

            tableEmpresas.$('tr.selected').removeClass('selected');
            $(this).parents('tr').addClass('selected');

            idEmpresa = data[0];
            $("#iptRuc").val(data[1]);
            $("#iptRazonSocial").val(data[2]);
            $("#iptRubro").val(data[3]);
        }

        
    })

    document.getElementById("btnRegistrarEmpresa").addEventListener("click", function() {

        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {

            if (form.checkValidity() === true) {

                ruc = $("#iptRuc").val();
                empresa = $("#iptRazonSocial").val();
                rubro = $("#iptRubro").val();

                var datos = new FormData();

                datos.append("id", idEmpresa);
                datos.append("ruc", ruc);
                datos.append("razon_social", empresa);
                datos.append("rubro", rubro);

                Swal.fire({
                    title: 'Está seguro de guardar la empresa?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!',
                    cancelButtonText: 'Cancelar!',
                }).then((result) => {

                    if (result.isConfirmed) {

                        $.ajax({
                            url: "ajax/empresas.ajax.php",
                            type: "POST",
                            data: datos,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(respuesta) {

                                Toast.fire({
                                    icon: 'success',
                                    title: respuesta
                                });

                                idEmpresa = 0;
                                ruc = "";
                                empresa = "";
                                rubro = "";

                                $("#iptRuc").val("");
                                $("#iptRazonSocial").val("");
                                $("#iptRubro").val("");

                                tableEmpresas.ajax.reload();
                                $(".needs-validation").removeClass(
                                    "was-validated");
                            }
                        });
                    }
                })
            }

            form.classList.add('was-validated');

        })

    });

    


})
</script>
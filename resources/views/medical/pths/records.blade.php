@extends('layouts.app')
@section('content')
    <div class="columns">
        <div class="column is-12">
            <!--Flex Table-->
            <div class="demo-card has-more-margin">
                <div class="demo-title">
                    <div class="form-head stuck-header">
                        <div class="form-head-inner">
                            <h3 class="title is-thin is-5">Paciente No. <?= $o->document_number ?> - Historial de
                                <?= $c_names ?> <a target="_blank" href="<?= url($hc_view . '/records/' . $o->uuid) ?>"
                                    class="button h-button is-primary is-rounded is-elevated" style="float: right;"><span
                                        class="icon"><i class="fas fa-download"></i></span> <span>Descargar
                                        historial</span></a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-5">
                <header class="card-header">
                    <p class="card-header-title">Solicitudes de patologías</p>
                    {{-- <a id="add_patology_request"
                    href="<?= url($menu . '/patology_request/' . $o_derm->id . '/' . $appointment . '/add') ?>"
                    data-toggle="modal" data-modal="derma_modal"
                    class="h-modal-trigger btn card-header-icon ">
                    <span class="fas fa-plus mr-2"></span>Adicionar
                </a> --}}
                </header>
                <div class="card-content">
                    <div class="content">
                        {{-- Pathologies request --}}
                        <table id="pathologies_request_table" class="table is-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>UUID</th>
                                    <th>Doctor</th>
                                    <th>Patholgies</th>
                                    <th>Observaciones</th>
                                    <th>Creado</th>
                                    {{-- <th>Actualizado</th> --}}
                                    <th class="is-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Table Pagination-->
        </div>
    </div>
    <div id="derma_modal" class="modal">
        <div class="modal-background  h-modal-close"></div>
        <div class="modal-card" style="width: 900px; !important"></div>
    </div>
@endsection
@section('js')
    @parent
    <script>
        var derma_id = <?= $o_derm->id ?>;
        $(function() {
            if ($('#pathologies_request_table').length > 0) {
                $('#pathologies_request_table').DataTable().destroy();
            }
            var table = $('#pathologies_request_table').DataTable({
                ordering: true,
                paging: true,
                scrollCollapse: true,
                scrollY: '200px',
                oLanguage: {
                    oAria: {
                        sSortAscending: ": activate to sort column ascending",
                        sSortDescending: ": activate to sort column descending"
                    },
                    oPaginate: {
                        sFirst: "Primero",
                        sLast: "Último",
                        sNext: "Próximo",
                        sPrevious: "Previo"
                    },
                    sEmptyTable: "No hay datos disponibles en la tabla",
                    sInfo: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    sInfoEmpty: "Mostrando 0 a 0 de 0 entradas",
                    sInfoFiltered: "(filtrado sobre un total _MAX_ entradas)",
                    sInfoPostFix: "",
                    sDecimal: "",
                    sThousands: ",",
                    sLengthMenu: "Mostrar _MENU_ entradas",
                    sLoadingRecords: "Cargando...",
                    sProcessing: "Prosesando...",
                    sSearch: "Buscar:",
                    sSearchPlaceholder: "",
                    sUrl: "",
                    sZeroRecords: "No se encontraron resultados para tu consulta"
                },
                deferRender: true,
                "processing": true,
                "serverSide": true,
                columnDefs: [{
                        "visible": false,
                        "targets": [0, 1]
                    },
                    // {
                    //     searchable: false,
                    //     "targets": [0, 2, 3, 4, 5]
                    // },
                    // {
                    //     orderable: false,
                    //     targets: [5]
                    // }
                    // {
                    //     className: 'is-end',
                    //     targets: 3
                    // },
                    //{className: 'text-center', targets: [3, 4, 8, 10, 11, 19]},
                    //{searchable: false, targets: [0,4]},
                    //{orderable: false, targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]}
                    //{responsivePriority: 1, targets: [0,15]},
                    //{responsivePriority: 2, targets: [0,1,2, 4,7,8,10,15]},
                ],
                "ajax": {
                    "url": `/clinichistory/patology_request/${derma_id}`,
                    "type": 'GET',
                },
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "uuid",
                    },
                    {
                        "data": "doctor_class",
                        render: function(data, type, row) {
                            return data ? data.name : '';
                        }
                    },
                    {
                        "data": "pathologies",
                        render: function(data, type, row) {
                            if (data) {
                                console.log(data)
                                var html = '<ul>';
                                data.forEach(element => {
                                    html += `<li>
                                    <div style="display: flex;flex-direction: column;box-shadow: 0px 25px 20px -20px rgba(0, 0, 0, 0.45);
                                    padding: 5px;
                                    font-size: 10px;">
                                        <span>
                                            Patology: ${element.name} - ${element.description}
                                        </span>
                                        <span>
                                            Nota: ${element.pivot.note}
                                        </span>
                                    </div>
                                </li>
                        `
                                });
                                html += '</ul>';
                                return html;
                            }
                            return data;

                        }
                    },
                    {
                        "data": "annexes",
                        render: function(data, type, row) {
                            return data ? data : '';
                        }
                    },
                    {
                        "data": "created_at",
                        render: function(data, type, row) {
                            let fechaActual = new Date(data);
                            let fechaFormateada = fechaActual.toLocaleDateString()
                            return fechaFormateada;
                        }
                    },

                    // {
                    //     "data": "updated_at",
                    //     render: function (data, type, row) {
                    //         let fechaActual = new Date(data);
                    //         let fechaFormateada = fechaActual.toLocaleDateString()
                    //         return fechaFormateada;
                    //     }
                    // },
                    {
                        "data": "buttons",
                        render: function(data, type, row) {
                            let derm = derma_id;
                            let appointment = row.appointments_id;
                            let url_update =
                                `/clinichistory/patology_request/${derm}/${row.id}/${appointment}/edit`;
                            // let url_delete = `{% url 'nomenclador:delete_anexo' 0 %}`;
                            // url_update = url_update.replace(0, row.id);
                            // url_delete = url_delete.replace(0, row.id);
                            let html = `
                    <div>
                        <a href="${url_update}" data-toggle="modal" data-modal="derma_modal"
                            class="h-modal-trigger btn btn-primary">
                                        <div class="icon">
                                            <i class="lnil lnil-pencil-alt"></i>
                                        </div>
                        </a>
                    </div>
                `

                            return html;
                            ////}
                            //return data;
                        }
                    }
                ]
            })
            $('#add_patology_request').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $('#derma_modal div[class="modal-card"]').load(url, function() {
                    $('#derma_modal #salvar').on('click', function() {
                        $('#pathology_request_form').submit();
                    })
                    $('#pathology_request_form').on('submit', function(e) {
                        e.preventDefault();
                        url2 = $(this).attr('action')
                        var formData = new FormData(document.getElementById(
                            'pathology_request_form'));
                        $.ajax({
                            url: url2,
                            async: false,
                            data: $('#pathology_request_form')
                                .serializeArray(),
                            type: "post",
                            success: function(data) {
                                if (data.Success == true) {
                                    var table = $('#pathologies_request_table')
                                        .DataTable();
                                    $('#delete-modal').trigger('click')
                                    table.ajax.reload();
                                    // $('#derma_modal').removeClass('is-active')
                                    // toastr.success(data.message);
                                } else {
                                    // toastr.error(data.message);
                                }
                                return;
                            }
                        }).fail(function(request, status, aa, a) {
                            try {
                                let keys = Object.keys(request
                                    .responseJSON)
                                for (var i = 0; i < keys.length; i++) {
                                    for (var j = 0; j < request
                                        .responseJSON[keys[
                                            i]].length; j++) {
                                        toastr.error(
                                            `${keys[i]}: ${request.responseJSON[keys[i]][j]}`
                                        );
                                    }
                                }
                            } catch {
                                console.log(aa);
                            }
                        });
                        return false;
                    });
                    $('#delete-modal').on('click', function() {
                        $('#derma_modal').removeClass('is-active')
                    })

                });
            });
            var tabla_tem = $("#pathologies_request_table");
            tabla_tem.on('click', "a[data-toggle='modal']", function(e) {

                e.preventDefault();
                var url = $(this).attr('href');
                // let operation = $(this).data('operation');
                $('#derma_modal').addClass('is-active')
                $('#derma_modal div[class="modal-card"]').load(url, function() {
                    $('#derma_modal #salvar').on('click', function() {
                        $('#pathology_request_form').submit();
                    })
                    $('#pathology_request_form').on('submit', function(event) {
                        event.preventDefault();
                        var $form = $(this);
                        url2 = $(this).attr('action')
                        var formData = new FormData(document.getElementById(
                            'pathology_request_form'))
                        $.ajax({
                            url: url2,
                            async: false,
                            data: $('#pathology_request_form').serializeArray(),
                            type: "post",
                            success: function(data) {
                                var table = $('#pathologies_request_table')
                                    .DataTable();
                                $('#delete-modal').trigger('click');
                                table.ajax.reload();
                                // $('#derma_modal').removeClass('is-active')
                                // toastr.success(data.message);

                                return;
                            }
                        }).fail(function(request, status, aa, a) {

                        });
                        return false;
                    });
                    $('#delete-modal').on('click', function() {
                        $('#derma_modal').removeClass('is-active')
                    })
                });

            });
        });
    </script>
@endsection

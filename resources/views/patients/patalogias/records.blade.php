@extends('layouts.app')
@section('content')
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
        <div class="demo-card has-more-margin">
            <div class="demo-title">
				<div class="form-head stuck-header">
					<div class="form-head-inner">
						<h3 class="title is-thin is-5">Paciente No. <?= $o->document_number ?> - Historial de <?= $c_names ?> <a target="_blank" href="<?= url($menu.'/records') ?>" class="button h-button is-primary is-rounded is-elevated" style="float: right;"><span class="icon"><i class="fas fa-download"></i></span> <span>Descargar historial</span></a></h3>
					</div>
				</div>
            </div>
        </div>
        <div class="card mt-5">
            <header class="card-header">
                <p class="card-header-title">Solicitudes de patologías</p>
            </header>
            <div class="card-content">
                <div class="content">
                    {{-- Pathologies request --}}
                    <table id="pathologies_request_table" class="table is-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>UUID</th>
                                <th>Consulta</th>
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
@endsection
@section('js')
    @parent
    <script>
        $(document).ready(function(){
           var table = $('#pathologies_request_table').DataTable({
            ordering: false,
            "order": [[2, 'desc']],
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
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({page: 'current'}).nodes();
                var last = null;

                api.column(2, {page: 'current'}).data().each(function (group, i) {
                    if (group !==null) {
                        if (last !== `${group.date_quote} ${group.time_quote}`) {
                            console.log(group)
                            $(rows).eq(i).before(
                                '<tr class="group" style="background:grey"><td style="color:white !important;" colspan="6">' + `${group.date_quote} ${group.time_quote}` + '</td></tr>'
                            );

                            last = `${group.date_quote} ${group.time_quote}`;
                        }
                    }
                });
            },
            "ajax": {
                "url": `/patalogias/patology_request`,
                "type": 'POST',
                "data": {
                    _token: $("input[name='_token']").val()
                }
            },
            "columns": [
                {
                    "data": "id"
                },
                {
                    "data": "uuid",
                },
                {
                    "data": "appointments",
                    render: function (data, type, row) {

                        return data ? `${data.date_quote} ${data.time_quote}` : '';
                    }
                },
                {
                    "data": "doctor_class",
                    render: function (data, type, row) {
                        return data ? data.name : '';
                    }
                },
                {
                    "data": "pathologies",
                    render: function (data, type, row) {
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
                    render: function (data, type, row) {
                        return data ? data : '';
                    }
                },
                {
                    "data": "created_at",
                    render: function (data, type, row) {
                        let fechaActual = new Date(data);
                        let fechaFormateada = fechaActual.toLocaleDateString()
                        return fechaFormateada;
                    }
                },
                {
                    "data": "buttons",
                    render: function (data, type, row) {
                        let url_update =
                            `patalogias/hcpdf/${row.uuid}`;
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
                    }
                }
            ]
        })
    });
    </script>
@endsection

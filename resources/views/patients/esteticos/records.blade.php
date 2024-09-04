@extends('layouts.app')
@section('content')
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
        <div class="demo-card has-more-margin">
            <div class="demo-title">
				<div class="form-head stuck-header">
					<div class="form-head-inner">
						<h3 class="title is-thin is-5">Historial de consultas <a target="_blank" href="<?= url($menu.'/records') ?>" class="button h-button is-primary is-rounded is-elevated" style="float: right;"><span class="icon"><i class="fas fa-download"></i></span> <span>Descargar historial</span></a></h3>
					</div>
				</div>
            </div>
        </div>
        <div class="card mt-5">
            <header class="card-header">
                <p class="card-header-title">Biosias</p>
            </header>
            <div class="card-content">
                <div class="content">
                    {{-- Request exams --}}
                    <table id="biopsie_table" class="table is-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>UUID</th>
                                <th>Consulta</th>
                                <th>Tipo Consulta</th>
                                <th>Medico que atendió</th>
                                <th>Sede</th>
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
           var table = $('#biopsie_table').DataTable({
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
            ],
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({page: 'current'}).nodes();
                var last = null;

                api.column(2, {page: 'current'}).data().each(function (group, i) {
                    if (group !==null) {
                        if (last !== `${group.date_quote} ${group.time_quote}`) {
                            $(rows).eq(i).before(
                                '<tr class="group" style="background:grey"><td style="color:white !important;" colspan="6">' + `${group.date_quote} ${group.time_quote}` + '</td></tr>'
                            );

                            last = `${group.date_quote} ${group.time_quote}`;
                        }
                    }
                });
            },
            "ajax": {
                "url": `/biopsias/biopsies`,
                "type": 'POST',
                "data": {
                    _token: $("input[name='_token']").val(),
                    hc_type: 'Procedimientos Estéticos'
                }
            },
            "columns": [{
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
                "data": "hc_type",
                render: function (data, type, row) {
                    console.log(row)
                    return data ;
                }
            },
            {
                "data": "doctor_class",
                render: function (data, type, row) {

                    return `${data.name} ${data.lastname}`;
                }
            },
            {
                // "data": "doctor_class",
                render: function (data, type, row) {

                    return `${row.appointments.campus_class.name}`;
                }
            },
            {
                "data": "buttons",
                render: function (data, type, row) {
                    let url_update =
                        `esteticos/hcpdf/${row.uuid}`;
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

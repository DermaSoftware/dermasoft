$(function () {

    $('#examns_request_btn').on('click', function () {

        if ($('#exams_request_table').length > 0) {
            $('#exams_request_table').DataTable().destroy();
        }
        var table = $('#exams_request_table').DataTable({
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
                "url": `/clinichistory/exam_request/${derma_id}/${appointment}`,
                "type": 'GET',
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
                "data": "doctor_class",
                render: function (data, type, row) {
                    return data ? data.name : '';
                }
            },
            {
                "data": "laboratoryexams",
                render: function (data, type, row) {
                    console.log(data)
                    var html = '<ul>';
                    data.forEach(element => {
                        html += `<li>
                                    <div style="display: flex;flex-direction: column;box-shadow: 0px 25px 20px -20px rgba(0, 0, 0, 0.45);
                                    padding: 5px;
                                    font-size: 10px;">
                                        <span>
                                            Exámen: ${element.name} - ${element.description}
                                        </span>
                                    </div>
                                </li>
                        `
                    });
                    html+= '</ul>';
                    return html;
                }
            },
            {
                "data": "total",
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
                render: function (data, type, row) {
                    let derm = derma_id;
                    let url_update =
                        `/clinichistory/exam_request/${derm}/${row.id}/${appointment}/edit`;
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
        $('#add_exam_request').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $('#derma_modal div[class="modal-card"]').load(url, function () {
                $('#derma_modal #salvar').on('click',function(){
                    $('#salvar').hide();
                    $('button.is-loading').removeClass('is-hidden');
                    setTimeout(function(){
                        $('#exam_request_form').submit();
                    },10)

                })
                $('#exam_request_form').on('submit', function (e) {
                    e.preventDefault();
                    url2 = $(this).attr('action');
                    var formData = new FormData(document.getElementById(
                        'exam_request_form'));
                    $.ajax({
                        url: url2,
                        async: false,
                        data: $('#exam_request_form')
                            .serializeArray(),
                        type: "post",
                        success: function (data) {
                            $('button.is-loading').addClass('is-hidden');
                            $('#salvar').show();
                            if (data.Success == true) {
                                var table = $('#exams_request_table')
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
                    }).fail(function (request, status, aa, a) {
                        $('button.is-loading').addClass('is-hidden');
                            $('#salvar').show();
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
                            $('button.is-loading').addClass('is-hidden');
                            $('#salvar').show();
                            console.log(aa);
                        }
                    });
                    return false;
                });
                $('#delete-modal').on('click', function () {
                    $('#derma_modal').removeClass('is-active')
                })

            });
        });
        var tabla_tem = $("#exams_request_table");
        tabla_tem.on('click', "a[data-toggle='modal']", function (e) {

            e.preventDefault();
            var url = $(this).attr('href');
            // let operation = $(this).data('operation');
            $('#derma_modal').addClass('is-active')
            $('#derma_modal div[class="modal-card"]').load(url, function () {
                $('#derma_modal #salvar').on('click',function(){
                    $('#salvar').hide();
                    $('button.is-loading').removeClass('is-hidden');
                    setTimeout(function(){
                        $('#exam_request_form').submit();
                    },10)
                })
                $('#exam_request_form').on('submit', function (event) {
                    event.preventDefault();
                    var $form = $(this);
                    url2 = $(this).attr('action');

                    var formData = new FormData(document.getElementById('exam_request_form'))
                    $.ajax({
                        url: url2,
                        async: false,
                        data: $('#exam_request_form').serializeArray(),
                        type: "post",
                        success: function (data) {
                            $('button.is-loading').addClass('is-hidden');
                            $('#salvar').show();
                            var table = $('#exams_request_table').DataTable();
                            $('#delete-modal').trigger('click');
                            table.ajax.reload();
                            // $('#derma_modal').removeClass('is-active')
                            // toastr.success(data.message);

                            return;
                        }
                    }).fail(function (request, status, aa, a) {
                        $('button.is-loading').addClass('is-hidden');
                            $('#salvar').show();
                    });
                    return false;
                });
                $('#delete-modal').on('click', function () {
                    $('#derma_modal').removeClass('is-active')
                })
            });

        });

    });

});

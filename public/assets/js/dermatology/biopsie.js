
$(function () {

    $('#biop_tab').on('click', function () {
        if ($('#biopsie_table').length > 0) {
            $('#biopsie_table').DataTable().destroy();
        }
        var table = $('#biopsie_table').DataTable({
            ordering: true,
            paging: true,
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
            {
                searchable: false,
                "targets": [4]
            },
            {
                orderable: false,
                targets: [4]
            },
            {
                className: 'is-end',
                targets: 4
            },
                //{className: 'text-center', targets: [3, 4, 8, 10, 11, 19]},
                //{searchable: false, targets: [0,4]},
                //{orderable: false, targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]}
                //{responsivePriority: 1, targets: [0,15]},
                //{responsivePriority: 2, targets: [0,1,2, 4,7,8,10,15]},
            ],
            "ajax": {
                "url": `/clinichistory/biops/${derma_id}/${appointment}`,
                "type": 'GET',
            },
            "columns": [{
                "data": "id"
            },
            {
                "data": "uuid",
            },
            {
                "data": "type_procedure_class",
                render: function (data, type, row) {
                    return data ? data.description : '';
                }
            },
            {
                "data": "diagnostic",
                render: function (data, type, row) {
                    return data ? data.diagnostic : '';
                }
            },
            {
                "data": "hcsuture",
                render: function (data, type, row) {
                    console.log(data)
                    var html = '<ul>';
                    data.forEach(element => {
                        html += `<li>
                                    <div style="display: flex;flex-direction: column;box-shadow: 0px 25px 20px -20px rgba(0, 0, 0, 0.45);
                                    padding: 5px;
                                    font-size: 12px;">
                                        <span>
                                            Sutura: ${element.suture_type}
                                        </span>
                                        <span>
                                            Calibre: ${element.caliber}
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
            // {
            //     "data": "buttons",
            //     render: function (data, type, row) {
            //         let derm = derma_id;
            //         let url_update =
            //             `/clinichistory/biopsies/${derm}/${row.id}/edit`;
            //         // let url_delete = `{% url 'nomenclador:delete_anexo' 0 %}`;
            //         // url_update = url_update.replace(0, row.id);
            //         // url_delete = url_delete.replace(0, row.id);
            //         let html = `
            //         <div>
            //             <a href="${url_update}" data-toggle="modal" data-modal="derma_modal"
            //                 class="h-modal-trigger btn btn-primary">
            //                             <div class="icon">
            //                                 <i class="lnil lnil-pencil-alt"></i>
            //                             </div>
            //             </a>
            //         </div>
            //     `

            //         return html;
            //         ////}
            //         //return data;
            //     }
            // }
            ]
        })
        $('#add_biop').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $('#derma_modal div[class="modal-card"]').load(url, function () {
                $('#derma_modal #salvar').on('click',function(){
                    $('#biopsie_form').submit();
                })
                $('#biopsie_form').on('submit', function (e) {
                    e.preventDefault();
                    url2 = $(this).attr('action')
                    var formData = new FormData(document.getElementById(
                        'biopsie_form'));
                    $.ajax({
                        url: url2,
                        async: false,
                        data: $('#biopsie_form')
                            .serializeArray(),
                        type: "post",
                        success: function (data) {
                            if (data.Success == true) {
                                var table = $('#biopsie_table')
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
                $('#delete-modal').on('click', function () {
                    $('#derma_modal').removeClass('is-active')
                })

            });
        });
        var tabla_tem = $("#biopsie_table");
        tabla_tem.on('click', "a[data-toggle='modal']", function (e) {

            e.preventDefault();
            var url = $(this).attr('href');
            // let operation = $(this).data('operation');
            $('#derma_modal').addClass('is-active')
            $('#derma_modal div[class="modal-card"]').load(url, function () {
                $('#derma_modal #salvar').on('click',function(){
                    $('#biopsie_form').submit();
                })
                $('#biopsie_form').on('submit', function (event) {
                    event.preventDefault();
                    var $form = $(this);
                    url2 = $(this).attr('action')
                    var formData = new FormData(document.getElementById('biopsie_form'))
                    $.ajax({
                        url: url2,
                        async: false,
                        data: $('#biopsie_form').serializeArray(),
                        type: "post",
                        success: function (data) {
                            $('#delete-modal').trigger('click');
                            var table = $('#biopsie_table').DataTable();
                            table.ajax.reload();
                            // $('#derma_modal').removeClass('is-active')
                            // toastr.success(data.message);

                            return;
                        }
                    }).fail(function (request, status, aa, a) {

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

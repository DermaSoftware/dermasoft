<header class="modal-card-head">
    <p class="modal-card-title">Agregar</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="procedure_request_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="columns is-multiline">
						<!--Field-->
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<label>Diagnóstico</label>
									<select id="hcdermdiagnostics_id" name="hcdermdiagnostics_id" class="input select2_fsc">
										<?php foreach($diagnoses as $key_sel => $row_sel){ ?>
										<option value="{{$row_sel->id}}">{{$row_sel->code}} - {{$row_sel->diagnostic}}</option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
                        <div class="column is-12">
							<hr>
						</div>
						<!--Field-->
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<label>Procedimiento</label>
									<select class="input prods_f1 select2_fsc">
										<?php foreach($o_procs as $key_sel => $row_sel){ ?>
										<option value="<?= $row_sel->id ?>"><?= $row_sel->name ?> - <?= $row_sel->description ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<label>Observaciones</label>
									<textarea rows="2" class="textarea prods_f2" placeholder="Observaciones" ></textarea>
								</div>
							</div>
						</div>
						<div class="column is-12">
							<a href="javascript:void(0)" class="button h-button is-primary is-dark-outlined btn_add_procedure">Agregar</a>
						</div>
						<div class="column is-12">
							<hr>
						</div>

						<div class="column is-12 inner_table_prods <?= !isset($procedure_request) ? 'is-hidden' : '' ?>">
							<div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
								<h4 class="title is-5 is-narrow">Procedimientos seleccionados</h4>
								<table class="table is-hoverable is-fullwidth table_procedure">
									<tbody>
										<tr>
											<th>Procedimiento</th>
											<th>Observaciones</th>
											<th class="is-end">
												<div class="dark-inverted">
													Eliminar
												</div>
											</th>
										</tr>
                                        @isset($procedure_request)
                                            @foreach ($procedure_request->procedures as $item)
                                                <tr>
                                                    <td><input type="hidden" name="procedure[]"
                                                            value="{{ $item->id }}">{{ $item->name }} - {{ $item->description }}</td>

                                                    <td><input type="hidden" name="note[]">{{ $item->pivot->note }}</input></td>
                                                    <td class="is-end">
                                                        <div><button type="button"
                                                                class="button is-danger is-circle is-elevated btn_rprod_trash"><span
                                                                    class="icon is-small"><i
                                                                        class="fas fa-trash"></i></span></button></div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
									</tbody>
								</table>
							</div>
						</div>
						<div class="column is-12">
							<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="notification_email" type="checkbox" value="yes"><span></span> Enviar al correo del paciente</label></div></div>
							<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="notification_whatsapp" type="checkbox" value="yes"><span></span> Enviar al whatsapp del paciente</label></div></div>
						</div>

					</div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal-card-foot is-end">
    <div  class="buttons">
        <button id="salvar" type="submit" class="button is-success">Salvar</button>
        <button class="button is-success is-loading is-hidden">Loading</button>
    </div>
</div>


<script>
    $(function() {
        $(function() {
            if ($(".select2_fsc").length) {
                $('.select2_fsc').each(function() {
                    $(this).select2({
                        theme: "classic",
                    });
                });
            }
        })
        $('.btn_rprod_trash').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', function () {
                            btn.parent().parent().parent().remove();
                        });
        });
        if ($('.btn_add_procedure').length) {
                $('.btn_add_procedure').on('click', function () {
                    if ($('.inner_table_prods').hasClass('is-hidden')) {
                        $('.inner_table_prods').removeClass('is-hidden');
                    }
                    const x_f1 = '<td><input type="hidden" name="procedure[]" value="' + $('.prods_f1').val() + '">' + $('.prods_f1 option:selected').html() + '</td>';
                    const x_f2 = '<td><input type="hidden" name="note[]" value="' + $('.prods_f2').val() + '">' + $('.prods_f2').val() + '</td>';
                    const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_rprod_trash"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                    const item = '<tr>' + x_f1 + x_f2 + x_trash + '</tr>';
                    $('.table_procedure tbody').append(item);
                    $('.prods_f1').val('');
                    $('.prods_f2').val('');
                    trash_prods_all();
                });

                function trash_prods_all() {
                    $('.btn_rprod_trash').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', function () {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
    })
</script>

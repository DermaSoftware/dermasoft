<header class="modal-card-head">
    <p class="modal-card-title">Agregar</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="exam_request_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="columns is-multiline">
						<!--Field-->
						<div class="column is-12">
                                <div class="columns">
                                    <div class="column is-5">
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
                                </div>
						</div>
                        <div class="column is-12">
                            <hr>
                        </div>
						<!--Field-->
						<div class="column is-10">
							<div class="field">
								<div class="control">
									<label>Examen</label>
									<select class="input inpeo_exam select2_fsc">
										<option value="0" selected disabled >--Seleccione--</option>
										<?php foreach($o_labexams as $key_sel => $row_sel){ ?>
										<option value="<?= $row_sel->id ?>"><?= $row_sel->name ?> - <?= $row_sel->description ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="column is-2">
							<div>&nbsp;</div>
							<a href="javascript:void(0)" class="button h-button is-primary is-dark-outlined btn_add_eoexam">Agregar</a>
						</div>

						<div class="column is-12">


							<div class="inner_table_eo_exams <?= !isset($exam) ? 'is-hidden' : '' ?>">
								<h2 class="title is-thin is-5" style="margin: 0;">Solicitud de examenes</h2>
								<div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
									<table class="table is-hoverable is-fullwidth table_exams">
										<tbody>
											<tr>
												<th>Examen</th>
												<th class="is-end">
													<div class="dark-inverted">
														Eliminar
													</div>
												</th>
											</tr>
                                            @isset($exam)
                                            @foreach ($exam->laboratoryexams as $item)
                                                <tr>
                                                    <td><input type="hidden" name="solexams_exam[]"
                                                            value="{{ $item->id }}">{{ $item->name }} - {{ $item->description }}</td>
                                                    <td class="is-end">
                                                        <div><button type="button"
                                                                class="button is-danger is-circle is-elevated btn_exams_trash"><span
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
						</div>

						<div class="column is-12">
							<hr>
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
        $('.btn_exams_trash').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', () => {
                            btn.parent().parent().parent().remove();
                        });
                    });
        if ($('.btn_add_eoexam').length) {
                $('.btn_add_eoexam').on('click', function () {
                    if ($('.inner_table_eo_exams').hasClass('is-hidden')) {
                        $('.inner_table_eo_exams').removeClass('is-hidden');
                    }
                    const x_f1 = '<td><input type="hidden" name="solexams_exam[]" value="' + $('.inpeo_exam').val() + '">' + $('.inpeo_exam option:selected').html() + '</td>';
                    const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_exams_trash"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                    const item = '<tr>' + x_f1 + x_trash + '</tr>';
                    $('.table_exams tbody').append(item);
                    $('.inpeo_exam').val('');
                    trash_eoexams_all();
                });

                function trash_eoexams_all() {
                    $('.btn_exams_trash').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', () => {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
        })
</script>

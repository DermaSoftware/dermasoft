<header class="modal-card-head">
    <p class="modal-card-title">Agregar</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="pathology_request_form" action="{{ url($post_url) }}" method="post" class="modal-form">
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
                                        @isset($pathology)
                                            <option <?= $pathology->hcdermdiagnostics_id === $row_sel->id ? 'selected' : '' ?>  value="{{$row_sel->id}}">{{$row_sel->code}} - {{$row_sel->diagnostic}}</option>
                                        @endisset
										<option value="{{$row_sel->id}}">{{$row_sel->code}} - {{$row_sel->diagnostic}}</option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
                        <div class="column is-12">
							<hr>
						</div>
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<label>Patología</label>
									<select class="input pths_f1 select2_fsc">
										<option value="" data-code="" data-note="" selected disabled>--Seleccione--</option>
										<?php foreach($o_paths as $key_sel => $row_sel){ ?>
										<option value="<?= $row_sel->id ?>" data-code="<?= $row_sel->name ?>" data-note="<?= $row_sel->description ?>"><?= $row_sel->name ?> - <?= $row_sel->description ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<label>Origen de la muestra</label>
									<textarea rows="2" class="textarea pths_f2" placeholder="Origen de la muestra" ></textarea>
								</div>
							</div>
						</div>
						<div class="column is-12">
							<a href="javascript:void(0)" class="button h-button is-primary is-dark-outlined btn_add_pthologies">Agregar</a>
						</div>
						<div class="column is-12">
							<hr>
						</div>

						<div class="column is-12 inner_table_pths <?= !isset($pathology) ? 'is-hidden' : '' ?>">
							<div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
								<h4 class="title is-5 is-narrow">Patologías seleccionadas</h4>
								<table class="table is-hoverable is-fullwidth table_pthologies">
									<tbody>
										<tr>
											<th>Código</th>
											<th>Patología</th>
											<th>Origen</th>
											<th class="is-end">
												<div class="dark-inverted">
													Eliminar
												</div>
											</th>
										</tr>
                                        @isset($pathology)
                                            @foreach ($pathology->pathologies as $item)
                                                <tr>
                                                    <td><input type="hidden" name="code[]"
                                                            value="{{ $item->id }}">{{ $item->name }}</td>
                                                    <td><input type="hidden" name="pathologie[]"
                                                            value="{{ $item->description }}">{{ $item->description }}</td>

                                                    <td><input type="hidden" name="note[]">{{ $item->pivot->note }}</input></td>
                                                    <td class="is-end">
                                                        <div><button type="button"
                                                                class="button is-danger is-circle is-elevated btn_pathology_trash"><span
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

						<!--Field-->
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<?php $t_att = 'annexes'; ?>
									<?php $n_att = 'Observaciones y/o anexos'; ?>
									<label><?= $n_att ?></label>
									<textarea name="<?= $t_att ?>" rows="2" class="textarea" placeholder="<?= $n_att ?>" >
                                        @isset($pathology)
                                        {{$pathology->annexes}}
                                        @endisset
                                    </textarea>
								</div>
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
        $('.btn_pathology_trash').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', function () {
                            btn.parent().parent().parent().remove();
                        });
                    });
        if ($('.btn_add_pthologies').length) {
                $('.btn_add_pthologies').on('click', function () {
                    debugger
                    var code = $('.pths_f1 option:selected').data('code');
                    var note = $('.pths_f1 option:selected').data('note');
                    if (code == null || code == '') {
                        alert('Debe elejir una patología');
                        return false;
                    }
                    if ($('.inner_table_pths').hasClass('is-hidden')) {
                        $('.inner_table_pths').removeClass('is-hidden');
                    }
                    const x_f1 = '<td><input type="hidden" name="code[]" value="' + $('.pths_f1 option:selected').val() + '">' + code + '</td>';
                    const x_f2 = '<td><input type="hidden" name="pathologie[]" value="' + note + '">' + note + '</td>';
                    const x_f3 = '<td><input type="hidden" name="note[]" value="' + $('.pths_f2').val() + '">' + $('.pths_f2').val() + '</td>';
                    const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_prods_trash"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                    const item = '<tr>' + x_f1 + x_f2 + x_f3 + x_trash + '</tr>';
                    $('.table_pthologies tbody').append(item);
                    $('.pths_f1').val('');
                    $('.pths_f2').val('');
                    trash_pths_all();
                });

                function trash_pths_all() {
                    $('.btn_pathology_trash').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', function () {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
    })
</script>

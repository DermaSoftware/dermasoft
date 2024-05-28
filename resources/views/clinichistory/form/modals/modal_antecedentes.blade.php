<header class="modal-card-head">
    <p class="modal-card-title">Agregar Antecedente</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="backgrouns_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">


            <div class="field is-vertical">
                <div class="field-body">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <label class="label">Tipo de antecedente</label>
                                    <select name="type_id" class="input modal_f1_med">
                                        {{-- <option value="0" selected disabled>--Seleccione--</option> --}}
                                        <?php foreach($types as $key_sel => $row_sel){ ?>
                                        @isset($obj)
                                            <option value="<?= $row_sel->id ?>"
                                                <?= $obj->type_id == $key_sel ? 'selected' : '' ?>>
                                                <?= $row_sel->name ?>
                                            </option>
                                        @endisset
                                        @empty($obj)
                                            <option value="<?= $row_sel->id ?>"><?= $row_sel->name ?></option>
                                        @endempty
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'resumen'; ?>
                                    <?php $n_att = 'Resumen'; ?>
                                    <label class="label">{{ $n_att }}</label>
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= isset($obj) ? $obj->$t_att : '' ?></textarea>
                                    {{-- <textarea name="resumen" class="input" type="text" placeholder="Dosis" value="" /> --}}
                                </div>
                            </div>
                        </div>
                        <div class="column is-12">
							<a href="javascript:void(0)" class="button h-button is-primary is-dark-outlined btn_add_procedure">Agregar</a>
						</div>
                        <div class="column is-12">
							<hr>
						</div>
                        <div class="column is-12 inner_table_prods">
							<div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
								<h4 class="title is-5 is-narrow">Antecedentes seleccionados</h4>
								<table class="table is-hoverable is-fullwidth table_procedure">
									<tbody>
										<tr>
											<th>Tipo</th>
											<th>Resumen</th>
											<th class="is-end">
												<div class="dark-inverted">
													Eliminar
												</div>
											</th>
										</tr>
                                        {{-- @isset($procedure_request)
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
                                        @endisset --}}
									</tbody>
								</table>
							</div>
						</div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
<div class="modal-card-foot is-end">
    <div class="buttons">
        <button id="salvar" type="submit" class="button is-success">Salvar</button>
        <button class="button is-success is-loading is-hidden">Loading</button>
    </div>
</div>
<script>
    $(function() {

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
                    if($('textarea[name="resumen"]').val() == ''){
                        alert('No puede haber campos vacios.')
                    }
                    else{
                        const x_f1 = '<td><input type="hidden" name="type[]" value="' + $('select[name="type_id"]').val() + '">' + $('select[name="type_id"] option:selected').html() + '</td>';
                        const x_f2 = '<td><input type="hidden" name="resumen[]" value="' + $('textarea[name="resumen"]').val() + '">' + $('textarea[name="resumen"]').val() + '</td>';
                        const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_rprod_trash"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                        const item = '<tr>' + x_f1 + x_f2 + x_trash + '</tr>';
                        $('.table_procedure tbody').append(item);
                        $('.prods_f1').val('');
                        $('.prods_f2').val('');
                        trash_prods_all();
                        $('textarea[name="resumen"]').val('');
                    }

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

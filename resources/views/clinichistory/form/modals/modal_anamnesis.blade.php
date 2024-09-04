<header class="modal-card-head">
    <p class="modal-card-title">Agregar</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="anamnesis_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="columns is-multiline">

                        @if ($hc_type === 'Dermatología general Control')
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'evoluction'; ?>
                                    <?php $n_att = 'Evolucón'; ?>
                                    <label><?= $n_att ?></label>
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($hc_type === 'Dermatología general')
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'reason'; ?>
                                    <?php $n_att = 'Motivo de la consulta'; ?>
                                    <label><?= $n_att ?></label>
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'current_illness'; ?>
                                    <?php $n_att = 'Enfermedad actual'; ?>
                                    <label><?= $n_att ?></label>
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'system_revition'; ?>
                                    <?php $n_att = 'Revisión por sistema'; ?>
                                    <label><?= $n_att ?></label>
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!--Field-->
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'physical_exam'; ?>
                                    <?php $n_att = 'Examen físico'; ?>
                                    <label><?= $n_att ?></label>
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'analysis'; ?>
                                    <?php $n_att = 'Análisis y/u observaciones'; ?>
                                    <label><?= $n_att ?></label>
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
                                </div>
                            </div>
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
        if ($(".select2_fsc").length) {
                $('.select2_fsc').each(function () {
                    $(this).select2({
                        theme: "classic",
                    });
                });
            }
        if ($('.btn_add_surgical').length) {
                $('.btn_add_surgical').on('click', function (e) {
                    e.preventDefault();
                    if ($('.box_surgical').hasClass('is-hidden')) {
                        $('.box_surgical').removeClass('is-hidden');
                    }
                    var base = '<div class="columns is-multiline">';

                    base += '<div class="column is-2">';
                    base += '<div class="field"><div class="control"><label>Tumores</label>';
                    base += '<select name="tumors[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    base += '<option value="Si">Si</option>';
                    base += '<option value="No">No</option>';
                    base += '</select></div></div></div>';
                    //
                    base += '<div class="column is-2"><div class="field"><div class="control">';
                    base += '<label>Tamaño</label>';
                    base += '<input name="size[]" type="text" class="input" placeholder="Tamaño" />';
                    base += '</div></div></div>';
                    //
                    base += '<div class="column is-2"><div class="field"><div class="control">';
                    base += '<label>Margen</label>';
                    base += '<input name="margin[]" type="text" class="input" placeholder="Margen" />';
                    base += '</div></div></div>';
                    //
                    base += '<div class="column is-2"><div class="field"><div class="control">';
                    base += '<label>Patología</label>';
                    base += '<input name="pathology[]" type="text" class="input" placeholder="Patología" />';
                    base += '</div></div></div>';
                    //
                    base += '<div class="column is-4"><div class="field"><div class="control">';
                    base += '<label>Observaciones</label>';
                    base += '<input name="observations[]" type="text" class="input" placeholder="Observaciones" />';
                    base += '</div></div></div>';

                    base += '</div>';

                    $('.box_surgical').append(base);
                });
            }
        if ($('.fl_sel_parent_valid').length) {
                $('.fl_sel_parent_valid').each(function (i, v) {
                    var item = $(this);
                    var parent = item.data('xparent');
                    var box = item.data('box');
                    var option = item.data('option');
                    $(parent).on('change', function (e) {
                        const op = $(parent).find('option:selected');
                        if (op.data('val') == option) {
                            $(box).removeClass('is-hidden');
                        } else {
                            $(box).addClass('is-hidden');
                        }
                    });
                });
            }
            if ($('.fl_sel_parent_disb').length) {
                $('.fl_sel_parent_disb').each(function (i, v) {
                    var item = $(this);
                    var parent = item.data('xparent');
                    var option = item.data('option');
                    const opt = $(parent).val();
                    const p = opt != option;
                    item.prop('disabled', p);
                    $(parent).on('change', function (e) {
                        const op = $(parent).val();
                        const pt = op != option;
                        item.prop('disabled', pt);
                    });
                });
            }

    })
</script>

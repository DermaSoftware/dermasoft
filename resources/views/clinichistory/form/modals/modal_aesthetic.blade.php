<header class="modal-card-head">
    <p class="modal-card-title">Agregar</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="aesthetic_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="columns is-multiline">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'diagnostic_id'; ?>
                                        <?php $n_att = 'Diagnostico'; ?>
                                        <label><?= $n_att ?></label>
                                        <select name="<?= $t_att ?>" class="input select2_fsc">
                                            <option value="" selected disabled>Diagnostico</option>
                                            <?php foreach($diagnoses as $key => $row){ ?>
                                            <option value="<?= $row->id ?>">
                                                <?= empty($row->skin_phototype) ? $row->diagnostic  : $row->diagnostic . ' - ' . $row->skin_phototype ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12"><hr></div>
                            <?php $face = (!empty($o->gender) AND $o->gender == 'Femenino')?2:1; ?>
                            <div class="column is-12">
                                <h3>Tratamiento</h3>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'product_name'; ?>
                                        <?php $n_att = 'Nombre del producto'; ?>
                                        <label><?= $n_att ?></label>
                                        <input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'lot'; ?>
                                        <?php $n_att = 'Lote No.'; ?>
                                        <label><?= $n_att ?></label>
                                        <input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'dilution'; ?>
                                        <?php $n_att = 'Dilución'; ?>
                                        <label><?= $n_att ?></label>
                                        <input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'injectable'; ?>
                                        <?php $n_att = 'Concentración de inyectable'; ?>
                                        <label><?= $n_att ?></label>
                                        <input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'muscle'; ?>
                                        <?php $n_att = 'Músculo'; ?>
                                        <label><?= $n_att ?></label>
                                        <select name="<?= $t_att ?>[]" class="input">
                                            <option value="" selected disabled >--Seleccione--</option>
                                            <?php $options = ['Corrugador', 'Frontal', 'Procerus', 'Orbicular de ojo derecho', 'Orbicular de ojo izquierdo', 'Orbicular subpalpebral derecho', 'Orbicular subpalpebral Izquierdo', 'Región nasal', 'Orbicular de los labios', 'Platisma', 'Región del mentón']; ?>
                                            <?php $select_old = $is_records and isset($o_hcp) ? $o_hcp->$t_att:''; ?>
                                            <?php foreach($options as $key => $row){ ?>
                                            <option value="<?= $row ?>"><?= $row ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'units'; ?>
                                        <?php $n_att = 'Unidades administradas'; ?>
                                        <label><?= $n_att ?></label>
                                        <input name="<?= $t_att ?>[]" type="number" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12 box_treatment is-hidden"></div>
                            <div class="column is-12">
                                <a href="javascript:void(0)" class="button h-button is-primary is-dark-outlined btn_add_treatment_fsc">Agregar</a>
                            </div>
                            <div class="column is-12"><hr></div>
                            <div class="column is-12">
                                <h3>Procedimiento</h3>
                            </div>
                            <!--Field-->
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'complications'; ?>
                                        <?php $n_att = 'Complicaciones'; ?>
                                        <label><?= $n_att ?></label>
                                        <select name="<?= $t_att ?>" class="input sel_complications">
                                            <option value="" selected disabled >--Seleccione--</option>
                                            <?php $options = ['Si','No']; ?>
                                            <?php $select_old = $is_records and isset($o_hcp)?$o_hcp->$t_att:''; ?>
                                            <?php foreach($options as $key => $row){ ?>
                                            <option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'record_complications'; ?>
                                        <?php $n_att = 'Registro de complicaciones presentadas'; ?>
                                        <label><?= $n_att ?></label>
                                        <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_complications" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'participants'; ?>
                                        <?php $n_att = 'Datos de quienes participaron en el procedimiento'; ?>
                                        <label><?= $n_att ?></label>
                                        <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records and isset($o_hcp)?$o_hcp->$t_att:'' ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'comments'; ?>
                                        <?php $n_att = 'Comentarios adicionales'; ?>
                                        <label><?= $n_att ?></label>
                                        <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records and isset($o_hcp)?$o_hcp->$t_att:'' ?></textarea>
                                    </div>
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
        if ($('.btn_add_treatment_fsc').length) {
                $('.btn_add_treatment_fsc').on('click', function (e) {
                    e.preventDefault();
                    if ($('.box_treatment').hasClass('is-hidden')) {
                        $('.box_treatment').removeClass('is-hidden');
                    }
                    var base = '<div class="columns is-multiline">';
                    base += '<div class="column is-12"><hr></div>';
                    base += `<div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'product_name'; ?>
                                        <?php $n_att = 'Nombre del producto'; ?>
                                        <label><?= $n_att ?></label>
                                        <input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'lot'; ?>
                                        <?php $n_att = 'Lote No.'; ?>
                                        <label><?= $n_att ?></label>
                                        <input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'dilution'; ?>
                                        <?php $n_att = 'Dilución'; ?>
                                        <label><?= $n_att ?></label>
                                        <input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'injectable'; ?>
                                        <?php $n_att = 'Concentración de inyectable'; ?>
                                        <label><?= $n_att ?></label>
                                        <input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                    </div>
                                </div>
                            </div>`;
                    base += '<div class="column is-6">';
                    base += '<div class="field"><div class="control"><label>Músculo</label>';
                    base += '<select name="muscle[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    var xoptions = ['Corrugador', 'Frontal', 'Procerus', 'Orbicular de ojo derecho', 'Orbicular de ojo izquierdo', 'Orbicular subpalpebral derecho', 'Orbicular subpalpebral Izquierdo', 'Región nasal', 'Orbicular de los labios', 'Platisma', 'Región del mentón'];
                    xoptions.forEach(function (item) {
                        base += '<option value="' + item + '">' + item + '</option>';
                    });
                    base += '</select></div></div></div>';
                    //
                    base += '<div class="column is-6"><div class="field"><div class="control">';
                    base += '<label>Unidades administradas</label>';
                    base += '<input name="units[]" type="number" class="input" placeholder="Unidades administradas" />';
                    base += '</div></div></div>';

                    base += '</div>';

                    $('.box_treatment').append(base);
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

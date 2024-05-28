<header class="modal-card-head">
    <p class="modal-card-title">Agregar</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="appointments_reason_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'external_cause'; ?>
                                    <?php $n_att = 'Causa externa'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>" class="input">
                                        <option value="0" selected disabled >--Seleccione--</option>
                                        <?php $options = ['Enfermedad general','Enfermedad profesional','Accidente de trabajo','Accidente de tránsito','Accidente rábico','Accidente ofídico','Otro tipo de accidente','Evento catastrófico','Lesión por agresión','Lesión autoinflingida','Sospecha maltrato Físico','Sospecha abuso sexual','Sospecha violencia sexual','Sospecha maltrato emocional','Otra','Ninguna']; ?>
                                        <?php $select_old = $is_records?$o_derm->external_cause:''; ?>
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
                                    <?php $t_att = 'consultation_purpose'; ?>
                                    <?php $n_att = 'Finalidad consulta'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>" class="input">
                                        <option value="0" selected disabled >--Seleccione--</option>
                                        <?php $options = ['Ninguna','Atención parto (puerperlo)','Atención recién nacido','Atención planificación familiar','Detección alteración crecimiento y desarrollo','Detección alteración desarrollo joven','Detección alteración embarazo','Detección alteración adulto','Detección alteración agudeza visual','Detección enfermedad profesional','No aplica']; ?>
                                        <?php $select_old = $is_records?$o_derm->consultation_purpose:''; ?>
                                        <?php foreach($options as $key => $row){ ?>
                                        <option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
                                        <?php } ?>
                                    </select>
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

<header class="modal-card-head">
    <p class="modal-card-title">Agregar</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="surgical_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'prequest_nprocedure_id'; ?>
                                    <?php $n_att = 'Solicitud de procedimiento'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="prequest_nprocedure_id" class="input select2_fsc">
                                        {{-- <option value="" selected disabled>Diagnostico</option> --}}
                                        @foreach ($procedures_requests as $item)
                                            @foreach ($item->procedures as $procedure)
                                            <option value="<?= $procedure->pivot->id ?>">
                                                {{$procedure->name}} - {{$procedure->description}}
                                            </option>
                                            @endforeach
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-8">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'type_procedure'; ?>
                                    <?php $n_att = 'Tipo de procedimiento'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>" class="input type_procedure_sel">
                                        <option value="0" selected disabled >--Seleccione--</option>
                                        <?php foreach($o_procs as $key_sel => $row_sel){ ?>
                                        <option value="<?= $row_sel->id ?>" data-val="<?= $row_sel->description ?>"><?= $row_sel->name ?> <?= $row_sel->description ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-4">
                            <div class="field other_procedure_cll is-hidden">
                                <div class="control">
                                    <?php $t_att = 'other_procedure'; ?>
                                    <?php $n_att = 'Cual?'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_valid" data-xparent=".type_procedure_sel" data-box=".other_procedure_cll" data-option="Otro" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'disinfection'; ?>
                                    <?php $n_att = 'Desinfección'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>" class="input sel_disinfection">
                                        <option value="" selected disabled >--Seleccione--</option>
                                        <?php $options = ['SSN','Alcohol','Yodopovidona','Clorexidina','Otro antiséptico']; ?>
                                        <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
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
                                    <?php $t_att = 'antiseptic'; ?>
                                    <?php $n_att = 'Cual antiséptico?'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_disinfection" data-option="Otro antiséptico" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-2">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'anesthesia'; ?>
                                    <?php $n_att = 'Anestésia'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>" class="input sel_anesthesia">
                                        <option value="" selected disabled >--Seleccione--</option>
                                        <?php $options = ['Si','No']; ?>
                                        <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
                                        <?php foreach($options as $key => $row){ ?>
                                        <option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-5">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'type_anesthesia'; ?>
                                    <?php $n_att = 'Tipo de anestésia'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>" class="input fl_sel_parent_disb sel_type_anesthesia" data-xparent=".sel_anesthesia" data-option="Si">
                                        <option value="" selected disabled >--Seleccione--</option>
                                        <?php $options = ['Lidocaina al 1% con epinefrina','Lidocaina al 1% sin epinefrina','Lidocaina al 2% con epinefrina','Lidocaina al 2% sin epinefrina','Tópica','Otro']; ?>
                                        <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
                                        <?php foreach($options as $key => $row){ ?>
                                        <option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-5">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'other_anesthesia'; ?>
                                    <?php $n_att = 'Cual?'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_type_anesthesia" data-option="Otro" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                </div>
                            </div>
                        </div>


                        <!--Field-->
                        <div class="column is-12 biopsy_method_cll is-hidden">
                            <div class="columns is-multiline">
                                <!--Field-->
                                <div class="column is-6">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'biopsy_method'; ?>
                                            <?php $n_att = 'Método de biopsia'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="<?= $t_att ?>" class="input sel_biopsy_method fl_sel_parent_valid" data-xparent=".type_procedure_sel" data-box=".biopsy_method_cll" data-option="Biopsia">
                                                <option value="" selected disabled >--Seleccione--</option>
                                                <?php $options = ['Punch','Bisturí','Afeitado','Curetaje','Tijera','Saucerización','Otro']; ?>
                                                <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
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
                                            <?php $t_att = 'other_biopsy_method'; ?>
                                            <?php $n_att = 'Cual?'; ?>
                                            <label><?= $n_att ?></label>
                                            <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_biopsy_method" data-option="Otro" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="column is-6">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'biopsy_type'; ?>
                                            <?php $n_att = 'Tipo de biopsia'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="<?= $t_att ?>" class="input">
                                                <option value="" selected disabled >--Seleccione--</option>
                                                <?php $options = ['Incicional','Excisional']; ?>
                                                <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                <option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="column is-3">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'required_margin'; ?>
                                            <?php $n_att = 'Requirió margen'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="<?= $t_att ?>" class="input sel_required_margin">
                                                <option value="" selected disabled >--Seleccione--</option>
                                                <?php $options = ['Si','No']; ?>
                                                <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                <option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="column is-3">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'how_much'; ?>
                                            <?php $n_att = 'Cuanto?'; ?>
                                            <label><?= $n_att ?></label>
                                            <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_required_margin" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="column is-6">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'body_area_other'; ?>
                                            <?php $n_att = 'Área corporal'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="<?= $t_att ?>" class="input">
                                                <option value="" selected disabled >--Seleccione--</option>
                                                <?php $options = ['Cuerpo de frente', 'Cuerpo de espalda']; ?>
                                                <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
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
                                            <?php $t_att = 'body_area'; ?>
                                            <?php $n_att = 'Área'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="<?= $t_att ?>" class="input">
                                                <option value="" selected disabled >--Seleccione--</option>
                                                <?php $options = ['Cuero cabelludo', 'Frente', 'Parpado superior', 'Oreja derecha', 'Oreja izquierda', 'Ojo derecho', 'Parpado inferior ojo derecho', 'Parpado superior ojo izquierdo', 'Parpado inferior ojo izquierdo', 'Ceja derecha', 'Ceja izquierda', 'Mejilla derecha', 'Mejilla izquierda', 'Nariz', 'Mentón', 'Labios', 'Lengua', 'Cuello', 'Hombro derecho', 'Hombro izquierdo', 'Brazo izquierdo', 'Brazo derecho', 'Codo derecho', 'Codo izquierdo', 'Antebrazo derecho', 'Antebrazo izquierdo', 'Dorso mano derecha', 'Dorso mano izquierda', 'Palma mano derecha', 'Palma mano izquierda', 'Dedos mano derecha', 'Dedos mano izquierda', 'Tórax posterior', 'Tórax anterior', 'Abdomen', 'Región lumbar', 'Glúteos', 'Pubis', 'Genitales', 'Ano', 'Muslo izquierdo', 'Muslo derecho', 'Rodilla izquierda', 'Rodilla derecha', 'Pierna izquierda', 'Pierna derecha', 'Dorso del pie derecho', 'Dorso pie izquierdo', 'Palma pie derecho', 'Palma pie izquierdo', 'Dedos pie derecho', 'Dedos pie izquierdo']; ?>
                                                <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                <option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="column is-12">
                            <hr/>
                        </div>
                        <div class="column is-12">
                            <div class="control"><label>&nbsp;</label><a class="button is-primary btn_add_surgical"><i class="fa fa-plus"></i></a></div>
                        </div>
                        <!--Field-->
                        <div class="column is-2">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'tumors'; ?>
                                    <?php $n_att = 'Tumores'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>[]" class="input sel_tumors">
                                        <option value="" selected disabled >--Seleccione--</option>
                                        <?php $options = ['Si','No']; ?>
                                        <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
                                        <?php foreach($options as $key => $row){ ?>
                                        <option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-2">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'size'; ?>
                                    <?php $n_att = 'Tamaño'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_tumors" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-2">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'margin'; ?>
                                    <?php $n_att = 'Margen'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_tumors" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-2">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'pathology'; ?>
                                    <?php $n_att = 'Patología'; ?>
                                    <label><?= $n_att ?></label>
                                    {{-- <input name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_tumors" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" /> --}}
                                    <select name="<?= $t_att ?>[]" class="input patol fl_sel_parent_disb" data-xparent=".sel_tumors" data-option="Si">
                                        <option value="" selected disabled >--Seleccione--</option>
                                        <?php $options = ['Si','No']; ?>
                                        <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
                                        <?php foreach($options as $key => $row){ ?>
                                        <option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-4">
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <?php $t_att = 'observations'; ?>
                                    <?php $n_att = 'Observaciones'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb" data-xparent=".patol" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                </div>

                            </div>
                        </div>
                        <div class="column is-12 box_surgical is-hidden"></div>
                        <!--Field-->
                        <div class="column is-12">
                            <hr/>
                        </div>
                        <div class="column is-3">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'procedure_time'; ?>
                                    <?php $n_att = 'Tiempo'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-3">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'complications'; ?>
                                    <?php $n_att = 'Complicaciones'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>" class="input sel_complications">
                                        <option value="" selected disabled >--Seleccione--</option>
                                        <?php $options = ['Si','No']; ?>
                                        <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
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
                                    <?php $t_att = 'comments'; ?>
                                    <?php $n_att = 'Análisis y/o observaciones'; ?>
                                    <label><?= $n_att ?></label>
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_hcp->$t_att:'' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12">
                            <hr/>
                        </div>
                        <!--Field-->
                        <div class="column is-12"><h3 class="subtitle">Datos de quienes participaron en el procedimiento</h3></div>
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'surgeon'; ?>
                                    <?php $n_att = 'Cirujano'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'assistant'; ?>
                                    <?php $n_att = 'Ayudante'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'instrumentalist'; ?>
                                    <?php $n_att = 'Instrumentador'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'anesthesiologist'; ?>
                                    <?php $n_att = 'Anestesiólogo'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
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
        $(function() {
        if ($(".select2_fsc").length) {
                $('.select2_fsc').each(function () {
                    $(this).select2({
                        theme: "classic",
                    });
                });
            }
    })
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

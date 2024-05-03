<header class="modal-card-head">
    <p class="modal-card-title">Agregar</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="cryppy_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="columns is-multiline">
                                <!--Field-->
                                <div class="column is-12">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'prequest_nprocedure_id'; ?>
                                            <?php $n_att = 'Solicitud de procedimiento'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="prequest_nprocedure_id" class="input select2_fsc">
                                                <option value="" selected disabled>Diagnostico</option>
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
                                <div class="column is-6">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'body_area'; ?>
                                            <?php $n_att = 'Área corporal'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="<?= $t_att ?>" class="input">
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['Cuerpo de frente', 'Cuerpo de espalda']; ?>
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
                                            <?php $t_att = 'lesion'; ?>
                                            <?php $n_att = 'Ubicación de la lesión'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="<?= $t_att ?>" class="input">
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['Cuero cabelludo', 'Frente', 'Parpado superior', 'Oreja derecha', 'Oreja izquierda', 'Ojo derecho', 'Parpado inferior ojo derecho', 'Parpado superior ojo izquierdo', 'Parpado inferior ojo izquierdo', 'Ceja derecha', 'Ceja izquierda', 'Mejilla derecha', 'Mejilla izquierda', 'Nariz', 'Mentón', 'Labios', 'Lengua', 'Cuello', 'Hombro derecho', 'Hombro izquierdo', 'Brazo izquierdo', 'Brazo derecho', 'Codo derecho', 'Codo izquierdo', 'Antebrazo derecho', 'Antebrazo izquierdo', 'Dorso mano derecha', 'Dorso mano izquierda', 'Palma mano derecha', 'Palma mano izquierda', 'Dedos mano derecha', 'Dedos mano izquierda', 'Tórax posterior', 'Tórax anterior', 'Abdomen', 'Región lumbar', 'Glúteos', 'Pubis', 'Genitales', 'Ano', 'Muslo izquierdo', 'Muslo derecho', 'Rodilla izquierda', 'Rodilla derecha', 'Pierna izquierda', 'Pierna derecha', 'Dorso del pie derecho', 'Dorso pie izquierdo', 'Palma pie derecho', 'Palma pie izquierdo', 'Dedos pie derecho', 'Dedos pie izquierdo']; ?>
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
                                            <?php $t_att = 'disinfection'; ?>
                                            <?php $n_att = 'Desinfección'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="<?= $t_att ?>" class="input sel_disinfection">
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['SSN', 'Alcohol', 'Yodopovidona', 'Clorexidina', 'Otro antiséptico']; ?>
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
                                            <?php $t_att = 'antiseptic'; ?>
                                            <?php $n_att = 'Cual antiséptico?'; ?>
                                            <label><?= $n_att ?></label>
                                            <input name="<?= $t_att ?>" type="text"
                                                class="input fl_sel_parent_disb" data-xparent=".sel_disinfection"
                                                data-option="Otro antiséptico" placeholder="<?= $n_att ?>"
                                                value="{{ old($t_att) }}" />
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
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['Si', 'No']; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                <option value="<?= $row ?>"><?= $row ?></option>
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
                                            <select name="<?= $t_att ?>"
                                                class="input fl_sel_parent_disb sel_type_anesthesia"
                                                data-xparent=".sel_anesthesia" data-option="Si">
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['Lidocaina al 1% con epinefrina', 'Lidocaina al 1% sin epinefrina', 'Lidocaina al 2% con epinefrina', 'Lidocaina al 2% sin epinefrina', 'Tópica', 'Otro']; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                <option value="<?= $row ?>"><?= $row ?></option>
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
                                            <input name="<?= $t_att ?>" type="text"
                                                class="input fl_sel_parent_disb" data-xparent=".sel_type_anesthesia"
                                                data-option="Otro" placeholder="<?= $n_att ?>"
                                                value="{{ old($t_att) }}" />
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="column is-3">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'freeze_time_1'; ?>
                                            <?php $n_att = 'Tiempo 1 de congelación'; ?>
                                            <label><?= $n_att ?></label>
                                            <input name="<?= $t_att ?>" type="text" class="input"
                                                placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="column is-3">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'defrost_time_1'; ?>
                                            <?php $n_att = 'Tiempo 1 de descongelación'; ?>
                                            <label><?= $n_att ?></label>
                                            <input name="<?= $t_att ?>" type="text" class="input"
                                                placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="column is-3">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'freeze_time_2'; ?>
                                            <?php $n_att = 'Tiempo 2 de congelación'; ?>
                                            <label><?= $n_att ?></label>
                                            <input name="<?= $t_att ?>" type="text" class="input"
                                                placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="column is-3">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'defrost_time_2'; ?>
                                            <?php $n_att = 'Tiempo 2 de descongelación'; ?>
                                            <label><?= $n_att ?></label>
                                            <input name="<?= $t_att ?>" type="text" class="input"
                                                placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="column is-3">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'timex'; ?>
                                            <?php $n_att = 'Tiempos'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="<?= $t_att ?>" class="input">
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['1 Ciclo', '2 Ciclo']; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                <option value="<?= $row ?>"><?= $row ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="column is-3">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'technique'; ?>
                                            <?php $n_att = 'Técnica'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="<?= $t_att ?>" class="input sel_technique">
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['Spray', 'Probeta', 'Cono', 'Ninguna', 'Otra']; ?>
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
                                            <?php $t_att = 'other_technique'; ?>
                                            <?php $n_att = 'Cual?'; ?>
                                            <label><?= $n_att ?></label>
                                            <input name="<?= $t_att ?>" type="text"
                                                class="input fl_sel_parent_disb" data-xparent=".sel_technique" data-option="Otra" placeholder="<?= $n_att ?>"
                                                value="{{ old($t_att) }}" />
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="column is-12">
                            <hr>
                        </div>
                        <!--Field-->
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'procedure_time'; ?>
                                    <?php $n_att = 'Tiempo del procedimiento'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>" type="text" class="input"
                                        placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'complications'; ?>
                                    <?php $n_att = 'Complicaciones'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>" class="input sel_complications">
                                        <option value="" selected disabled>--Seleccione--</option>
                                        <?php $options = ['Si', 'No']; ?>
                                        <?php $select_old = $is_records ? $obj->$t_att : ''; ?>
                                        <?php foreach($options as $key => $row){ ?>
                                        <option value="<?= $row ?>" <?= $select_old == $row ? 'selected' : '' ?>>
                                            <?= $row ?></option>
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
                                    <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb"
                                        data-xparent=".sel_complications" data-option="Si" placeholder="<?= $n_att ?>"
                                        value="{{ old($t_att) }}" />
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
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= $is_records ? $obj->$t_att : ''?>
                                    </textarea>
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
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= $is_records ? $obj->$t_att : ''?>
                                    </textarea>
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

<header class="modal-card-head">
    <p class="modal-card-title">Agregar</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="biopsie_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="columns is-multiline">
                        <!--Field-->
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'prequest_nprocedure_id'; ?>
                                    <?php $n_att = 'Procedimiento Solicitado'; ?>
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
                        <div class="column is-8">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'type_procedure'; ?>
                                    <?php $n_att = 'Tipo de procedimiento'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>" class="input type_procedure_sel select2_fsc">
                                        <option value="0" selected disabled>--Seleccione--</option>
                                        <?php foreach($o_procs as $key_sel => $row_sel){ ?>

                                        @isset($obj)
                                            <option <?= $obj->$t_att === $row_sel->id ? 'selected' : '' ?>
                                                data-val="<?= $row_sel->description ?>" value="<?= $row_sel->id ?>">
                                                <?= $row_sel->name ?> <?= $row_sel->description ?>
                                            </option>
                                        @endisset
                                        @empty($obj)
                                            <option value="<?= $row_sel->id ?>" data-val="<?= $row_sel->description ?>">
                                                <?= $row_sel->name ?> <?= $row_sel->description ?>
                                            </option>
                                        @endempty
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
                                    <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_valid"
                                        data-xparent=".type_procedure_sel" data-box=".other_procedure_cll"
                                        data-option="Otro" placeholder="<?= $n_att ?>"
                                        value="<?= isset($obj) ? $obj->$t_att : '' ?>" />
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
                                        @isset($obj)
                                            <option <?= $obj->$t_att === $row ? 'selected' : '' ?> value="<?= $row ?>">
                                                <?= $row ?></option>
                                        @endisset
                                        @empty($obj)
                                            <option value="<?= $row ?>"><?= $row ?></option>
                                        @endempty
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
                                    @isset($obj)
                                        <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb"
                                            data-xparent=".sel_disinfection" data-option="Otro antiséptico"
                                            placeholder="<?= $n_att ?>" value="<?= isset($obj) ? $obj->$t_att : '' ?>" />
                                    @endisset
                                    @empty($obj)
                                        <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb"
                                            data-xparent=".sel_disinfection" data-option="Otro antiséptico"
                                            placeholder="<?= $n_att ?>" value="" />
                                    @endempty
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
                                        <?php isset($o_hcp) ? $o_hcp->$t_att : ''; ?>

                                        <?php foreach($options as $key => $row){ ?>
                                        @isset($obj)
                                            <option <?= $obj->$t_att === $row ? 'selected' : '' ?> value="<?= $row ?>">
                                                <?= $row ?></option>
                                        @endisset
                                        @empty($obj)
                                            <option value="<?= $row ?>"><?= $row ?></option>
                                        @endempty
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
                                    <select name="<?= $t_att ?>" class="input fl_sel_parent_disb sel_type_anesthesia"
                                        data-xparent=".sel_anesthesia" data-option="Si">
                                        <option value="" selected disabled>--Seleccione--</option>
                                        <?php $options = ['Lidocaina al 1% con epinefrina', 'Lidocaina al 1% sin epinefrina', 'Lidocaina al 2% con epinefrina', 'Lidocaina al 2% sin epinefrina', 'Tópica', 'Otro']; ?>
                                        <?php foreach($options as $key => $row){ ?>
                                        @isset($obj)
                                            <option <?= $obj->$t_att === $row ? 'selected' : '' ?> value="<?= $row ?>">
                                                <?= $row ?></option>
                                        @endisset
                                        @empty($obj)
                                            <option value="<?= $row ?>"><?= $row ?></option>
                                        @endempty
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
                                    <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb"
                                        data-xparent=".sel_type_anesthesia" data-option="Otro"
                                        placeholder="<?= $n_att ?>" value="<?= isset($obj) ? $obj->$t_att : '' ?>" />
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
                                            <select name="<?= $t_att ?>"
                                                class="input sel_biopsy_method fl_sel_parent_valid"
                                                data-xparent=".type_procedure_sel" data-box=".biopsy_method_cll"
                                                data-option="Biopsia">
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['Punch', 'Bisturí', 'Afeitado', 'Curetaje', 'Tijera', 'Saucerización', 'Otro']; ?>
                                                <?php isset($o_hcp) ? $o_hcp->$t_att : ''; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                @isset($obj)
                                                    <option <?= $obj->$t_att === $row ? 'selected' : '' ?>
                                                        value="<?= $row ?>"><?= $row ?></option>
                                                @endisset
                                                @empty($obj)
                                                    <option value="<?= $row ?>"><?= $row ?></option>
                                                @endempty
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
                                            <input name="<?= $t_att ?>" type="text"
                                                class="input fl_sel_parent_disb" data-xparent=".sel_biopsy_method"
                                                data-option="Otro" placeholder="<?= $n_att ?>"
                                                value="<?= isset($obj) ? $obj->$t_att : '' ?>" />
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
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['Incicional', 'Excisional']; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                @isset($obj)
                                                    <option <?= $obj->$t_att === $row ? 'selected' : '' ?>
                                                        value="<?= $row ?>"><?= $row ?></option>
                                                @endisset
                                                @empty($obj)
                                                    <option value="<?= $row ?>"><?= $row ?></option>
                                                @endempty
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
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['Si', 'No']; ?>
                                                <?php isset($o_hcp) ? $o_hcp->$t_att : ''; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                @isset($obj)
                                                    <option <?= $obj->$t_att === $row ? 'selected' : '' ?>
                                                        value="<?= $row ?>"><?= $row ?></option>
                                                @endisset
                                                @empty($obj)
                                                    <option value="<?= $row ?>"><?= $row ?></option>
                                                @endempty
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
                                            <input name="<?= $t_att ?>" type="text"
                                                class="input fl_sel_parent_disb" data-xparent=".sel_required_margin"
                                                data-option="Si" placeholder="<?= $n_att ?>"
                                                value="<?= isset($obj) ? $obj->$t_att : '' ?>" />
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
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['Cuerpo de frente', 'Cuerpo de espalda']; ?>
                                                <?php isset($o_hcp) ? $o_hcp->$t_att : ''; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                @isset($obj)
                                                    <option <?= $obj->$t_att === $row ? 'selected' : '' ?>
                                                        value="<?= $row ?>"><?= $row ?></option>
                                                @endisset
                                                @empty($obj)
                                                    <option value="<?= $row ?>"><?= $row ?></option>
                                                @endempty
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
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['Cuero cabelludo', 'Frente', 'Parpado superior', 'Oreja derecha', 'Oreja izquierda', 'Ojo derecho', 'Parpado inferior ojo derecho', 'Parpado superior ojo izquierdo', 'Parpado inferior ojo izquierdo', 'Ceja derecha', 'Ceja izquierda', 'Mejilla derecha', 'Mejilla izquierda', 'Nariz', 'Mentón', 'Labios', 'Lengua', 'Cuello', 'Hombro derecho', 'Hombro izquierdo', 'Brazo izquierdo', 'Brazo derecho', 'Codo derecho', 'Codo izquierdo', 'Antebrazo derecho', 'Antebrazo izquierdo', 'Dorso mano derecha', 'Dorso mano izquierda', 'Palma mano derecha', 'Palma mano izquierda', 'Dedos mano derecha', 'Dedos mano izquierda', 'Tórax posterior', 'Tórax anterior', 'Abdomen', 'Región lumbar', 'Glúteos', 'Pubis', 'Genitales', 'Ano', 'Muslo izquierdo', 'Muslo derecho', 'Rodilla izquierda', 'Rodilla derecha', 'Pierna izquierda', 'Pierna derecha', 'Dorso del pie derecho', 'Dorso pie izquierdo', 'Palma pie derecho', 'Palma pie izquierdo', 'Dedos pie derecho', 'Dedos pie izquierdo']; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                @isset($obj)
                                                    <option <?= $obj->$t_att === $row ? 'selected' : '' ?>
                                                        value="<?= $row ?>"><?= $row ?></option>
                                                @endisset
                                                @empty($obj)
                                                    <option value="<?= $row ?>"><?= $row ?></option>
                                                @endempty
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>




                        <!--Field-->
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'hemostasis'; ?>
                                    <?php $n_att = 'Hemostasia'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>" class="input sel_hemostasis">
                                        <option value="" selected disabled>--Seleccione--</option>
                                        <?php $options = ['No', 'Química', 'Hyfrecator', 'Ellman', 'Sutura', 'Otra']; ?>>
                                        <?php foreach($options as $key => $row){ ?>
                                        @isset($obj)
                                            <option <?= $obj->$t_att === $row ? 'selected' : '' ?> value="<?= $row ?>">
                                                <?= $row ?></option>
                                        @endisset
                                        @empty($obj)
                                            <option value="<?= $row ?>"><?= $row ?></option>
                                        @endempty
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'other_hemostasis'; ?>
                                    <?php $n_att = 'Cual?'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb"
                                        data-xparent=".sel_hemostasis" data-option="Otra" placeholder="<?= $n_att ?>"
                                        value="<?= isset($obj) ? $obj->$t_att : '' ?>" />
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-12">
                            <h4>Suturas</h4>
                        </div>
                        <!--Field-->
                        @isset($obj)
                            @foreach ($obj->hcsuture as $item)
                                <div class="column is-6">
                                    <div class="field">
                                        <div class="control">
                                            <?php $t_att = 'suture_type'; ?>
                                            <?php $n_att = 'Tipo de sutura'; ?>
                                            <label><?= $n_att ?></label>
                                            <select name="<?= $t_att ?>[]" class="input">
                                                <option value="" selected disabled>--Seleccione--</option>
                                                <?php $options = ['Miralene', 'Prolene', 'Catgut', 'Seda', 'Vicryl', 'Mono-Nylon', 'Otro']; ?>
                                                <?php foreach($options as $key => $row){ ?>
                                                @isset($obj)
                                                    <option <?= $item->$t_att === $row ? 'selected' : '' ?>
                                                        value="<?= $row ?>"><?= $row ?></option>
                                                @endisset
                                                @empty($obj)
                                                    <option value="<?= $row ?>"><?= $row ?></option>
                                                @endempty
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="column is-6">
                                    <div class="field has-addons">
                                        <div class="control is-expanded">
                                            <?php $t_att = 'caliber'; ?>
                                            <?php $n_att = 'Calibre'; ?>
                                            <label><?= $n_att ?></label>
                                            <input name="<?= $t_att ?>[]" type="text" class="input"
                                                placeholder="<?= $n_att ?>"
                                                value="<?= isset($obj) ? $item->$t_att : '' ?>" required />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                        <div class="column is-5">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'suture_type'; ?>
                                    <?php $n_att = 'Tipo de sutura'; ?>
                                    <label><?= $n_att ?></label>
                                    <select name="<?= $t_att ?>[]" class="input fl_sel_parent_disb" data-xparent=".sel_hemostasis" data-option="Sutura">
                                        <option value="" selected disabled>--Seleccione--</option>
                                        <?php $options = ['Miralene', 'Prolene', 'Catgut', 'Seda', 'Vicryl', 'Mono-Nylon', 'Otro']; ?>
                                        <?php foreach($options as $key => $row){ ?>
                                        @isset($obj)
                                            <option <?= $obj->$t_att === $row ? 'selected' : '' ?> value="<?= $row ?>">
                                                <?= $row ?></option>
                                        @endisset
                                        @empty($obj)
                                            <option value="<?= $row ?>"><?= $row ?></option>
                                        @endempty
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-5">
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <?php $t_att = 'caliber'; ?>
                                    <?php $n_att = 'Calibre'; ?>
                                    <label><?= $n_att ?></label>
                                    <input data-xparent=".sel_hemostasis" data-option="Sutura" name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb"
                                        placeholder="<?= $n_att ?>" value="<?= isset($obj) ? $obj->$t_att : '' ?>"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="column is-2">
                            <div class="field has-addons">
                                <div class="control"><label>&nbsp;</label>
                                    <a data-xparent=".sel_hemostasis" data-option="Sutura" class="button is-primary btn_add_suture_caliber fl_sel_parent_disb"
                                        style="text-align: center;align-content: flex-end;display: flex;align-items: end;"><i
                                            class="fa fa-plus"></i></a></div>
                            </div>
                        </div>
                        <div class="column is-12 box_suture_caliber is-hidden">
                            <div class="columns is-multiline box_suture_caliber_inner">
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-3">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'procedure_time'; ?>
                                    <?php $n_att = 'Tiempo Proc'; ?>
                                    <label><?= $n_att ?></label>
                                    <input name="<?= $t_att ?>" type="text" class="input"
                                        placeholder="<?= $n_att ?>" value="<?= isset($obj) ? $obj->$t_att : '' ?>"
                                        required />
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
                                        <option value="" selected disabled>--Seleccione--</option>
                                        <?php $options = ['Si', 'No']; ?>
                                        <?php isset($o_hcp) ? $o_hcp->$t_att : ''; ?>
                                        <?php foreach($options as $key => $row){ ?>
                                        @isset($obj)
                                            <option <?= $obj->$t_att === $row ? 'selected' : '' ?> value="<?= $row ?>">
                                                <?= $row ?></option>
                                        @endisset
                                        @empty($obj)
                                            <option value="<?= $row ?>"><?= $row ?></option>
                                        @endempty
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
                                        data-xparent=".sel_complications" data-option="Si"
                                        placeholder="<?= $n_att ?>" value="<?= isset($obj) ? $obj->$t_att : '' ?>" />
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
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= isset($obj) ? $obj->$t_att : '' ?></textarea>
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
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= isset($obj) ? $obj->$t_att : '' ?></textarea>
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
        //HCPROCEDURE
        if ($(".select2_fsc").length) {
                $('.select2_fsc').each(function () {
                    $(this).select2({
                        theme: "classic",
                    });
                });
            }
        if ($('.fl_sel_parent_valid').length) {
            $('.fl_sel_parent_valid').each(function(i, v) {
                var item = $(this);
                var parent = item.data('xparent');
                var box = item.data('box');
                var option = item.data('option');
                $(parent).on('change', function(e) {
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
            $('.fl_sel_parent_disb').each(function(i, v) {
                var item = $(this);
                var parent = item.data('xparent');
                var option = item.data('option');
                const opt = $(parent).val();
                const p = opt != option;

                item.prop('disabled', p);
                if($(this).prop('localName') == 'a'){
                    item.attr('disabled', p);
                }
                $(parent).on('change', function(e) {
                    const op = $(parent).val();
                    const pt = op != option;
                    item.prop('disabled', pt);
                    if(item.prop('localName') == 'a'){
                        item.attr('disabled', pt);
                    }
                });
            });
        }
        if ($('.btn_add_suture_caliber').length) {
            $('.btn_add_suture_caliber').on('click', function(e) {
                e.preventDefault();
                if ($('.box_suture_caliber').hasClass('is-hidden')) {
                    $('.box_suture_caliber').removeClass('is-hidden');
                }
                var base = '<div class="column is-6">';
                base += '<div class="field"><div class="control"><label>Tipo de sutura</label>';
                base += '<select name="suture_type[]" class="input">';
                base += '<option value="" selected disabled >--Seleccione--</option>';
                base += '<option value="Miralene">Miralene</option>';
                base += '<option value="Prolene">Prolene</option>';
                base += '<option value="Catgut">Catgut</option>';
                base += '<option value="Seda">Seda</option>';
                base += '<option value="Vicryl">Vicryl</option>';
                base += '<option value="Mono-Nylon">Mono-Nylon</option>';
                base += '<option value="Otro">Otro</option>';
                base += '</select></div></div></div>';
                //
                base +=
                    '<div class="column is-6"><div class="field has-addons"><div class="control is-expanded">';
                base += '<label>Calibre</label>';
                base += '<input name="caliber[]" type="text" class="input" placeholder="Calibre" />';
                base += '</div></div></div>';

                $('.box_suture_caliber .box_suture_caliber_inner').append(base);
            });
        }

    })
</script>

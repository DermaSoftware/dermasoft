<header class="modal-card-head">
    <p class="modal-card-title">Agregar Indicación</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="indication_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">
            <div class="field is-vertical">
                <div class="field-body">
                    <div class="columns is-multiline">
                        <div class="column is-12" id="indication-box">
                            <div class="field">
                                <div class="control">
                                    <label>Indicación</label>
                                    <select name="indication[]" multiple="multiple" class="input diagnoses select2_fsc">
                                        <?php foreach($o_indications as $key_sel => $row_sel){ ?>
                                        @isset($obj)
                                            <option <?= $obj->id == $row_sel->id ? 'selected' : '' ?>
                                                value="<?= $row_sel->description ?>"><?= $row_sel->description ?>
                                            </option>
                                        @endisset
                                        @empty($record)
                                            <option value="<?= $row_sel->description ?>"><?= $row_sel->description ?>
                                            </option>
                                        @endempty
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12">
                            <hr>
                        </div>
                        <!-- <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <label>Otra indicación</label>
                                    <input <?= $is_other == true ? 'checked' : '' ?> type="checkbox" name="is_other"
                                        id="is_other"></input>
                                </div>
                            </div>
                        </div> -->
                        <div class="column is-6" id="other-box">
                            <div class="field">
                                <div class="control">
                                    <textarea class="textarea" name="other_indication" id="other_indication" rows="2"><?= ($is_other == true and isset($obj)) ? $obj->indication : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <a href="javascript:void(0)" class="button h-button is-primary is-dark-outlined other-add">Agregar</a>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control"><label class="checkbox is-outlined is-info"><input
                                        name="notification_email" type="checkbox" value="yes"><span></span> Enviar
                                    indicaciones al correo del paciente</label></div>
                        </div>
                        <div class="field">
                            <div class="control"><label class="checkbox is-outlined is-info"><input
                                        name="notification_whatsapp" type="checkbox" value="yes"><span></span> Enviar
                                    indicaciones al No. de whatsapp del paciente</label></div>
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
        if ($(".select2_fsc").length) {
            $('.select2_fsc').each(function() {
                $(this).select2({
                    theme: "classic",
                });
            });
        }
        var add_btn = document.querySelector('.other-add');
        var indications = document.querySelector('select[name="indication[]"]');
        var other = document.querySelector('textarea[name="other_indication"]');
        console.log(add_btn)
        // elementoToggle.style.display = 'none';

        add_btn.addEventListener('click', function() {
            if(other.value !== ''){
                var nuevaOpcion = document.createElement("option");
                nuevaOpcion.value = `${other.value}`;
                nuevaOpcion.textContent = `${other.value}`;
                nuevaOpcion.setAttribute('selected','selected');
                indications.append(
                    nuevaOpcion
                )
            other.value = '';
            }

        else{
            alert('Agregue una nueva indicación.')
        }
        });
    })
</script>

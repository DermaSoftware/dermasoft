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
                                    <select name="indication" class="input diagnoses select2_fsc">
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
                            <div class="field">
                                <div class="control">
                                    <label>Otra indicación</label>
                                    <input <?= $is_other == true ? 'checked' : '' ?> type="checkbox" name="is_other"
                                        id="is_other"></input>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12" id="other-box">
                            <div class="field">
                                <div class="control">
                                    <textarea class="textarea" name="other_indication" id="other_indication" rows="2"><?= ($is_other == true and isset($obj)) ? $obj->indication : '' ?></textarea>
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
    <div class="buttons">
        <button id="salvar" type="submit" class="button is-success">Salvar</button>
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
        const toggleButton = document.getElementById('is_other');
        const elementoToggle = document.getElementById('other-box');
        const indicationToggle = document.getElementById('indication-box');
        elementoToggle.style.display = 'none';

        if (toggleButton.checked) {
            elementoToggle.style.display = 'block';
            indicationToggle.style.display = 'none';
        }
        toggleButton.addEventListener('change', function() {
            if (this.checked) {
                // Si el checkbox está marcado, mostrar el elemento.
                elementoToggle.style.display = 'block';
                indicationToggle.style.display = 'none';
            } else {
                // Si el checkbox no está marcado, ocultar el elemento.
                elementoToggle.style.display = 'none';
                indicationToggle.style.display = 'block';
            }
        });
    })
</script>

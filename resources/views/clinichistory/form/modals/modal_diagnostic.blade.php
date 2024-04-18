<header class="modal-card-head">
    <p class="modal-card-title">Agregar Diagnostico</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="diagnostic_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">
            <div class="field is-vertical">
                <div class="field-body">
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <label>Diagnóstico</label>
                                    <select name="diagnoses" class="input select2_fsc">
                                        <?php foreach($o_diagnoses as $key_sel => $row_sel){ ?>
                                        @isset($obj)
                                            <option <?= $obj->diagnostic == $row_sel->name ? 'selected' : '' ?>
                                                data-code="<?= $row_sel->code ?>" data-name="<?= $row_sel->name ?>"
                                                value="<?= $row_sel->id ?>"><?= $row_sel->code . '-' . $row_sel->name ?>
                                            </option>
                                        @endisset
                                        @empty($record)
                                            <option data-code="<?= $row_sel->code ?>" data-name="<?= $row_sel->name ?>"
                                                value="<?= $row_sel->id ?>"><?= $row_sel->code . '-' . $row_sel->name ?>
                                            </option>
                                        @endempty

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <div class="control">
                                    <label>Tipo de Diagnóstico</label>
                                    <select name="diagnosesty" class="o_diagnosesty input select2_fsc">
                                        <option value="0" disabled>--Seleccione--</option>
                                        <?php foreach($o_diagnosesty as $key_sel => $row_sel){ ?>
                                        @isset($obj)
                                            <option <?= $obj->type_diagnostic == $row_sel->name ? 'selected' : '' ?>
                                                value="<?= $row_sel->id ?>"><?= $row_sel->name ?></option>
                                        @endisset
                                        @empty($record)
                                            <option value="<?= $row_sel->id ?>"><?= $row_sel->name ?></option>
                                        @endempty
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        @if ($derma->hc_type === 'Crioterapia')
                            <div class="column is-12">
                                <div class="column is-12"><img src="<?= asset('assets/images/fototipos.png') ?>" style="max-width: 100%;width: 100%;height: auto;"></div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <?php $t_att = 'skin_phototype'; ?>
                                        <?php $n_att = 'Fototipo de piel'; ?>
                                        <label><?= $n_att ?></label>
                                        <select name="<?= $t_att ?>" class="input">
                                            <option value="" selected disabled >--Seleccione--</option>
                                            <?php $options = ['1','2','3','4','5','6']; ?>
                                            <?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
                                            <?php foreach($options as $key => $row){ ?>
                                            <option value="Fototipo <?= $row ?>" <?= $select_old=='Fototipo '.$row?'selected':'' ?> >Fototipo <?= $row ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                $('.select2_fsc').each(function () {
                    $(this).select2({
                        theme: "classic",
                    });
                });
            }
    })
</script>

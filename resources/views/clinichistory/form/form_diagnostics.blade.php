<!--Field-->
<div class="columns is-multiline">
    <div class="column is-12">
        <div class="field">
            <div class="control">
                <label>Diagnóstico</label>
                <select class="input diagnoses select2_fsc">
                    <?php foreach($o_diagnoses as $key_sel => $row_sel){ ?>
                    <option data-code="<?= $row_sel->code ?>" data-name="<?= $row_sel->name ?>" value="<?= $row_sel->id ?>"><?= $row_sel->code . '-' . $row_sel->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="column is-10">
        <div class="field">
            <div class="control">
                <label>Tipo de Diagnóstico</label>
                <select class="o_diagnosesty input select2_fsc">
                    <option value="0" selected disabled>--Seleccione--</option>
                    <?php foreach($o_diagnosesty as $key_sel => $row_sel){ ?>
                    <option value="<?= $row_sel->id ?>"><?= $row_sel->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="column is-2">
        <button data-id="prods" type="button"
            class="button is-primary is-circle is-elevated btn_diagnoses_sel_fn"><span class="icon is-small"><i
                    class="fas fa-plus"></i></span></button>
    </div>
</div>

<div class="s-card demo-table table_diagnoses_sel_fn is-hidden">
    <table class="table is-hoverable is-fullwidth">
        <tbody>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th class="is-end">
                    <div class="dark-inverted">
                        Eliminar
                    </div>
                </th>
            </tr>
        </tbody>
    </table>
</div>


<div style="width: 100%;text-align: right;padding: 10px;">
    <a href="javascript:void(0)" class="button h-button is-success is-dark-outlined btn_next_tab_fsc"
        data-idtab="indications_tab"><span class="icon"><i class="lnir lnir-arrow-right rem-100"></i></span>
        <span>Siguiente</span></a>
</div>

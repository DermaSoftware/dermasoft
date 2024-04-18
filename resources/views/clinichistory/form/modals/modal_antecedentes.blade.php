<header class="modal-card-head">
    <p class="modal-card-title">Agregar Antecedente</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="backgrouns_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">


            <div class="field is-vertical">
                <div class="field-body">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <?php $t_att = 'resumen'; ?>
                                    <?php $n_att = 'Resumen'; ?>
                                    <label class="label">{{ $n_att }}</label>
                                    <textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= isset($obj) ? $obj->$t_att : '' ?></textarea>
                                    {{-- <textarea name="resumen" class="input" type="text" placeholder="Dosis" value="" /> --}}
                                </div>
                            </div>
                        </div>
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <label class="label">Tipo de antecedente</label>
                                    <select name="type_id" class="input modal_f1_med">
                                        <option value="0" selected disabled>--Seleccione--</option>
                                        <?php foreach($types as $key_sel => $row_sel){ ?>
                                        @isset($obj)
                                            <option value="<?= $row_sel->id ?>"
                                                <?= $obj->type_id == $key_sel ? 'selected' : '' ?>>
                                                <?= $row_sel->name ?>
                                            </option>
                                        @endisset
                                        @empty($obj)
                                            <option value="<?= $row_sel->id ?>"><?= $row_sel->name ?></option>
                                        @endempty
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
    <div class="buttons">
        <button id="salvar" type="submit" class="button is-success">Salvar</button>
    </div>
</div>

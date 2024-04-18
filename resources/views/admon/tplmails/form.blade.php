<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'name'; ?>
			<?php $n_att = 'Nombre'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'description'; ?>
			<?php $n_att = 'Plantilla'; ?>
			<label><?= $n_att ?></label>
			<textarea id="sun-editorx" name="<?= $t_att ?>" class="textarea" rows="12" placeholder="<?= $n_att ?>" <?= $modo=='detalles'?'readonly disabled':'' ?> >{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}</textarea>
        </div>
    </div>
</div>

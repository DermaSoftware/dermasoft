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
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'url'; ?>
			<?php $n_att = 'Archivo'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="file" class="input" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
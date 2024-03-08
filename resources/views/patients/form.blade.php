<!--Field-->
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'name'; ?>
			<?php $n_att = 'Primer nombre'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'scd_name'; ?>
			<?php $n_att = 'Segundo nombre'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'lastname'; ?>
			<?php $n_att = 'Primer apellido'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'scd_lastname'; ?>
			<?php $n_att = 'Segundo apellido'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'document_type'; ?>
			<?php $n_att = 'Tipo de documento'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="input" <?= $modo=='detalles'?'readonly disabled':'' ?>>
				<option value="0" selected disabled >--Seleccione--</option>
				<?php $options = ['cedula de ciudadanía','pasaporte','cedula de extranjería','carné diplomático','registro civil','tarjeta de identidad','adulto sin identificar','menor sin identificar','certificado de nacimiento','salvoconducto','pasaporte de la ONU','Permiso especial de permanencia']; ?>
				<?php foreach($options as $key => $row){ ?>
				<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?>><?= $row ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'document_number'; ?>
			<?php $n_att = 'Número de documento'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'fix_phone'; ?>
			<?php $n_att = 'Código del país'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="countrieskeys_fn" style="width: 100%;" data-url="<?= url('patients/codes') ?>" data-select_id="<?= isset($o->$t_att)?$o->$t_att:'' ?>"></select>
        </div>
    </div>
</div>
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'phone'; ?>
			<?php $n_att = 'Teléfono celular'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'email'; ?>
			<?php $n_att = 'Correo electrónico'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="email" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>

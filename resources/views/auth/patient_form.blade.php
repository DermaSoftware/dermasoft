
<!--Field-->
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'scd_name'; ?>
            <?php $n_att = 'Segundo nombre'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'scd_lastname'; ?>
            <?php $n_att = 'Segundo apellido'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
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
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'phone'; ?>
            <?php $n_att = 'Teléfono del contacto'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>

<?php if($modo=='crear'){ ?>
<!--Field-->
{{-- <div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'plan'; ?>
			<?php $n_att = 'Membresía'; ?>
			<label><?= $n_att ?></label>
			<select name="{{$t_att}}" class="input" <?= $modo=='detalles'?'readonly disabled':'required' ?>>
				<option value="0" selected disabled >--Seleccione--</option>
				<?php foreach($o_plans as $key => $row){ ?>
				<option value="<?= $row->id ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row->id)?'selected':'' ?>><?= $row->name ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div> --}}
<?php } ?>

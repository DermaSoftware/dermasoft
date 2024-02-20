<!--Field-->
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'name'; ?>
			<?php $n_att = 'Nombre'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'lastname'; ?>
			<?php $n_att = 'Apellidos'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'document_type'; ?>
			<?php $n_att = 'Tipo de documento'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="input" <?= $modo=='detalles'?'readonly disabled':'' ?>>
				<option value="0" selected disabled >--Seleccione--</option>
				<?php $options = ['cedula de ciudadanía','pasaporte','cedula de extranjería']; ?>
				<?php foreach($options as $key => $row){ ?>
				<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?>><?= $row ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
<div class="column is-3">
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
            <?php $t_att = 'phone'; ?>
			<?php $n_att = 'Teléfono celular'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'birth'; ?>
			<?php $n_att = 'Fecha de nacimiento'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="date" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'landline'; ?>
			<?php $n_att = 'Teléfono corporativo'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<div class="column is-3">
    <div class="field">
        <div class="control">
            <?php $t_att = 'email'; ?>
			<?php $n_att = 'Correo electrónico'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="email" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'main_address'; ?>
			<?php $n_att = 'Dirección'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>" <?= $modo=='detalles'?'readonly disabled':'' ?> >{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}</textarea>
        </div>
    </div>
</div>
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'city'; ?>
			<?php $n_att = 'Ciudad'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'secondary_address'; ?>
			<?php $n_att = 'Barrio'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'charge'; ?>
			<?php $n_att = 'Cargo'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="input" <?= $modo=='detalles'?'readonly disabled':'' ?>>
				<option value="0" selected disabled >--Seleccione--</option>
				<?php foreach($o_charges as $key => $row){ ?>
				<option value="<?= $row->id ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row->id)?'selected':'' ?>><?= $row->name ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'campus'; ?>
			<?php $n_att = 'Sede'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="input" <?= $modo=='detalles'?'readonly disabled':'' ?>>
				<option value="0" selected disabled >--Seleccione--</option>
				<?php foreach($o_campus as $key => $row){ ?>
				<option value="<?= $row->id ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row->id)?'selected':'' ?>><?= $row->name ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'role'; ?>
			<?php $n_att = 'Rol'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="input" <?= $modo=='detalles'?'readonly disabled':'' ?>>
				<option value="0" selected disabled >--Seleccione--</option>
				<?php foreach($o_roles as $key => $row){ ?>
				<option value="<?= $row->id ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row->id)?'selected':'' ?>><?= $row->name ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>

<!--Field SOLO MEDICO-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'specialty'; ?>
			<?php $n_att = 'Especialidad'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="input" <?= $modo=='detalles'?'readonly disabled':'' ?>>
				<option value="0" selected disabled >--Seleccione--</option>
				<?php foreach($o_specialties as $key => $row){ ?>
				<option value="<?= $row->id ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row->id)?'selected':'' ?>><?= $row->name ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'professional_card'; ?>
			<?php $n_att = 'Tarjeta profesional'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'signature'; ?>
			<?php $n_att = 'Firma'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="file" class="input" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--END SOLO MEDICO-->

<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'status'; ?>
			<?php $n_att = 'Estado'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="input" <?= $modo=='detalles'?'readonly disabled':'' ?>>
				<?php $options = ['active','inactive']; ?>
				<?php foreach($options as $key => $row){ ?>
				<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?>><?= $row ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
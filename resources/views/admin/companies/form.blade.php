<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'kind_person'; ?>
			<?php $n_att = 'Tipo de persona'; ?>
			<label><?= $n_att ?></label>
			<select name="{{$t_att}}" class="input" <?= $modo=='detalles'?'readonly disabled':'required' ?>>
				<?php $options = ['natural','jurídica']; ?>
				<option value="null" selected disabled >--Seleccione--</option>
				<?php foreach($options as $key => $row){ ?>
				<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?>><?= $row ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'name'; ?>
            <?php $n_att = 'Nombre de la empresa'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'nit'; ?>
            <?php $n_att = 'NIT'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'legal_representative'; ?>
            <?php $n_att = 'Representante legal'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'location'; ?>
            <?php $n_att = 'Dirección'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'city'; ?>
            <?php $n_att = 'Ciudad'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'phone'; ?>
            <?php $n_att = 'Teléfono'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
			<label>Logo</label>
			<div class="file has-name is-fullwidth">
				<label class="file-label">
					<input name="logo" class="file-input" type="file">
					<span class="file-cta is-fullwidth">
						<span class="file-icon"><i class="fas fa-cloud-upload-alt"></i></span>
						<span class="file-label">Seleccione un logo…</span>
					</span>
				</label>
			</div>
		</div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'contact_name'; ?>
            <?php $n_att = 'Nombre de contacto'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'email'; ?>
            <?php $n_att = 'Correo'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="email" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>


<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'document_type'; ?>
			<?php $n_att = 'Tipo de documento'; ?>
			<label><?= $n_att ?></label>
			<select name="{{$t_att}}" class="input" <?= $modo=='detalles'?'readonly disabled':'required' ?>>
				<?php $options = ['cedula de ciudadanía','pasaporte','cedula de extranjería']; ?>
				<option value="null" selected disabled >--Seleccione--</option>
				<?php foreach($options as $key => $row){ ?>
				<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?>><?= $row ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'document_number'; ?>
            <?php $n_att = 'Número de documento'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
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
			<select name="{{$t_att}}" class="input" <?= $modo=='detalles'?'readonly disabled':'' ?>>
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
            <?php $t_att = 'contact_phone'; ?>
            <?php $n_att = 'Teléfono'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<?php if($modo != 'detalles'){ ?>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
			<label>Foto</label>
			<div class="file has-name is-fullwidth">
				<label class="file-label">
					<input name="photo" class="file-input" type="file">
					<span class="file-cta is-fullwidth">
						<span class="file-icon"><i class="fas fa-cloud-upload-alt"></i></span>
						<span class="file-label">Seleccione una imagen…</span>
					</span>
				</label>
			</div>
		</div>
    </div>
</div>
<?php } ?>
<?php if($modo=='crear'){ ?>
<!--Field-->
<div class="column is-4">
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
</div>
<?php } ?>
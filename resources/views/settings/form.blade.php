<!--Field-->
<div class="column is-6">
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
<div class="column is-6">
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
<div class="column is-6">
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
<div class="column is-6">
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
<div class="column is-6">
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
<div class="column is-6">
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

<div class="column is-12">
	<hr>
	<h2>Datos de la clínica</h2>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'hours_quotes'; ?>
            <?php $n_att = 'Cantidad de horas que tiene el paciente antes de la cita para pagar la consulta'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'hours_scheduling_web'; ?>
            <?php $n_att = 'Cantidad de horas antes para notificar recordatorio de pago de consulta cuando se toma cita por la web'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'time_consultation'; ?>
            <?php $n_att = 'Tiempo de duración de consulta'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'time_consultation_text'; ?>
            <?php $n_att = 'Texto de tiempo de duración de consulta'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'hours_ntf'; ?>
            <?php $n_att = 'Cantidad de horas antes para notificar recordatorio de cita por whatsapp, correo electrónico y mini mensaje de texto'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<div class="column is-12">
	<hr>
	<h2>Datos de la pasarela de pagos</h2>
</div>
<!--Field-->
<div class="column is-8">
    <div class="field">
        <div class="control">
            <?php $t_att = 'epaycokey'; ?>
            <?php $n_att = 'Key publica (EPAYCO)'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'epaycoidc'; ?>
            <?php $n_att = 'ID comerciante (EPAYCO)'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-8">
    <div class="field">
        <div class="control">
            <?php $t_att = 'epaycopri'; ?>
            <?php $n_att = 'Key privada (EPAYCO)'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'whatsapp'; ?>
            <?php $n_att = 'Whatsapp'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'chat'; ?>
            <?php $n_att = 'Chat (Talk.to)'; ?>
			<label><?= $n_att ?></label>
			<textarea name="{{$t_att}}" rows="4" class="textarea" placeholder="<?= $n_att ?> sin la etiqueta script" <?= $modo=='detalles'?'readonly disabled':'' ?> >{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}</textarea>
        </div>
    </div>
</div>
<div class="column is-12">
	<hr>
</div>

<div class="column is-12">
	<div class="table-responsive border-0 rounded-3 is-fullwidth">
		<h2>Datos del formulario del paciente</h2>
		<table class="o_table_fsc table table-dark-gray align-middle p-4 mb-0 table-hover is-fullwidth">
			<thead>
				<tr>
					<th scope="col" class="border-0 rounded-start">#</th>
					<th scope="col" class="border-0">Campo</th>
					<th scope="col" class="border-0 rounded-end no-sort text-center"><div class="field"><div class="control"><label class="checkbox"><input class="checkbox_actives_fn" type="checkbox"><span></span>Activos</label></div></div></th>
					<th scope="col" class="border-0 rounded-end no-sort text-center"><div class="field"><div class="control"><label class="checkbox"><input class="checkbox_required_fn" type="checkbox"><span></span>Requeridos</label></div></div></th>
				</tr>
			</thead>
			<tbody>
				<?php $cont = 1; ?>
				<?php foreach($xfields as $key => $row){ ?>
				<tr>
					<td><?= $cont ?></td>
					<td><?= $row ?></td>
					<td class="text-center">
						<?php $tag = $key.'_active'; ?>
						<div class="field"><div class="control"><label class="checkbox"><input class="checkbox_actives" name="<?= $tag ?>" type="checkbox" <?= $o->$tag=='si'?'checked':'' ?> value="si" ><span></span>Activo</label></div></div>
					</td>
					<td class="text-center">
						<?php $tag = $key.'_required'; ?>
						<div class="field"><div class="control"><label class="checkbox"><input class="checkbox_required" name="<?= $tag ?>" type="checkbox" <?= $o->$tag=='si'?'checked':'' ?> value="si" ><span></span>Requerido</label></div></div>
					</td>
				</tr>
				<?php $cont++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

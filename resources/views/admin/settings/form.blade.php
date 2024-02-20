<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'hours_quotes'; ?>
			<label>Cantidad de horas que tiene el paciente antes de la cita para pagar la consulta</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Cantidad de horas que tiene el paciente antes de la cita para pagar la consulta" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'hours_scheduling_web'; ?>
			<label>Cantidad de horas antes para notificar recordatorio de pago de consulta cuando se toma cita por la web</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Cantidad de horas antes para notificar recordatorio de pago de consulta cuando se toma cita por la web" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'time_consultation'; ?>
			<label>Tiempo de duración de consulta</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Tiempo de duración de consulta" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'time_consultation_text'; ?>
			<label>Texto de tiempo de duración de consulta</label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Texto de tiempo de duración de consulta" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'hours_ntf'; ?>
			<label>Cantidad de horas antes para notificar recordatorio de cita por whatsapp, correo electrónico y mini mensaje de texto</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Cantidad de horas antes para notificar recordatorio de cita por whatsapp, correo electrónico y mini mensaje de texto" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
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
	<h2>Datos de la pasarela de pagos</h2>
</div>
<!--Field-->
<div class="column is-12">
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
<div class="column is-12">
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
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'epaycopri'; ?>
            <?php $n_att = 'Key privada (EPAYCO)'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<div class="column is-12">
	<hr>
	<h2>Datos de contacto</h2>
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

<!--Field-->
<div class="column is-12">
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
            <?php $t_att = 'video'; ?>
            <?php $n_att = 'URL video'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="https://www.youtube.com/embed/DAsd20yYx_w" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
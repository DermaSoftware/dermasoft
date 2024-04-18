<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'name'; ?>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Nombre" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'code'; ?>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Código" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'address'; ?>
			<textarea name="{{$t_att}}" class="textarea" rows="4" placeholder="Dirección" <?= $modo=='detalles'?'readonly disabled':'required' ?> >{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}</textarea>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'city'; ?>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Ciudad" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'phone'; ?>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Telefono" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'email'; ?>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Correo" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'responsible'; ?>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Responsable" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'responsible_phone'; ?>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Telefono del responsable" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'responsible_email'; ?>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Correo del responsable" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'position'; ?>
			<select name="{{$t_att}}" type="text" class="input" placeholder="Cargo" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
				<option value="0" disabled selected>--Seleccione el cargo--</option>
				<?php $fn_plans = DB::table('charges')->where(['status' => 'active'])->orderBy('id', 'asc')->get(); ?>
                <?php foreach($fn_plans as $fnrow){ ?>
                <option value="<?php echo $fnrow->id; ?>" <?php echo (isset($o->$t_att) and $o->$t_att == $fnrow->id) ? 'selected' : ''; ?>><?php echo $fnrow->name; ?></option>
                <?php } ?>
			</select>
        </div>
    </div>
</div>
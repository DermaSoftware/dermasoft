<!--Field-->
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'category'; ?>
			<?php $n_att = 'Categoría'; ?>
			<label><?= $n_att ?></label>
			<select name="{{$t_att}}" class="input" <?= $modo=='detalles'?'readonly disabled':'' ?>>
				<option value="0" selected disabled >--Seleccione--</option>
				<?php foreach($o_categories as $key => $row){ ?>
				<option value="<?= $row->id ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row->id)?'selected':'' ?>><?= $row->name ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>

<!--Field-->
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'code'; ?>
			<?php $n_att = 'Código'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Código del servicio o procedimiento" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'name'; ?>
			<?php $n_att = 'Nombre'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Nombre del servicio o procedimiento" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'price'; ?>
			<?php $n_att = 'Precio'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="number" min="0" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>

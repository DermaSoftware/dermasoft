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
            <?php $t_att = 'description'; ?>
			<textarea name="{{$t_att}}" class="textarea" rows="4" placeholder="Descripción" <?= $modo=='detalles'?'readonly disabled':'required' ?> >{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}</textarea>
        </div>
    </div>
</div>
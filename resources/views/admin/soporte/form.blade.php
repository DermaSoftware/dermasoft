<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'title'; ?>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Asunto" value="{{ old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'description'; ?>
			<textarea name="{{$t_att}}" class="textarea" rows="4" placeholder="Ingrese el mensaje" <?= $modo=='detalles'?'readonly disabled':'required' ?> >{{ old($t_att) }}</textarea>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'file'; ?>
			<input name="{{$t_att}}" type="file" class="input" placeholder="Archivo" accept="image/*" />
			<small>Adjuntar solo imagenes (JPG, PNG, GIF)</small>
        </div>
    </div>
</div>
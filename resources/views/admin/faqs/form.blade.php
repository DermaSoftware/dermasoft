@if ($errors->any())
<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif
<div class="row g-4">
	<div class="col-sm-6">
		<label>Pregunta:</label>
		<?php $t_att = 'name'; ?>
		<input name="{{$t_att}}" type="text" class="form-control" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?php echo $modo=='detalles'?'readonly disabled':'required'; ?>/>
	</div>
	<div class="col-lg-6">
		<label>Categoría:</label>
		<?php $t_att = 'catfaq'; ?>
		<select name="{{$t_att}}" class="form-control" <?php echo $modo=='detalles'?'readonly disabled':'required'; ?>>
			<option value="" disabled selected>--Seleccione--</option>
			<?php $fn_aux = DB::table('catfaqs')->where(['status' => 'active'])->orderBy('id', 'asc')->get(); ?>
			<?php foreach($fn_aux as $fnrow){ ?>
			<option value="<?php echo $fnrow->id; ?>" <?php echo (isset($o->$t_att) AND $o->$t_att == $fnrow->id)?'selected':''; ?>><?php echo $fnrow->name; ?></option>
			<?php } ?>
		</select>
		<span class="form-text text-muted"></span>
	</div>
	<div class="col-sm-12">
		<label>Descripción:</label>
		<?php $t_att = 'description'; ?>
		<textarea name="{{$t_att}}" rows="8" class="form-control" <?php echo $modo=='detalles'?'readonly disabled':'required'; ?>/>{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}</textarea>
		<span class="form-text text-muted"></span>
	</div>
	
	<div class="col-12 text-end">
		<button type="submit" class="btn btn-{{ $modo=='crear'?'success':'warning' }}">{{ $modo=='crear'?'Agregar':'Actualizar' }}</button>
	</div>
</div>

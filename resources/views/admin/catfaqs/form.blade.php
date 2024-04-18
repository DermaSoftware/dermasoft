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
	<div class="col-sm-4">
		<label>Nombre:</label>
		<?php $t_att = 'name'; ?>
		<input name="{{$t_att}}" type="text" class="form-control" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?php echo $modo=='detalles'?'readonly disabled':'required'; ?>/>
	</div>
	
	<div class="col-12 text-end">
		<button type="submit" class="btn btn-{{ $modo=='crear'?'success':'warning' }}">{{ $modo=='crear'?'Agregar':'Actualizar' }}</button>
	</div>
</div>

@extends('layouts.app')

@section('content')
<div class="card bg-transparent border rounded-3">
	<!-- Card header -->
	<div class="card-header bg-transparent border-bottom">
		<h3 class="card-header-title mb-0">Editar contraseña</h3>
	</div>
	<!-- Card body START -->
	<div class="card-body">
		<!-- Form -->
		<form action="{{url($menu)}}" method="post" enctype="multipart/form-data" class="row g-4">
			@csrf
			<input name="passwordtoken" class="d-none" type="hidden" value="changepassword">
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>
			@endif
			<div class="col-md-4">
				<label class="form-label">Contraseña anterior</label>
				<input name="oldpass" class="form-control" type="password" required>
			</div>
			<div class="col-md-4">
				<label class="form-label">Contraseña nueva</label>
				<input name="password" class="form-control" type="password" required>
			</div>
			<div class="col-md-4">
				<label class="form-label">Confirmar contraseña</label>
				<input name="password_confirmation" class="form-control" type="password" required>
			</div>
			<!-- Save button -->
			<div class="d-sm-flex justify-content-end">
				<button type="submit" class="btn btn-primary mb-0">Actualizar</button>
			</div>
		</form>
	</div>
	<!-- Card body END -->
</div>
@endsection

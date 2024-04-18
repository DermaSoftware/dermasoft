@extends('layouts.app')

@section('content')
<div class="border rounded-3">
	<div class="row">
		<div class="col-12">
			<div class="card bg-transparent">
				<!-- Card header -->
				<div class="card-header bg-transparent border-bottom">
					<h3 class="card-header-title mb-0">Configuración de notificaciones</h3>
				</div>
				<!-- Card body START -->
				<div class="card-body">
					<!-- Form -->
					<form action="{{url($menu)}}" method="post" enctype="multipart/form-data">
						@csrf
						<input name="settingtoken" class="d-none" type="hidden" value="changesetting">
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
							</ul>
						</div>
						@endif
						
						<!-- Profile START -->
						<h5 class="mb-4">Configuraciones</h5>
						<div class="form-check form-switch form-check-md">
							<input name="twofa" class="form-check-input" type="checkbox" id="check_twofa" value="yes" <?= (!empty($o->twofa) AND $o->twofa=='yes')?'checked':'' ?>>
							<label class="form-check-label" for="check_twofa">Activar el doble factor de autenticación</label>
						</div>
						<!-- Profile START -->

						<hr><!-- Divider -->

						<!-- Notification START -->
						<h5 class="card-header-title">Configuración de notificaciones</h5>
						<p class="mb-2 mt-3">Elige el tipo de notificaciones que quieres recibir</p>
						<div class="form-check form-switch form-check-md mb-3">
							<input name="ntf_1" class="form-check-input" type="checkbox" id="check_ntf_1" value="yes" <?= (!empty($o->ntf_1) AND $o->ntf_1=='yes')?'checked':'' ?>>
							<label class="form-check-label" for="check_ntf_1">Notificar por email próximos en vivo</label>
						</div>
						<div class="form-check form-switch form-check-md mb-3">
							<input name="ntf_2" class="form-check-input" type="checkbox" id="check_ntf_2" value="yes" <?= (!empty($o->ntf_2) AND $o->ntf_2=='yes')?'checked':'' ?>>
							<label class="form-check-label" for="check_ntf_2">Notificar por email vencimiento de membresía</label>
						</div>
						<div class="form-check form-switch form-check-md mb-3">
							<input name="ntf_3" class="form-check-input" type="checkbox" id="check_ntf_3" value="yes" <?= (!empty($o->ntf_3) AND $o->ntf_3=='yes')?'checked':'' ?>>
							<label class="form-check-label" for="check_ntf_3">Notificar por email nuevas lecciones en biblioteca</label>
						</div>
						<div class="form-check form-switch form-check-md mb-3">
							<input name="ntf_4" class="form-check-input" type="checkbox" id="check_ntf_4" value="yes" <?= (!empty($o->ntf_4) AND $o->ntf_4=='yes')?'checked':'' ?>>
							<label class="form-check-label" for="check_ntf_4">Notificar para nuevos cursos agregados</label>
						</div>
						
						<!-- Notification START -->
						
						<!-- Save button -->
						<div class="d-sm-flex justify-content-end">
							<button type="submit" class="btn btn-primary mb-0">Actualizar</button>
						</div>
					</form>
				</div>
				<!-- Card body END -->
			</div>
		</div>
	</div>
</div>
@endsection

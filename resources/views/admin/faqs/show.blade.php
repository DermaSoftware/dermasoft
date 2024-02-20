@extends('layouts.admin')
@section('content')
	<div class="row mb-3">
		<div class="col-12 d-sm-flex justify-content-between align-items-center">
			<h1 class="h3 mb-2 mb-sm-0">{{$title}}</h1>
			<a href="{{url($menu)}}" class="btn btn-sm btn-dark mb-0">Regresar</a>
		</div>
	</div>
	<div class="card bg-transparent border">
		<div class="card-body">
			<form method="post" enctype="multipart/form-data">
				@include($menu.'.form',['modo' => 'detalles'])
			</form>
		</div>
	</div>
@endsection
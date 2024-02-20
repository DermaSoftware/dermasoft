@extends('layouts.app')

@section('content')
<div class="card bg-transparent border rounded-3">
	<!-- Card header -->
	<div class="card-header bg-transparent border-bottom">
		<h3 class="card-header-title mb-0">Calendario</h3>
	</div>
	<!-- Card body START -->
	<div class="card-body">
		<div class="custom-fullcalendar-not fullcalendar" id="calendar_fsc" data-urlinfo="<?php echo url('infoevt'); ?>" data-events="<?php echo url('infocalendar'); ?>"></div>
	</div>
	<!-- Card body END -->
</div>

<div class="modal fade calendar_modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles de la clase</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection

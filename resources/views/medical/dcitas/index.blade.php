@extends('layouts.app')
@section('content')
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
		<div class="demo-card no-margin-bottom">
            <div class="card-head">
                <div class="left">
                    <h3 class="title is-thin is-5"><?= $c_names ?></h3>
                </div>
				<div class="right">
                    <div class="buttons">
                        <a href="{{url('schedule/'.$o->cms)}}" target="_blank" class="button h-button is-light is-dark-outlined">
                            <span>Agendar nueva cita</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="s-card">
    <div id='calendar_doctor'></div>
	<a class="button h-button is-rounded h-modal-trigger is-hidden btn_cita_show" data-modal="cita_modal">Right Actions</a>
</div>


<div id="cita_modal" class="modal h-modal">
    <div class="modal-background  h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>Detalles de cita</h3>
                <button type="button" class="h-modal-close ml-auto" aria-label="close"><i data-feather="x"></i></button>
            </header>
            <div class="modal-card-body">
                <div class="inner-content">
					<div class="r-card-advanced box_info_cite">
                    </div>
                </div>
            </div>
            <div class="modal-card-foot is-end">
                <a class="button h-button is-rounded h-modal-close">Cerrar</a>
            </div>
        </div>
    </div>
</div>

@endsection
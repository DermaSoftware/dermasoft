@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($menu.'/dermatology/'.$o->uuid)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>HC. No. <?= $o->document_number ?></h3>
                        </div>
                        <div class="right">
                            <div class="buttons">
                                <?php if($is_records){ ?>
								<a href="<?= url($menu.'/listrecords/'.$o->uuid) ?>" class="button h-button is-primary is-dark-outlined">
                                    <span class="icon"><i class="fas fa-briefcase-medical"></i></span><span>Consultas <span class="tag is-rounded" style="height: 2em !important;"><?= $t_records ?></span> Ver Historial</span>
                                </a>
								<?php } ?>
                                <a href="{{url($menu)}}" class="button h-button is-light is-dark-outlined">
                                    <span class="icon"><i class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    
					@if ($errors->any())
					<div class="message is-danger">
						<a class="delete"></a>
						<div class="message-body">
							<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
							</ul>
						</div>
					</div>
					@endif
					
					<div class="tabs-wrapper">
						<div class="tabs-inner">
							<div class="tabs">
								<ul>
									<li data-tab="dermatology_tab" class="is-active"><a>Información general</a></li>
									<li data-tab="anamnesis_tab"><a>Anamnesis</a></li>
									<li data-tab="history_tab"><a>Antecedentes</a></li>
									<li data-tab="diagnostics_tab"><a>Diagnósticos</a></li>
									<li data-tab="indications_tab"><a>Indicaciones</a></li>
								</ul>
							</div>
						</div>
						<div id="dermatology_tab" class="tab-content is-active">
							@include($v_name.'.form.form_dermatology',['modo' => 'create'])
						</div>
						<div id="anamnesis_tab" class="tab-content">
							@include($v_name.'.form.form_anamnesis',['modo' => 'create'])
						</div>
						<div id="history_tab" class="tab-content">
							@include($v_name.'.form.form_history',['modo' => 'create'])
						</div>
						<div id="diagnostics_tab" class="tab-content">
							@include($v_name.'.form.form_diagnostics',['modo' => 'create'])
						</div>
						<div id="indications_tab" class="tab-content">
							@include($v_name.'.form.form_indications',['modo' => 'create'])
						</div>
					</div>
                </div>
            </div>
			</form>
        </div>
    </div>
</div>
@endsection
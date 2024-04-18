@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
		
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>Paciente: <?= $o->name ?> - <?= $o->email ?></h3>
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
                        </div>
                        <div class="right">
                            <div class="buttons">
                                <a target="_blank" href="<?= url($menu.'/dwpdf') ?>" class="button h-button is-light is-dark-outlined">
                                    <span class="icon"><i class="lnir lnir-download rem-100"></i></span><span>Descargar registro</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <!--Fieldset-->
                    <div class="fieldsetx">
                        <div class="fieldset-heading">
                        </div>
                        <div class="columns is-multiline">
                            
							
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'name'; ?>
										<?php $n_att = 'Primer nombre'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'scd_name'; ?>
										<?php $n_att = 'Segundo nombre'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'lastname'; ?>
										<?php $n_att = 'Primer apellido'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'scd_lastname'; ?>
										<?php $n_att = 'Segundo apellido'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'document_type'; ?>
										<?php $n_att = 'Tipo de documento'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'document_number'; ?>
										<?php $n_att = 'Número de documento'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'phone'; ?>
										<?php $n_att = 'Teléfono celular'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->fix_phone ?> <?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'email'; ?>
										<?php $n_att = 'Correo electrónico'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							
							<div class="column is-12">
								<hr>
							</div>
							
							<!--Table-->
							<div class="column is-12">
								
								<?php foreach($o_gallerys as $key => $row){ ?>
								<div class="media-flex-center is-responsive-mobile">
									<div class="is-big" style="width: 100%;height: auto;max-width: 200px;">
										<img class="avatar" src="<?= $row->photo ?>" alt="<?= $row->uuid ?>">
									</div>
									<div class="flex-meta">
										<span><?= $row->created_at ?></span>
										<span><?= $row->uuid ?></span>
									</div>
									<div class="flex-end">
										<a href="<?= $row->photo ?>" download="<?= $row->uuid ?>" class="button h-button is-primary is-elevated">Descargar</a>
									</div>
								</div>
								<?php } ?>
								
							</div>
							
                        </div>
                    </div>
                </div>
            </div>
			
        </div>
    </div>
</div>


<div id="capture_photographic_modal" class="modal h-modal is-medium">
    <div class="modal-background h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>Tomar foto</h3>
                <button class="h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body is-centered">
                <div class="field is-centered" style="width: 100%;text-align: center;">
					<video id="video_capture" width="320" height="240" class="hidden_fsc" autoplay></video>
					<canvas id="canvas" width="560" height="420" class="hidden_fsc"></canvas>
					<a download="capture" id="link_download_capture" href="#" class="hidden_fsc"></a>
				</div>
            </div>
            <div class="modal-card-foot is-centered">
                <a class="button h-button is-rounded h-modal-close">Cancelar</a>
				<button id="start-camera" type="button" class="button h-button is-primary is-raised is-rounded">Iniciar camara</button>
				<button id="click-photo" type="button" class="button h-button is-primary is-raised is-rounded hidden_fsc">Tomar foto</button>
            </div>
        </div>
    </div>
</div>


<div id="upload_photographic_modal" class="modal h-modal is-small">
    <div class="modal-background h-modal-close"></div>
    <div class="modal-content">
        <form action="{{url($menu.'/gallery/'.$o->uuid)}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="modal-card">
            <header class="modal-card-head">
                <h3>Cargar registro</h3>
                <button class="h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body is-centered">
                <div class="field">
					
					<div class="control">
						<div class="file is-boxed is-primary is-centered">
						  <label class="file-label">
							  <input class="file-input" type="file" name="photo" required>
							  <span class="file-cta">
								  <span class="file-icon">
									  <i class="lnil lnil-32 lnil-cloud-upload"></i>
								  </span>
								  <span class="file-label">
									  Seleccione una foto…
								  </span>
							  </span>
						  </label>
						</div>
					</div>
					
				</div>
            </div>
            <div class="modal-card-foot is-centered">
                <a class="button h-button is-rounded h-modal-close">Cancelar</a>
                <button type="submit" class="button h-button is-primary is-raised is-rounded">Agregar</button>
            </div>
        </div>
		</form>
    </div>
</div>


@endsection
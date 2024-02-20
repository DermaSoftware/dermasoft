@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($menu.'/'.$hc_view.'/create/'.$o->uuid)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>Consentimiento Informado</h3>
                        </div>
                        <div class="right">
                            <div class="buttons">
                                <?php if($is_records){ ?>
								<a href="<?= url($menu.'/'.$hc_view.'/list/'.$o->uuid) ?>" class="button h-button is-primary is-dark-outlined">
                                    <span class="icon"><i class="fas fa-briefcase-medical"></i></span><span>Consentimientos <span class="tag is-rounded" style="height: 2em !important;"><?= $t_records ?></span> Ver Historial</span>
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
					
					<div class="columns is-multiline">
						<!--Field-->
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<?php $t_att = 'consent'; ?>
									<?php $n_att = 'Consentimiento'; ?>
									<label><?= $n_att ?></label>
									<select name="<?= $t_att ?>" class="input sel_consent_x" required>
										<option value="0" data-val="" selected disabled >--Seleccione--</option>
										<?php foreach($o_cts as $key_sel => $row_sel){ ?>
										<option value="<?= $row_sel->id ?>" data-val="<?= $row_sel->description ?>"><?= $row_sel->name ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<?php $t_att = 'note'; ?>
									<?php $n_att = 'Contenido'; ?>
									<label><?= $n_att ?></label>
									<textarea name="<?= $t_att ?>" rows="8" class="textarea txt_note_consent" placeholder="<?= $n_att ?>" required>{{ old($t_att) }}</textarea>
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<?php $t_att = 'comments'; ?>
									<?php $n_att = 'Observaciones adicionales'; ?>
									<label><?= $n_att ?></label>
									<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-6">
							<div class="field">
								<div class="control">
									<?php $t_att = 'doctor'; ?>
									<?php $n_att = 'Médico'; ?>
									<label><?= $n_att ?></label>
									<select name="<?= $t_att ?>" class="input" required>
										<option value="" selected disabled >--Seleccione--</option>
										<?php foreach($o_dts as $key_sel => $row_sel){ ?>
										<option value="<?= $row_sel->id ?>"><?= $row_sel->name ?><?= !empty($row_sel->scd_name)?' '.$row_sel->scd_name:'' ?> <?= $row_sel->lastname ?> <?= $row_sel->scd_lastname ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-6">
							<div class="field">
								<div class="control">
									<?php $t_att = 'tag'; ?>
									<?php $n_att = 'Tipo de procedimiento'; ?>
									<label><?= $n_att ?></label>
									<select name="<?= $t_att ?>" class="input" required>
										<option value="" selected disabled >--Seleccione--</option>
										<?php $options = ['dermatology' => 'Dermatología general','biopsies' => 'Biopsías y/o procedimientos','crypy' => 'Crioterapia','aesthetic' => 'Procedimientos Estéticos','surgical' => 'Descripción Quirúrgica']; ?>
										<?php foreach($options as $key => $row){ ?>
										<option value="<?= $key ?>"><?= $row ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="column is-12">
							<div class="field"><div class="control"><label class="checkbox is-outlined is-circle is-primary"><input name="patient_authorization" type="radio" value="Autoriza" checked><span></span> Autoriza</label>  <label class="checkbox is-outlined is-circle is-primary"><input name="patient_authorization" type="radio" value="No autoriza"><span></span> No autoriza</label></div></div>
						</div>
						<div class="column is-12">
							<h5 class="authorization_x_auto">Manifiesto que, habiendo recibido la información relacionada con el procedimiento, he decidido dar mi consentimiento</h5>
							<h5 class="authorization_x_no_auto is-hidden">Manifiesto que habiendo recibido la información relacionada con el procedimiento, he decidido NO dar mi consentimiento</h5>
						</div>
						
						<!--Field-->
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<?php $t_att = 'signature'; ?>
									<?php $n_att = 'Firma paciente'; ?>
									<label><?= $n_att ?></label>
									<input name="<?= $t_att ?>" type="file" class="input" required />
								</div>
							</div>
						</div>
						
						<div class="column is-12">
							<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="notification_email" type="checkbox" value="yes"><span></span> Enviar al correo del paciente</label></div></div>
							<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="notification_whatsapp" type="checkbox" value="yes"><span></span> Enviar al whatsapp del paciente</label></div></div>
						</div>
						
					</div>
					<hr>
					<div style="width: 100%;text-align: right;padding: 10px;"><button type="submit" class="button h-button is-primary is-raised">Guardar</button></div>
					
                </div>
            </div>
			</form>
        </div>
    </div>
</div>
@endsection
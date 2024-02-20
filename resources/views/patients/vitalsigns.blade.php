@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($menu.'/vitalsigns/'.$o->uuid)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
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
                                <a href="{{url($menu)}}" class="button h-button is-light is-dark-outlined">
                                    <span class="icon"><i class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                                </a>
                                <button type="submit" class="button h-button is-primary is-raised">Guardar</button>
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
							
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'heart_rate'; ?>
										<?php $n_att = 'Frecuencia cardiaca'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'breathing_frequency'; ?>
										<?php $n_att = 'Frecuencia respiratoria'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'weight'; ?>
										<?php $n_att = 'Peso'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'blood_pressure'; ?>
										<?php $n_att = 'Tensión arterial'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'temperature'; ?>
										<?php $n_att = 'Temperatura'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'saturation'; ?>
										<?php $n_att = 'Saturación'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-6">
								<div class="field">
									<div class="control">
										<?php $t_att = 'querytype'; ?>
										<?php $n_att = 'Tipo de consulta'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>" class="input">
											<option value="0" selected disabled >--Seleccione--</option>
											<?php foreach($o_qtys as $key => $row){ ?>
											<option value="<?= $row->id ?>"><?= $row->name ?></option>
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
										<?php $n_att = 'Observaciones'; ?>
										<label><?= $n_att ?></label>
										<textarea name="<?= $t_att ?>" class="textarea" rows="4" placeholder="<?= $n_att ?>"><?= old($t_att) ?></textarea>
									</div>
								</div>
							</div>
							
                        </div>
                    </div>
                </div>
            </div>
			</form>
        </div>
    </div>
</div>
@endsection
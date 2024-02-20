@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($menu.'/suppdata/'.$o->uuid)}}" method="post" enctype="multipart/form-data">
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
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'photo'; ?>
										<?php $n_att = 'Foto'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="file" class="input" />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'birth'; ?>
										<?php $n_att = 'Fecha de nacimiento'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="date" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'gender'; ?>
										<?php $n_att = 'Género'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>" class="input" required>
											<option value="" selected disabled >--Seleccione--</option>
											<?php $options = ['masculino','femenino']; ?>
											<?php foreach($options as $key => $row){ ?>
											<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?>><?= $row ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'civil_status'; ?>
										<?php $n_att = 'Estado civil'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>" class="input">
											<option value="" selected disabled >--Seleccione--</option>
											<?php $options = ['soltero','casado','unión libre','desconocido','viudo','divorciado','otro']; ?>
											<?php foreach($options as $key => $row){ ?>
											<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?>><?= $row ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'country'; ?>
										<?php $n_att = 'País de residencia'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>" class="countries_fn" style="width: 100%;" data-url="<?= url('patients/countries') ?>" data-select_id="<?= isset($o->$t_att)?$o->$t_att:'' ?>"></select>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'department'; ?>
										<?php $n_att = 'Departamento'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'city'; ?>
										<?php $n_att = 'Ciudad'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'regime'; ?>
										<?php $n_att = 'Régimen'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>" class="input">
											<option value="" selected disabled >--Seleccione--</option>
											<?php $options = ['contributivo','subsidiado','vinculado','particular','otro','desplazado']; ?>
											<?php foreach($options as $key => $row){ ?>
											<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?>><?= $row ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'campus'; ?>
										<?php $n_att = 'Sede'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>" class="input">
											<option value="0" selected disabled >--Seleccione--</option>
											<?php foreach($o_campus as $key => $row){ ?>
											<option value="<?= $row->id ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row->id)?'selected':'' ?>><?= $row->name ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'occupation'; ?>
										<?php $n_att = 'Ocupación'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'stratum'; ?>
										<?php $n_att = 'Estrato'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'name_attendant'; ?>
										<?php $n_att = 'Nombre del acudiente'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'relationship'; ?>
										<?php $n_att = 'Parentesco'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-2">
								<div class="field">
									<div class="control">
										<?php $t_att = 'fix_phone_attendant'; ?>
										<?php $n_att = 'Código del país'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>" class="countrieskeys_fn" style="width: 100%;" data-url="<?= url('patients/codes') ?>" data-select_id="<?= isset($o->$t_att)?$o->$t_att:'' ?>"></select>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-2">
								<div class="field">
									<div class="control">
										<?php $t_att = 'phone_attendant'; ?>
										<?php $n_att = 'Teléfono acudiente'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'signature'; ?>
										<?php $n_att = 'Firma'; ?>
										<label><?= $n_att ?></label>
										<input name="{{$t_att}}" type="file" class="input" />
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
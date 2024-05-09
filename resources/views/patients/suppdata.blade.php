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
                                <a href="{{url($url_preview)}}" class="button h-button is-light is-dark-outlined">
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
										<?php $n_att = 'Número de celular'; ?>
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
                            @if($url_preview !== '')
                            <div class="column is-4 is-hidden">
								<div class="field">
									<div class="control">
										<?php $t_att = 'url_preview'; ?>
										<?php $n_att = 'url_preview'; ?>
										<label><?= $n_att ?></label>
										<input name="url_preview" type="text" class="input" value="{{$url_preview}}"/>
									</div>
								</div>
							</div>
                            @endif
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'photo'; ?>
										<?php $n_att = 'Foto'; ?>
										<label><?= $n_att ?></label>
                                        <input <?= $company->photo_active =='no' ? 'disabled' : ''?> <?= $company->photo_required =='si' ? 'required' : ''?>  name="{{$t_att}}" type="file" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" />
										{{-- <input name="{{$t_att}}" type="file" class="input" php/> --}}
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
										<input name="{{$t_att}}" type="date" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"
                                        <?= $company->birth_active =='no' ? 'disabled' : ''?> <?= $company->birth_required =='si' ? 'required' : ''?>/>
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
										<select name="<?= $t_att ?>" class="input" <?= $company->gender_active =='no' ? 'disabled' : ''?> <?= $company->gender_required =='si' ? 'required' : ''?>>
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
							{{-- <div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'civil_status'; ?>
										<?php $n_att = 'Estado civil'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>" class="input" <?= $company->civil_status_active =='no' ? 'disabled' : ''?> <?= $company->civil_status_required =='si' ? 'required' : ''?>>
											<option value="" selected disabled >--Seleccione--</option>
											<?php $options = ['soltero','casado','unión libre','desconocido','viudo','divorciado','otro']; ?>
											<?php foreach($options as $key => $row){ ?>
											<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?>><?= $row ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div> --}}
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'country'; ?>
										<?php $n_att = 'País'; ?>
										<label><?= $n_att ?></label>
										<select <?= $company->country_active =='no' ? 'disabled' : ''?> <?= $company->country_required =='si' ? 'required' : ''?> name="<?= $t_att ?>" class="countries_fn" style="width: 100%;" data-url="<?= url('patients/countries') ?>" data-select_id="<?= isset($o->$t_att)?$o->$t_att:'' ?>"></select>
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
										<input <?= $company->department_active =='no' ? 'disabled' : ''?> <?= $company->department_required =='si' ? 'required' : ''?>  name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'city'; ?>
										<?php $n_att = 'Ciudad de residencia'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->city_active =='no' ? 'disabled' : ''?> <?= $company->city_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" />
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
										<?php $n_att = 'Sede asignada al paciente'; ?>
										<label><?= $n_att ?></label>
										<select <?= $company->campus_active =='no' ? 'disabled' : ''?> <?= $company->campus_required =='si' ? 'required' : ''?> name="<?= $t_att ?>" class="input">
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
										<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $company->$t_att.'_active' =='no' ? 'disabled' : ''?> <?= $company->$t_att.'_required' =='si' ? 'required' : ''?> />
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
							{{-- <div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'attendant'; ?>
										<?php $n_att = 'Acudiente'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->attendant_active =='no' ? 'disabled' : ''?> <?= $company->attendant_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" />
									</div>
								</div>
							</div> --}}
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'name_attendant'; ?>
										<?php $n_att = 'Nombre del acudiente'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->name_attendant_active =='no' ? 'disabled' : ''?> <?= $company->name_attendant_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'relationship'; ?>
										<?php $n_att = 'Parentesco del acudiente'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->relationship_active =='no' ? 'disabled' : ''?> <?= $company->_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" />
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
										<select <?= $company->fix_phone_attendant_active =='no' ? 'disabled' : ''?> <?= $company->fix_phone_attendant_required =='si' ? 'required' : ''?>  name="<?= $t_att ?>" class="countrieskeys_fn" style="width: 100%;" data-url="<?= url('patients/codes') ?>" data-select_id="<?= isset($o->$t_att)?$o->$t_att:'' ?>"></select>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-2">
								<div class="field">
									<div class="control">
										<?php $t_att = 'phone_attendant'; ?>
										<?php $n_att = 'Teléfono del acudiente'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->phone_attendant_active =='no' ? 'disabled' : ''?> <?= $company->phone_attendant_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" />
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
                            <!--Field-->
							{{-- <div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'affiliate_type'; ?>
										<?php $n_att = 'Tipo de Afiliado'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->affiliate_type_active =='no' ? 'disabled' : ''?> <?= $company->affiliate_type_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" />
									</div>
								</div>
							</div>
                            <!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'affiliate_type_ssg'; ?>
										<?php $n_att = 'Tipo de Afiliado SSG'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->affiliate_type_ssg_active =='no' ? 'disabled' : ''?> <?= $company->affiliate_type_ssg_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"/>
									</div>
								</div>
							</div> --}}
                            <!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'education'; ?>
										<?php $n_att = 'Nivel de educación'; ?>
										<?php $education_type = ['primaria','bachillerato','tecnológica','técnica','universitaria','postgrado','doctorado']; ?>
										<label><?= $n_att ?></label>
                                        <select <?= $company->education_active =='no' ? 'disabled' : ''?> <?= $company->education_required =='si' ? 'required' : ''?> name="<?= $t_att ?>" class="input">
											<option value="0" selected disabled >--Seleccione--</option>
											<?php foreach($education_type as $key => $row){ ?>
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
										<?php $t_att = 'ethnic_group'; ?>
										<?php $n_att = 'Grupo étnico'; ?>
										<?php $ethnic_group_type = ['Mestizos','Caucásicos','Afrocolombianos','Indígenas','Otros Grupos']; ?>
										<label><?= $n_att ?></label>
                                        <select <?= $company->ethnic_group_active == 'no' ? 'disabled' : ''?> <?= $company->ethnic_group_required =='si' ? 'required' : ''?> name="<?= $t_att ?>" class="input">
											<option value="0" selected disabled >--Seleccione--</option>
											<?php foreach($ethnic_group_type as $key => $row){ ?>
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
										<?php $t_att = 'population_group'; ?>
										<?php $n_att = 'Grupo poblacional'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->population_group_active =='no' ? 'disabled' : ''?> <?= $company->population_group_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"/>
									</div>
								</div>
							</div>
                            <!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'eps'; ?>
										<?php $n_att = 'EPS'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->eps_active =='no' ? 'disabled' : ''?> <?= $company->eps_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"/>
									</div>
								</div>
							</div>
                            <!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'date_affiliation'; ?>
										<?php $n_att = 'Fecha de afiliación'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->date_affiliation_active =='no' ? 'disabled' : ''?> <?= $company->date_affiliation_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="date" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"/>
									</div>
								</div>
							</div>
                            <!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'prepaid'; ?>
										<?php $n_att = 'Prepagada'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->prepaid_active =='no' ? 'disabled' : ''?> <?= $company->prepaid_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"/>
									</div>
								</div>
							</div>
                            <!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'benefits_plan'; ?>
										<?php $n_att = 'Plan de beneficios'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->benefits_plan_active =='no' ? 'disabled' : ''?> <?= $company->benefits_plan_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"/>
									</div>
								</div>
							</div>
                            <!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'health_care'; ?>
										<?php $n_att = 'Prog. de Atención en salud'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->health_care_active =='no' ? 'disabled' : ''?> <?= $company->_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"/>
									</div>
								</div>
							</div>
                            <!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'notes'; ?>
										<?php $n_att = 'Notas generales de atención'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->notes_active =='no' ? 'disabled' : ''?> <?= $company->notes_active_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"/>
									</div>
								</div>
							</div>
                            {{-- <!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'contract_number'; ?>
										<?php $n_att = 'Número de contrato'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->contract_number_active =='no' ? 'disabled' : ''?> <?= $company->_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"/>
									</div>
								</div>
							</div> --}}
                            <!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'occupational_hazards'; ?>
										<?php $n_att = 'Admin. de riesgos laborales'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->occupational_hazards_active =='no' ? 'disabled' : ''?> <?= $company->occupational_hazards_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"/>
									</div>
								</div>
							</div>
                            <!--Field-->
							<div class="column is-4">
								<div class="field">
									<div class="control">
										<?php $t_att = 'pension_funds'; ?>
										<?php $n_att = 'Admin. de fondos de pensiones'; ?>
										<label><?= $n_att ?></label>
										<input <?= $company->pension_funds_active =='no' ? 'disabled' : ''?> <?= $company->pension_funds_required =='si' ? 'required' : ''?> name="{{$t_att}}" type="text" class="input" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}"/>
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

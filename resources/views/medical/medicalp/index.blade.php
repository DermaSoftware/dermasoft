@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($hc_view.'/create/'.$o->uuid)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3><?= $c_name ?> - Paciente No. <?= $o->document_number ?></h3>
                        </div>
                        <div class="right">
                            <div class="buttons">
                                <?php if($is_records){ ?>
								<a href="<?= url($hc_view.'/list/'.$o->uuid) ?>" class="button h-button is-primary is-dark-outlined">
                                    <span class="icon"><i class="fas fa-briefcase-medical"></i></span><span><?= $c_names ?> <span class="tag is-rounded" style="height: 2em !important;"><?= $t_records ?></span> Ver Historial</span>
                                </a>
								<?php } ?>
                                <a href="{{url($hc_view)}}" class="button h-button is-light is-dark-outlined">
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
									<label>Medicamento</label>
									<select class="input mp_f1_med select2_fsc">
										<?php foreach($o_medicines as $key_sel => $row_sel){ ?>
										<option value="<?= $row_sel->name ?> - <?= $row_sel->description ?>"><?= $row_sel->name ?> - <?= $row_sel->description ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-3">
							<div class="field">
								<div class="control">
									<label>Dosis</label>
									<input type="text" class="input mp_f2_dose" placeholder="Dosis" />
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-3">
							<div class="field">
								<div class="control">
									<label>Frecuencia</label>
									<input type="text" class="input mp_f3_fre" placeholder="Frecuencia" />
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-3">
							<div class="field">
								<div class="control">
									<label>Vía de administración</label>
									<select class="input mp_f4_via">
										<option value="" selected disabled >--Seleccione--</option>
										<?php $options = ['Topico','Oral','Intravenoso','Intramuscular','Subcutáneo','Intralesional']; ?>
										<?php foreach($options as $key => $row){ ?>
										<option value="<?= $row ?>"><?= $row ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-3">
							<div class="field">
								<div class="control">
									<label>Duración (Días)</label>
									<input type="text" class="input mp_f5_dur" placeholder="Duración del tratamiento (Días)" />
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<label>Indicaciones</label>
									<textarea rows="2" class="textarea mp_f6_ind" placeholder="Indicaciones" ></textarea>
								</div>
							</div>
						</div>
						<div class="column is-12">
							<a href="javascript:void(0)" class="button h-button is-primary is-dark-outlined btn_add_pm">Agregar</a>
						</div>
						<div class="column is-12">
							<hr>
						</div>

						<div class="column is-12 inner_table_mp is-hidden">
							<div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
								<h4 class="title is-5 is-narrow">Medicamentos seleccionados</h4>
								<table class="table is-hoverable is-fullwidth table_medicalp">
									<tbody>
										<tr>
											<th>Medicamento</th>
											<th>Dosis</th>
											<th>Frecuencia</th>
											<th>Vía de administración</th>
											<th>Duración (Días)</th>
											<th>Indicaciones</th>
											<th class="is-end">
												<div class="dark-inverted">
													Eliminar
												</div>
											</th>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<!--Field-->
						<div class="column is-3">
							<div class="field">
								<div class="control">
									<label>Vigencia (Días)</label>
									<input name="validity" type="number" class="input" placeholder="Vigencia (Días)" />
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

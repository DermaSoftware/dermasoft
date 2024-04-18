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
                            <h3>Check list seguridad del paciente</h3>
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
						
						<div class="column is-12">
							<div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
								<h4 class="title is-5 is-narrow">Lista de chequeo</h4>
								<table class="table is-hoverable is-fullwidth table_ad_indications" style="">
									<tbody>
										<tr>
											<th>No. item</th>
											<th>Descripción</th>
											<th>Aplicabilidad</th>
											<th>Observaciones</th>
										</tr>
										<?php foreach($o_cts as $key => $row){ ?>
										<tr>
											<td><?= $key+1 ?></td>
											<td>
												<div class="field"><div class="control"><input name="description[]" type="text" class="input" value="<?= $row->description ?>" required></div></div>
											</td>
											<td>
												<div class="field">
													<div class="control">
														<select name="applicability[]" class="input" required>
															<option value="Si">Si</option>
															<option value="No">No</option>
															<option value="No aplica">No aplica</option>
														</select>
													</div>
												</div>
											</td>
											<td>
												<div class="field"><div class="control"><input name="comments[]" type="text" class="input"></div></div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
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
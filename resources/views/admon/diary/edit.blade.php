@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($menu.'/'.$o->uuid)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			{{method_field('PATCH')}}
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>{{$title}}</h3>
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
                            <h4>Configurar  horarios</h4>
                            <p></p>
                        </div>
                        <div class="columns is-multiline">
                            <div class="column is-12">
								<table class="table display compact is-fullwidth" style="width:100%">
									<thead>
										<tr>
											<th>Día</th>
											<th>Sede</th>
											<th>Modalidad</th>
											<th>Hora inicio</th>
											<th>Hora fin</th>
										</tr>
									</thead>
									<tbody>
										<?php $d_names = ['Ninguno','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo']; ?>
										<?php $options = ['Presencial','Teleconsulta','Domiciliaria']; ?>
										<?php for($i = 1;$i <= 7; $i++){ ?>
										<tr>
											<td>
												<div class="field">
													<div class="control">
														<?php $t_att = 'day'.$i; ?>
														<label class="checkbox">
															<input name="<?= $t_att ?>" type="checkbox" value="yes" <?= $o->$t_att=='yes'?'checked':'' ?> >
															<span></span>
															<?= $d_names[$i] ?>
														</label>
													</div>
												</div>
											</td>
											<td>
												<div class="field">
													<div class="control">
														<?php $t_att = 'campus'.$i; ?>
														<div class="select is-rounded">
															<select name="<?= $t_att ?>">
																<option value="0" selected disabled >--Seleccione--</option>
																<?php foreach($o_cps as $key => $row){ ?>
																<option value="<?= $row->id ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row->id)?'selected':'' ?>><?= $row->name ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
												</div>
											</td>
											<td>
												<div class="field">
													<div class="control">
														<?php $t_att = 'modality'.$i; ?>
														<?php $n_att = 'Nombre'; ?>
														<div class="select is-rounded">
															<select name="<?= $t_att ?>">
																<option value="" selected disabled >--Seleccione--</option>
																<?php foreach($options as $key => $row){ ?>
																<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?>><?= $row ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
												</div>
											</td>
											<td>
												<div class="field">
													<div class="control">
														<?php $t_att = 'time_init'.$i; ?>
														<?php $n_att = 'Nombre'; ?>
														<input name="<?= $t_att ?>" type="time" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" />
													</div>
												</div>
											</td>
											<td>
												<div class="field">
													<div class="control">
														<?php $t_att = 'time_end'.$i; ?>
														<?php $n_att = 'Nombre'; ?>
														<input name="<?= $t_att ?>" type="time" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" />
													</div>
												</div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<!--Field-->
							<div class="column is-12">
								<div class="field">
									<div class="control">
										<?php $t_att = 'qts'; ?>
										<?php $n_att = 'Tipos de consulta'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>[]" multiple class="select2_fsc is-fullwidth" required>
											<?php foreach($o_pcs as $key_sel => $row_sel){ ?>
											<option value="<?= $row_sel->id ?>" <?= in_array($row_sel->id,$o_ids)?'selected':'' ?> ><?= $row_sel->name ?></option>
											<?php } ?>
										</select>
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
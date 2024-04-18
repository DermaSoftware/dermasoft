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
							<div class="s-card">
								<h3 class="subtitle">Diagnóstico</h3>
                                <div class="columns">
                                    <div class="column is-5">
                                        <div class="field">
                                            <div class="control">
                                                <select name="diagnoses" id="diagnoses" class="input select2_fsc">
                                                    @foreach ($o_diagnoses as $item)
                                                    <option data-code="{{$item->code}}" data-name="{{$item->name}}" value="{{$item->id}}">{{$item->code}}-{{$item->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-5">
                                        <div class="field">
                                            <div class="control">
                                                <select name="o_diagnosesty" id="o_diagnosesty" class="input">
                                                    <option value="" selected disabled >--Seleccione--</option>
                                                    <?php foreach($o_diagnosesty as $key_sel => $row_sel){ ?>
                                                    <option value="<?= $row_sel->id ?>"><?= $row_sel->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-2">
                                        <button type="button" class="button is-primary is-circle is-elevated btn_diagnoses_eo"><span class="icon is-small"><i class="fas fa-plus"></i></span></button>
                                    </div>
                                </div>
							</div>

							<div class="s-card table_diagnoses_eo_fn is-hidden">
								<table class="table is-hoverable is-fullwidth">
									<tbody>
										<tr>
											<th>Código</th>
											<th>Nombre</th>
											<th>Tipo</th>
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
						<div class="column is-10">
							<div class="field">
								<div class="control">
									<label>Examen</label>
									<select class="input inpeo_exam select2_fsc">
										<option value="0" selected disabled >--Seleccione--</option>
										<?php foreach($o_labexams as $key_sel => $row_sel){ ?>
										<option value="<?= $row_sel->id ?>"><?= $row_sel->name ?> - <?= $row_sel->description ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="column is-2">
							<div>&nbsp;</div>
							<a href="javascript:void(0)" class="button h-button is-primary is-dark-outlined btn_add_eoexam">Agregar</a>
						</div>

						<div class="column is-12">


							<div class="inner_table_eo_exams is-hidden">
								<h2 class="title is-thin is-5" style="margin: 0;">Solicitud de examenes</h2>
								<div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
									<table class="table is-hoverable is-fullwidth table_eo_exams">
										<tbody>
											<tr>
												<th>Examen</th>
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
						</div>

						<div class="column is-12">
							<hr>
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

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
									<label>Patología</label>
									<select class="input pths_f1 select2_fsc">
										<option value="" data-code="" data-note="" selected disabled>--Seleccione--</option>
										<?php foreach($o_paths as $key_sel => $row_sel){ ?>
										<option value="<?= $row_sel->name ?>" data-code="<?= $row_sel->name ?>" data-note="<?= $row_sel->description ?>"><?= $row_sel->name ?> - <?= $row_sel->description ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<!--Field-->
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<label>Origen de la muestra</label>
									<textarea rows="2" class="textarea pths_f2" placeholder="Origen de la muestra" ></textarea>
								</div>
							</div>
						</div>
						<div class="column is-12">
							<a href="javascript:void(0)" class="button h-button is-primary is-dark-outlined btn_add_pths">Agregar</a>
						</div>
						<div class="column is-12">
							<hr>
						</div>

						<div class="column is-12 inner_table_pths is-hidden">
							<div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
								<h4 class="title is-5 is-narrow">Patologías seleccionadas</h4>
								<table class="table is-hoverable is-fullwidth table_pths">
									<tbody>
										<tr>
											<th>Código</th>
											<th>Patología</th>
											<th>Origen</th>
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
						<div class="column is-12">
							<div class="field">
								<div class="control">
									<?php $t_att = 'annexes'; ?>
									<?php $n_att = 'Observaciones y/o anexos'; ?>
									<label><?= $n_att ?></label>
									<textarea name="<?= $t_att ?>" rows="2" class="textarea" placeholder="<?= $n_att ?>" ></textarea>
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

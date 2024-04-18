@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($menu.'/'.$o->uuid).'/update_lock'}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3><?= $title ?> (<?= $usr->name ?> - <?= $usr->email ?>)</h3>
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
                                <a href="{{url($menu.'/'.$usr->uuid.'/locks')}}" class="button h-button is-light is-dark-outlined">
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
									<div class="control has-icon">
										<?php $t_att = 'date_init'; ?>
										<?php $n_att = 'Fecha de inicio'; ?>
										<input name="<?= $t_att ?>" id="pickaday-datepicker-fsc1" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
										<div class="form-icon"><i data-feather="calendar"></i></div>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'time_init'; ?>
										<?php $n_att = 'Hora de inicio'; ?>
										<input name="<?= $t_att ?>" id="bulma-datepicker-time-fsc1" type="time" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control has-icon">
										<?php $t_att = 'date_end'; ?>
										<?php $n_att = 'Fecha de fin'; ?>
										<input name="<?= $t_att ?>" id="pickaday-datepicker-fsc2" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
										<div class="form-icon"><i data-feather="calendar"></i></div>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'time_end'; ?>
										<?php $n_att = 'Hora de fin'; ?>
										<input name="<?= $t_att ?>" id="bulma-datepicker-time-fsc2" type="time" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" required />
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-12">
								<div class="field">
									<div class="control">
										<?php $t_att = 'reason'; ?>
										<?php $n_att = 'Motivo'; ?>
										<label><?= $n_att ?></label>
										<textarea name="<?= $t_att ?>" class="textarea" rows="4" placeholder="<?= $n_att ?>" required >{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}</textarea>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-12">
								<div class="field">
									<div class="control">
										<?php $t_att = 'note'; ?>
										<?php $n_att = 'Nota adicional'; ?>
										<label><?= $n_att ?></label>
										<textarea name="<?= $t_att ?>" class="textarea" rows="4" placeholder="<?= $n_att ?>" >{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}</textarea>
									</div>
								</div>
							</div>
							<!--Field-->
                        </div>
                    </div>
                </div>
            </div>
			</form>
        </div>
    </div>
</div>
@endsection

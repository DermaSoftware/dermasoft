@extends('agendar.app')

@section('content')



<div class="status-block">
    <div class="status-header">
        <div class="indicator"></div>
        <div class="title is-4"><?= $o_user->name ?> <?= $o_user->lastname ?></div>
        <div class="subtitle is-6"><?= $o_user->email ?></div>
    </div>

    <div class="status-uptime">
        <div class="title">Sede</div>
        <div class="uptime"><span class="tag is-rounded is-purple is-elevated"><?= $o_sol->company_class->name ?></span></div>
    </div>

	<div class="status-uptime">
        <div class="title">Tipo de consulta</div>
        <div class="uptime"><span class="tag is-rounded is-purple is-elevated"><?= $o_sol->querytypes()->first()->name ?></span></div>
    </div>

	<div class="status-uptime">
        <div class="title">Doctor(a)</div>
        <div class="uptime"><span class="tag is-rounded is-purple is-elevated"><?= $o_sol->doctors()->first()->name ?></span></div>
    </div>

	<div class="status-uptime">
        <div class="title">Fecha</div>
        <div class="uptime"><span class="tag is-rounded is-primary is-elevated date-view-fsc">No seleccionada</span></div>
    </div>

</div>





<div class="account-wrapper">

    <div class="columns">

        <div class="column is-12">

            <form action="<?= url('svsolicitude/'.$o_sol->uuid) ?>" method="post" enctype="multipart/form-data">

			{{csrf_field()}}

			<input name="action_type" type="hidden" value="date_quote" />

			<div class="account-box is-form is-footerless">

                <div class="form-head stuck-header">

                    <div class="form-head-inner">

                        <div class="left">

                            <h3>Seleccionar fecha de consulta:</h3>

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

                                <button type="submit" class="button h-button is-primary is-raised btn_send_calendar" disabled>AGENDAR</button>

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

							<div class="column is-6 is-hidden">

								<div class="field">

									<div class="control">

										<?php $t_att = 'action_value'; ?>

										<?php $n_att = 'Fecha'; ?>

										<label><?= $n_att ?></label>

										<input id="date_quote" name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />

									</div>

								</div>

							</div>

							<!--Field-->

							<div class="column is-6">

								<div class="field">

									<div class="control">

										<?php $t_att = 'time_quote'; ?>

										<?php $n_att = 'Hora'; ?>

										<label><?= $n_att ?></label>

										<input name="<?= $t_att ?>" id="bulma-datepicker-time-fsc1" data-start-time="08:00" type="time" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />

									</div>

								</div>

							</div>

							<!--Field-->

							<div class="column is-6">

								<div class="field">

									<div class="control">

										<?php $n_att = 'Modalidad'; ?>

										<label><?= $n_att ?></label>

										<select name="modality" class="input" required>

											<?php $options = ['Presencial','Teleconsulta']; ?>

											<?php foreach($options as $key => $row){ ?>

											<option value="<?= $row ?>"><?= $row ?></option>

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

										<?php $n_att = 'Nota'; ?>

										<label><?= $n_att ?></label>

										<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />

									</div>

								</div>

							</div>



							<div class="column is-12">

								<div id='calendar'></div>

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

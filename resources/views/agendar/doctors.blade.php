@extends('agendar.app')
@section('content')

<div class="status-block">
    <div class="status-header">
        <div class="indicator"></div>
        <div class="title is-4"><?= $o_user->name ?> <?= $o_user->lastname ?></div>
        <div class="subtitle is-6"><?= $o_user->email ?></div>
    </div>
	<div class="status-uptime">
        <div class="title">Tipo de consulta</div>
        <div class="uptime"><span class="tag is-rounded is-purple is-elevated"><?= $o_sol->querytypes()->first()->name ?></span></div>
    </div>
</div>


<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="<?= url('svsolicitude/'.$o_sol->uuid) ?>" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<input name="action_type" type="hidden" value="doctor" />
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>Seleccionar doctor:</h3>
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
                                <button type="submit" class="button h-button is-primary is-raised">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <!--Fieldset-->
                    <div class="fieldset">
                        <div class="fieldset-heading">
                        </div>
                        <div class="columns is-multiline">
                            
							<!--Field-->
							<div class="column is-12">
								<div class="field">
									<div class="control">
										<?php $n_att = 'Doctor'; ?>
										<label><?= $n_att ?></label>
										<select name="action_value" class="input" required>
											<option value="" selected disabled >--Seleccione--</option>
											<?php foreach($o_all as $key => $row){ ?>
											<option value="<?= $row->id ?>"><?= $row->name ?></option>
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
@extends('agendar.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url('agendar/search')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>Buscar paciente:</h3>
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
                                <button type="submit" class="button h-button is-primary is-raised">Buscar</button>
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
							<div class="column is-6">
								<div class="field">
									<div class="control">
										<?php $t_att = 'document_type'; ?>
										<?php $n_att = 'Tipo de documento'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>" class="input" required>
											<option value="0" selected disabled >--Seleccione--</option>
											<?php $options = ['cedula de ciudadanía','pasaporte','cedula de extranjería','carné diplomático','registro civil','tarjeta de identidad','adulto sin identificar','menor sin identificar','certificado de nacimiento','salvoconducto','pasaporte de la ONU','Permiso especial de permanencia']; ?>
											<?php foreach($options as $key => $row){ ?>
											<option value="<?= $row ?>"><?= $row ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="column is-6">
								<div class="field">
									<div class="control">
										<?php $t_att = 'document_number'; ?>
										<?php $n_att = 'Número de documento'; ?>
										<label><?= $n_att ?></label>
										<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
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
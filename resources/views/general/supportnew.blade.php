@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($menu)}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>Nuevo</h3>
                            <p>Ticket de soporte</p>
							@include('msj')
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
                                <button type="submit" class="button h-button is-primary is-raised">Crear</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <!--Fieldset-->
                    <div class="fieldset">
                        <div class="fieldset-heading">
                            <h4>Información del ticket</h4>
                            <p></p>
                        </div>
                        <div class="columns is-multiline">
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control">
                                        <input name="title" type="text" class="input" placeholder="Asunto" value="{{ old('title') }}" required>
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control">
                                        <textarea name="description" class="textarea" rows="4" placeholder="Ingrese el mensaje" required>{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control">
                                        <input name="file" type="file" class="input" accept="image/*" placeholder="Archivo">
										<small>Adjuntar solo imagenes (JPG, PNG, GIF)</small>
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
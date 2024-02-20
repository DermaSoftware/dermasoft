@extends('layouts.auth')

@section('content')
<div class="signup-nav">
    <div class="signup-nav-inner">
        <a href="/" class="logo">
            <img class="light-image" src="<?= asset('assets/img/favicon.png') ?>" alt="">
            <img class="dark-image" src="<?= asset('assets/img/favicon.png') ?>" alt="">
        </a>
    </div>
</div>

<div id="huro-signup" class="signup-wrapper">
<form id="signup-form" class="signup-form is-mobile-spaced" method="POST" action="{{ url('register') }}" enctype="multipart/form-data">
@csrf
    <div class="signup-steps is-hidden">
        <div class="steps-container">
            <div class="step-icon is-active" data-progress="10" data-step="signup-step-1">
                <div class="inner">
                    <i data-feather="home"></i>
                </div>
                <span class="step-label">Cuenta</span>
            </div>
            <div class="step-icon is-inactive" data-progress="23" data-step="signup-step-2">
                <div class="inner">
                    <i data-feather="user"></i>
                </div>
                <span class="step-label">Foto de perfil</span>
            </div>
            <div class="step-icon is-inactive" data-progress="75" data-step="signup-step-3">
                <div class="inner">
                    <i data-feather="shield"></i>
                </div>
                <span class="step-label">Empresa</span>
            </div>
            <div class="step-icon is-inactive" data-progress="98">
                <div class="inner">
                    <i data-feather="check"></i>
                </div>
                <span class="step-label">¡Está hecho!</span>
            </div>
            <progress id="signup-steps-progress" class="progress" value="25" max="100">25%</progress>
        </div>
    </div>

    <img class="card-bg" src="<?= asset('assets/img/login/3.jpg') ?>" alt="">

    <div class="hero is-fullheight">
        <div class="hero-body">
            <div class="container">
                <!-- Step 1 -->
                <div id="signup-step-1" class="columns signup-columns">
                    <div class="column is-4 is-offset-1">
                        <h1 id="main-signup-title" class="title is-3 signup-title">Nueva cuenta</h1>
                        <h2 id="main-signup-subtitle" class="subtitle signup-subtitle">Ingrese sus datos basicos para registrar su cuenta.</h2>
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
						<div class="signup-card">
							<div id="signup-form" class="signup-form is-mobile-spaced">
                                <div class="columns is-multiline">
                                    <div class="column is-6">
                                        <div class="control has-validation">
                                            <input name="name" type="text" class="input" value="{{ old('name') }}" required>
                                            <small class="error-text">Este es un campo obligatorio</small>
                                            <div class="auth-label">Nombre</div>
                                            <div class="validation-icon is-success">
                                                <div class="icon-wrapper">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                            <div class="validation-icon is-error">
                                                <div class="icon-wrapper">
                                                    <i data-feather="x"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="control has-validation">
                                            <input name="lastname" type="text" class="input" value="{{ old('lastname') }}" required>
                                            <small class="error-text">Este es un campo obligatorio</small>
                                            <div class="auth-label">Apellidos</div>
                                            <div class="validation-icon is-success">
                                                <div class="icon-wrapper">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                            <div class="validation-icon is-error">
                                                <div class="icon-wrapper">
                                                    <i data-feather="x"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-12">
                                        <div class="control has-validation">
                                            <input name="email" type="email" class="input" value="{{ old('email') }}" required>
                                            <small class="error-text">Este es un campo obligatorio</small>
                                            <div class="auth-label">Correo</div>
                                            <div class="validation-icon is-success">
                                                <div class="icon-wrapper">
                                                    <i data-feather="check"></i>
                                                </div>
                                            </div>
                                            <div class="validation-icon is-error">
                                                <div class="icon-wrapper">
                                                    <i data-feather="x"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="column is-12">
                                    <div class="control has-validation">
                                        <input name="password" type="password" class="input" required>
                                        <small class="error-text">Este es un campo obligatorio</small>
                                        <div class="auth-label">Contraseña</div>
                                        <div class="validation-icon is-success">
                                            <div class="icon-wrapper">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                        <div class="validation-icon is-error">
                                            <div class="icon-wrapper">
                                                <i data-feather="x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="column is-12">
                                        <div class="signup-type">
                                            <div class="box-wrap">
                                                <input type="radio" name="gender" value="Masculino" checked>
                                                <div class="signup-box">
                                                    <i class="lnil lnil-male"></i>
                                                    <div class="meta">
                                                        <span>Género</span>
                                                        <span>Masculino</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-wrap">
                                                <input type="radio" name="gender" value="Femenino">
                                                <div class="signup-box">
                                                    <i class="lnil lnil-female"></i>
                                                    <div class="meta">
                                                        <span>Género</span>
                                                        <span>Femenino</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control is-agree">
                                    <span>Al continuar, aceptas nuestros <a href="javascript:void(0)">Términos</a> y <a href="javascript:void(0)">Privacidad</a></span>
                                </div>

                                <div class="button-wrap has-help">
                                    <button id="confirm-step-1" type="button" class="button h-button is-big is-rounded is-primary is-bold is-fullwidth">Continuar</button>
                                    <span>O <a href="{{ url('login') }}">Inicia sesión</a> si ya tienes una cuenta.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div id="signup-step-2" class="columns signup-columns is-hidden">
                    <div class="column is-8 is-offset-2">
                        <div class="signup-profile-wrapper">
                            <h1 class="title is-5 signup-title has-text-centered">Añadir una foto de perfil</h1>
                            <h2 class="subtitle signup-subtitle has-text-centered">Esta es tu identidad visual.
                            </h2>
                            <div class="picture-selector">
                                <div class="image-container">
                                    <input id="photo_profile_acc" name="photo" type="file" class="is-hidden">
									<img id="photo_profile_img" src="<?= asset('assets/img/avatars/svg/huro-1.svg') ?>" alt="">
                                    <div id="photo_profile_btn" class="upload-button" role="button">
                                        <i data-feather="plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="button-wrap is-centered has-text-centered">
                            <button id="confirm-step-2" type="button" class="button h-button is-primary is-big is-rounded is-lower">Continuar</button>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div id="signup-step-3" class="columns signup-columns is-hidden">
                    <div class="column is-4 is-offset-4 username-form">
                        <h1 class="title is-5 signup-title has-text-centered">Empresa</h1>
                        <h2 class="subtitle signup-subtitle has-text-centered">Ingrese sus datos de su empresa.</h2>
                        <div class="signup-form">
                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    <div class="control has-validation">
                                        <input name="companies_name" type="text" class="input">
                                        <small class="error-text">Este es un campo obligatorio</small>
                                        <div class="auth-label">Empresa</div>
                                        <div class="validation-icon is-success">
                                            <div class="icon-wrapper">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                        <div class="validation-icon is-error">
                                            <div class="icon-wrapper">
                                                <i data-feather="x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <div class="control has-validation">
                                        <input name="phone" type="text" class="input" required>
                                        <small class="error-text">Este es un campo obligatorio</small>
                                        <div class="auth-label">Teléfono</div>
                                        <div class="validation-icon is-success">
                                            <div class="icon-wrapper">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                        <div class="validation-icon is-error">
                                            <div class="icon-wrapper">
                                                <i data-feather="x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <div class="control has-switch">
                                        <span>Activar doble factor de autenticación</span>
                                        <label class="form-switch ml-auto">
                                            <input name="twofa" type="checkbox" id="signup-toggle" class="is-switch" value="yes">
                                            <i></i>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="button-wrap is-centered has-text-centered">
                                <button id="finish-signup" type="submit" class="button h-button is-big is-rounded is-primary is-lower">Crear</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
</div>

@endsection

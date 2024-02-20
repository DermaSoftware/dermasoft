@extends('layouts.auth')

@section('content')
<div class="modern-login">
    <div class="underlay h-hidden-mobile h-hidden-tablet-p"></div>
    <div class="columns is-gapless is-vcentered">
        <div class="column is-relative is-8 h-hidden-mobile h-hidden-tablet-p">
            <div class="hero is-fullheight is-image">
                <div class="hero-body">
                    <div class="container">
                        <div class="columns">
                            <div class="column">
                                <img class="hero-image" src="<?= asset('assets/img/login/1.svg') ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-4 is-relative">
            <a class="top-logo" href="/">
                <img class="light-image" src="<?= asset('assets/img/favicon.png') ?>" alt="">
                <img class="dark-image" src="<?= asset('assets/img/favicon.png') ?>" alt="">
            </a>
            <label class="dark-mode ml-auto">
                <input type="checkbox" checked>
                <span></span>
            </label>
            <div class="is-form">
                <div class="hero-body">
                    <div class="form-text">
                        <h2>Inicio de sesión</h2>
                        <p>Inicie sesión con su cuenta.</p>
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
                    <div class="form-text is-hidden">
                        <h2>Recover Account</h2>
                        <p>Reset your account password.</p>
                    </div>
                    <form id="login-form" class="login-wrapper" method="POST" action="{{ url('login') }}">
                        @csrf
						<div class="control has-validation">
                            <input name="email" type="email" class="input" placeholder="" required >
                            <small class="error-text">Este es un campo obligatorio</small>
                            <div class="auth-label">Correo (*)</div>
                            <div class="auth-icon">
                                <i class="lnil lnil-envelope"></i>
                            </div>
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
                        <div class="control has-validation">
                            <input name="password" type="password" class="input" required>
                            <div class="auth-label">Contraseña (*)</div>
                            <div class="auth-icon">
                                <i class="lnil lnil-lock-alt"></i>
                            </div>
                        </div>

                        <div class="control is-flex">
                            <label class="remember-toggle is-hidden">
                                <input type="checkbox">
                                <span class="toggler">
                                        <span class="active">
                                            <i data-feather="check"></i>
                                        </span>
                                <span class="inactive">
                                            <i data-feather="circle"></i>
                                        </span>
                                </span>
                            </label>
                            <div class="remember-me is-hidden">Remember Me</div>
                            <a href="{{ url('recovery') }}" id="forgot-link">Olvidaste de la contraseña?</a>
                        </div>
                        <div class="button-wrap has-help">
                            <button id="login-submit" type="submit" class="button h-button is-big is-rounded is-primary is-bold is-raised">Ingresar</button>
							<span>O <a href="{{ url('register') }}">Crear una cuenta</a></span>
                        </div>
                    </form>

                    <form id="recover-form" class="login-wrapper is-hidden">
                        <p class="recover-text">Enter your email and click on the confirm button to reset your password. We'll send you an email detailing the steps to complete the procedure.</p>
                        <div class="control has-validation">
                            <input type="text" class="input">
                            <small class="error-text">This is a required field</small>
                            <div class="auth-label">Email Address</div>
                            <div class="auth-icon">
                                <i class="lnil lnil-envelope"></i>
                            </div>
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
                        <div class="button-wrap">
                            <button id="cancel-recover" type="button" class="button h-button is-white is-big is-rounded is-lower">Cancel</button>
                            <button type="button" class="button h-button is-solid is-big is-rounded is-lower is-raised is-colored">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                                <img class="hero-image" src="<?= asset('assets/img/illustrations/login/station.svg') ?>" alt="">
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
                        <h2>Recuperar contraseña</h2>
                        <p>Ingrese el código suministrado a su correo</p>
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
                    <form id="login-form" class="login-wrapper" method="POST" action="{{ url('recovery/verify') }}">
                        @csrf
						<div class="control has-validation">
                            <input name="key" type="text" class="input" placeholder="Código de verificación" required >
                            <small class="error-text">Este es un campo obligatorio</small>
                            <div class="auth-label">Código (*)</div>
                            <div class="auth-icon">
                                <i class="lnil lnil-lock-alt"></i>
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
                        
                        <div class="button-wrap has-help">
                            <button type="submit" class="button h-button is-big is-rounded is-primary is-bold is-raised">Recuperar</button>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="author" content="fullstackcolombia.com">
	<meta name="description" content="{{ config('app.name', '') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Actualizando - {{ config('app.name', '') }}</title>
    <link rel="icon" type="image/png" href="<?= asset('assets/img/favicon.png') ?>" />
    <link rel="stylesheet" href="<?= asset('assets/css/app.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/main.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
</head>
<body>
    <div id="huro-app" class="app-wrapper">
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="minimal-wrapper darker">
            <div class="error-container">
                <div class="error-wrapper">
                    <div class="error-inner has-text-centered">
                        <div class="bg-number dark-inverted">503</div>
                        <img class="light-image" src="<?= asset('assets/img/illustrations/placeholders/error-5.svg') ?>" alt="" />
                        <img class="dark-image" src="<?= asset('assets/img/illustrations/placeholders/error-5-dark.svg') ?>" alt="" />
                        <h3 class="dark-inverted">Proceso de actualización</h3>
                        <p>¡Estamos construyendo algo increíble para ti!</p>
                        <div class="button-wrap">
                            <a href="<?= url('logout') ?>" class="button h-button is-primary is-elevated">Ir al inicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Scripts-->
		<script src="<?= asset('assets/js/app.js') ?>"></script>
        <script src="<?= asset('assets/js/functions.js') ?>"></script>
        <script src="<?= asset('assets/js/main.js') ?>"></script>
        <script src="<?= asset('assets/js/components.js') ?>"></script>
        <script src="<?= asset('assets/js/popover.js') ?>"></script>
        <script src="<?= asset('assets/js/widgets.js') ?>"></script>
        <script src="<?= asset('assets/js/touch.js') ?>"></script>
        <script src="<?= asset('assets/js/syntax.js') ?>"></script>
    </div>
</body>
</html>
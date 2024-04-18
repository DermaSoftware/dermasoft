<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?= config('app.name', '') ?></title>
	<link rel="icon" type="image/png" href="<?= asset('assets/images/epayco.png') ?>" />
    <link rel="stylesheet" href="<?= asset('assets/css/app.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/main.css') ?>">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet" />
	<style>
	.status-page-wrapper .head .logo {
		width: 150px;
		min-width: 150px;
		height: auto;
	}
	</style>
</head>
<body>
    <div id="huro-app" class="app-wrapper">
        <!--Full pageloader-->
        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="minimal-wrapper darker">
            <!--Page body-->
            <!-- Status -->
            <div class="status-page-wrapper">
                <!--Status header-->
                <div class="head">
                    <a class="logo" href="<?= url('/') ?>">
                        <img class="light-image" src="<?= asset('assets/images/epayco.png') ?>" alt="">
                    </a>
                    <a class="action-link" href="<?= url('/') ?>">Ir al inicio</a>
                </div>
				<h2>La cita ha sido agendada correctamente</h2>
                <div class="status-footer">
                    <div class="copyright">
                        <span>&copy; <?= date('Y') ?> | <a href="<?= url('/') ?>"><?= config('app.name', '') ?></a></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Concatenated plugins -->
		<script src="<?= asset('assets') ?>/js/app.js"></script>
        <script src="<?= asset('assets') ?>/js/functions.js"></script>
        <script src="<?= asset('assets') ?>/js/main.js" async></script>
        <script src="<?= asset('assets') ?>/js/components.js" async></script>
        <script src="<?= asset('assets') ?>/js/popover.js" async></script>
        <script src="<?= asset('assets') ?>/js/widgets.js" async></script>
		<script src="<?= asset('assets') ?>/js/touch.js" async></script>
        <script src="<?= asset('assets') ?>/js/syntax.js" async></script>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?= config('app.name', '') ?></title>
	<link rel="icon" type="image/png" href="<?= $logo ?>" />
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
	.status-page-wrapper .status-block .status-uptime .title {
		min-width: 120px;
	}
	.datetimepicker-dummy.is-primary:before, .datetimepicker-dummy.is-primary::before {
		background-color: transparent;
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
                        <img class="light-image" src="<?= $logo ?>" alt="">
                        <img class="dark-image" src="<?= $logo ?>" alt="">
                    </a>
                    <!--<a class="action-link" onclick="goBack()">Take me Back</a>-->
                </div>
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
					<div class="status-uptime">
						<div class="title">Doctor(a)</div>
						<div class="uptime"><span class="tag is-rounded is-purple is-elevated"><?= $o_sol->doctors()->first()->name ?></span></div>
					</div>
					<div class="status-uptime">
						<div class="title">Fecha</div>
						<div class="uptime"><span class="tag is-rounded is-purple is-elevated"><?= $o_sol->date_quote ?> <?= $o_sol->time_quote ?></span></div>
					</div>
				</div>
				<button class="button h-button is-success is-raised btn_plan_price_epayco">Pagar consulta</button>
				<form class="is-hidden">
					<script
					src="https://checkout.epayco.co/checkout.js"
					class="epayco-button"
					data-epayco-key="<?= env('EPAYCOKEY_FSC', '382c096da3f1534fc1af6f0d62361710') ?>"
					data-epayco-amount="<?= $o_qt->price ?>"
					data-epayco-name="Pago de consulta <?= $o_qt->name ?>"
					data-epayco-description="Pago de consulta <?= $o_qt->name ?>"
					data-epayco-currency="COP"
					data-epayco-country="co"
					data-epayco-test="<?= env('DATA_EPAYCO_TEST', false)?'true':'false' ?>"
					data-epayco-extra1="<?= $o_sol->uuid ?>"
					data-epayco-extra2=""
					data-epayco-extra3=""
					data-epayco-external="false"
					data-epayco-response="<?= url('pyresp'); ?>"
					data-epayco-confirmation="<?= url('epaysol.php'); ?>">
					</script>
				</form>
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
		<script>
		if($('.btn_plan_price_epayco').length){
			$('.btn_plan_price_epayco').on('click',function(e){
				e.preventDefault();
				var btn_item = $(this);
				btn_item.parent().parent().find('.epayco-button-render').click();
			});
		}
		</script>
    </div>
</body>
</html>
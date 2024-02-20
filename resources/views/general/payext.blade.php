<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="author" content="fullstackcolombia.com">
	<meta name="description" content="{{ config('app.name', '') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '') }}</title>
    <link rel="icon" type="image/png" href="<?= asset('assets/img/favicon.png') ?>" />
    <link rel="stylesheet" href="<?= asset('assets/css/app.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/main.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	<style>
	html, body {
		background: #f2f2f2 !important;
	}
	html.is-dark, body.is-dark {
		background: #3b3b41 !important;
	}
	.is-fixed {
		position: fixed;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
	}
	</style>
</head>
<body>
    <div id="huro-app" class="app-wrapper">
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="auth-wrapper">
			<div class="page-content-wrapper">
                <div class="page-content is-relativex is-fixed">
                    <div class="page-title has-text-centered">
                        <!-- Sidebar Trigger -->
                        <div class="huro-hamburger nav-trigger push-resize" data-sidebar="layouts-sidebar"> 
                        </div>
                        <div class="title-wrap">
                            <h1 class="title is-4">Pago de membresía <?= $o_plan->name ?></h1>
                        </div>
                        <div class="toolbar ml-auto">
                            <div class="toolbar-link">
                                <label class="dark-mode ml-auto">
                                    <input type="checkbox" checked="">
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="page-content-inner">
                        <!--Pronotion Page-->
                        <div class="promotion-page-wrapper">
                            <div class="wrapper-outer">
                                <div class="wrapper-inner">
                                    <div class="action-box">
                                        <div class="box-content">
                                            <img class="light-image is-larger" src="<?= !empty($o_plan->photo)?$o_plan->photo:asset('assets/img/illustrations/placeholders/promotion.svg') ?>" alt="">
                                            <img class="dark-image is-larger" src="<?= !empty($o_plan->photo)?$o_plan->photo:asset('assets/img/illustrations/placeholders/promotion-dark.svg') ?>" alt="">
                                            <h3 class="dark-inverted"><?= $o_plan->name ?></h3>
                                            <div class="price">
                                                <span class="dark-inverted"><?= $o->amount ?></span>
                                                <span>Por <?= $o_plan->month ?> Mes</span>
                                            </div>
                                            <div class="buttons">
                                                <!--<button class="button h-button is-dark-outlined">Skip</button>-->
                                                <button class="button h-button is-success is-raised btn_plan_price_epayco">Pagar membresía</button>
												<form class="is-hidden">
													<script
													src="https://checkout.epayco.co/checkout.js"
													class="epayco-button"
													data-epayco-key="<?= env('EPAYCOKEY_FSC', '382c096da3f1534fc1af6f0d62361710') ?>"
													data-epayco-amount="<?= $o->amount ?>"
													data-epayco-name="Pago de membresía <?= $o_plan->name ?>"
													data-epayco-description="Pago de membresía <?= $o_plan->name ?>"
													data-epayco-currency="COP"
													data-epayco-country="co"
													data-epayco-test="<?= env('DATA_EPAYCO_TEST', false)?'true':'false' ?>"
													data-epayco-extra1="<?= $o->uuid ?>"
													data-epayco-extra2=""
													data-epayco-extra3=""
													data-epayco-external="false"
													data-epayco-response="<?= url('payres'); ?>"
													data-epayco-confirmation="<?= url('epayconfirm.php'); ?>">
													</script>
												</form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="side-wrapper">
                                    <div class="side-inner">
                                        <div class="side-title">
                                            <h3 class="dark-inverted"><?= $o_plan->subtitle ?></h3>
                                            <p>Echa un vistazo a algunas características increíbles</p>
                                        </div>
                                        <div class="action-list">
                                            <?php $f = explode('<br>',$o_plan->description); ?>
                                            <?php foreach($f as $xrow){ ?>
											<div class="media-flex">
                                                <div class="icon-wrap is-dark-primary is-dark-bg-3 is-dark-card-bordered">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                </div>
                                                <div class="flex-meta">
                                                    <p><?= $xrow ?></p>
                                                </div>
                                            </div>
											<?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?= asset('assets/js/app.js') ?>"></script>
        <script src="<?= asset('assets/js/functions.js') ?>"></script>
		<script src="<?= asset('assets/js/auth.js') ?>"></script>
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
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title><?= config('app.name', '') ?> :: Landing</title>
    <link rel="icon" type="image/png" href="<?= $logo ?>" />
    <link rel="stylesheet" href="<?= asset('assets/css/app.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/main.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/slider.css') ?>">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	.whatsapp {
	  position:fixed;
	  width:60px;
	  height:60px;
	  bottom:20px;
	  right:80px;
	  background-color:#25d366;
	  color:#FFF;
	  border-radius:50px;
	  text-align:center;
	  font-size:30px;
	  z-index:100;
	}

	.whatsapp-icon {
	  margin-top:13px;
	}
	</style>
</head>

<body>
    <div id="huro-app" class="app-wrapper">
        <!--Full pageloader-->
        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="minimal-wrapper light">
            <!--Page body-->

            <!--Wrapper-->
            <div class="landing-page-wrapper">
                <!-- Hero and Navbar -->
                <div id="huro-marketing" class="hero marketing-hero is-left is-fullheight">

                    <!-- Navbar partial -->
                    <nav class="navbar is-fixed-top is-transparent is-docked" aria-label="main navigation">
                        <div class="navbar-brand">
                            <a class="navbar-item" href="<?= url('home') ?>">
                                <div class="brand-icon">
                                    <img class="light-image-l" src="<?= $logo ?>" alt="" />
                                    <img class="dark-image-l" src="<?= $logo ?>" alt="" />
                                </div>
                            </a>

                            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false">
                                <span aria-hidden="true"></span>
                                <span aria-hidden="true"></span>
                                <span aria-hidden="true"></span>
                            </a>
                        </div>

                        <div class="navbar-menu">
                            <div class="navbar-start">

                                <div class="navbar-item">
                                    <a href="javascript:void(0)" class="nav-link is-active is-scroll"><?= config('app.name', '') ?></a>
                                </div>
                            </div>

                            <div class="navbar-end">
                                <div class="navbar-item is-theme-toggle">
                                    <label class="theme-toggle">
                                        <input id="navbar-night-toggle--daynight" type="checkbox">
                                        <span class="toggler">
                                        <span class="dark">
                                            <i data-feather="moon"></i>
                                        </span>
                                        <span class="light">
                                            <i data-feather="sun"></i>
                                        </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="navbar-item">
                                    <a href="<?= url('login') ?>" class="nav-link">Iniciar sesión</a>
                                </div>
								<div class="navbar-item">
                                    <a href="<?= url('register') ?>" class="button h-button is-rounded is-primary is-raised">
                                        <strong>Crear cuenta</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!--Hexagon shapes-->
                    <img class="hexagon hexagon-1 light-image-l" src="<?= asset('assets') ?>/img/icons/hexagons/accent.svg" alt="">
                    <img class="hexagon hexagon-1 dark-image-l" src="<?= asset('assets') ?>/img/icons/hexagons/accent-heavy.svg" alt="">
                    <img class="hexagon hexagon-2 light-image-l" src="<?= asset('assets') ?>/img/icons/hexagons/accent.svg" alt="">
                    <img class="hexagon hexagon-2 dark-image-l" src="<?= asset('assets') ?>/img/icons/hexagons/accent-heavy.svg" alt="">
                    <img class="hexagon hexagon-3 light-image-l" src="<?= asset('assets') ?>/img/icons/hexagons/green.svg" alt="">
                    <img class="hexagon hexagon-3 dark-image-l" src="<?= asset('assets') ?>/img/icons/hexagons/green-heavy.svg" alt="">
                    <img class="hexagon hexagon-4 light-image-l" src="<?= asset('assets') ?>/img/icons/hexagons/purple.svg" alt="">
                    <img class="hexagon hexagon-4 dark-image-l" src="<?= asset('assets') ?>/img/icons/hexagons/purple-heavy.svg" alt="">

                    <div class="hero-body">
                        <div class="container">
                            <div class="columns is-vcentered" style="margin-top: 80px;">
                                <div class="column is-12">
                                    <?php $t_sliders = count($sliders_all); ?>
									<?php if($t_sliders > 1){ ?>
									<div class="container">
										<div class="slideshow-container">
										<?php foreach($sliders_all as $key => $row){ ?>
										<div class="mySlides fade">
										  <div class="numbertext"><?= $key + 1 ?> / <?= $t_sliders ?></div>
										  <img src="<?= $row->url ?>" style="width:100%">
										  <div class="text"><?= $row->name ?></div>
										</div>
										<?php } ?>
										<a class="prev" onclick="plusSlides(-1)"><i class="fas fa-angle-left"></i></a>
										<a class="next" onclick="plusSlides(1)"><i class="fas fa-angle-right"></i></a>
										</div>
										<br>
										<div style="text-align:center">
										  <?php foreach($sliders_all as $key => $row){ ?>
										  <span class="dot" onclick="currentSlide(<?= $key + 1 ?>)"></span>
										  <?php } ?>
										</div>
									</div>
									<?php } else if($t_sliders == 1){ ?>
										<?php foreach($sliders_all as $key => $row){ ?>
										<img class="light-image-l hero-mockup" src="<?= $row->url ?>" alt="">
										<img class="dark-image-l hero-mockup" src="<?= $row->url ?>" alt="">
										<?php } ?>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

				<?php if(!empty($o->video)){ ?>
				<div id="about" class="section">
                    <div class="container">
                        <!--Title-->
                        <div class="section-title has-text-centered pt-40 pb-40">
                            <h2 class="title is-2">Descubre el Futuro de la Dermatología Digital</h2>
                            <h4>Transforma tu Práctica y mantén en tiempo real,  toda la información, agenda, procedimientos y seguimiento de tus pacientes.</h4>
                        </div>

                        <div class="columns is-vcentered is-multiline pb-6">
                            <div class="column is-8 is-offset-2 is-relative is-centered-portrait">
                                <!-- 16by9 video -->
                                <div class="video-player-container is-16by9 reversed-play" id="player">
                                    <iframe src="<?= $o->video ?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;autohide=1&amp;playsinline=1&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen="" allowtransparency="" allow="autoplay"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php } ?>

                <!--Mockup Section-->
                <div class="section has-bg-dots">
                    <div class="container">
                        <!--Title-->
                        <div class="section-title has-text-centered">
                            <h2 class="title is-2">Regístrate</h2>
                            <h4>Crea tu cuenta empresarial en tres simples pasos.</h4>
                        </div>

                        <div class="centered-mockup-wrapper">
                            <div class="columns">
                                <div class="column is-4">
                                    <h3 class="title is-4">1 Registro</h3>
                                    <p class="subtitle is-6 light-text">Resgistra tus datos de empresa</p>
                                </div>
                                <div class="column is-4">
                                    <h3 class="title is-4">2 Verificación</h3>
                                    <p class="subtitle is-6 light-text">Verificamos tus datos empresariales</p>
                                </div>
                                <div class="column is-4">
                                    <h3 class="title is-4">3 Pago</h3>
                                    <p class="subtitle is-6 light-text">Realiza el pago de una membresía</p>
                                </div>
                            </div>
                        </div>

                        <!--Stacks-->
                        <div class="stacks">
                            <div class="stack">
                                <img src="<?= asset('assets/img/landing/a/1.jpg') ?>" alt="">
                            </div>
                            <div class="stack">
                                <img src="<?= asset('assets/img/landing/a/2.jpg') ?>" alt="">
                            </div>
                            <div class="stack">
                                <img src="<?= asset('assets/img/landing/a/3.jpg') ?>" alt="">
                            </div>
                            <div class="stack">
                                <img src="<?= asset('assets/img/landing/a/4.jpg') ?>" alt="">
                            </div>
                            <div class="stack">
                                <img src="<?= asset('assets/img/landing/a/5.jpg') ?>" alt="">
                            </div>
                            <div class="stack">
                                <img src="<?= asset('assets/img/landing/a/6.jpg') ?>" alt="">
                            </div>
                            <div class="stack">
                                <img src="<?= asset('assets/img/landing/a/7.jpg') ?>" alt="">
                            </div>
                            <div class="stack">
                                <img src="<?= asset('assets/img/landing/a/8.jpg') ?>" alt="">
                            </div>
                            <div class="stack">
                                <img src="<?= asset('assets/img/landing/a/9.jpg') ?>" alt="">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="section">
                    <div class="container">
                        <!--Title-->
                        <div class="section-title has-text-centered pt-40">
                            <h2 class="title is-3">3 razones más para elegir <?= config('app.name', '') ?></h2>
                            <h4>Si aún no estás convencido, aquí hay algo más.</h4>
                        </div>

                        <div class="customers-choice p-t-40 p-b-40">
                            <!-- Feature -->
                            <div class="columns is-vcentered side-feature">
                                <div class="column is-5 is-offset-1 has-text-centered">
                                    <img class="light-image-l featured-image" src="assets/img/illustrations/landing/feature-4.svg" alt="">
                                    <img class="dark-image-l featured-image" src="assets/img/illustrations/landing/feature-4-dark.svg" alt="">
                                </div>
                                <div class="column is-5">
                                    <h2 class="title m-b-10 is-centered-tablet-portrait">Optimización de procesos y recursos</h2>
                                    <p class="section-feature-description is-centered-tablet-portrait">
                                        Nuestro software, revoluciona la gestión dermatológica al centralizar operaciones y optimizar recursos. Desde la programación de citas hasta el historial clínico digital, ofrecemos una herramienta integral, que simplifica y potencia cada aspecto de la atención al paciente. No permitas que tu Institución dermatológica, se quede atrás en el avance vanguardista de la tecnología.
                                    </p>
                                </div>
                            </div>

                            <!-- Feature -->
                            <div class="columns is-vcentered side-feature">
                                <div class="column is-5 has-text-centered h-hidden-desktop h-hidden-tablet-p">
                                    <img class="light-image-l featured-image" src="assets/img/illustrations/landing/feature-5.svg" alt="">
                                    <img class="dark-image-l featured-image" src="assets/img/illustrations/landing/feature-5-dark.svg" alt="">
                                </div>
                                <div class="column is-5 is-offset-1">
                                    <h2 class="title m-b-10 is-centered-tablet-portrait">Historias clínicas digitales</h2>
                                    <p class="section-feature-description is-centered-tablet-portrait">
                                        Simplifica y potencia, la organización de la información relacionada con el paciente, sus diagnósticos, tratamientos, evolución y registros fotográficos, entre otros, con nuestras historias clínicas digitales, que ofrecen un universo de datos organizados, accesibles en tiempo real y con seguimientos detallados que permiten la toma de decisiones en beneficio del paciente.
                                    </p>
                                </div>
                                <div class="column is-5 has-text-centered h-hidden-mobile">
                                    <img class="light-image-l featured-image" src="assets/img/illustrations/landing/feature-5.svg" alt="">
                                    <img class="dark-image-l featured-image" src="assets/img/illustrations/landing/feature-5-dark.svg" alt="">
                                </div>
                            </div>

                            <!-- Feature -->
                            <div class="columns is-vcentered side-feature">
                                <div class="column is-5 is-offset-1 has-text-centered">
                                    <img class="light-image-l featured-image" src="assets/img/illustrations/landing/feature-6.svg" alt="">
                                    <img class="dark-image-l featured-image" src="assets/img/illustrations/landing/feature-6-dark.svg" alt="">
                                </div>
                                <div class="column is-5">
                                    <h2 class="title m-b-10 is-centered-tablet-portrait">Dale valor a tu profesión</h2>
                                    <p class="section-feature-description is-centered-tablet-portrait">
                                        Nuestra plataforma, ha sido meticulosamente diseñada para satisfacer las necesidades específicas de los profesionales en dermatología, brindando un valor agregado, que potencializa su ejercicio profesional. Elevamos la dermatología a nuevos niveles, donde la tecnología se convierte en su aliado estratégico para un desempeño excepcional.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                <!-- Footer -->
                <!-- Simple light footer -->
                <footer class="huro-footer">
                    <div class="container">
						<div class="section-title has-text-centered">
                            <h2 class="title is-2">Nuestros planes</h2>
                            <h4>Adquiere un plan y disfruta de los servicios y beneficios</h4>
                        </div>
						<div class="section has-bg-dots">
							<?php if($o_all->count() > 0){ ?>
							<!--Wrapper-->
							<div class="pricing-wrapper">
								<?php foreach($o_all as $key => $row){ ?>
								<!--Pricing plan-->
								<div class="pricing-plan is-featured">
									<div class="name"><?= $row->name ?></div>
									<img src="<?= !empty($row->photo)?$row->photo:asset('assets/img/logos/logo/logo-platinum.svg') ?>" alt="">
									<div class="price money_to_fsc"><?= intval($row->price)/intval($row->month) ?></div>
									<div class="trial"><?= $row->subtitle ?></div>
									<hr>
									<ul>
										<?php $f = explode('<br>',$row->description); ?>
										<?php foreach($f as $xrow){ ?>
										<li>
											<?= $xrow ?>
										</li>
										<?php } ?>
									</ul>
								</div>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
                        <div class="cta-wrapper">
                            <div class="cta-title">
                                <h3>Registra tu cuenta empresarial</h3>
                                <a href="<?= url('register') ?>" class="custom-button">
                                    <img src="assets/img/icons/logos/envato.svg" alt="">
                                    <span>Regístrate</span>
                                </a>
                            </div>
                        </div>
                        <div class="footer-copyright has-text-centered">
                            <p>&copy; <?= date('Y') ?> | <a href="<?= url('/') ?>"><?= config('app.name', '') ?></a></p>
                        </div>
                    </div>
                </footer>
                <!-- /Simple light footer -->
                <!-- Back To Top Button -->
                <div id="backtotop">
                    <a href="javascript:void(0)">
                        <i aria-hidden="true" class="fas fa-angle-up"></i>
                    </a>
                </div>
            </div>
        </div>
		<?php if(!empty($o->whatsapp)){ ?>
		<a href="https://wa.me/<?= $o->whatsapp ?>?text=Hola" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
		<?php } ?>
        <!--Huro Scripts-->
        <!--Load Mapbox-->
        <!-- Concatenated plugins -->
		<script src="<?= asset('assets') ?>/js/app.js"></script>
        <!-- Huro js -->
        <script src="<?= asset('assets') ?>/js/functions.js"></script>
        <script src="<?= asset('assets') ?>/js/main.js" async></script>
        <script src="<?= asset('assets') ?>/js/components.js" async></script>
        <script src="<?= asset('assets') ?>/js/popover.js" async></script>
        <script src="<?= asset('assets') ?>/js/widgets.js" async></script>
		<script src="<?= asset('assets') ?>/js/touch.js" async></script>
        <script src="<?= asset('assets') ?>/js/syntax.js" async></script>
        <script src="<?= asset('assets') ?>/js/landing.js" async></script>
        <script src="<?= asset('assets') ?>/js/slider.js" async></script>
        <script>
		<?= !empty($o->chat)?$o->chat:'' ?>
		</script>
        <script>
		if($('.money_to_fsc').length){
			$('.money_to_fsc').each(function(){
				var item = $(this);
				item.html(moneycop(item.html()));
			});
		}

		function moneycop(v){
			const options2 = { style: 'currency', currency: 'COP' };
			const numberFormat2 = new Intl.NumberFormat('es-CO', options2);
			return numberFormat2.format(v);
		}
		</script>
    </div>
</body>

</html>

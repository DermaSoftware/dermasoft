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
                            <a class="navbar-item" href="<?= url('landing/'.$o->cms) ?>">
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
                                    <a href="javascript:void(0)" class="nav-link is-active is-scroll"><?= !empty($o->phone)?$o->phone:'' ?></a>
                                </div>

                                <div class="navbar-item">
                                    <a href="javascript:void(0)" class="nav-link is-scroll"><?= !empty($o->email)?$o->email:'' ?></a>
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
                                @if(!Auth::check())
                                    <div class="navbar-item">
                                        <a href="<?= url('login') ?>" class="nav-link">Iniciar sesión</a>
                                    </div>
                                    <div class="navbar-item">
                                        <a href="<?= url('register',$o->uuid) ?>" class="nav-link">Registrarse</a>
                                    </div>
                                    @else
                                        <div class="navbar-item">
                                            <a href="<?= url('schedule/'.$o->cms) ?>" class="button h-button is-rounded is-primary is-raised">
                                                <strong>Agenda tu cita</strong>
                                            </a>
                                        </div>
                                @endif

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
                            <div class="columns is-vcentered">
                                <div class="column is-5">
                                    <h1 class="title is-1 is-bold"><?= $company_name ?></h1>
                                    <h3 class="subtitle is-4 pt-2 light-text"><?= !empty($o->phone)?'Telefono de contacto: '.$o->phone:'' ?></h3>
                                    <div class="buttons">
                                        <a href="<?= url('schedule/'.$o->cms) ?>" class="button h-button is-bold is-primary is-rounded is-raised">Agenda tu cita</a>
                                    </div>
                                </div>
                                <div class="column is-7">
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

                <!--Mockup Section-->
                <div class="section has-bg-dots">
                    <div class="container">
                        <!--Title-->
                        <div class="section-title has-text-centered">
                            <h2 class="title is-2">Agenda tu cita</h2>
                            <h4>Agenda tu cita en tres simples pasos.</h4>
                        </div>

                        <div class="centered-mockup-wrapper">
                            <div class="columns">
                                <div class="column is-4">
                                    <h3 class="title is-4">1 Registro</h3>
                                    <p class="subtitle is-6 light-text">Contacta a la empresa y regístrate</p>
                                </div>
                                <div class="column is-4">
                                    <h3 class="title is-4">2 Cita</h3>
                                    <p class="subtitle is-6 light-text">Selecciona los datos de la cita</p>
                                </div>
                                <div class="column is-4">
                                    <h3 class="title is-4">3 Pago</h3>
                                    <p class="subtitle is-6 light-text">Realiza tu pago en línea</p>
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

                <!--Boxed CTA-->
                <div class="section has-bg-dots">
                    <div class="container">
                        <div class="">
                            <div class="boxed-cta">
                                <div class="h-avatar h-avatar-1 is-xl">
                                    <img class="avatar" src="<?= asset('assets/img/landing/1.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/8.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-2 is-large">
                                    <img class="avatar" src="<?= asset('assets/img/landing/2.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/5.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-3 is-large">
                                    <img class="avatar" src="<?= asset('assets/img/landing/3.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/7.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-4 is-xl">
                                    <img class="avatar" src="<?= asset('assets/img/landing/4.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/13.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-5 is-large">
                                    <img class="avatar" src="<?= asset('assets/img/landing/5.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/24.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-6 is-xl">
                                    <img class="avatar" src="<?= asset('assets/img/landing/6.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/12.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-7 is-medium">
                                    <img class="avatar" src="<?= asset('assets/img/landing/7.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/28.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-8 is-large">
                                    <img class="avatar" src="<?= asset('assets/img/landing/8.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/32.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-9 is-xl">
                                    <img class="avatar" src="<?= asset('assets/img/landing/9.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/41.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-10 is-medium">
                                    <img class="avatar" src="<?= asset('assets/img/landing/10.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/25.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-11 is-large">
                                    <img class="avatar" src="<?= asset('assets/img/landing/11.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/33.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-12 is-xl">
                                    <img class="avatar" src="<?= asset('assets/img/landing/12.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/21.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-13 is-large">
                                    <img class="avatar" src="<?= asset('assets/img/landing/13.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/23.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-14 is-large">
                                    <img class="avatar" src="<?= asset('assets/img/landing/14.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/9.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-15 is-large">
                                    <img class="avatar" src="<?= asset('assets/img/landing/15.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/15.jpg" alt="">
                                </div>
                                <div class="h-avatar h-avatar-16 is-large">
                                    <img class="avatar" src="<?= asset('assets/img/landing/16.jpg') ?>" data-demo-src="<?= asset('assets') ?>/img/avatars/photos/11.jpg" alt="">
                                </div>
                                <div class="boxed-cta-content has-text-centered">
                                    <h2 class="title is-1">TU PIEL MERECE EL MEJOR CUIDADO</h2>
                                    <h3 class="subtitle">¡Agenda tu cita ahora y descúbrela en su mejor versión!</h3>
                                    <a href="<?= url('schedule/'.$o->cms) ?>" class="button h-button is-rounded is-bold">Agenda tu cita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <!-- Simple light footer -->
                <footer class="huro-footer">
                    <div class="container">
                        <div class="footer-head">
                            <div class="head-text">
                                <h3><?= $company_name ?></h3>
                            </div>
                        </div>
                        <div class="columns footer-body">
                            <!-- Column -->
                            <div class="column is-12">
                                <div class="p-t-10 p-b-10">
                                    <img class="small-footer-logo light-image-l" src="<?= $logo ?>" alt="" />
                                    <img class="small-footer-logo dark-image-l" src="<?= $logo ?>" alt="" />
                                    <div class="footer-description p-t-10 p-b-10">
                                        <?= !empty($o->phone)?$o->phone:'' ?>
                                    </div>
									<div class="footer-description p-t-10 p-b-10">
                                        <?= !empty($o->email)?$o->email:'' ?>
                                    </div>
									<div class="footer-description p-t-10">
                                        <?= $o->location ?>
                                    </div>
                                </div>
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
    </div>
</body>

</html>

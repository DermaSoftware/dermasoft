<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<title><?= @$title ?> | {{ config('app.name', '') }}</title>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="fullstackcolombia.com">
		<meta name="description" content="{{ config('app.name', '') }}">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?= asset('assets/images/favicon.png') ?>">
		<!-- Google Font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">
		<!-- Plugins CSS -->
		<link rel="stylesheet" type="text/css" href="<?= asset('assets/vendor/font-awesome/css/all.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('assets/vendor/choices/css/choices.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('assets/vendor/aos/aos.css') ?>">
		<!-- Theme CSS -->
		<link id="style-switch" rel="stylesheet" type="text/css" href="<?= asset('assets/css/style.css') ?>">
		<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css" rel="stylesheet" type="text/css">
		<style>
		@media only screen and (max-width: 768px) {
		  #calendar_fsc > div.fc-header-toolbar.fc-toolbar.fc-toolbar-ltr {display: block;}
		  #calendar_fsc > div.fc-header-toolbar.fc-toolbar.fc-toolbar-ltr > div.fc-toolbar-chunk {display: block;}
		}
		</style>
	</head>

	<body>
	<span id="fsc-switch-light" name="<?= asset('assets/css/style.css') ?>"></span>
	<span id="fsc-switch-dark" name="<?= asset('assets/css/style-dark.css') ?>"></span>
	<!-- Pre loader -->
	<div class="preloader">
		<div class="preloader-item">
			<div class="spinner-grow text-primary"></div>
		</div>
	</div>
	<!-- Header START -->
	<header class="navbar-light navbar-sticky">
		<!-- Logo Nav START -->
		<nav class="navbar navbar-expand-xl">
			<div class="container">
				<!-- Logo START -->
				<a class="navbar-brand" href="{{ url('/') }}">
					<img class="light-mode-item navbar-brand-item" src="<?= asset('assets/images/logo.svg') ?>" alt="logo">
					<img class="dark-mode-item navbar-brand-item" src="<?= asset('assets/images/logo-light.svg') ?>" alt="logo">
				</a>
				<!-- Logo END -->

				<!-- Responsive navbar toggler -->
				<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-animation">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</button>

				<!-- Main navbar START -->
				<div class="navbar-collapse w-100 collapse" id="navbarCollapse">

					
					<ul class="navbar-nav navbar-nav-scroll mx-auto">
						<li class="nav-item"><a class="nav-link" href="{{ url('faqs') }}">Preguntas frecuentes</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Contacto</a></li>
					</ul>
					<!-- Nav Main menu END -->

					<!-- Nav Search START -->
					<!--<div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">
						<div class="nav-item w-100">
							<form class="position-relative">
								<input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">
								<button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
									<i class="fas fa-search fs-6 "></i>
								</button>
							</form>
						</div>
					</div>-->
					<!-- Nav Search END -->
				</div>
				<!-- Main navbar END -->

				<!-- Profile START -->
				<div class="dropdown ms-1 ms-lg-0">
					<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-circle" src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:asset('assets/images/avatar/01.jpg') }}" alt="avatar">
					</a>
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3 mb-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle shadow" src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:asset('assets/images/avatar/01.jpg') }}" alt="avatar">
								</div>
								<div>
									<a class="h6" href="<?= url('profile') ?>">{{ Auth::user()->name }}</a>
									<p class="small m-0">{{ Auth::user()->email }}</p>
								</div>
							</div>
						</li>
						<li> <hr class="dropdown-divider"></li>
						<!-- Links -->
						<li><a class="dropdown-item" href="<?= url('profile') ?>"><i class="bi bi-person fa-fw me-2"></i>Editar perfil</a></li>
						<?php if(Auth::user()->role == 1){ ?>
						<li><a class="dropdown-item" href="<?= url('admin') ?>"><i class="bi bi-gear fa-fw me-2"></i>Panel de administración</a></li>
						<?php } ?>
						<li class="d-none"><a class="dropdown-item" href="<?= url('soporte') ?>"><i class="bi bi-info-circle fa-fw me-2"></i>Soporte</a></li>
						<li><a class="dropdown-item" href="<?= url('faqs') ?>"><i class="bi bi-info-circle fa-fw me-2"></i>FAQs</a></li>
						<li><a class="dropdown-item bg-danger-soft-hover" href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bi bi-power fa-fw me-2"></i>Salir</a></li>
						<li> <hr class="dropdown-divider"></li>
						<!-- Dark mode switch START -->
						<li>
							<div class="modeswitch-wrap" id="darkModeSwitch">
								<div class="modeswitch-item">
									<div class="modeswitch-icon"></div>
								</div>
								<span>Dark mode</span>
							</div>
						</li> 
						<!-- Dark mode switch END -->
					</ul>
					<form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
				</div>
				<!-- Profile START -->
			</div>
		</nav>
		<!-- Logo Nav END -->
	</header>
	<!-- Header END -->

	<!-- **************** MAIN CONTENT START **************** -->
	<main>
		
	<!-- =======================
	Page Banner START -->
	<section class="pt-0">
		<div class="container-fluid px-0">
			<div class="card bg-blue h-100px h-md-200px rounded-0" style="background:url(<?= asset('assets/images/pattern/04.png') ?>) no-repeat center center; background-size:cover;">
			</div>
		</div>
		<div class="container mt-n4">
			<div class="row">
				<div class="col-12">
					<div class="card bg-transparent card-body pb-0 px-0 mt-2 mt-sm-0">
						<div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
							<!-- Avatar -->
							<div class="col-auto">
								<div class="avatar avatar-xxl position-relative mt-n3">
									<img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:asset('assets/images/avatar/09.jpg') }}" alt="">
									<span class="badge text-bg-success rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">{{ Auth::user()->getRole() }}</span>
								</div>
							</div>
							<!-- Profile info -->
							<div class="col d-sm-flex justify-content-between align-items-center">
								<div>
									<h1 class="my-1 fs-4">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h1>
									<ul class="list-inline mb-0 d-none">
										<li class="list-inline-item me-3 mb-1 mb-sm-0">
											<span class="h6">255</span>
											<span class="text-body fw-light">Lives</span>
										</li>
										<li class="list-inline-item me-3 mb-1 mb-sm-0">
											<span class="h6">7</span>
											<span class="text-body fw-light">Cursos completados</span>
										</li>
										<li class="list-inline-item me-3 mb-1 mb-sm-0">
											<span class="h6">52</span>
											<span class="text-body fw-light">Lecciones completadas</span>
										</li>
									</ul>
								</div>
								<!-- Button -->
								<div class="mt-2 mt-sm-0">
									<a href="{{ url('calendar') }}" class="btn btn-outline-primary mb-0">Ver calendario</a>
								</div>
							</div>
						</div>
					</div>

					<!-- Advanced filter responsive toggler START -->
					<!-- Divider -->
					<hr class="d-xl-none">
					<div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
						<a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
						<button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
							<i class="fas fa-sliders-h"></i>
						</button>
					</div>
					<!-- Advanced filter responsive toggler END -->
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
	Page Banner END -->

	<!-- =======================
	Page content START -->
	<section class="pt-0">
		<div class="container">
			<div class="row">

				<!-- Left sidebar START -->
				<div class="col-xl-3">
					<!-- Responsive offcanvas body START -->
					<div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
						<!-- Offcanvas header -->
						<div class="offcanvas-header bg-light">
							<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Mi perfil</h5>
							<button  type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
						</div>
						<!-- Offcanvas body -->
						<div class="offcanvas-body p-3 p-xl-0">
							<div class="bg-dark border rounded-3 pb-0 p-3 w-100">
								<!-- Dashboard menu -->
								<div class="list-group list-group-dark list-group-borderless">
									<a class="list-group-item <?= $menu=='home'?'active':'' ?>" href="{{ url('/') }}"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Dashboard</a>
									<a class="list-group-item <?= $menu=='membership'?'active':'' ?>" href="{{ url('membership') }}"><i class="bi bi-card-checklist fa-fw me-2"></i>Membresias</a>
									<a class="list-group-item <?= $menu=='mycourses'?'active':'' ?>" href="{{ url('mycourses') }}"><i class="bi bi-basket fa-fw me-2"></i>Mis cursos</a>
									<a class="list-group-item <?= $menu=='calendar'?'active':'' ?>" href="{{ url('calendar') }}"><i class="far fa-fw fa-file-alt me-2"></i>Mi agenda</a>
									<a class="list-group-item d-none" href="javascript:void(0)"><i class="bi bi-question-diamond fa-fw me-2"></i>Mi biblioteca</a>
									<a class="list-group-item <?= $menu=='payments'?'active':'' ?>" href="{{ url('payments') }}"><i class="bi bi-credit-card-2-front fa-fw me-2"></i>Historial de pagos</a>
									<a class="list-group-item d-none" href="javascript:void(0)"><i class="bi bi-cart-check fa-fw me-2"></i>Mis certificados</a>
									<a class="list-group-item <?= $menu=='profile'?'active':'' ?>" href="{{ url('profile') }}"><i class="bi bi-pencil-square fa-fw me-2"></i>Editar perfil</a>
									<a class="list-group-item <?= $menu=='password'?'active':'' ?>" href="{{ url('password') }}"><i class="bi bi-key fa-fw me-2"></i>Editar contraseña</a>
									<a class="list-group-item <?= $menu=='setting'?'active':'' ?>" href="{{ url('setting') }}"><i class="bi bi-gear fa-fw me-2"></i>Configuraciones</a>
									<a class="list-group-item <?= $menu=='delete_account'?'active':'' ?>" href="{{ url('delete_account') }}"><i class="bi bi-trash fa-fw me-2"></i>Eliminar cuenta</a>
									<a class="list-group-item text-danger bg-danger-soft-hover" href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Salir</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Responsive offcanvas body END -->
				</div>
				<!-- Left sidebar END -->

				<!-- Main content START -->
				<div class="col-xl-9">
					@if (Session::has('msj_success'))
					<div class="alert alert-success alert-remove-fsc" role="alert">{{ session('msj_success') }}</div>
					@endif
					@yield('content')
				<!-- Main content END -->
				</div><!-- Row END -->
			</div>
		</div>	
	</section>
	<!-- =======================
	Page content END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
	Footer START -->
	<footer class="bg-dark p-3">
		<div class="container">
			<div class="row align-items-center">
				<!-- Widget -->
				<div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
					<!-- Logo START -->
					<a href="{{ url('/') }}"><img class="h-20px" src="<?= asset('assets/images/logo-light.svg') ?>" alt="logo"> </a>
				</div>
				<!-- Widget -->
				<div class="col-md-4 mb-3 mb-md-0">
					<div class="text-center text-white">
						&copy; <a href="{{ url('/') }}" class="text-reset btn-link">{{ config('app.name', '') }}</a> <?= date('Y') ?>
					</div>
				</div>
				<!-- Widget -->
				<div class="col-md-4">
					<!-- Rating -->
					<ul class="list-inline mb-0 text-center text-md-end">
						<li class="list-inline-item ms-2"><a href="{{ url('/') }}"><i class="text-white fab fa-facebook"></i></a></li>
						<li class="list-inline-item ms-2"><a href="{{ url('/') }}"><i class="text-white fab fa-instagram"></i></a></li>
						<li class="list-inline-item ms-2"><a href="{{ url('/') }}"><i class="text-white fab fa-linkedin-in"></i></a></li>
						<li class="list-inline-item ms-2"><a href="{{ url('/') }}"><i class="text-white fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- =======================
	Footer END -->
		<!-- Back to top -->
		<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>
		<script src="<?= asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
		<script src="<?= asset('assets/vendor/choices/js/choices.min.js') ?>"></script>
		<script src="<?= asset('assets/vendor/purecounterjs/dist/purecounter_vanilla.js') ?>"></script>
		<script src="<?= asset('assets/vendor/aos/aos.js') ?>"></script>
		<!-- Template Functions -->
		<script src="<?= asset('assets/js/functions.js') ?>"></script>
		<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		
		<script>
		$(document).ready(function(){
			if($('.btn_course_price_free').length){
				$('.btn_course_price_free').each(function(i,v){
					var btn_item = $(this);
					btn_item.on('click',function(e){
						e.preventDefault();
						swal({
							title: 'Estás seguro(a) que deseas suscribirte al curso seleccionado?',
							text: "Esta acción es irreversible!",
							icon: "warning",
							buttons: ["Cancelar", "Si, suscribirme!"],
							dangerMode: true,
							cancelButtonColor: '#d33'
						}).then(function (willConfirm) {
							if(willConfirm){
								$('.preloader').fadeIn();
								$.post(btn_item.data('url'), {
									_token: $("meta[name='csrf-token']").attr("content")
								}, function(data) {
									$('.preloader').fadeOut();
									if(data != 'ok'){
										swal('Error!',data,'error');
									} else {
										swal('Enhorabuena!','La suscripción ha sido completada correctamente','success');
										location.reload(true);
									}
								}, "html");
							}
						});
					});
				});
			}
			if($('.btn_plan_price_free').length){
				$('.btn_plan_price_free').each(function(i,v){
					var btn_item = $(this);
					btn_item.on('click',function(e){
						e.preventDefault();
						swal({
							title: 'Estás seguro(a) que deseas suscribirte al plan seleccionado?',
							text: "Esta acción es irreversible!",
							icon: "warning",
							buttons: ["Cancelar", "Si, suscribirme!"],
							dangerMode: true,
							cancelButtonColor: '#d33'
						}).then(function (willConfirm) {
							if(willConfirm){
								$('.preloader').fadeIn();
								$.post(btn_item.data('url'), {
									_token: $("meta[name='csrf-token']").attr("content")
								}, function(data) {
									$('.preloader').fadeOut();
									if(data != 'ok'){
										swal('Error!',data,'error');
									} else {
										swal('Enhorabuena!','La suscripción ha sido completada correctamente','success');
										location.reload(true);
									}
								}, "html");
							}
						});
					});
				});
			}
			if($('.alert-remove-fsc').length){
				setInterval(function(){ $('.alert-remove-fsc').remove(); }, 8000);
			}
			
			if($('.btn_plan_price_epayco').length){
				$('.btn_plan_price_epayco').on('click',function(e){
					e.preventDefault();
					var btn_item = $(this);
					btn_item.parent().parent().find('.epayco-button-render').click();
				});
			}
			
			if($('.btn_upgrade_plans_fsc').length){
				$('.btn_upgrade_plans_fsc').on('click',function(e){
					e.preventDefault();
					$('.section_plans_fsc').removeClass('d-none');
				});
			}
		});
		</script>
		
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.min.js"></script>
		<script>
		$(document).ready(function(){
			if ($('#calendar_fsc').length > 0) {
				var cc_url_events = $('#calendar_fsc').data('events');
				var cc_url_info = $('#calendar_fsc').data('urlinfo');
				function load_info_evt(idevt){
					$.post(cc_url_info, {
						_token: $("meta[name='csrf-token']").attr("content"),
						id: idevt
					}, function (data) {
						$('.calendar_modal .modal-body').html(data);
						$('.calendar_modal').modal('show');
					}, "html");
				}
				
				var calendarEl = document.getElementById('calendar_fsc');
				var calendar = new FullCalendar.Calendar(calendarEl, {
					timeZone: 'UTC',
					themeSystem: 'bootstrap5',
					headerToolbar: {
					  left: 'prev,next today',
					  center: 'title',
					  right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
					},
					initialView: 'dayGridMonth',
					weekNumbers: true,
					dayMaxEvents: true, // allow "more" link when too many events
					events: cc_url_events,
					eventClick: function (calEvent, jsEvent, view) {
						load_info_evt(calEvent.event.id);
					},
					locale: 'es',
					//defaultDate: "<?php echo date('Y-m-d'); ?>",
					navLinks: true,
					editable: false,
					eventLimit: true
				});
				calendar.render();
				
				
				/*$('#calendar_fsc').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,basicWeek,basicDay'
					},
					eventClick: function (calEvent, jsEvent, view) {
						load_info_evt(calEvent.id);
					},
					locale: 'es',
					themeSystem: 'bootstrap5',
					//defaultDate: "<?php echo date('Y-m-d'); ?>",
					navLinks: true,
					editable: false,
					eventLimit: true,
					events: cc_url_events
				});*/
			}
		});
		</script>

	</body>
</html>
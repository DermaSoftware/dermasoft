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
        <link rel="stylesheet" type="text/css" href="<?= asset('assets/vendor/apexcharts/css/apexcharts.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('assets/vendor/overlay-scrollbar/css/OverlayScrollbars.min.css') ?>">
		<!-- Theme CSS -->
		<link id="style-switch" rel="stylesheet" type="text/css" href="<?= asset('assets/css/style.css') ?>">
        <link rel="stylesheet" href="<?= asset('assets/css/sweetalert2.css') ?>">
        <link rel="stylesheet" href="<?= asset('assets/css/daterangepicker.css') ?>">
        <link rel="stylesheet" href="<?= asset('assets/css/daterangepicker.min.css') ?>">
		<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.css" rel="stylesheet" type="text/css">-->
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
	<!-- **************** MAIN CONTENT START **************** -->
		<main>
		<!-- Sidebar START -->
		<nav class="navbar sidebar navbar-expand-xl navbar-dark bg-dark">
			<!-- Navbar brand for xl START -->
			<div class="d-flex align-items-center">
				<a class="navbar-brand mx-auto" href="{{ url('/') }}">
					<img class="navbar-brand-item" src="<?= asset('assets/images/logo-light.svg') ?>" alt="">
				</a>
			</div>
			<!-- Navbar brand for xl END -->
			<div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar">
				<div class="offcanvas-body sidebar-content d-flex flex-column bg-dark">
					<!-- Sidebar menu START -->
					<ul class="navbar-nav flex-column" id="navbar-sidebar">
						<!-- Menu item 1 -->
						<li class="nav-item"><a href="{{ url('admin') }}" class="nav-link <?= $menu=='admin'?'active':'' ?>"><i class="bi bi-house fa-fw me-2"></i>Dashboard</a></li>
						<!-- Title -->
						<li class="nav-item ms-2 my-2">Gestión</li>
						<li class="nav-item"><a class="nav-link <?= $menu=='admin/groups'?'active':'' ?>" href="{{ url('admin/groups') }}"><i class="fas fa-users fa-fw me-2"></i> Grupos</a></li>
						<li class="nav-item"><a class="nav-link <?= $menu=='admin/users'?'active':'' ?>" href="{{ url('admin/users') }}"><i class="fas fa-user fa-fw me-2"></i> Usuarios</a></li>
						<li class="nav-item"><a class="nav-link <?= $menu=='admin/plans'?'active':'' ?>" href="{{ url('admin/plans') }}"><i class="far fa-clipboard fa-fw me-2"></i> Planes</a></li>
						<?php $act_m = in_array($menu,['admin/courses','admin/lessons']); ?>
						<?php $itm_m = 'courses'; ?>
						<li class="nav-item">
							<a class="nav-link <?= $act_m?'active':'' ?>" data-bs-toggle="collapse" href="#collapsepage<?= $itm_m ?>" role="button" aria-expanded="<?= $act_m?'true':'false' ?>" aria-controls="collapsepage<?= $itm_m ?>">
								<i class="bi bi-journal-bookmark fa-fw me-2"></i>Cursos
							</a>
							<ul class="nav collapse flex-column <?= $act_m?'collapse show':'' ?>" id="collapsepage<?= $itm_m ?>" data-bs-parent="#navbar-sidebar">
								<li class="nav-item"><a class="nav-link" href="{{ url('admin/courses') }}">Cursos</a></li>
								<li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Certificados</a></li>
							</ul>
						</li>
						<?php $act_m = in_array($menu,['admin/faqs','admin/catfaqs']); ?>
						<?php $itm_m = 'faqs'; ?>
						<li class="nav-item">
							<a class="nav-link <?= $act_m?'active':'' ?>" data-bs-toggle="collapse" href="#collapsepage<?= $itm_m ?>" role="button" aria-expanded="<?= $act_m?'true':'false' ?>" aria-controls="collapsepage<?= $itm_m ?>">
								<i class="bi bi-basket fa-fw me-2"></i>FAQs
							</a>
							<ul class="nav collapse flex-column <?= $act_m?'collapse show':'' ?>" id="collapsepage<?= $itm_m ?>" data-bs-parent="#navbar-sidebar">
								<li class="nav-item"><a class="nav-link <?= $menu=='admin/catfaqs'?'active':'' ?>" href="{{ url('admin/catfaqs') }}">Categorías</a></li>
								<li class="nav-item"><a class="nav-link <?= $menu=='admin/faqs'?'active':'' ?>" href="{{ url('admin/faqs') }}">FAQs</a></li>
							</ul>
						</li>
						<!-- Title -->
						<li class="nav-item ms-2 my-2">Hitorial</li>
						<li class="nav-item"><a class="nav-link <?= $menu=='admin/payments'?'active':'' ?>" href="{{ url('admin/payments') }}"><i class="fas fa-money-bill fa-fw me-2"></i> Pagos</a></li>
						<li class="nav-item d-none"><a class="nav-link" href="{{ url('/') }}"><i class="fas fa-sitemap fa-fw me-2"></i>Changelog</a></li>
					</ul>
					<!-- Sidebar menu end -->
					<!-- Sidebar footer START -->
					<div class="px-3 mt-auto pt-3">
						<div class="d-flex align-items-center justify-content-between text-primary-hover">
							<a class="h5 mb-0 text-body" href="{{ url('profile') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings">
								<i class="bi bi-gear-fill"></i>
							</a>
							<a class="h5 mb-0 text-body" href="{{ url('/') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Home">
								<i class="bi bi-globe"></i>
							</a>
							<a class="h5 mb-0 text-body" href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-bs-toggle="tooltip" data-bs-placement="top" title="Salir">
								<i class="bi bi-power"></i>
							</a>
						</div>
					</div>
					<!-- Sidebar footer END -->
					<form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
				</div>
			</div>
		</nav>
		<!-- Sidebar END -->
		<!-- Page content START -->
		<div class="page-content">
			<!-- Top bar START -->
			<nav class="navbar top-bar navbar-light border-bottom py-0 py-xl-3">
				<div class="container-fluid p-0">
					<div class="d-flex align-items-center w-100">
						<!-- Logo START -->
						<div class="d-flex align-items-center d-xl-none">
							<a class="navbar-brand" href="{{ url('/') }}">
								<img class="light-mode-item navbar-brand-item h-30px" src="<?= asset('assets/images/logo.svg') ?>" alt="">
								<img class="dark-mode-item navbar-brand-item h-30px" src="<?= asset('assets/images/logo.svg') ?>" alt="">
							</a>
						</div>
						<!-- Logo END -->

						<!-- Toggler for sidebar START -->
						<div class="navbar-expand-xl sidebar-offcanvas-menu">
							<button class="navbar-toggler me-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="outside">
								<i class="bi bi-text-right fa-fw h2 lh-0 mb-0 rtl-flip" data-bs-target="#offcanvasMenu"> </i>
							</button>
						</div>
						<!-- Toggler for sidebar END -->
						<!-- Top bar left -->
						<div class="navbar-expand-lg ms-auto ms-xl-0">
							<!-- Toggler for menubar START -->
							<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopContent" aria-controls="navbarTopContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-animation">
									<span></span>
									<span></span>
									<span></span>
								</span>
							</button>
							<!-- Toggler for menubar END -->
							<!-- Topbar menu START -->
							<div class="collapse navbar-collapse w-100" id="navbarTopContent">
								<!-- Top search START -->
								<div class="nav my-3 my-xl-0 flex-nowrap align-items-center d-none">
									<div class="nav-item w-100">
										<form class="position-relative">
											<input class="form-control pe-5 bg-secondary bg-opacity-10 border-0" type="search" placeholder="Search" aria-label="Search">
											<button class="bg-transparent px-2 py-0 border-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 text-primary"></i></button>
										</form>
									</div>
								</div>
								<!-- Top search END -->
							</div>
							<!-- Topbar menu END -->
						</div>
						<!-- Top bar left END -->
						<!-- Top bar right START -->
						<div class="ms-xl-auto">
							<ul class="navbar-nav flex-row align-items-center">
								<!-- Notification dropdown START -->
								<li class="nav-item ms-2 ms-md-3 dropdown d-none">
									<!-- Notification button -->
									<a class="btn btn-light btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
										<i class="bi bi-bell fa-fw"></i>
									</a>
									<!-- Notification dote -->
									<span class="notif-badge animation-blink"></span>
									<!-- Notification dropdown menu START -->
									<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
										<div class="card bg-transparent">
											<div class="card-header bg-transparent border-bottom py-4 d-flex justify-content-between align-items-center">
												<h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">2 new</span></h6>
												<a class="small" href="#">Clear all</a>
											</div>
											<div class="card-body p-0">
												<ul class="list-group list-unstyled list-group-flush">
													<!-- Notif item -->
													<li>
														<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
															<div class="me-3">
																<div class="avatar avatar-md">
																	<img class="avatar-img rounded-circle" src="<?= asset('assets/images/avatar/08.jpg') ?>" alt="avatar">
																</div>
															</div>
															<div>
																<p class="text-body small m-0">Congratulate <b>Joan Wallace</b> for graduating from <b>Microverse university</b></p>
																<u class="small">Say congrats</u>
															</div>
														</a>
													</li>
													<!-- Notif item -->
													<li>
														<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
															<div class="me-3">
																<div class="avatar avatar-md">
																	<img class="avatar-img rounded-circle" src="<?= asset('assets/images/avatar/02.jpg') ?>" alt="avatar">
																</div>
															</div>
															<div>
																<h6 class="mb-1">Larry Lawson Added a new course</h6>
																<p class="small text-body m-0">What's new! Find out about new features</p>
																<u class="small">View detail</u>
															</div>
														</a>
													</li>
												</ul>
											</div>
											<!-- Button -->
											<div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
												<a href="#" class="stretched-link">See all incoming activity</a>
											</div>
										</div>
									</div>
									<!-- Notification dropdown menu END -->
								</li>
								<!-- Notification dropdown END -->
								<!-- Profile dropdown START -->
								<li class="nav-item ms-2 ms-md-3 dropdown">
									<!-- Avatar -->
									<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
										<img class="avatar-img rounded-circle" src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:asset('assets/images/avatar/01.jpg') }}" alt="avatar">
									</a>
									<!-- Profile dropdown START -->
									<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
										<!-- Profile info -->
										<li class="px-3">
											<div class="d-flex align-items-center">
												<!-- Avatar -->
												<div class="avatar me-3 mb-3">
													<img class="avatar-img rounded-circle shadow" src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:asset('assets/images/avatar/01.jpg') }}" alt="avatar">
												</div>
												<div>
													<a class="h6 mt-2 mt-sm-0" href="#">{{ Auth::user()->name }}</a>
													<p class="small m-0">{{ Auth::user()->email }}</p>
												</div>
											</div>
										</li>
										<li> <hr class="dropdown-divider"></li>
										<!-- Links -->
										<li><a class="dropdown-item" href="{{ url('profile') }}"><i class="bi bi-person fa-fw me-2"></i>Editar perfil</a></li>
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
									<!-- Profile dropdown END -->
								</li>
								<!-- Profile dropdown END -->
							</ul>
						</div>
						<!-- Top bar right END -->
					</div>
				</div>
			</nav>
			<!-- Top bar END -->
			<!-- Page main content START -->
			<div class="page-content-wrapper border">
				@if (Session::has('msj_success'))
				<div class="alert alert-success alert-remove-fsc" role="alert">{{ session('msj_success') }}</div>
				@endif
				@yield('content')
			</div>
			<!-- Page main content END -->
		</div>
		<!-- Page content END -->
		</main>
		<!-- **************** MAIN CONTENT END **************** -->
		<!-- Back to top -->
		<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>
		<script src="<?= asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
		<script src="<?= asset('assets/vendor/purecounterjs/dist/purecounter_vanilla.js') ?>"></script>
		<script src="<?= asset('assets/vendor/apexcharts/js/apexcharts.min.js') ?>"></script>
		<script src="<?= asset('assets/vendor/overlay-scrollbar/js/overlayscrollbars.min.js') ?>"></script>
		<!-- Template Functions -->
		<script src="<?= asset('assets/js/functions.js') ?>"></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js"></script>-->
		<script>
		$(document).ready(function(){
			if($('.alert-remove-fsc').length){
				setInterval(function(){ $('.alert-remove-fsc').remove(); }, 8000);
			}
			if($('.btn_search_list_fsc').length){
				$('.btn_search_list_fsc').each(function(i,v){
					var btn_item = $(this);
					btn_item.on('click',function(e){
						e.preventDefault();
						$('.preloader').fadeIn();
						var inp = $(btn_item.data('inptag'));
						var field_name = btn_item.data('fieldname');
						var f = btn_item.data('field');
						$.post(btn_item.data('url'), {
							_token: $("meta[name='csrf-token']").attr("content"),
							field: f,
							value: inp.val()
						}, function(data) {
							location.reload(true);
						}, "html");
					});
				});
			}
			$('.btn-delete-confirm').on('click',function(e){
				e.preventDefault();
				var trash = $(this);
				var url_trash = trash.data('href');
				swal({
					title: '¿Estás seguro(a) que deseas eliminar '+trash.data('itemtag')+' '+trash.data('nameitem')+' seleccionad'+trash.data('itemselect')+'?',
					text: 'Esta acción es irreversible!',
					type: 'warning',
					showCancelButton: true,
					confirmButtonClass: 'btn btn-danger',
					cancelButtonClass: 'btn btn-dark',
					confirmButtonText: 'Si, eliminar!',
					cancelButtonText: 'Cancelar'
				}).then(function (willConfirm) {
					if(willConfirm){
						var params = {_token: $("meta[name='csrf-token']").attr("content"),_method: 'DELETE'};
						$.ajax({
							headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
							url: url_trash,
							data: params,
							processData: false,
							contentType: false,
							dataType: "json",
							type: 'DELETE',
							beforeSend: function () {
								$('.preloader').fadeIn();
							},
							complete: function () {
								$('.preloader').fadeOut();
							},
							success: function (data) {
								if(data.response == 'ok'){
									swal({
										title: 'Enhorabuena!',
										text: $('form.delete-form-fsc').data('msj'),
										type: 'success',
										confirmButtonClass: 'btn btn-success'
									});
									trash.parent().parent().remove();
								} else {
									console.log(data);
								}
							},
							error: function (jqXHR) {
								console.log('ERROR!',jqXHR);
							}
						});
					}
				},function(dismiss){
				});
			});

			if ($(".datepicker-fsc").length) {
				$('.datepicker-fsc').each(function(){
					$(this).daterangepicker({
						"singleDatePicker": true,
						"autoApply": true,
						"locale": {
							"format": "YYYY-MM-DD",
							"separator": " - ",
							"applyLabel": "Aplicar",
							"cancelLabel": "Cancelar",
							"fromLabel": "From",
							"toLabel": "To",
							"customRangeLabel": "Custom",
							"weekLabel": "W",
							"daysOfWeek": [
								"Su",
								"Mo",
								"Tu",
								"We",
								"Th",
								"Fr",
								"Sa"
							],
							"monthNames": [
								"January",
								"February",
								"March",
								"April",
								"May",
								"June",
								"July",
								"August",
								"September",
								"October",
								"November",
								"December"
							],
							"firstDay": 1
						},
						"drops": "auto"
					}, function(start, end, label) {
					});
				});
			}
		});
		</script>
	</body>
</html>

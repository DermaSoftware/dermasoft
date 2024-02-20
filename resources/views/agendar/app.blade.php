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
	.account-wrapper .account-box.is-form .form-head.is-stuck {
		padding-right: 20px;
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
				@include('msj')
				@yield('content')
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
		<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.9/locales/es.global.js'></script>
		<script>
		
		if($('.alert-remove-fsc').length){
			setInterval(function(){ $('.alert-remove-fsc').remove(); }, 8000);
		}
		if($('#calendar').length){
			document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth',
				locale: 'es',
				selectable: true,<?= $str_days ?><?= $locks_days ?>
				validRange: {
					start: '<?= date("Y-m-d") ?>'
				},
				dateClick: function(info) {
					$('.date-view-fsc').html(info.dateStr);
					$('#date_quote').val(info.dateStr);
					if($('#date_quote').val() != ''){
						$(".btn_send_calendar").prop('disabled',false);
					}
				},
			});
			calendar.render();
		  });
		}
		if ($("#bulma-datepicker-time-fsc1").length) {
			bulmaCalendar.attach('#bulma-datepicker-time-fsc1', {
				lang: 'es',
				startTime: '08:00',
				endTime: '18:00',
				minuteSteps: 30
			});
		}
		</script>
		
    </div>
</body>
</html>
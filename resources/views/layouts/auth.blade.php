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
    <link rel="stylesheet" href="<?= asset('assets/css/mycss.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	<style>
	.modern-login .top-logo {
		top: -40px;
	}
	.modern-login .top-logo img {
		max-width: 140px;
	}
	</style>
</head>
<body>
    <div id="huro-app" class="app-wrapper">
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="auth-wrapper">
			@yield('content')
        </div>
        <script src="<?= asset('assets/js/app.js') ?>"></script>
        <script src="<?= asset('assets/js/functions.js') ?>"></script>
        <script src="<?= asset('assets/js/auth.js') ?>"></script>
        <script>
		$('#photo_profile_img').on('click',function(){
			$('#photo_profile_acc').click();
		});
		$('#photo_profile_btn').on('click',function(){
			$('#photo_profile_acc').click();
		});
		$('#photo_profile_acc').on('change',function(event){
			var tmppath = URL.createObjectURL(event.target.files[0]);
			$("#photo_profile_img").fadeIn("fast").attr('src',tmppath);
		});
		</script>
    </div>
</body>
</html>

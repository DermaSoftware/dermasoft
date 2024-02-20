<?php
$root = __DIR__.'./';
require $root . 'vendor/autoload.php';
$app = require_once $root . 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Http\Kernel')->handle(Illuminate\Http\Request::capture());
$test = new App\Http\Controllers\HomeController();
$test->paymentres($_REQUEST);
?>
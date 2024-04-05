<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear', function () {
    //1- borrar la carpeta storage en el path public/storage
	//2- correr la url /clear
	Artisan::call('cache:clear');
	Artisan::call('view:clear');
	// Artisan::call('session:flush');
    Artisan::call('route:clear');
    //Artisan::call('storage:link', [] );
});

//Auth::routes();
//Route::get('comingsoon', [App\Http\Controllers\ComingsoonController::class, 'index']);

Route::get('home', [App\Http\Controllers\HomepageController::class, 'index']);

Route::get('landing/{id}', [App\Http\Controllers\LandingController::class, 'index']);
Route::get('schedule/{id}', [App\Http\Controllers\LandingController::class, 'schedule']);
Route::post('agendar/search/{id}', [App\Http\Controllers\LandingController::class, 'search']);
Route::get('solicitude/{id}', [App\Http\Controllers\LandingController::class, 'solicitude']);
Route::get('doctors/{id}', [App\Http\Controllers\LandingController::class, 'doctors']);
Route::get('clndrsh/{id}', [App\Http\Controllers\LandingController::class, 'clndrsh']);
Route::get('paymentsh/{id}', [App\Http\Controllers\LandingController::class, 'paymentsh']);
Route::get('finalized', [App\Http\Controllers\LandingController::class, 'finalized']);
Route::get('pyresp', [App\Http\Controllers\LandingController::class, 'pyresp']);
Route::post('pyconn', [App\Http\Controllers\LandingController::class, 'pyconn']);
Route::post('svsolicitude/{id}', [App\Http\Controllers\LandingController::class, 'svsolicitude']);

Route::get('login', [App\Http\Controllers\AuthController::class, 'index']);
Route::get('twofa', [App\Http\Controllers\AuthController::class, 'twofa']);
Route::post('login', [App\Http\Controllers\AuthController::class, 'store']);
Route::post('twofactor', [App\Http\Controllers\AuthController::class, 'twofactor']);
Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout']);
Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);

Route::middleware(['guest'])->group(function () {
	Route::group([
        'prefix' => 'register'
    ], function () {
        Route::get('/', [App\Http\Controllers\RegisterController::class, 'index'])->name('register.index');
        Route::post('/', [App\Http\Controllers\RegisterController::class, 'store'])->name('register.store');
    });
	//Recovery
    Route::group([
        'prefix' => 'recovery'
    ], function () {
        Route::get('/', [App\Http\Controllers\RecoveryController::class, 'index'])->name('recovery.index');
		Route::post('/', [App\Http\Controllers\RecoveryController::class, 'store'])->name('recovery.store');

		Route::get('/verify', [App\Http\Controllers\RecoveryController::class, 'verify'])->name('recovery.verify');
        Route::post('/verify', [App\Http\Controllers\RecoveryController::class, 'checkkey'])->name('recovery.checkkey');

		Route::get('/new', [App\Http\Controllers\RecoveryController::class, 'newpassword'])->name('recovery.newpassword');
		Route::post('/new', [App\Http\Controllers\RecoveryController::class, 'update'])->name('recovery.update');
    });
});

Route::middleware(['auth','mfsc'])->group(function () {
	//Chat
	Route::post('chat/{id}', [App\Http\Controllers\ChatController::class, 'getusers']);
	Route::post('chat/admsj/{id}', [App\Http\Controllers\ChatController::class, 'admsj']);
	Route::post('chat/user/{id}', [App\Http\Controllers\ChatController::class, 'getuser']);
	Route::post('chat/msjs/{id}/{user}', [App\Http\Controllers\ChatController::class, 'getmsjs']);
	Route::post('chat/gettmsjuser/{id}/{user}', [App\Http\Controllers\ChatController::class, 'gettmsjuser']);

	//Dashboard
	Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
	Route::get('faqs', [App\Http\Controllers\HomeController::class, 'faqs'])->name('faqs');
	Route::get('orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');
	Route::get('payments', [App\Http\Controllers\HomeController::class, 'payments'])->name('payments');
	Route::get('planes', [App\Http\Controllers\HomeController::class, 'planes'])->name('planes');
	Route::get('sale_planes', [App\Http\Controllers\HomeController::class, 'sale_planes'])->name('sale_planes');
	Route::get('support', [App\Http\Controllers\HomeController::class, 'support'])->name('support');
	Route::post('support', [App\Http\Controllers\HomeController::class, 'addticket'])->name('addticket');
	Route::get('support/create', [App\Http\Controllers\HomeController::class, 'supportnew'])->name('supportnew');
	Route::get('support/{id}', [App\Http\Controllers\HomeController::class, 'supportshow'])->name('supportshow');
	Route::post('support/{id}', [App\Http\Controllers\HomeController::class, 'supportup'])->name('supportup');
	Route::get('menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
	Route::get('bell', [App\Http\Controllers\HomeController::class, 'bell'])->name('bell');
	Route::get('highlights', [App\Http\Controllers\HomeController::class, 'highlights'])->name('highlights');
	Route::get('trainings', [App\Http\Controllers\HomeController::class, 'trainings']);
	//Payments
	Route::post('freeplan/{id}', [App\Http\Controllers\HomeController::class, 'freeplan'])->name('freeplan');
	Route::get('pay/response', [App\Http\Controllers\HomeController::class, 'pay_response'])->name('pay_response');
	Route::get('pay/success', [App\Http\Controllers\HomeController::class, 'pay_success'])->name('pay_success');
	Route::get('ajax_data', [App\Http\Controllers\HomeController::class, 'ajax_data'])->name('ajax_data');
	Route::post('ajax_data', [App\Http\Controllers\HomeController::class, 'ajax_data'])->name('ajax_data');
	//Profile
	Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index']);
	Route::post('profile', [App\Http\Controllers\ProfileController::class, 'update']);
});
Route::middleware(['auth'])->group(function () {
	//----------------------------------------------------------------------------------
	//----------------------------------------------------------------------------------
	//Super Admin
	Route::group([
		'prefix' => 'admin'
	], function () {
		//SUPER ADMINISTRADOR
		Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index']);
		//Sliders
		Route::resource('sliders', App\Http\Controllers\Admin\SlidersController::class);
		//Faqs
		Route::resource('catfaqs', App\Http\Controllers\Admin\CatfaqsController::class);
		Route::resource('faqs', App\Http\Controllers\Admin\FaqsController::class);
		//Planes
		Route::resource('plans', App\Http\Controllers\Admin\PlansController::class);
		//Soporte
		Route::get('soporte/o_table', [App\Http\Controllers\Admin\SoporteController::class, 'o_table']);
		Route::resource('soporte', App\Http\Controllers\Admin\SoporteController::class);
		//Usuarios
		Route::post('users/search', [App\Http\Controllers\Admin\UsersController::class, 'search']);
		Route::resource('users', App\Http\Controllers\Admin\UsersController::class);
		//Clientes
		Route::resource('companies', App\Http\Controllers\Admin\CompaniesController::class);
		//Inducciones
		Route::resource('trainings', App\Http\Controllers\Admin\TrainingsController::class);
		Route::get('trainings/pbr/{id}', [App\Http\Controllers\Admin\TrainingsController::class, 'resendpbr']);
		Route::post('hidviews', [App\Http\Controllers\Admin\TrainingsController::class, 'hidviews']);
		//Cargos
		Route::resource('charges', App\Http\Controllers\Admin\ChargesController::class);
		//Procedimientos
		Route::resource('procedures', App\Http\Controllers\Admin\ProceduresController::class);
		Route::post('procedures/import', [App\Http\Controllers\Admin\ProceduresController::class, 'fileImport']);
		//Especialidades
		Route::resource('specialties', App\Http\Controllers\Admin\SpecialtiesController::class);
		//Tipos de diagnósticos
		Route::resource('diagnosestype', App\Http\Controllers\Admin\DiagnosestypeController::class);
		//Diagnósticos
		Route::resource('diagnoses', App\Http\Controllers\Admin\DiagnosesController::class);
		Route::post('diagnoses/import', [App\Http\Controllers\Admin\DiagnosesController::class, 'fileImport']);
		//Indicaciones
		Route::resource('indications', App\Http\Controllers\Admin\IndicationsController::class);
		//Checklist
		Route::resource('checklistsecurity', App\Http\Controllers\Admin\ChecklistsecurityController::class);
		//Exámenes de laboratorio
		Route::resource('laboratoryexams', App\Http\Controllers\Admin\LaboratoryexamsController::class);
		Route::post('laboratoryexams/import', [App\Http\Controllers\Admin\LaboratoryexamsController::class, 'fileImport']);
		//Medicamentos
		Route::resource('medicines', App\Http\Controllers\Admin\MedicinesController::class);
		Route::post('medicines/import', [App\Http\Controllers\Admin\MedicinesController::class, 'fileImport']);
		//Patologías
		Route::resource('pathologies', App\Http\Controllers\Admin\PathologiesController::class);
		Route::post('pathologies/import', [App\Http\Controllers\Admin\PathologiesController::class, 'fileImport']);
		//Consentimientos
		Route::resource('consents', App\Http\Controllers\Admin\ConsentsController::class);
		//Habeas
		Route::get('habeas', [App\Http\Controllers\Admin\HabeasController::class, 'index'])->name('index');
		Route::post('habeas', [App\Http\Controllers\Admin\HabeasController::class, 'update'])->name('update');
		//Settings
		Route::get('settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('index');
		Route::post('settings', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('update');

		//Payments
		Route::get('orders', [App\Http\Controllers\Admin\OrdersController::class, 'index']);
		Route::get('orders/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'show']);
		Route::get('payments', [App\Http\Controllers\Admin\PaymentsController::class, 'index']);

		//ADMINISTRADOR

	});

	//----------------------------------------------------------------------------------
	//----------------------------------------------------------------------------------
	//----------------------------------------------------------------------------------
	//----------------------------------------------------------------------------------
	//ADMINISTRADOR
	Route::group([
		'prefix' => 'admon'
	], function () {
		//Inducciones
		Route::resource('trainings', App\Http\Controllers\Admon\TrainingsController::class);
		Route::get('trainings/pbr/{id}', [App\Http\Controllers\Admon\TrainingsController::class, 'resendpbr']);
		Route::post('hidviews', [App\Http\Controllers\Admon\TrainingsController::class, 'hidviews']);
		//Sedes
		Route::resource('headquarters', App\Http\Controllers\Admon\HeadquartersController::class);
		//Sliders
		Route::resource('sliders', App\Http\Controllers\Admon\SlidersController::class);
		//Categories
		Route::resource('categories', App\Http\Controllers\Admon\CategoriesController::class);
		//Subcategories
		Route::resource('subcategories', App\Http\Controllers\Admon\SubcategoriesController::class);
		//Products
		Route::resource('products', App\Http\Controllers\Admon\ProductsController::class);
		//Services
		Route::resource('services', App\Http\Controllers\Admon\ServicesController::class);
		//Querytypes
		Route::resource('querytypes', App\Http\Controllers\Admon\QuerytypesController::class);
		//Tplmails
		Route::resource('tplmails', App\Http\Controllers\Admon\TplmailsController::class);
		//Logmails
		Route::get('logmails', [App\Http\Controllers\Admon\LogmailsController::class, 'index']);
		Route::get('logmails/create', [App\Http\Controllers\Admon\LogmailsController::class, 'create']);
		Route::post('logmails/tpl/{id}', [App\Http\Controllers\Admon\LogmailsController::class, 'show']);
		Route::match(["POST","GET"],'logmails/{id}/edit', [App\Http\Controllers\Admon\LogmailsController::class, 'update']);
        Route::get('logmails/{id}/detail', [App\Http\Controllers\Admon\LogmailsController::class, 'detail']);
		Route::post('logmails/uss/{id}', [App\Http\Controllers\Admon\LogmailsController::class, 'uss']);
		Route::get('logmails/{id}/resend', [App\Http\Controllers\Admon\LogmailsController::class, 'resend']);
		Route::post('logmails', [App\Http\Controllers\Admon\LogmailsController::class, 'store']);
		//Diary
		Route::get('diary', [App\Http\Controllers\Admon\DiaryController::class, 'index']);
		Route::get('diary/{id}/edit', [App\Http\Controllers\Admon\DiaryController::class, 'edit']);
		Route::patch('diary/{id}', [App\Http\Controllers\Admon\DiaryController::class, 'update']);
		Route::get('diary/{id}/locks', [App\Http\Controllers\Admon\DiaryController::class, 'locks']);
		Route::get('diary/{id}', [App\Http\Controllers\Admon\DiaryController::class, 'create']);
		Route::match(["POST","GET"],'diary/{id}/update_lock', [App\Http\Controllers\Admon\DiaryController::class, 'update_lock']);
		Route::post('diary/{id}', [App\Http\Controllers\Admon\DiaryController::class, 'store']);
		Route::delete('diary/{id}', [App\Http\Controllers\Admon\DiaryController::class, 'destroy']);
		//Route::resource('diary', App\Http\Controllers\Admon\DiaryController::class);
		//Users
		Route::post('users/search', [App\Http\Controllers\Admon\UsersController::class, 'search']);
		Route::resource('users', App\Http\Controllers\Admon\UsersController::class);
		//Settings
		Route::get('settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('index');
		Route::post('settings', [App\Http\Controllers\SettingsController::class, 'update'])->name('update');
	});
	Route::group([
		'prefix' => 'patients'
	], function () {
		//Patients
		Route::get('/', [App\Http\Controllers\Patients\HomeController::class, 'index'])->name('index');
		Route::post('/codes', [App\Http\Controllers\Patients\HomeController::class, 'codes'])->name('codes');
		Route::post('/countries', [App\Http\Controllers\Patients\HomeController::class, 'countries'])->name('countries');
		Route::get('/records', [App\Http\Controllers\Patients\PatientsController::class, 'index'])->name('index');
		Route::get('/create', [App\Http\Controllers\Patients\PatientsController::class, 'create'])->name('create');
		Route::get('/hdpdf/{id}', [App\Http\Controllers\Patients\PatientsController::class, 'habeasdata'])->name('habeasdata');
		Route::get('/pdfrf/{id}', [App\Http\Controllers\Patients\PatientsController::class, 'pdfgallery'])->name('pdfgallery');
		Route::get('/search_vitalsigns', [App\Http\Controllers\Patients\PatientsController::class, 'shvitalsigns'])->name('shvitalsigns');
		Route::post('/search_vitalsigns', [App\Http\Controllers\Patients\PatientsController::class, 'shvs_search'])->name('shvs_search');
		Route::get('/search_gallery', [App\Http\Controllers\Patients\PatientsController::class, 'shgallery'])->name('shgallery');
		Route::post('/search_gallery', [App\Http\Controllers\Patients\PatientsController::class, 'shgy_search'])->name('shgy_search');
		Route::get('/vitalsigns/{id}/{appointment?}', [App\Http\Controllers\Patients\PatientsController::class, 'vitalsigns'])->name('vitalsigns');
		Route::post('/vitalsigns/{id}/{appointment?}', [App\Http\Controllers\Patients\PatientsController::class, 'svitalsigns'])->name('svitalsigns');
		Route::get('/gallery/{id}', [App\Http\Controllers\Patients\PatientsController::class, 'gallery'])->name('gallery');
		Route::post('/gallery/{id}', [App\Http\Controllers\Patients\PatientsController::class, 'sgallery'])->name('sgallery');
		Route::get('/suppdata/{id}', [App\Http\Controllers\Patients\PatientsController::class, 'suppdata'])->name('suppdata');
		Route::post('/suppdata/{id}', [App\Http\Controllers\Patients\PatientsController::class, 'ssuppdata'])->name('ssuppdata');
		Route::post('/', [App\Http\Controllers\Patients\PatientsController::class, 'store'])->name('store');
		Route::get('/{id}/edit', [App\Http\Controllers\Patients\PatientsController::class, 'edit'])->name('edit');
        Route::post('/get_habailable_days', [App\Http\Controllers\Patients\PatientsController::class, 'get_habailable_days']);
		Route::post('/{id}', [App\Http\Controllers\Patients\PatientsController::class, 'update'])->name('update');
		Route::delete('/{id}', [App\Http\Controllers\Patients\PatientsController::class, 'destroy'])->name('destroy');
        Route::match(["POST","GET"],'make_cita/{id}/{uuid?}', [App\Http\Controllers\Patients\PatientsController::class, 'make_cita']);
        Route::get('get_doctors/{qt}', [App\Http\Controllers\Patients\PatientsController::class, 'get_doctors']);
        Route::get('/appointments/{id}', [App\Http\Controllers\Patients\PatientsController::class, 'appointments']);
        Route::match(["POST","GET"],'/appointments/{id}/edit', [App\Http\Controllers\Patients\PatientsController::class, 'update_appointment']);
        Route::get('/appointments_calendar', [App\Http\Controllers\Patients\PatientsController::class, 'appointments_calendar']);
        Route::post('/appointments_calendar/events', [App\Http\Controllers\Patients\PatientsController::class, 'appointments_calendar_events']);

	});
	Route::group([
		'prefix' => 'clinichistory'
	], function () {
		//Clinichistory
		Route::get('/', [App\Http\Controllers\Clinichistory\General\HomeController::class, 'index'])->name('index');
		Route::post('/codes', [App\Http\Controllers\Clinichistory\General\HomeController::class, 'codes'])->name('codes');
		Route::get('/dermatology/{id}', [App\Http\Controllers\Clinichistory\General\HomeController::class, 'dermatology'])->name('dermatology');
		Route::post('/dermatology/{id}', [App\Http\Controllers\Clinichistory\General\HomeController::class, 'sdermatology'])->name('sdermatology');
		Route::get('/dermatology', [App\Http\Controllers\Clinichistory\General\HomeController::class, 'shdermatology'])->name('shdermatology');
		Route::get('/listrecords/{id}', [App\Http\Controllers\Clinichistory\General\HomeController::class, 'listrecords'])->name('listrecords');
		Route::get('/dermrecords/{id}', [App\Http\Controllers\Clinichistory\General\HomeController::class, 'dermrecords'])->name('dermrecords');
		Route::post('/search_dermatology', [App\Http\Controllers\Clinichistory\General\HomeController::class, 'shvs_dermatology'])->name('shvs_dermatology');
		Route::get('/hcdermpdf/{id}', [App\Http\Controllers\Clinichistory\General\HomeController::class, 'hcdermpdf'])->name('hcdermpdf');

		//Biopsies
		Route::group([
			'prefix' => 'biopsies'
		], function () {
			Route::get('/{id}', [App\Http\Controllers\Clinichistory\BiopsiesController::class, 'index']);
			Route::post('create/{id}', [App\Http\Controllers\Clinichistory\BiopsiesController::class, 'store']);
			Route::get('/', [App\Http\Controllers\Clinichistory\BiopsiesController::class, 'show']);
			Route::post('/search', [App\Http\Controllers\Clinichistory\BiopsiesController::class, 'search']);
			Route::get('/list/{id}', [App\Http\Controllers\Clinichistory\BiopsiesController::class, 'listrecords']);
			Route::get('/records/{id}', [App\Http\Controllers\Clinichistory\BiopsiesController::class, 'records']);
			Route::get('/hcpdf/{id}', [App\Http\Controllers\Clinichistory\BiopsiesController::class, 'hcpdf']);
		});
		//Cryotherapy
		Route::group([
			'prefix' => 'crypy'
		], function () {
			Route::get('/{id}', [App\Http\Controllers\Clinichistory\CrypyController::class, 'index']);
			Route::post('create/{id}', [App\Http\Controllers\Clinichistory\CrypyController::class, 'store']);
			Route::get('/', [App\Http\Controllers\Clinichistory\CrypyController::class, 'show']);
			Route::post('/search', [App\Http\Controllers\Clinichistory\CrypyController::class, 'search']);
			Route::get('/list/{id}', [App\Http\Controllers\Clinichistory\CrypyController::class, 'listrecords']);
			Route::get('/records/{id}', [App\Http\Controllers\Clinichistory\CrypyController::class, 'records']);
			Route::get('/hcpdf/{id}', [App\Http\Controllers\Clinichistory\CrypyController::class, 'hcpdf']);
		});

		//Aesthetic
		Route::group([
			'prefix' => 'aesthetic'
		], function () {
			Route::get('/{id}', [App\Http\Controllers\Clinichistory\AestheticController::class, 'index']);
			Route::post('create/{id}', [App\Http\Controllers\Clinichistory\AestheticController::class, 'store']);
			Route::get('/', [App\Http\Controllers\Clinichistory\AestheticController::class, 'show']);
			Route::post('/search', [App\Http\Controllers\Clinichistory\AestheticController::class, 'search']);
			Route::get('/list/{id}', [App\Http\Controllers\Clinichistory\AestheticController::class, 'listrecords']);
			Route::get('/records/{id}', [App\Http\Controllers\Clinichistory\AestheticController::class, 'records']);
			Route::get('/hcpdf/{id}', [App\Http\Controllers\Clinichistory\AestheticController::class, 'hcpdf']);
		});
		//Surgical
		Route::group([
			'prefix' => 'surgical'
		], function () {
			Route::get('/{id}', [App\Http\Controllers\Clinichistory\SurgicalController::class, 'index']);
			Route::post('create/{id}', [App\Http\Controllers\Clinichistory\SurgicalController::class, 'store']);
			Route::get('/', [App\Http\Controllers\Clinichistory\SurgicalController::class, 'show']);
			Route::post('/search', [App\Http\Controllers\Clinichistory\SurgicalController::class, 'search']);
			Route::get('/list/{id}', [App\Http\Controllers\Clinichistory\SurgicalController::class, 'listrecords']);
			Route::get('/records/{id}', [App\Http\Controllers\Clinichistory\SurgicalController::class, 'records']);
			Route::get('/hcpdf/{id}', [App\Http\Controllers\Clinichistory\SurgicalController::class, 'hcpdf']);
		});
		//Checklist
		Route::group([
			'prefix' => 'checklist'
		], function () {
			Route::get('/{id}', [App\Http\Controllers\Clinichistory\ChecklistController::class, 'index']);
			Route::post('create/{id}', [App\Http\Controllers\Clinichistory\ChecklistController::class, 'store']);
			Route::get('/', [App\Http\Controllers\Clinichistory\ChecklistController::class, 'show']);
			Route::post('/search', [App\Http\Controllers\Clinichistory\ChecklistController::class, 'search']);
			Route::get('/list/{id}', [App\Http\Controllers\Clinichistory\ChecklistController::class, 'listrecords']);
			Route::get('/records/{id}', [App\Http\Controllers\Clinichistory\ChecklistController::class, 'records']);
			Route::get('/hcpdf/{id}', [App\Http\Controllers\Clinichistory\ChecklistController::class, 'hcpdf']);
		});
		//Consent
		Route::group([
			'prefix' => 'consent'
		], function () {
			Route::get('/{id}', [App\Http\Controllers\Clinichistory\ConsentController::class, 'index']);
			Route::post('create/{id}', [App\Http\Controllers\Clinichistory\ConsentController::class, 'store']);
			Route::get('/', [App\Http\Controllers\Clinichistory\ConsentController::class, 'show']);
			Route::post('/search', [App\Http\Controllers\Clinichistory\ConsentController::class, 'search']);
			Route::get('/list/{id}', [App\Http\Controllers\Clinichistory\ConsentController::class, 'listrecords']);
			Route::get('/records/{id}', [App\Http\Controllers\Clinichistory\ConsentController::class, 'records']);
			Route::get('/hcpdf/{id}', [App\Http\Controllers\Clinichistory\ConsentController::class, 'hcpdf']);
		});
		//Resume
		Route::group([
			'prefix' => 'resume'
		], function () {
			Route::get('/{id}', [App\Http\Controllers\Clinichistory\ResumeController::class, 'index']);
			Route::get('/', [App\Http\Controllers\Clinichistory\ResumeController::class, 'show']);
			Route::post('/search', [App\Http\Controllers\Clinichistory\ResumeController::class, 'search']);
			Route::get('/records/{id}', [App\Http\Controllers\Clinichistory\ResumeController::class, 'records']);
		});
	});
	//----------------------------------------------------------------------------------
	//Medicalp
	Route::group([
		'prefix' => 'medicalp'
	], function () {
		Route::get('/{id}', [App\Http\Controllers\Medical\MedicalpController::class, 'index']);
		Route::post('create/{id}', [App\Http\Controllers\Medical\MedicalpController::class, 'store']);
		Route::get('/', [App\Http\Controllers\Medical\MedicalpController::class, 'show']);
		Route::post('/search', [App\Http\Controllers\Medical\MedicalpController::class, 'search']);
		Route::get('/list/{id}', [App\Http\Controllers\Medical\MedicalpController::class, 'listrecords']);
		Route::get('/records/{id}', [App\Http\Controllers\Medical\MedicalpController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Medical\MedicalpController::class, 'hcpdf']);
	});
	//Examorders
	Route::group([
		'prefix' => 'examorders'
	], function () {
		Route::get('/{id}', [App\Http\Controllers\Medical\ExamordersController::class, 'index']);
		Route::post('create/{id}', [App\Http\Controllers\Medical\ExamordersController::class, 'store']);
		Route::get('/', [App\Http\Controllers\Medical\ExamordersController::class, 'show']);
		Route::post('/search', [App\Http\Controllers\Medical\ExamordersController::class, 'search']);
		Route::get('/list/{id}', [App\Http\Controllers\Medical\ExamordersController::class, 'listrecords']);
		Route::get('/records/{id}', [App\Http\Controllers\Medical\ExamordersController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Medical\ExamordersController::class, 'hcpdf']);
	});
	//Prods
	Route::group([
		'prefix' => 'prods'
	], function () {
		Route::get('/{id}', [App\Http\Controllers\Medical\ProdsController::class, 'index']);
		Route::post('create/{id}', [App\Http\Controllers\Medical\ProdsController::class, 'store']);
		Route::get('/', [App\Http\Controllers\Medical\ProdsController::class, 'show']);
		Route::post('/search', [App\Http\Controllers\Medical\ProdsController::class, 'search']);
		Route::get('/list/{id}', [App\Http\Controllers\Medical\ProdsController::class, 'listrecords']);
		Route::get('/records/{id}', [App\Http\Controllers\Medical\ProdsController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Medical\ProdsController::class, 'hcpdf']);
	});
	//Pths
	Route::group([
		'prefix' => 'pths'
	], function () {
		Route::get('/{id}', [App\Http\Controllers\Medical\PthsController::class, 'index']);
		Route::post('create/{id}', [App\Http\Controllers\Medical\PthsController::class, 'store']);
		Route::get('/', [App\Http\Controllers\Medical\PthsController::class, 'show']);
		Route::post('/search', [App\Http\Controllers\Medical\PthsController::class, 'search']);
		Route::get('/list/{id}', [App\Http\Controllers\Medical\PthsController::class, 'listrecords']);
		Route::get('/records/{id}', [App\Http\Controllers\Medical\PthsController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Medical\PthsController::class, 'hcpdf']);
	});

	//Quotes
	Route::group([
		'prefix' => 'quotes'
	], function () {
		Route::get('/{id}', [App\Http\Controllers\Medical\QuotesController::class, 'index']);
		Route::post('create/{id}', [App\Http\Controllers\Medical\QuotesController::class, 'store']);
		Route::get('edit/{id}', [App\Http\Controllers\Medical\QuotesController::class, 'edit']);
		Route::post('edit/{id}', [App\Http\Controllers\Medical\QuotesController::class, 'update']);
		Route::post('delprods/{id}', [App\Http\Controllers\Medical\QuotesController::class, 'delprods']);
		Route::post('delservs/{id}', [App\Http\Controllers\Medical\QuotesController::class, 'delservs']);
		Route::get('/', [App\Http\Controllers\Medical\QuotesController::class, 'show']);
		Route::post('/search', [App\Http\Controllers\Medical\QuotesController::class, 'search']);
		Route::get('/list/{id}', [App\Http\Controllers\Medical\QuotesController::class, 'listrecords']);
		Route::get('/records/{id}', [App\Http\Controllers\Medical\QuotesController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Medical\QuotesController::class, 'hcpdf']);
		Route::post('/getitem', [App\Http\Controllers\Medical\QuotesController::class, 'getitem']);
	});

	//Citas de doctores
	Route::group([
		'prefix' => 'dcitas'
	], function () {
		Route::get('/', [App\Http\Controllers\Medical\DcitasController::class, 'index']);
		Route::post('/{id}', [App\Http\Controllers\Medical\DcitasController::class, 'show']);
		Route::get('/resend/{id}', [App\Http\Controllers\Medical\DcitasController::class, 'resend']);
	});

	//Invoices
	Route::group([
		'prefix' => 'invoices'
	], function () {
		Route::get('/', [App\Http\Controllers\Medical\InvoicesController::class, 'index']);
		Route::get('/facend/{id}', [App\Http\Controllers\Medical\InvoicesController::class, 'facend']);
		Route::get('/facpdf/{id}', [App\Http\Controllers\Medical\InvoicesController::class, 'facpdf']);
	});

	//PACIENTE

	//Bills
	Route::group([
		'prefix' => 'bills'
	], function () {
		Route::get('/', [App\Http\Controllers\Medical\BillsController::class, 'index']);
		Route::get('/facpdf/{id}', [App\Http\Controllers\Medical\BillsController::class, 'facpdf']);
	});

	//Citas de pacientes
	Route::group([
		'prefix' => 'citas'
	], function () {
		Route::get('/', [App\Http\Controllers\PcitasController::class, 'index']);
		Route::post('/{id}', [App\Http\Controllers\PcitasController::class, 'show']);
	});

	//Consultas
	Route::group([
		'prefix' => 'consultas'
	], function () {
		Route::get('/', [App\Http\Controllers\Patients\ConsultasController::class, 'index']);
		Route::get('/records', [App\Http\Controllers\Patients\ConsultasController::class, 'records']);
	});

	//Esteticos
	Route::group([
		'prefix' => 'esteticos'
	], function () {
		Route::get('/', [App\Http\Controllers\Patients\EsteticosController::class, 'index']);
		Route::get('/records', [App\Http\Controllers\Patients\EsteticosController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Patients\EsteticosController::class, 'hcpdf']);
	});

	//Biopsias
	Route::group([
		'prefix' => 'biopsias'
	], function () {
		Route::get('/', [App\Http\Controllers\Patients\BiopsiasController::class, 'index']);
		Route::get('/records', [App\Http\Controllers\Patients\BiopsiasController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Patients\BiopsiasController::class, 'hcpdf']);
	});

	//Crioterapia
	Route::group([
		'prefix' => 'crioterapia'
	], function () {
		Route::get('/', [App\Http\Controllers\Patients\CrioterapiaController::class, 'index']);
		Route::get('/records', [App\Http\Controllers\Patients\CrioterapiaController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Patients\CrioterapiaController::class, 'hcpdf']);
	});

	//Quirurgica
	Route::group([
		'prefix' => 'quirurgica'
	], function () {
		Route::get('/', [App\Http\Controllers\Patients\QuirurgicaController::class, 'index']);
		Route::get('/records', [App\Http\Controllers\Patients\QuirurgicaController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Patients\QuirurgicaController::class, 'hcpdf']);
	});

	//Album
	Route::group([
		'prefix' => 'album'
	], function () {
		Route::get('/', [App\Http\Controllers\Patients\AlbumController::class, 'index']);
		Route::get('/dwpdf', [App\Http\Controllers\Patients\AlbumController::class, 'hcpdf']);
	});

	//Prescripciones
	Route::group([
		'prefix' => 'prescripciones'
	], function () {
		Route::get('/', [App\Http\Controllers\Patients\PrescripcionesController::class, 'index']);
		Route::get('/records', [App\Http\Controllers\Patients\PrescripcionesController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Patients\PrescripcionesController::class, 'hcpdf']);
	});

	//Examenes
	Route::group([
		'prefix' => 'examenes'
	], function () {
		Route::get('/', [App\Http\Controllers\Patients\ExamenesController::class, 'index']);
		Route::get('/records', [App\Http\Controllers\Patients\ExamenesController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Patients\ExamenesController::class, 'hcpdf']);
	});

	//Procedimientos
	Route::group([
		'prefix' => 'procedimientos'
	], function () {
		Route::get('/', [App\Http\Controllers\Patients\ProcedimientosController::class, 'index']);
		Route::get('/records', [App\Http\Controllers\Patients\ProcedimientosController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Patients\ProcedimientosController::class, 'hcpdf']);
	});

	//Patalogias
	Route::group([
		'prefix' => 'patalogias'
	], function () {
		Route::get('/', [App\Http\Controllers\Patients\PatalogiasController::class, 'index']);
		Route::get('/records', [App\Http\Controllers\Patients\PatalogiasController::class, 'records']);
		Route::get('/hcpdf/{id}', [App\Http\Controllers\Patients\PatalogiasController::class, 'hcpdf']);
	});


	//MEDICO
	Route::get('miagenda', [App\Http\Controllers\MiagendaController::class, 'index']);
	//----------------------------------------------------------------------------------
	//----------------------------------------------------------------------------------
	//----------------------------------------------------------------------------------
});

Route::get('payext/{id}', [App\Http\Controllers\HomeController::class, 'payext'])->name('payext');
Route::get('payres', [App\Http\Controllers\HomeController::class, 'payres'])->name('payres');
Route::post('paycon', [App\Http\Controllers\HomeController::class, 'paycon'])->name('paycon');
Route::get('payplan', [App\Http\Controllers\HomeController::class, 'payplan'])->name('payplan');
Route::post('payajax', [App\Http\Controllers\HomeController::class, 'payajax'])->name('payajax');

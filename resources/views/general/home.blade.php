@extends('layouts.app')

@section('content')
<!--Lifestyle Dashboard V3-->
<div class="lifestyle-dashboard lifestyle-dashboard-v3">
    <div class="illustration-header">
        <div class="header-image">
            <img src="<?= asset('assets/img/illustrations/dashboards/lifestyle/doctor.svg') ?>" alt="">
        </div>
        <div class="header-meta">
            <h3>Resumen del día</h3>
            <p>Monitoriza tu actividad y sigue mejorando tus puntos débiles.</p>
            <div class="summary-stats is-hidden">
                <div class="summary-stat">
                    <span>900 kcal</span>
                    <span>Burnt today</span>
                </div>
                <div class="summary-stat">
                    <span>2300 kcal</span>
                    <span>Eaten today</span>
                </div>
                <div class="summary-stat">
                    <span>10,864</span>
                    <span>Steps walked</span>
                </div>
                <div class="summary-stat">
                    <span>2% fat</span>
                    <span>Burnt today</span>
                </div>
                <div class="summary-stat h-hidden-tablet-p">
                    <span>8.4 km</span>
                    <span>distance today</span>
                </div>
            </div>
        </div>
    </div>

    <div class="columns is-multiline is-flex-tablet-p is-hidden">

        <!--Tile-->
        <div class="column is-3">
            <div class="health-tile">
                <div class="tile-head">
                    <div class="h-icon is-primary">
                        <i aria-hidden="true" class="fas fa-tint"></i>
                    </div>
                    <h4>
                        <span class="dark-inverted">114/90</span>
                        <span>Min/Max</span>
                    </h4>
                </div>
                <h3 class="dark-inverted">Blood</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Illis videtur.</p>
            </div>
        </div>

        <!--Tile-->
        <div class="column is-3">
            <div class="health-tile">
                <div class="tile-head">
                    <div class="h-icon is-primary">
                        <i aria-hidden="true" class="fas fa-heart"></i>
                    </div>
                    <h4>
                        <span class="dark-inverted">112</span>
                        <span>Bpm</span>
                    </h4>
                </div>
                <h3 class="dark-inverted">Heart Rate</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Illis videtur.</p>
            </div>
        </div>

        <!--Tile-->
        <div class="column is-3">
            <div class="health-tile">
                <div class="tile-head">
                    <div class="h-icon is-primary">
                        <i aria-hidden="true" class="fas fa-pump-medical"></i>
                    </div>
                    <h4>
                        <span class="dark-inverted">12/14</span>
                        <span>units</span>
                    </h4>
                </div>
                <h3 class="dark-inverted">Blood Pressure</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Illis videtur.</p>
            </div>
        </div>

        <!--Tile-->
        <div class="column is-3">
            <div class="health-tile">
                <div class="tile-head">
                    <div class="h-icon is-primary">
                        <i aria-hidden="true" class="fas fa-weight"></i>
                    </div>
                    <h4>
                        <span class="dark-inverted">60.4</span>
                        <span>lbs</span>
                    </h4>
                </div>
                <h3 class="dark-inverted">Weight</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Illis videtur.</p>
            </div>
        </div>

    </div>


</div>
<?php if(Auth::user()->role == 2){ ?>
<!--Profile Settings-->
<div class="profile-wrapper mt-6">
    <div class="profile-body">
        <div class="settings-section">
            <a href="<?= url('admon/headquarters') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/sedes.svg') ?>" alt="">
                </div>
                <span>Sedes</span>
                <h3>Gestión de sedes</h3>
            </a>
            <a href="<?= url('admon/users') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/users.svg') ?>" alt="">
                </div>
                <span>Usuarios</span>
                <h3>Gestión de usuarios</h3>
            </a>
            <a href="<?= url('patients') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/patients.svg') ?>" alt="">
                </div>
                <span>Pacientes</span>
                <h3>Gestión de pacientes</h3>
            </a>
            <a href="<?= url('admon/diary') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/teleconsultas.svg') ?>" alt="">
                </div>
                <span>Consultas</span>
                <h3>Teleconsultas</h3>
            </a>
            <a href="<?= url('clinichistory') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/clinichistory.svg') ?>" alt="">
                </div>
                <span>Historias</span>
                <h3>Historias clínicas</h3>
            </a>
            <a href="<?= url('admon/diary') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/diary.svg') ?>" alt="">
                </div>
                <span>Agenda</span>
                <h3>Programación agenda médica</h3>
            </a>
            <a href="<?= url('planes') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/planes.svg') ?>" alt="">
                </div>
                <span>Planes</span>
                <h3>y suscripciones</h3>
            </a>
            <a href="<?= url('trainings') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/trainings.svg') ?>" alt="">
                </div>
                <span>Mis</span>
                <h3>capacitaciones</h3>
            </a>
            <a href="<?= url('support') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/support.svg') ?>" alt="">
                </div>
                <span>Gestión</span>
                <h3>de soporte</h3>
            </a>
            <a href="<?= url('admon/settings') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/settings.svg') ?>" alt="">
                </div>
                <span>Preferencias</span>
                <h3>Configuraciones</h3>
            </a>
        </div>
    </div>
</div>
<?php } ?>


<?php if(Auth::user()->role == 3){ ?>
<!--Profile Settings-->
<div class="profile-wrapper mt-6">
    <div class="profile-body">
        <div class="settings-section">
            <a href="<?= url('patients') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/patients.svg') ?>" alt="">
                </div>
                <span>Pacientes</span>
                <h3>Gestión de pacientes</h3>
            </a>
            <!--<a href="<?= url('admon/diary') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/teleconsultas.svg') ?>" alt="">
                </div>
                <span>Consultas</span>
                <h3>Teleconsultas</h3>
            </a>-->
            <a href="<?= url('clinichistory') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/clinichistory.svg') ?>" alt="">
                </div>
                <span>Historias</span>
                <h3>Historias clínicas</h3>
            </a>
            <a href="<?= url('miagenda') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/diary.svg') ?>" alt="">
                </div>
                <span>Mi</span>
                <h3>programación</h3>
            </a>
            <a href="<?= url('trainings') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/trainings.svg') ?>" alt="">
                </div>
                <span>Mis</span>
                <h3>capacitaciones</h3>
            </a>
            <a href="<?= url('support') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/support.svg') ?>" alt="">
                </div>
                <span>Gestión</span>
                <h3>de soporte</h3>
            </a>
        </div>
    </div>
</div>
<?php } ?>

<?php if(Auth::user()->role == 5){ ?>
<!--Profile Settings-->
<div class="profile-wrapper mt-6">
    <div class="profile-body">
        <div class="settings-section">
            <a href="<?= url('consultas') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <i class="lnil lnil-lock-alt-1"></i>
                </div>
                <span>Historial de</span>
                <h3>Consultas</h3>
            </a>
			<a href="<?= url('album') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <i class="lnil lnil-briefcase-alt"></i>
                </div>
                <span>Album</span>
                <h3>Fotografico</h3>
            </a>
			<a href="<?= url('prescripciones') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <i class="lnil lnil-file-name"></i>
                </div>
                <span>Historial de</span>
                <h3>Prescripciones</h3>
            </a>
			<a href="<?= url('examenes') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <i class="lnil lnil-file-name"></i>
                </div>
                <span>Historial de</span>
                <h3>Examenes</h3>
            </a>
			<a href="<?= url('procedimientos') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <i class="lnil lnil-file-name"></i>
                </div>
                <span>Historial de</span>
                <h3>procedimientos</h3>
            </a>
			<a href="<?= url('patalogias') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <i class="lnil lnil-file-name"></i>
                </div>
                <span>Historial de</span>
                <h3>patologías</h3>
            </a>
			<a href="<?= url('citas') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <i class="lnil lnil-file-upload"></i>
                </div>
                <span>Agenda</span>
                <h3>Gestión de citas</h3>
            </a>
			<a href="<?= url('trainings') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/d/trainings.svg') ?>" alt="">
                </div>
                <span>Mis</span>
                <h3>capacitaciones</h3>
            </a>
			<a href="<?= url('bills') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <i class="lnil lnil-dollar-card"></i>
                </div>
                <span>Historial</span>
                <h3>de Facturas</h3>
            </a>
        </div>
    </div>
</div>
<?php } ?>
@endsection

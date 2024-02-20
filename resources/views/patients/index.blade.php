@extends('layouts.app')

@section('content')
<!--Profile Settings-->
<div class="profile-wrapper mt-6">
    <div class="profile-body">
        <div class="settings-section">
            <a href="<?= url('patients/create') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/p/patients.jpg') ?>" alt="">
                </div>
                <span>Agregar</span>
                <h3>paciente</h3>
            </a>
            <a href="<?= url('patients/records') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/p/records.png') ?>" alt="">
                </div>
                <span>Historial</span>
                <h3>de pacientes</h3>
            </a>
            <a href="<?= url('patients/search_vitalsigns') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/p/vitalsigns.jpg') ?>" alt="">
                </div>
                <span>Registrar</span>
                <h3>signos vitales</h3>
            </a>
            <a href="<?= url('patients/search_gallery') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/p/gallery.jpg') ?>" alt="">
                </div>
                <span>Registros</span>
                <h3>fotográficos</h3>
            </a>
        </div>
    </div>
</div>
@endsection

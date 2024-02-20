@extends('layouts.app')

@section('content')
<!--Profile Settings-->
<div class="profile-wrapper mt-6">
    <div class="profile-body">
        <div class="settings-section">
            <a href="<?= url($menu.'/dermatology') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/h/dermatology.jpg') ?>" alt="">
                </div>
                <span>Dermatología</span>
                <h3>General</h3>
            </a>
            <a href="<?= url($menu.'/biopsies') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/h/biopsies.jpg') ?>" alt="">
                </div>
                <span>Biopsias</span>
                <h3>y/o procedimientos</h3>
            </a>
            <a href="<?= url($menu.'/crypy') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/h/crypy.jpg') ?>" alt="">
                </div>
                <span>Consultas</span>
                <h3>Crioterapias</h3>
            </a>
            <a href="<?= url($menu.'/aesthetic') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/h/aesthetic.jpg') ?>" alt="">
                </div>
                <span>Procedimientos</span>
                <h3>Estéticos</h3>
            </a>
            <a href="<?= url($menu.'/surgical') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/h/surgical.jpg') ?>" alt="">
                </div>
                <span>Descripción</span>
                <h3>Quirúrgica</h3>
            </a>
            <a href="<?= url($menu.'/checklist') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/h/checklist.jpg') ?>" alt="">
                </div>
                <span>Check list</span>
                <h3>Seguridad del paciente</h3>
            </a>
            <a href="<?= url($menu.'/consent') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/h/consent.jpg') ?>" alt="">
                </div>
                <span>Consentimiento</span>
                <h3>Informado</h3>
            </a>
            <a href="<?= url($menu.'/resume') ?>" class="settings-box">
                <div class="edit-icon">
                    <i class="lnil lnil-pencil"></i>
                </div>
                <div class="icon-wrap">
                    <img src="<?= asset('assets/img/landing/h/resume.jpg') ?>" alt="">
                </div>
                <span>Resumen</span>
                <h3>Historia clínica</h3>
            </a>
        </div>
    </div>
</div>
@endsection

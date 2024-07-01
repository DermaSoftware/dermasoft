@extends('layouts.app')
@section('content')
    <div class="account-wrapper">
        <div class="columns">
            <div class="column is-12">
                <form action="{{ url($menu . '/dermatology/' . $o->uuid . '/' .$appointment) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="account-box is-form is-footerless" data-hc_type="{{ $hc_type }}" id="account-box">
                        <div class="form-head stuck-header">
                            <div class="form-head-inner">
                                <div class="left">
                                    <h3>HC. No. <?= $o->document_number ?></h3>
                                    <h3>Consulta de {{$hc_type}}</h3>
                                </div>
                                <div class="right">
                                    <div class="buttons">

                                        <?php if($is_records){ ?>
                                        <a href="<?= url($menu . '/hcdermpdf/' . $appoint->uuid) ?>"
                                            class="button h-button is-primary is-dark-outlined">
                                            Resumen de consulta
                                        </a>
                                        <a href="<?= url($menu . '/listrecords/' . $o->uuid) ?>"
                                            class="button h-button is-primary is-dark-outlined">
                                            <span class="icon"><i
                                                    class="fas fa-briefcase-medical"></i></span><span>Consultas <span
                                                    class="tag is-rounded"
                                                    style="height: 2em !important;"><?= $t_records ?></span> Ver
                                                Historial</span>
                                        </a>
                                        <?php } ?>
                                        <a href="{{ url($menu . '/dermatology') }}"
                                            class="button h-button is-light is-dark-outlined">
                                            <span class="icon"><i
                                                    class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-body">

                            @if ($errors->any())
                                <div class="message is-danger">
                                    <a class="delete"></a>
                                    <div class="message-body">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="tabs-wrapper">
                                <div class="tabs-inner">
                                    <div class="tabs">
                                        <ul>
                                            <li data-tab="dermatology_tab" class="is-active"><a>Información general</a></li>

                                            @if ($hc_type === 'Dermatología general')
                                                <li id="anamnesis_tab" data-tab="anam_tab"><a>Anamnesis</a></li>
                                                @else
                                                    @if ($hc_type == 'Dermatología general Control')
                                                    <li id="anamnesis_tab" data-tab="anam_tab"><a>Anamnesis Conrtol</a></li>
                                                    @endif
                                            @endif
                                            <li id="antecedentes" data-tab="history_tab"><a>Antecedentes</a></li>
                                            <li id="diag_tab" data-tab="diagnostics_tab"><a>Diagnósticos</a></li>
                                            @if ($hc_type === 'Biopsías y/o procedimientos')
                                                <li id="biop_tab" data-tab="biopsies_tab"><a>Procedimientos</a></li>
                                            @endif
                                            @if ($hc_type === 'Crioterapia')
                                                <li id="crypy_tab" data-tab="crio_tab"><a>Procedimientos</a></li>
                                            @endif
                                            @if ($hc_type === 'Procedimientos Estéticos')
                                                <li id="aest_tab" data-tab="aesthtic_tab"><a>Procedimientos</a></li>
                                            @endif

                                            @if ($hc_type === 'Descripción Quirúrgica')
                                                <li id="surgical_tab" data-tab="surg_tab"><a>Procedimientos</a></li>
                                            @endif
                                            <li id="indic_tab" data-tab="indications_tab"><a>Indicaciones/Solicitudes</a></li>

                                        </ul>
                                        @isset($checklist)
                                            <a href="<?= url($menu . '/checklist/hcpdf/' . $checklist->uuid) ?>"
                                                class="button h-button is-primary is-dark-outlined mb-2">
                                                <span class="icon"><i class="fa-solid fa-prescription-bottle-medical"></i></span>
                                                CheckList
                                            </a>
                                        @endisset
                                        @empty($checklist)
                                            <a href="<?= url($menu . '/checklist/' . $o->uuid . '/' . $appoint->id) ?>"
                                                class="button h-button is-primary is-dark-outlined mb-2">
                                                CheckList
                                            </a>
                                        @endempty
                                        @isset($lastConsents)
                                            <a href="<?= url($menu . '/consent/hcpdf/' . $lastConsents->uuid) ?>"
                                                class="button h-button is-primary is-dark-outlined ml-2">
                                                <span class="icon"><i class="fa-solid fa-prescription-bottle-medical"></i></span>
                                                Consentimiento
                                            </a>
                                        @endisset
                                        @empty($lastConsents)
                                            <a href="<?= url($menu . '/consent/' . $o->uuid . '/' . $appoint->id) ?>"
                                                class="button h-button is-primary is-dark-outlined ml-2">
                                                Consentimiento
                                            </a>
                                        @endempty
                                    </div>
                                </div>
                                <div id="dermatology_tab" class="tab-content is-active">
                                    @include($v_name . '.form.form_dermatology', ['modo' => 'create'])
                                </div>
                                @if ($hc_type == 'Dermatología general' || $hc_type == 'Dermatología general Control')
                                    <div id="anam_tab" class="tab-content">
                                        @include($v_name . '.tab_anamnesis', ['modo' => 'create'])
                                    </div>
                                @endif
                                <div id="history_tab" class="tab-content">
                                    @include($v_name . '.form_backgrounds', ['modo' => 'create'])
                                </div>
                                <div id="diagnostics_tab" class="tab-content">
                                    {{-- @include($v_name . '.form.form_diagnostics', ['modo' => 'create']) --}}
                                    @include($v_name . '.tab_diagnostics', ['modo' => 'create'])
                                </div>
                                @if ($hc_type == 'Biopsías y/o procedimientos')
                                    <div id="biopsies_tab" class="tab-content">
                                        @include($v_name . '.tab_biopsies', ['modo' => 'create'])
                                        {{-- @include($v_name . '.form.form_indications', ['modo' => 'create']) --}}
                                    </div>
                                @endif
                                @if ($hc_type === 'Crioterapia')
                                    <div id="crio_tab" class="tab-content">
                                        @include($v_name . '.tab_crypy', ['modo' => 'create'])
                                        {{-- @include($v_name . '.form.form_indications', ['modo' => 'create']) --}}
                                    </div>
                                @endif
                                @if ($hc_type === 'Procedimientos Estéticos')
                                    <div id="aesthtic_tab" class="tab-content">
                                        @include($v_name . '.tab_aesthetic', ['modo' => 'create'])
                                        {{-- @include($v_name . '.form.form_indications', ['modo' => 'create']) --}}
                                    </div>
                                @endif
                                @if ($hc_type === 'Descripción Quirúrgica')
                                    <div id="surg_tab" class="tab-content">
                                        @include($v_name . '.tab_surgical', ['modo' => 'create'])
                                        {{-- @include($v_name . '.form.form_indications', ['modo' => 'create']) --}}
                                    </div>
                                @endif
                                <div id="indications_tab" class="tab-content">
                                    @include($v_name . '.tab_indications', ['modo' => 'create'])
                                    {{-- @include($v_name . '.form.form_indications', ['modo' => 'create']) --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="derma_modal" class="modal">
        <div class="modal-background  h-modal-close"></div>
        <div class="modal-card" style="width: 900px; !important"></div>
    </div>
@endsection
@section('js')
    @parent
    <script>
        var derma_id = <?= $o_derm->id; ?>;
        var hc_type = document.getElementById('account-box').getAttribute('data-hc_type');
        var appointment = <?= $appointment; ?>;
    </script>
    <script src="{{ asset('assets/js/dermatology/background.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/diagnostic.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/indication.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/biopsie.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/crypy.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/aesthetic.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/surgical.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/appointments_reason.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/anamnesis.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/prescription_request.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/exam_request.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/procedure_request.js') }}"></script>
    <script src="{{ asset('assets/js/dermatology/patology_request.js') }}"></script>
@endsection

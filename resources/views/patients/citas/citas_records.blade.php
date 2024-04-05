@extends('layouts.app')
@section('content')
    <div class="columns">
        <div class="column is-12">
            <!--Flex Table-->
            <div class="demo-card has-more-margin">
                <div class="demo-title">
                    <div class="form-head stuck-header">
                        <div class="form-head-inner">
                            <div class="left">
                                <h3 class="title is-thin is-5">Citas del paciente
                                    <?= $user->name . ' ' . $user->lastname ?></h3>
                            </div>
                            <div class="right">
                                <div class="buttons">
                                    <a href="{{ url($menu) }}" class="button h-button is-light is-dark-outlined">
                                        <span class="icon"><i
                                                class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-table">
                <!--Table header-->
                <div class="flex-table-header">
                    <span>Médico</span>
                    <span>Modalidad</span>
                    <span>Sede</span>
                    <span>Fecha</span>
                    <span>Hora</span>
                    <span class="cell-end">Accción</span>
                </div>
                @foreach ($appointments as $item)
                    <div class="flex-table-item">
                        <div class="flex-table-cell" data-th="hc_type">
                            <span class="light-text">{{ $item->doctor_class->name }}</span>
                        </div>
                        <div class="flex-table-cell" data-th="created_at">
                            <span class="light-text">{{ $item->modality }}</span>
                        </div>
                        <div class="flex-table-cell" data-th="created_at">
                            <span class="light-text">
                                @if ($item->campus > 0)
                                    {{ $item->campus_class->name }}
                                @endif

                        </div>
                        <div class="flex-table-cell" data-th="created_at">
                            <span class="light-text">{{ $item->date_quote }}</span>
                        </div>
                        <div class="flex-table-cell" data-th="created_at">
                            <span class="light-text">{{ $item->time_quote }}</span>
                        </div>
                        <div class="flex-table-cell cell-end" data-th="Actions">
                            <div class="dropdown is-spaced is-dots is-right dropdown-trigger is-pushed-mobile is-up">
                                <div class="is-trigger" aria-haspopup="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="<?= url($menu . '/appointments/' . $item->uuid . '/edit') ?>"
                                            class="dropdown-item is-media">
                                            <div class="icon">
                                                <i class="lnil lnil-pencil"></i>
                                            </div>
                                            <div class="meta">
                                                <span>Editar</span>
                                                <span>Editar Cita</span>
                                            </div>
                                        </a>
                                        <a href="<?= url($menu . '/vitalsigns/' . $user->uuid . '/' . $item->uuid) ?>"
                                            class="dropdown-item is-media">
                                            <div class="icon">
                                                <i class="lnil lnil-hospital-sign"></i>
                                            </div>
                                            <div class="meta">
                                                <span>Registrar</span>
                                                <span>Signos vitales</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--Table Pagination-->
        </div>
    </div>
@endsection

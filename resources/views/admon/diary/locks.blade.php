@extends('layouts.app')
@section('content')
    <div class="columns">
        <div class="column is-12">
            <!--Flex Table-->
            <div class="demo-card no-margin-bottom">
                <div class="card-head">
                    <div class="left">
                        <h3 class="title is-thin is-5"><?= $title ?> (<?= $o->name ?> - <?= $o->email ?>)</h3>
                    </div>
                    <div class="right">
                        {{-- <div class="buttons"> --}}
                            <a href="{{url($menu)}}" class="button h-button is-light is-rounded is-elevated m-r-10">
                                <span class="icon"><i class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                            </a>
                        {{-- </div> --}}
                        <a href="<?= url($menu . '/' . $o->uuid) ?>"
                            class="button h-button is-success is-rounded is-elevated m-r-10"><span class="icon"><i
                                    class="fas fa-plus"></i></span> <span>Crear bloqueo</span></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('trash')
    <div class="s-card">
        <table class="o_stable_fsc table display compact is-fullwidth" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                    <th>Hora de inicio</th>
                    <th>Hora de fin</th>
                    <th>Motivo</th>
                    <th>Nota</th>
                    <th class="is-end no-sort"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($o_all as $key => $row){ ?>
                <tr id="<?= $row->uuid ?>">
                    <td><?= $key + 1 ?></td>
                    <td><?= $row->date_init ?></td>
                    <td><?= $row->date_end ?></td>
                    <td><?= $row->time_init ?></td>
                    <td><?= $row->time_end ?></td>
                    <td><?= $row->reason ?></td>
                    <td><?= $row->note ?></td>
                    <td class="is-end">
                        <div>
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
                                        <a href="<?= url($menu . '/' . $row->uuid . '/update_lock') ?>"
                                            class="dropdown-item is-media">
                                            <div class="icon">
                                                <i class="lnil lnil-pencil"></i>
                                            </div>
                                            <div class="meta">
                                                <span>Editar</span>
                                                <span>Editar Bloqueo</span>
                                            </div>
                                        </a>
                                        @can('delete', $row)
                                            <a id="<?= $row->uuid ?>" href="javascript:void(0)"
                                                data-href="<?= url($menu . '/' . $row->uuid) ?>" data-itemtag="El"
                                                data-itemselect="o" data-nameitem="bloqueo de agenda"
                                                class="dropdown-item is-media bg-danger text-fade-grey btn-delete-confirm-x">
                                                <div class="icon">
                                                    <i class="lnil lnil-trash-can-alt"></i>
                                                </div>
                                                <div class="meta">
                                                    <span>Eliminar</span>
                                                    <span>Eliminar Bloqueo</span>
                                                </div>
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
@endsection

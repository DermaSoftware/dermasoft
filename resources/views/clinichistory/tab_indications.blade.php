<!--Field-->
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Indicaciones</p>
                <a id="add_indic" href="<?= url($menu . '/indications/' . $o_derm->id . '/' . $appointment . '/add') ?>"
                    data-toggle="modal" data-modal="derma_modal" class="h-modal-trigger btn card-header-icon ">
                    <span class="fas fa-plus mr-2"></span>Adicionar
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <table id="indications_table" class="table is-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>UUID</th>
                                <th>Descripción</th>
                                <th>Consulta</th>
                                <th>Tipo de consulta</th>
                                <th>Creado</th>
                                {{-- <th>Actualizado</th> --}}
                                {{-- <th class="is-end">Acciones</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="column is-12 mt-5">
            <h4 class="panel-heading">Solicitudes</h4>
        </div>
        <div class="column is-12">
            <div class="tabs-wrapper">
                <div class="tabs-inner">
                    <div class="tabs">
                        <ul>
                            <li id="prescriptions_btn" data-tab="prescriptions_tab">
                                <a>Prescripciones</a></li>
                            <li id="examns_request_btn" data-tab="examns_request_tab"><a>Solisitud de
                                    exámenes</a></li>
                            <li id="procedure_request_btn" data-tab="procedure_request_tab">
                                <a>Solisitud de procedimientos</a></li>
                            <li id="pathologies_request_btn" data-tab="pathologies_request_tab">
                                <a>Solisitud de patoloías</a></li>

                        </ul>
                    </div>
                </div>
                <div id="prescriptions_tab" class="tab-content is-active">
                    <div class="card mt-5">
                        <header class="card-header">
                            <p class="card-header-title">Solicitudes de Prescripciones</p>
                            <a id="add_medical_prescription"
                                href="<?= url($menu . '/medical_prescription/' . $o_derm->id . '/' . $appointment . '/add') ?>"
                                data-toggle="modal" data-modal="derma_modal"
                                class="h-modal-trigger btn card-header-icon ">
                                <span class="fas fa-plus mr-2"></span>Adicionar
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <table id="medical_prescriptions_table" class="table is-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UUID</th>
                                            <th>Doctor</th>
                                            <th>Consulta</th>
                                            <th>Medicinas</th>
                                            <th>Tiempo de Validez</th>
                                            <th>Creado</th>
                                            {{-- <th>Actualizado</th> --}}
                                            <th class="is-end">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="examns_request_tab" class="tab-content">
                    <div class="card mt-5">
                        <header class="card-header">
                            <p class="card-header-title">Solicitudes de exámenes</p>
                            <a id="add_exam_request"
                                href="<?= url($menu . '/exam_request/' . $o_derm->id . '/' . $appointment . '/add') ?>"
                                data-toggle="modal" data-modal="derma_modal"
                                class="h-modal-trigger btn card-header-icon ">
                                <span class="fas fa-plus mr-2"></span>Adicionar
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                {{-- Request exams --}}
                                <table id="exams_request_table" class="table is-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UUID</th>
                                            <th>Doctor</th>
                                            <th>Exámen</th>
                                            <th>Total</th>
                                            <th>Creado</th>
                                            {{-- <th>Actualizado</th> --}}
                                            <th class="is-end">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="procedure_request_tab" class="tab-content">
                    <div class="card mt-5">
                        <header class="card-header">
                            <p class="card-header-title">Solicitudes de procedimiento</p>
                            <a id="add_procedure_request"
                                href="<?= url($menu . '/procedure_request/' . $o_derm->id . '/' . $appointment . '/add') ?>"
                                data-toggle="modal" data-modal="derma_modal"
                                class="h-modal-trigger btn card-header-icon ">
                                <span class="fas fa-plus mr-2"></span>Adicionar
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">

                                {{-- Precedure request --}}
                                <table id="procedures_request_table" class="table is-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UUID</th>
                                            <th>Doctor</th>
                                            <th>Consulta</th>
                                            <th>Procedimientos</th>
                                            <th>Creado</th>
                                            {{-- <th>Actualizado</th> --}}
                                            <th class="is-end">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pathologies_request_tab" class="tab-content">
                    <div class="card mt-5">
                        <header class="card-header">
                            <p class="card-header-title">Solicitudes de patologías</p>
                            <a id="add_patology_request"
                                href="<?= url($menu . '/patology_request/' . $o_derm->id . '/' . $appointment . '/add') ?>"
                                data-toggle="modal" data-modal="derma_modal"
                                class="h-modal-trigger btn card-header-icon ">
                                <span class="fas fa-plus mr-2"></span>Adicionar
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                {{-- Pathologies request --}}
                                <table id="pathologies_request_table" class="table is-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UUID</th>
                                            <th>Doctor</th>
                                            <th>Patholgies</th>
                                            <th>Observaciones</th>
                                            <th>Creado</th>
                                            {{-- <th>Actualizado</th> --}}
                                            <th class="is-end">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="width: 100%;text-align: right;padding: 10px;">
            <a href="javascript:void(0)" class="button h-button is-success is-dark-outlined btn_next_tab_fsc"
                data-idtab="diagnostics_tab"><span class="icon"><i
                        class="lnir lnir-arrow-right rem-100"></i></span>
                <span>Siguiente</span></a>
        </div>
    </div>
</div>

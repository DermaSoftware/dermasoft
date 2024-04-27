<!--Field-->
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Registro</p>
                <a id="add_anamnesis" href="<?= url($menu . '/anamnesis/' . $o_derm->id .'/'.$appointment. '/add') ?>"
                    data-toggle="modal" data-modal="derma_modal" class="h-modal-trigger btn card-header-icon">
                    <span class="fas fa-plus mr-2"></span>Adicionar
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <table id="anamnesis_table" class="table is-striped" style="width:100%">
                        <thead>
                            <tr>
                                {{-- <th>#</th>
                                <th>UUID</th>
                                <th>Motivo</th>
                                <th>Enfermedad actual</th>
                                <th>Examen físico</th>
                                <th>Antecedentes médicos</th>
                                <th>Antecedentes quirúrgicos</th>
                                <th>Antecedentes alérgicos</th>
                                <th>Antecedentes farmacológicos</th>
                                <th>Revisión sistema</th> --}}
                                <th>Histórico</th>
                                {{-- <th>Creado</th> --}}
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
        <div style="width: 100%;text-align: right;padding: 10px;">
            <a href="javascript:void(0)" class="button h-button is-success is-dark-outlined btn_next_tab_fsc"
                data-idtab="history_tab"><span class="icon"><i class="lnir lnir-arrow-right rem-100"></i></span>
                <span>Siguiente</span></a>
        </div>
    </div>
</div>

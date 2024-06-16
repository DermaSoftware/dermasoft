<!--Field-->
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Procedimientos</p>
                @isset($checklist)
                <a id="add_biop" href="<?= url($menu . '/biopsies/' . $o_derm->id .'/'.$appointment. '/add') ?>"
                    data-toggle="modal" data-modal="derma_modal" class="h-modal-trigger btn card-header-icon">
                    <span class="fas fa-plus mr-2"></span>Adicionar
                </a>
                @endisset
                @empty($checklist)
                   <p style="color: orange">Nota: para pdoer agregar un procedimeinto debe de haber un checklist y un consentimiento informado</p>
                @endempty
            </header>
            <div class="card-content">
                <div class="content">
                    <table id="biopsie_table" class="table is-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>UUID</th>
                                <th>Consulta</th>
                                <th>Comenatrios</th>
                                <th>Creado</th>
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
                data-idtab="indications_tab"><span class="icon"><i class="lnir lnir-arrow-right rem-100"></i></span>
                <span>Siguiente</span></a>
        </div>
    </div>
</div>

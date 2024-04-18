
<div id="indications_d_modal" class="modal h-modal">
    <div class="modal-background  h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>Solicitud de patalogías</h3>
                <button type="button" class="h-modal-close ml-auto" aria-label="close"><i data-feather="x"></i></button>
            </header>
            <div class="modal-card-body">
                <div class="inner-content">
                    <form class="modal-form">
                        
						<div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Patalogía *</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <select class="input modal4_f1_path">
											<option value="0" selected disabled >--Seleccione--</option>
											<?php foreach($o_paths as $key_sel => $row_sel){ ?>
											<option value="<?= $row_sel->id ?>"><?= $row_sel->name ?> - <?= $row_sel->description ?></option>
											<?php } ?>
										</select>
                                    </div>
                                </div>
                            </div>
                        </div>
						
                    </form>
                </div>
            </div>
            <div class="modal-card-foot is-end">
                <a class="button h-button is-rounded h-modal-close">Cancelar</a>
                <a class="button h-button is-primary is-raised is-rounded btn_ad_sol_path">Agregar</a>
            </div>
        </div>
    </div>
</div>
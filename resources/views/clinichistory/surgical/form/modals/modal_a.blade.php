
<div id="indications_a_modal" class="modal h-modal">
    <div class="modal-background  h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>Prescripción médica</h3>
                <button type="button" class="h-modal-close ml-auto" aria-label="close"><i data-feather="x"></i></button>
            </header>
            <div class="modal-card-body">
                <div class="inner-content">
                    <form class="modal-form">
                        
						<div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Medicamento *</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <select class="input modal_f1_med">
											<option value="0" selected disabled >--Seleccione--</option>
											<?php foreach($o_medicines as $key_sel => $row_sel){ ?>
											<option value="<?= $row_sel->id ?>"><?= $row_sel->name ?> - <?= $row_sel->description ?></option>
											<?php } ?>
										</select>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Dosis *</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input modal_f2_dose" type="text" placeholder="Dosis">
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Frecuencia *</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input modal_f3_fre" type="text" placeholder="Frecuencia">
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Vía *</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input modal_f4_via" type="text" placeholder="Vía de administración">
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Duración (Días) *</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input modal_f5_dur" type="text" placeholder="Duración del tratamiento (Días)">
                                    </div>
                                </div>
                            </div>
                        </div>
						
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Indicaciones</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea modal_f6_ind" rows="4" placeholder="Indicaciones"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-card-foot is-end">
                <a class="button h-button is-rounded h-modal-close">Cancelar</a>
                <a class="button h-button is-primary is-raised is-rounded btn_ad_medical_prescription">Agregar</a>
            </div>
        </div>
    </div>
</div>

<a class="button h-button is-rounded h-modal-trigger is-primary" data-modal="indications_a_modal">Prescripción médica</a>
<a class="button h-button is-rounded h-modal-trigger is-primary" data-modal="indications_b_modal">Solicitud de examenes</a>
<a class="button h-button is-rounded h-modal-trigger is-primary" data-modal="indications_c_modal">Solicitud de procedimientos</a>
<a class="button h-button is-rounded h-modal-trigger is-primary" data-modal="indications_d_modal">Solicitud de patalogías</a>

@include($v_name.'.form.modals.modal_a',['modo' => 'create'])
@include($v_name.'.form.modals.modal_b',['modo' => 'create'])
@include($v_name.'.form.modals.modal_c',['modo' => 'create'])
@include($v_name.'.form.modals.modal_d',['modo' => 'create'])

<div class="s-card demo-table" style="margin-top: 20px;max-height: 400px;overflow: auto;">
    <table class="table is-hoverable is-fullwidth table_ad_indications" style="">
        <tbody>
			<tr>
				<th>Indicación</th>
				<th class="is-end">
					<div class="dark-inverted">
						Seleccionar
					</div>
				</th>
			</tr>
			<?php foreach($o_indications as $key => $row){ ?>
			<tr>
				<td><?= $row->description ?></td>
				<td class="is-end">
					<div><div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="indications[]" type="checkbox" value="<?= $row->description ?>"><span></span> </label></div></div></div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<!--Field-->
<div class="field">
	<div class="control"><textarea class="textarea txt_other_ad_indication" rows="2" placeholder="Agregar otra"></textarea></div>
</div>
<button type="button" class="button h-button is-success is-raised btn_other_ad_indication">Agregar</button>

<hr>

<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="notification_email" type="checkbox" value="yes"><span></span> Enviar indicaciones al correo del paciente</label></div></div>
<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="notification_whatsapp" type="checkbox" value="yes"><span></span> Enviar indicaciones al No. de whatsapp del paciente</label></div></div>

<hr>

<div class="inner_table_medical_prescription is-hidden">
	<h2 class="title is-thin is-5 title_medical_prescription" style="margin: 0;">Prescripción médica</h2>
	<div class="s-card demo-table" style="margin-top: 20px;max-height: 400px;overflow: auto;">
		<table class="table is-hoverable is-fullwidth table_medical_prescription">
			<tbody>
				<tr>
					<th>Medicamento</th>
					<th>Dosis</th>
					<th>Frecuencia</th>
					<th>Vía de administración</th>
					<th>Duración (Días)</th>
					<th>Indicaciones</th>
					<th class="is-end">
						<div class="dark-inverted">
							Eliminar
						</div>
					</th>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="inner_table_sol_exams is-hidden">
	<h2 class="title is-thin is-5" style="margin: 0;">Solicitud de examenes</h2>
	<div class="s-card demo-table" style="margin-top: 20px;max-height: 400px;overflow: auto;">
		<table class="table is-hoverable is-fullwidth table_sol_exams">
			<tbody>
				<tr>
					<th>Examen</th>
					<th class="is-end">
						<div class="dark-inverted">
							Eliminar
						</div>
					</th>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="inner_table_sol_proc is-hidden">
	<h2 class="title is-thin is-5" style="margin: 0;">Solicitud de procedimientos</h2>
	<div class="s-card demo-table" style="margin-top: 20px;max-height: 400px;overflow: auto;">
		<table class="table is-hoverable is-fullwidth table_sol_proc">
			<tbody>
				<tr>
					<th>Procedimiento</th>
					<th class="is-end">
						<div class="dark-inverted">
							Eliminar
						</div>
					</th>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="inner_table_sol_path is-hidden">
	<h2 class="title is-thin is-5" style="margin: 0;">Solicitud de patalogías</h2>
	<div class="s-card demo-table" style="margin-top: 20px;max-height: 400px;overflow: auto;">
		<table class="table is-hoverable is-fullwidth table_sol_path">
			<tbody>
				<tr>
					<th>Patalogía</th>
					<th class="is-end">
						<div class="dark-inverted">
							Eliminar
						</div>
					</th>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<hr>

<div style="width: 100%;text-align: right;padding: 10px;">
	<button type="submit" class="button h-button is-primary is-raised">Guardar</button>
</div>
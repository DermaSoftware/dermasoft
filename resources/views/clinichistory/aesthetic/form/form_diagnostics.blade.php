
<div class="s-card demo-table">
	<h3 class="subtitle">Diagnóstico</h3>
   <table class="table is-hoverable is-fullwidth">
        <tbody>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th class="is-end">
					<div class="dark-inverted">
						Seleccionar
					</div>
				</th>
			</tr>
			<?php foreach($o_diagnoses as $key => $row){ ?>
			<tr id="trdg_<?= $row->uuid ?>">
				<td class="code_inner" data-id="<?= $row->id ?>"><?= $row->code ?></td>
				<td class="name_inner"><?= $row->name ?></td>
				<td>
					<div class="field">
						<div class="control">
							<select class="input">
								<option value="0" selected disabled >--Seleccione--</option>
								<?php foreach($o_diagnosesty as $key_sel => $row_sel){ ?>
								<option value="<?= $row_sel->id ?>"><?= $row_sel->name ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</td>
				<td class="is-end">
					<div><button data-id="trdg_<?= $row->uuid ?>" type="button" class="button is-primary is-circle is-elevated btn_diagnoses_sel_fn"><span class="icon is-small"><i class="fas fa-plus"></i></span></button></div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>


<div class="s-card demo-table table_diagnoses_sel_fn is-hidden">
    <table class="table is-hoverable is-fullwidth">
        <tbody>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th class="is-end">
					<div class="dark-inverted">
						Eliminar
					</div>
				</th>
			</tr>
		</tbody>
	</table>
</div>

<div class="columns is-multiline">

	<!--Field-->
	<?php $face = (!empty($o->gender) AND $o->gender == 'Femenino')?2:1; ?>
	<div class="column is-6"><img src="<?= asset('assets/images/face'.$face.'.jpg') ?>" style="max-width: 100%;width: 100%;height: auto;"></div>
	<div class="column is-3">
		<div class="field">
			<div class="control">
				<?php $t_att = 'muscle'; ?>
				<?php $n_att = 'Músculo'; ?>
				<label><?= $n_att ?></label>
				<select name="<?= $t_att ?>[]" class="input">
					<option value="" selected disabled >--Seleccione--</option>
					<?php $options = ['Corrugador', 'Frontal', 'Procerus', 'Orbicular de ojo derecho', 'Orbicular de ojo izquierdo', 'Orbicular subpalpebral derecho', 'Orbicular subpalpebral Izquierdo', 'Región nasal', 'Orbicular de los labios', 'Platisma', 'Región del mentón']; ?>
					<?php $select_old = $is_records and isset($o_hcp) ? $o_hcp->$t_att:''; ?>
					<?php foreach($options as $key => $row){ ?>
					<option value="<?= $row ?>"><?= $row ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
	<!--Field-->
	<div class="column is-3">
		<div class="field">
			<div class="control">
				<?php $t_att = 'units'; ?>
				<?php $n_att = 'Unidades administradas'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>[]" type="number" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
			</div>
		</div>
	</div>

	<div class="column is-12 box_treatment is-hidden"></div>

	<div class="column is-12"><hr></div>
	<div class="column is-12">
		<a href="javascript:void(0)" class="button h-button is-primary is-dark-outlined btn_add_treatment_fsc">Agregar</a>
	</div>
	<div class="column is-12"><hr></div>


	<!--Field-->
	<div class="column is-6">
		<div class="field">
			<div class="control">
				<?php $t_att = 'complications'; ?>
				<?php $n_att = 'Complicaciones'; ?>
				<label><?= $n_att ?></label>
				<select name="<?= $t_att ?>" class="input sel_complications">
					<option value="" selected disabled >--Seleccione--</option>
					<?php $options = ['Si','No']; ?>
					<?php $select_old = $is_records and isset($o_hcp)?$o_hcp->$t_att:''; ?>
					<?php foreach($options as $key => $row){ ?>
					<option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
	<!--Field-->
	<div class="column is-6">
		<div class="field">
			<div class="control">
				<?php $t_att = 'record_complications'; ?>
				<?php $n_att = 'Registro de complicaciones presentadas'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_complications" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
			</div>
		</div>
	</div>
	<!--Field-->
	<div class="column is-12">
		<div class="field">
			<div class="control">
				<?php $t_att = 'participants'; ?>
				<?php $n_att = 'Datos de quienes participaron en el procedimiento'; ?>
				<label><?= $n_att ?></label>
				<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records and isset($o_hcp)?$o_hcp->$t_att:'' ?></textarea>
			</div>
		</div>
	</div>
	<!--Field-->
	<div class="column is-12">
		<div class="field">
			<div class="control">
				<?php $t_att = 'comments'; ?>
				<?php $n_att = 'Comentarios adicionales'; ?>
				<label><?= $n_att ?></label>
				<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records and isset($o_hcp)?$o_hcp->$t_att:'' ?></textarea>
			</div>
		</div>
	</div>

</div>


<div style="width: 100%;text-align: right;padding: 10px;">
	<a href="javascript:void(0)" class="button h-button is-success is-dark-outlined btn_next_tab_fsc" data-idtab="indications_tab"><span class="icon"><i class="lnir lnir-arrow-right rem-100"></i></span> <span>Siguiente</span></a>
</div>

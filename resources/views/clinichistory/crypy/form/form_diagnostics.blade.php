
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
	<div class="column is-12"><img src="<?= asset('assets/images/fototipos.png') ?>" style="max-width: 100%;width: 100%;height: auto;"></div>
	<div class="column is-6">
		<div class="field">
			<div class="control">
				<?php $t_att = 'skin_phototype'; ?>
				<?php $n_att = 'Fototipo de piel'; ?>
				<label><?= $n_att ?></label>
				<select name="<?= $t_att ?>" class="input">
					<option value="" selected disabled >--Seleccione--</option>
					<?php $options = ['1','2','3','4','5','6']; ?>
					<?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
					<?php foreach($options as $key => $row){ ?>
					<option value="Fototipo <?= $row ?>" <?= $select_old=='Fototipo '.$row?'selected':'' ?> >Fototipo <?= $row ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
	<!--Field-->
	<div class="column is-6">
		<div class="field">
			<div class="control">
				<?php $t_att = 'procedure_time'; ?>
				<?php $n_att = 'Tiempo del procedimiento'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
			</div>
		</div>
	</div>
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
					<?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
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
				<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_hcp->$t_att:'' ?></textarea>
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
				<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_hcp->$t_att:'' ?></textarea>
			</div>
		</div>
	</div>



	<div class="column is-12"><hr></div>
	<div class="column is-12">
		<div class="columns is-multiline">
			<!--Field-->
			<div class="column is-6">
				<div class="field">
					<div class="control">
						<?php $t_att = 'body_area'; ?>
						<?php $n_att = 'Área corporal'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>[]" class="input">
							<option value="" selected disabled >--Seleccione--</option>
							<?php $options = ['Cuerpo de frente', 'Cuerpo de espalda']; ?>
							<?php foreach($options as $key => $row){ ?>
							<option value="<?= $row ?>"><?= $row ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-6">
				<div class="field">
					<div class="control">
						<?php $t_att = 'lesion'; ?>
						<?php $n_att = 'Ubicación de la lesión'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>[]" class="input">
							<option value="" selected disabled >--Seleccione--</option>
							<?php $options = ['Cuero cabelludo', 'Frente', 'Parpado superior', 'Oreja derecha', 'Oreja izquierda', 'Ojo derecho', 'Parpado inferior ojo derecho', 'Parpado superior ojo izquierdo', 'Parpado inferior ojo izquierdo', 'Ceja derecha', 'Ceja izquierda', 'Mejilla derecha', 'Mejilla izquierda', 'Nariz', 'Mentón', 'Labios', 'Lengua', 'Cuello', 'Hombro derecho', 'Hombro izquierdo', 'Brazo izquierdo', 'Brazo derecho', 'Codo derecho', 'Codo izquierdo', 'Antebrazo derecho', 'Antebrazo izquierdo', 'Dorso mano derecha', 'Dorso mano izquierda', 'Palma mano derecha', 'Palma mano izquierda', 'Dedos mano derecha', 'Dedos mano izquierda', 'Tórax posterior', 'Tórax anterior', 'Abdomen', 'Región lumbar', 'Glúteos', 'Pubis', 'Genitales', 'Ano', 'Muslo izquierdo', 'Muslo derecho', 'Rodilla izquierda', 'Rodilla derecha', 'Pierna izquierda', 'Pierna derecha', 'Dorso del pie derecho', 'Dorso pie izquierdo', 'Palma pie derecho', 'Palma pie izquierdo', 'Dedos pie derecho', 'Dedos pie izquierdo']; ?>
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
						<?php $t_att = 'disinfection'; ?>
						<?php $n_att = 'Desinfección'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>[]" class="input sel_disinfection">
							<option value="" selected disabled >--Seleccione--</option>
							<?php $options = ['SSN','Alcohol','Yodopovidona','Clorexidina','Otro antiséptico']; ?>
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
						<?php $t_att = 'antiseptic'; ?>
						<?php $n_att = 'Cual antiséptico?'; ?>
						<label><?= $n_att ?></label>
						<input name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_disinfection" data-option="Otro antiséptico" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-1">
				<div class="field">
					<div class="control">
						<?php $t_att = 'anesthesia'; ?>
						<?php $n_att = 'Anestésia'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>[]" class="input sel_anesthesia">
							<option value="" selected disabled >--Seleccione--</option>
							<?php $options = ['Si','No']; ?>
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
						<?php $t_att = 'type_anesthesia'; ?>
						<?php $n_att = 'Tipo de anestésia'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>[]" class="input fl_sel_parent_disb sel_type_anesthesia" data-xparent=".sel_anesthesia" data-option="Si">
							<option value="" selected disabled >--Seleccione--</option>
							<?php $options = ['Lidocaina al 1% con epinefrina','Lidocaina al 1% sin epinefrina','Lidocaina al 2% con epinefrina','Lidocaina al 2% sin epinefrina','Tópica','Otro']; ?>
							<?php foreach($options as $key => $row){ ?>
							<option value="<?= $row ?>"><?= $row ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-2">
				<div class="field">
					<div class="control">
						<?php $t_att = 'other_anesthesia'; ?>
						<?php $n_att = 'Cual?'; ?>
						<label><?= $n_att ?></label>
						<input name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_type_anesthesia" data-option="Otro" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<?php $t_att = 'freeze_time_1'; ?>
						<?php $n_att = 'Tiempo 1 de congelación'; ?>
						<label><?= $n_att ?></label>
						<input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<?php $t_att = 'freeze_time_2'; ?>
						<?php $n_att = 'Tiempo 2 de congelación'; ?>
						<label><?= $n_att ?></label>
						<input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<?php $t_att = 'defrost_time_1'; ?>
						<?php $n_att = 'Tiempo 1 de descongelación'; ?>
						<label><?= $n_att ?></label>
						<input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<?php $t_att = 'defrost_time_2'; ?>
						<?php $n_att = 'Tiempo 2 de descongelación'; ?>
						<label><?= $n_att ?></label>
						<input name="<?= $t_att ?>[]" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<?php $t_att = 'timex'; ?>
						<?php $n_att = 'Tiempos'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>[]" class="input">
							<option value="" selected disabled >--Seleccione--</option>
							<?php $options = ['1 Ciclo','2 Ciclo']; ?>
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
						<?php $t_att = 'technique'; ?>
						<?php $n_att = 'Técnica'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>[]" class="input sel_technique">
							<option value="" selected disabled >--Seleccione--</option>
							<?php $options = ['Spray','Probeta','Cono','Ninguna','Otra']; ?>
							<?php foreach($options as $key => $row){ ?>
							<option value="<?= $row ?>"><?= $row ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-6">
				<div class="field">
					<div class="control">
						<?php $t_att = 'other_technique'; ?>
						<?php $n_att = 'Cual?'; ?>
						<label><?= $n_att ?></label>
						<input name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_technique" data-option="Otra" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
					</div>
				</div>
			</div>


		</div>
	</div>

	<div class="column is-12 box_lesion is-hidden"></div>

	<div class="column is-12"><hr></div>
	<div class="column is-12">
		<a href="javascript:void(0)" class="button h-button is-primary is-dark-outlined btn_add_lesion_fsc">Agregar</a>
	</div>

</div>


<div style="width: 100%;text-align: right;padding: 10px;">
	<a href="javascript:void(0)" class="button h-button is-success is-dark-outlined btn_next_tab_fsc" data-idtab="indications_tab"><span class="icon"><i class="lnir lnir-arrow-right rem-100"></i></span> <span>Siguiente</span></a>
</div>

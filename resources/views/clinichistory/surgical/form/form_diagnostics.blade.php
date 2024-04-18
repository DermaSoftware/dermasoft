
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
	<div class="column is-8">
		<div class="field">
			<div class="control">
				<?php $t_att = 'type_procedure'; ?>
				<?php $n_att = 'Tipo de procedimiento'; ?>
				<label><?= $n_att ?></label>
				<select name="<?= $t_att ?>" class="input type_procedure_sel">
					<option value="0" selected disabled >--Seleccione--</option>
					<?php foreach($o_procs as $key_sel => $row_sel){ ?>
					<option value="<?= $row_sel->id ?>" data-val="<?= $row_sel->description ?>"><?= $row_sel->name ?> <?= $row_sel->description ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
	<!--Field-->
	<div class="column is-4">
		<div class="field other_procedure_cll is-hidden">
			<div class="control">
				<?php $t_att = 'other_procedure'; ?>
				<?php $n_att = 'Cual?'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_valid" data-xparent=".type_procedure_sel" data-box=".other_procedure_cll" data-option="Otro" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
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
				<select name="<?= $t_att ?>" class="input sel_disinfection">
					<option value="" selected disabled >--Seleccione--</option>
					<?php $options = ['SSN','Alcohol','Yodopovidona','Clorexidina','Otro antiséptico']; ?>
					<?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
					<?php foreach($options as $key => $row){ ?>
					<option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
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
				<input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_disinfection" data-option="Otro antiséptico" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
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
				<select name="<?= $t_att ?>" class="input sel_anesthesia">
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
	<div class="column is-3">
		<div class="field">
			<div class="control">
				<?php $t_att = 'type_anesthesia'; ?>
				<?php $n_att = 'Tipo de anestésia'; ?>
				<label><?= $n_att ?></label>
				<select name="<?= $t_att ?>" class="input fl_sel_parent_disb sel_type_anesthesia" data-xparent=".sel_anesthesia" data-option="Si">
					<option value="" selected disabled >--Seleccione--</option>
					<?php $options = ['Lidocaina al 1% con epinefrina','Lidocaina al 1% sin epinefrina','Lidocaina al 2% con epinefrina','Lidocaina al 2% sin epinefrina','Tópica','Otro']; ?>
					<?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
					<?php foreach($options as $key => $row){ ?>
					<option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
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
				<input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_type_anesthesia" data-option="Otro" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
			</div>
		</div>
	</div>
	
	
	<!--Field-->
	<div class="column is-12 biopsy_method_cll is-hidden">
		<div class="columns is-multiline">
			<!--Field-->
			<div class="column is-6">
				<div class="field">
					<div class="control">
						<?php $t_att = 'biopsy_method'; ?>
						<?php $n_att = 'Método de biopsia'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>" class="input sel_biopsy_method fl_sel_parent_valid" data-xparent=".type_procedure_sel" data-box=".biopsy_method_cll" data-option="Biopsia">
							<option value="" selected disabled >--Seleccione--</option>
							<?php $options = ['Punch','Bisturí','Afeitado','Curetaje','Tijera','Saucerización','Otro']; ?>
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
						<?php $t_att = 'other_biopsy_method'; ?>
						<?php $n_att = 'Cual?'; ?>
						<label><?= $n_att ?></label>
						<input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_biopsy_method" data-option="Otro" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-6">
				<div class="field">
					<div class="control">
						<?php $t_att = 'biopsy_type'; ?>
						<?php $n_att = 'Tipo de biopsia'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>" class="input">
							<option value="" selected disabled >--Seleccione--</option>
							<?php $options = ['Incicional','Excisional']; ?>
							<?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
							<?php foreach($options as $key => $row){ ?>
							<option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<?php $t_att = 'required_margin'; ?>
						<?php $n_att = 'Requirió margen'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>" class="input sel_required_margin">
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
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<?php $t_att = 'how_much'; ?>
						<?php $n_att = 'Cuanto?'; ?>
						<label><?= $n_att ?></label>
						<input name="<?= $t_att ?>" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_required_margin" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-6">
				<div class="field">
					<div class="control">
						<?php $t_att = 'body_area_other'; ?>
						<?php $n_att = 'Área corporal'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>" class="input">
							<option value="" selected disabled >--Seleccione--</option>
							<?php $options = ['Frente', 'Espalda']; ?>
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
						<?php $t_att = 'body_area'; ?>
						<?php $n_att = 'Área'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>" class="input">
							<option value="" selected disabled >--Seleccione--</option>
							<?php $options = ['Cuero cabelludo', 'Frente', 'Parpado superior', 'Oreja derecha', 'Oreja izquierda', 'Ojo derecho', 'Parpado inferior ojo derecho', 'Parpado superior ojo izquierdo', 'Parpado inferior ojo izquierdo', 'Ceja derecha', 'Ceja izquierda', 'Mejilla derecha', 'Mejilla izquierda', 'Nariz', 'Mentón', 'Labios', 'Lengua', 'Cuello', 'Hombro derecho', 'Hombro izquierdo', 'Brazo izquierdo', 'Brazo derecho', 'Codo derecho', 'Codo izquierdo', 'Antebrazo derecho', 'Antebrazo izquierdo', 'Dorso mano derecha', 'Dorso mano izquierda', 'Palma mano derecha', 'Palma mano izquierda', 'Dedos mano derecha', 'Dedos mano izquierda', 'Tórax posterior', 'Tórax anterior', 'Abdomen', 'Región lumbar', 'Glúteos', 'Pubis', 'Genitales', 'Ano', 'Muslo izquierdo', 'Muslo derecho', 'Rodilla izquierda', 'Rodilla derecha', 'Pierna izquierda', 'Pierna derecha', 'Dorso del pie derecho', 'Dorso pie izquierdo', 'Palma pie derecho', 'Palma pie izquierdo', 'Dedos pie derecho', 'Dedos pie izquierdo']; ?>
							<?php $select_old = $is_records?$o_hcp->$t_att:''; ?>
							<?php foreach($options as $key => $row){ ?>
							<option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	
	<!--Field-->
	<div class="column is-2">
		<div class="field">
			<div class="control">
				<?php $t_att = 'tumors'; ?>
				<?php $n_att = 'Tumores'; ?>
				<label><?= $n_att ?></label>
				<select name="<?= $t_att ?>[]" class="input sel_tumors">
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
	<div class="column is-2">
		<div class="field">
			<div class="control">
				<?php $t_att = 'size'; ?>
				<?php $n_att = 'Tamaño'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_tumors" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
			</div>
		</div>
	</div>
	<!--Field-->
	<div class="column is-2">
		<div class="field">
			<div class="control">
				<?php $t_att = 'margin'; ?>
				<?php $n_att = 'Margen'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_tumors" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
			</div>
		</div>
	</div>
	<!--Field-->
	<div class="column is-2">
		<div class="field">
			<div class="control">
				<?php $t_att = 'pathology'; ?>
				<?php $n_att = 'Patología'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_tumors" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" />
			</div>
		</div>
	</div>
	<!--Field-->
	<div class="column is-4">
		<div class="field has-addons">
			<div class="control is-expanded">
				<?php $t_att = 'observations'; ?>
				<?php $n_att = 'Observaciones'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>[]" type="text" class="input fl_sel_parent_disb" data-xparent=".sel_tumors" data-option="Si" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
			</div>
			<div class="control"><label>&nbsp;</label><a class="button is-primary btn_add_surgical"><i class="fa fa-plus"></i></a></div>
		</div>
	</div>
	
	<div class="column is-12 box_surgical is-hidden"></div>
	
	
	
	
	<!--Field-->
	<div class="column is-3">
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
	<div class="column is-3">
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
				<?php $t_att = 'comments'; ?>
				<?php $n_att = 'Comentarios adicionales'; ?>
				<label><?= $n_att ?></label>
				<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_hcp->$t_att:'' ?></textarea>
			</div>
		</div>
	</div>
	
	<!--Field-->
	<div class="column is-12"><h3 class="subtitle">Datos de quienes participaron en el procedimiento</h3></div>
	<div class="column is-3">
		<div class="field">
			<div class="control">
				<?php $t_att = 'surgeon'; ?>
				<?php $n_att = 'Cirujano'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
			</div>
		</div>
	</div>
	<div class="column is-3">
		<div class="field">
			<div class="control">
				<?php $t_att = 'assistant'; ?>
				<?php $n_att = 'Ayudante'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
			</div>
		</div>
	</div>
	<div class="column is-3">
		<div class="field">
			<div class="control">
				<?php $t_att = 'instrumentalist'; ?>
				<?php $n_att = 'Instrumentador'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
			</div>
		</div>
	</div>
	<div class="column is-3">
		<div class="field">
			<div class="control">
				<?php $t_att = 'anesthesiologist'; ?>
				<?php $n_att = 'Anestesiólogo'; ?>
				<label><?= $n_att ?></label>
				<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
			</div>
		</div>
	</div>
	
</div>


<div style="width: 100%;text-align: right;padding: 10px;">
	<a href="javascript:void(0)" class="button h-button is-success is-dark-outlined btn_next_tab_fsc" data-idtab="indications_tab"><span class="icon"><i class="lnir lnir-arrow-right rem-100"></i></span> <span>Siguiente</span></a>
</div>
<div class="single-accordion">
	<div class="accordion-header is-active">Datos personales</div>
	<div class="accordion-content" style="display: block;">
		
		<div class="columns is-multiline">
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'name'; ?>
										<?php $n_att = 'Primer nombre'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'scd_name'; ?>
										<?php $n_att = 'Segundo nombre'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'lastname'; ?>
										<?php $n_att = 'Primer apellido'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'scd_lastname'; ?>
										<?php $n_att = 'Segundo apellido'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'document_type'; ?>
										<?php $n_att = 'Tipo de documento'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'document_number'; ?>
										<?php $n_att = 'Número de documento'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'phone'; ?>
										<?php $n_att = 'Teléfono celular'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->fix_phone ?> <?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'email'; ?>
										<?php $n_att = 'Correo electrónico'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'occupation'; ?>
										<?php $n_att = 'Ocupación'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'birth'; ?>
										<?php $n_att = 'Fecha de nacimiento'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'gender'; ?>
										<?php $n_att = 'Género'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'civil_status'; ?>
										<?php $n_att = 'Estado civil'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'main_address'; ?>
										<?php $n_att = 'Dirección'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
							<!--Field-->
							<div class="column is-3">
								<div class="field">
									<div class="control">
										<?php $t_att = 'city'; ?>
										<?php $n_att = 'Ciudad'; ?>
										<label><?= $n_att ?></label>
										<p><?= $o->$t_att ?></p>
									</div>
								</div>
							</div>
        </div>
		
		<div style="width: 100%;text-align: right;">
		<a target="_blank" href="<?= url('patients/suppdata/'.$o->uuid) ?>" class="button h-button is-primary is-dark-outlined"><span class="icon"><i class="fas fa-edit"></i></span><span>Actualizar datos secundarios</span></a>
		</div>
	</div>
	
	<div class="accordion-header is-active">Datos de afiliación</div>
	<div class="accordion-content" style="display: block;">
		<div class="columns is-multiline">
			<!--Field-->
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<?php $t_att = 'eps'; ?>
						<?php $n_att = 'Entidad'; ?>
						<label><?= $n_att ?></label>
						<p><?= $o->$t_att ?></p>
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<?php $t_att = 'regime'; ?>
						<?php $n_att = 'Régimen'; ?>
						<label><?= $n_att ?></label>
						<p><?= $o->$t_att ?></p>
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<?php $t_att = 'campus'; ?>
						<?php $n_att = 'Sucursal asignada'; ?>
						<label><?= $n_att ?></label>
						<p><?= $o->getCampus() ?></p>
					</div>
				</div>
			</div>
			<!--Field-->
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<?php $t_att = 'stratum'; ?>
						<?php $n_att = 'Estrato'; ?>
						<label><?= $n_att ?></label>
						<p><?= $o->$t_att ?></p>
					</div>
				</div>
			</div>
        </div>
	</div>
	
	<div class="accordion-header is-active">Signos vitales</div>
	<div class="accordion-content" style="display: block;">
		<?php if(!empty($o_vitalsigns->id)){ ?>
		<div class="columns is-multiline">
			<?php $x_options = ['heart_rate' => 'Frecuencia cardiaca','breathing_frequency' => 'Frecuencia respiratoria','weight' => 'Peso','blood_pressure' => 'Tensión arterial','temperature' => 'Temperatura','saturation' => 'Saturación','note' => 'Observaciones']; ?>
			<?php foreach($x_options as $key_aux => $row_aux){ ?>
			<!--Field-->
			<div class="column is-3">
				<div class="field">
					<div class="control">
						<label><?= $row_aux ?></label>
						<p><?= $o_vitalsigns->$key_aux ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
        </div>
		<?php } else { ?>
		<div class="message is-warning">
			<a class="delete"></a>
			<div class="message-body">No tiene signos vitales agregados</div>
		</div>
		<div style="width: 100%;text-align: right;">
		<a target="_blank" href="<?= url('patients/vitalsigns/'.$o->uuid) ?>" class="button h-button is-primary is-dark-outlined"><span class="icon"><i class="fas fa-edit"></i></span><span>Actualizar datos secundarios</span></a>
		</div>
		<?php } ?>
	</div>
	
	<div class="fieldset">
		<div class="columns is-multiline">
			<!--Field-->
			<div class="column is-6">
				<div class="field">
					<div class="control">
						<?php $t_att = 'external_cause'; ?>
						<?php $n_att = 'Causa externa'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>" class="input">
							<option value="0" selected disabled >--Seleccione--</option>
							<?php $options = ['Enfermedad general','Enfermedad profesional','Accidente de trabajo','Accidente de tránsito','Accidente rábico','Accidente ofídico','Otro tipo de accidente','Evento catastrófico','Lesión por agresión','Lesión autoinflingida','Sospecha maltrato Físico','Sospecha abuso sexual','Sospecha violencia sexual','Sospecha maltrato emocional','Otra','Ninguna']; ?>
							<?php $select_old = $is_records?$o_derm->external_cause:''; ?>
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
						<?php $t_att = 'consultation_purpose'; ?>
						<?php $n_att = 'Finalidad consulta'; ?>
						<label><?= $n_att ?></label>
						<select name="<?= $t_att ?>" class="input">
							<option value="0" selected disabled >--Seleccione--</option>
							<?php $options = ['Ninguna','Atención parto (puerperlo)','Atención recién nacido','Atención planificación familiar','Detección alteración crecimiento y desarrollo','Detección alteración desarrollo joven','Detección alteración embarazo','Detección alteración adulto','Detección alteración agudeza visual','Detección enfermedad profesional','No aplica']; ?>
							<?php $select_old = $is_records?$o_derm->consultation_purpose:''; ?>
							<?php foreach($options as $key => $row){ ?>
							<option value="<?= $row ?>" <?= $select_old==$row?'selected':'' ?> ><?= $row ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="width: 100%;text-align: right;padding: 20px;">
		<a href="javascript:void(0)" class="button h-button is-success is-dark-outlined btn_next_tab_fsc" data-idtab="anamnesis_tab"><span class="icon"><i class="lnir lnir-arrow-right rem-100"></i></span> <span>Siguiente</span></a>
	</div>
</div>
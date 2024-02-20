
<div class="s-card demo-table">
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


<div style="width: 100%;text-align: right;padding: 10px;">
	<a href="javascript:void(0)" class="button h-button is-success is-dark-outlined btn_next_tab_fsc" data-idtab="indications_tab"><span class="icon"><i class="lnir lnir-arrow-right rem-100"></i></span> <span>Siguiente</span></a>
</div>
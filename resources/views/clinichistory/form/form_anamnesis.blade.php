
<!--Field-->
<div class="column is-12">
	<div class="field">
		<div class="control">
			<?php $t_att = 'reason'; ?>
			<?php $n_att = 'Motivo de la consulta'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
		</div>
	</div>
</div>
<!--Field-->
<div class="column is-12">
	<div class="field">
		<div class="control">
			<?php $t_att = 'current_illness'; ?>
			<?php $n_att = 'Enfermedad actual'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
		</div>
	</div>
</div>
<!--Field-->
<div class="column is-12">
	<div class="field">
		<div class="control">
			<?php $t_att = 'physical_exam'; ?>
			<?php $n_att = 'Examen físico'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
		</div>
	</div>
</div>
<!--Field-->
<div class="column is-12">
	<div class="field">
		<div class="control">
			<?php $t_att = 'analysis'; ?>
			<?php $n_att = 'Análisis y/u observaciones'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
		</div>
	</div>
</div>

<div style="width: 100%;text-align: right;padding: 10px;">
	<a href="javascript:void(0)" class="button h-button is-success is-dark-outlined btn_next_tab_fsc" data-idtab="history_tab"><span class="icon"><i class="lnir lnir-arrow-right rem-100"></i></span> <span>Siguiente</span></a>
</div>
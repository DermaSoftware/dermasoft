
<!--Field-->
<div class="column is-12">
	<div class="field">
		<div class="control">
			<?php $t_att = 'medical_history'; ?>
			<?php $n_att = 'Antecedentes médicos'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
		</div>
	</div>
</div>
<!--Field-->
<div class="column is-12">
	<div class="field">
		<div class="control">
			<?php $t_att = 'surgical_history'; ?>
			<?php $n_att = 'Antecedentes quirúrgicos'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
		</div>
	</div>
</div>
<!--Field-->
<div class="column is-12">
	<div class="field">
		<div class="control">
			<?php $t_att = 'allergic_history'; ?>
			<?php $n_att = 'Antecedentes alérgicos'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
		</div>
	</div>
</div>
<!--Field-->
<div class="column is-12">
	<div class="field">
		<div class="control">
			<?php $t_att = 'drug_history'; ?>
			<?php $n_att = 'Antecedentes farmacológicos'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
		</div>
	</div>
</div>
<!--Field-->
<div class="column is-12">
	<div class="field">
		<div class="control">
			<?php $t_att = 'family_history'; ?>
			<?php $n_att = 'Antecedentes familiares'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
		</div>
	</div>
</div>
<!--Field-->
<div class="column is-12">
	<div class="field">
		<div class="control">
			<?php $t_att = 'other_history'; ?>
			<?php $n_att = 'Otros antecedentes'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="2" placeholder="<?= $n_att ?>"><?= old($t_att) ?><?= $is_records?$o_derm->$t_att:'' ?></textarea>
		</div>
	</div>
</div>

<div style="width: 100%;text-align: right;padding: 10px;">
	<a href="javascript:void(0)" class="button h-button is-success is-dark-outlined btn_next_tab_fsc" data-idtab="diagnostics_tab"><span class="icon"><i class="lnir lnir-arrow-right rem-100"></i></span> <span>Siguiente</span></a>
</div>
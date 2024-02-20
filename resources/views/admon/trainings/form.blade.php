<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'name'; ?>
			<?php $n_att = 'Nombre'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="<?= isset($o->$t_att)?$o->$t_att:old($t_att) ?>" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
	<div class="field">
		<div class="control">
			<?php $t_att = 'description'; ?>
			<?php $n_att = 'Descripción'; ?>
			<label><?= $n_att ?></label>
			<textarea name="<?= $t_att ?>" class="textarea" rows="6" placeholder="<?= $n_att ?>"><?= isset($o->$t_att)?$o->$t_att:old($t_att) ?></textarea>
		</div>
	</div>
</div>

<!--Field-->
<div class="column is-6">
	<div class="field">
		<div class="control">
			<?php $t_att = 'directed_to'; ?>
			<?php $n_att = 'Dirigida a'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="input sel_hid_directed_to" data-old="<?= (isset($o->directed_to) AND in_array($o->directed_to,['Roles','Users']))?$o->directed_to:'Todos' ?>" data-oldv="<?= (isset($o->views) AND !empty($o->views) AND $o->directed_to != 'Todos')?$o->views:'' ?>" required >
				<?php $options = ['Todos','Roles','Users']; ?>
				<?php foreach($options as $key => $row){ ?>
				<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?> ><?= $row ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>
<!--Field-->
<div class="column is-6">
	<div class="field box_hid_views">
		<div class="control">
			<?php $t_att = 'views'; ?>
			<?php $n_att = 'Cuales?'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>[]" multiple data-url="<?= url('admon/hidviews') ?>" class="input select2_fsc sel_parent_views sel_parent_vis" data-xparent=".sel_hid_directed_to" data-option="Todos" data-box=".box_hid_views" style="width: 100%;" >
			</select>
		</div>
	</div>
</div>


<?php if($modo != 'crear'){ ?>
<!--Field-->
<div class="column is-3">
	<div class="field">
		<div class="control">
			<?php $t_att = 'status'; ?>
			<?php $n_att = 'Estado'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="input" required >
				<?php $options = ['active' => 'activo','inactive' => 'inactivo']; ?>
				<?php foreach($options as $key => $row){ ?>
				<option value="<?= $key ?>" <?= (isset($o->$t_att) AND $o->$t_att==$key)?'selected':'' ?> ><?= $row ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>
<?php } ?>

<!--Field-->
<div class="column is-3">
	<div class="field">
		<div class="control">
			<?php $t_att = 'type_url'; ?>
			<?php $n_att = 'Tipo'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="input sel_hid_type_url" required >
				<?php $options = ['URL','Archivo']; ?>
				<?php foreach($options as $key => $row){ ?>
				<option value="<?= $row ?>" <?= (isset($o->$t_att) AND $o->$t_att==$row)?'selected':'' ?> ><?= $row ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>
<!--Field-->
<div class="column is-6 box_hid_url is-hidden">
    <div class="field">
        <div class="control">
            <?php $t_att = 'url'; ?>
			<?php $n_att = 'URL'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input sel_parent_hid" data-xparent=".sel_hid_type_url" data-option="URL" data-box=".box_hid_url" placeholder="https://www.youtube.com/embed/SX6dWnfKky8" value="<?= isset($o->$t_att)?$o->$t_att:old($t_att) ?>" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-6 box_hid_file is-hidden">
    <div class="field">
        <div class="control">
            <?php $t_att = 'file'; ?>
			<?php $n_att = 'Archivo PDF'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="file" class="input sel_parent_hid" data-xparent=".sel_hid_type_url" data-option="Archivo" data-box=".box_hid_file" />
        </div>
    </div>
</div>

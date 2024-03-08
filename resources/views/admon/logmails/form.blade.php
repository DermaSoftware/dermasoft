<!--<div class="column is-3">
	<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="is_whatsapp" type="checkbox" value="si"><span></span> Whatsapp</label></div></div>
</div>
<div class="column is-3">
	<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="is_email_text" type="checkbox" value="si"><span></span> Email-texto</label></div></div>
</div>
<div class="column is-3">
	<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="is_sms" type="checkbox" value="si"><span></span> SMS</label></div></div>
</div>
<div class="column is-12">
	<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="is_marketing" type="checkbox" value="si" checked><span></span> Marketing</label></div></div>
</div>-->
<!--Field-->
<div class="column is-4">
	<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="is_marketing" type="checkbox" value="si" checked><span></span> Email</label></div></div>
</div>
<div class="column is-4">
	<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="is_whatsapp" type="checkbox" value="si" disabled><span></span> Whatsapp</label></div></div>
</div>
<div class="column is-4">
	<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="is_sms" type="checkbox" value="si" disabled><span></span> SMS</label></div></div>
</div>

<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
			<?php $t_att = 'is_diagnostic'; ?>
			<?php $n_att = 'Email por diagnóstico'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" id="sel_is_diagnostic" class="input" required>
				<?php $options = ['no','si']; ?>
				<?php foreach($options as $key => $row){ ?>
				<option value="<?= $row ?>"><?= $row ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-8">
    <div class="field">
        <div class="control">
			<?php $t_att = 'diagnostic'; ?>
			<?php $n_att = 'Diagnóstico'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" id="sel_diagnostic" disabled class="input select2_fsc" required>
				<option value="0" selected >--Todos--</option>
				<?php foreach($dg_all as $key_sel => $row_sel){ ?>
				<option value="<?= $row_sel->id ?>"><?= $row_sel->name ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
			<?php $t_att = 'is_programmed'; ?>
			<?php $n_att = 'Programar'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" id="sel_is_programmed" class="input" required>
				<?php $options = ['no','si']; ?>
				<?php foreach($options as $key => $row){ ?>
				<option value="<?= $row ?>"><?= $row ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'date_programmed'; ?>
			<?php $n_att = 'Fecha'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" id="pickaday-datepicker-fsc1" disabled type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'name_event'; ?>
			<?php $n_att = 'Nombre del evento'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" id="inp_name_event" disabled type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
			<?php $t_att = 'sel_users'; ?>
			<?php $n_att = 'Seleccione rol'; ?>
			<?php $optionsr = ['Todos','Administradores','Medicos','Administrativo','Pacientes']; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" id="roles_uss_fsc" class="input" data-url="<?= url('admon/logmails') ?>" required>
				{{-- <option value="Todos" >--Todos--</option> --}}
                @foreach ($optionsr as $item)
                    @isset($o)
                        @if ($item === $o->sel_users)
                        <option selected value="<?= $item ?>"><?= $item ?></option>
                        @else
                        <option value="<?= $item ?>"><?= $item ?></option>
                        @endif
                    @endisset
                    @empty($o)
                        <option value="<?= $item ?>"><?= $item ?></option>
                    @endempty
                @endforeach
			</select>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
			<?php $t_att = 'user_id'; ?>
			<?php $n_att = 'Seleccione usuario'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" id="sel_list_users_fsc" class="input select2_fsc">
				<option value="0" >--Todos--</option>
				<?php foreach($us_all as $key_sel => $row_sel){
                    if(isset($o)){
                        if($row_sel->id === $o->user_id){?>
                            <option selected value="<?= $row_sel->id ?>"><?= $row_sel->name ?><?= !empty($row_sel->scd_name)?' '.$row_sel->scd_name:'' ?> <?= $row_sel->lastname ?> <?= $row_sel->scd_lastname ?> (<?= $row_sel->email ?>)</option>
                        <?php
                        }
                        else{?>
                        <option value="<?= $row_sel->id ?>"><?= $row_sel->name ?><?= !empty($row_sel->scd_name)?' '.$row_sel->scd_name:'' ?> <?= $row_sel->lastname ?> <?= $row_sel->scd_lastname ?> (<?= $row_sel->email ?>)</option>
                    <?php }
                    } else{ ?>
                        <option value="<?= $row_sel->id ?>"><?= $row_sel->name ?><?= !empty($row_sel->scd_name)?' '.$row_sel->scd_name:'' ?> <?= $row_sel->lastname ?> <?= $row_sel->scd_lastname ?> (<?= $row_sel->email ?>)</option>
                    <?php }
                } ?>
			</select>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
			<?php $t_att = 'sel_gender'; ?>
			<?php $n_att = 'Seleccione genero'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" class="input" required>
				<?php $options = ['Todos','Masculino','Femenino']; ?>
				<?php foreach($options as $key => $row){
                    if(isset($o)){
                    if($row === $o->sel_gender){?>
				        <option value="<?= $row ?>" selected><?= $row ?></option>
                    <?php
                    } else{?>
                        <option value="<?= $row ?>"><?= $row ?></option>
				    <?php }
                    } else{ ?>
                        <option value="<?= $row ?>"><?= $row ?></option>
              <?php       }} ?>
			</select>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'subject'; ?>
			<?php $n_att = 'Asunto'; ?>
			<label><?= $n_att ?></label>
			<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
			<?php $t_att = 'tpl_id'; ?>
			<?php $n_att = 'Email - HTML'; ?>
			<label><?= $n_att ?></label>
			<select name="<?= $t_att ?>" id="tpl_html_fsc" data-url="<?= url('admon/logmails') ?>" class="input" required>
				<option value="" selected >--Seleccione--</option>

                <?php foreach($o_all as $key_sel => $row_sel){
                    if(isset($o)){
                    if($row_sel->id == $o->tpl_id){?>
				        <option value="<?= $row_sel->id ?>" selected><?= $row_sel->name ?></option>
                    <?php
                    } else{?>
                        <option value="<?= $row_sel->id ?>"><?= $row_sel->name ?></option>
				    <?php }
                    } else{ ?>
                        <option value="<?= $row_sel->id ?>"><?= $row_sel->name ?></option>
              <?php       }} ?>
			</select>
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
	<div class="field"><div class="control"><br><label class="checkbox is-outlined is-info"><input id="is_attach" name="is_attach" type="checkbox" value="si"><span></span> Adjuntos</label></div></div>
</div>
<!--Field-->
<div class="column is-12 inner-attach is-hidden">
	<div class="filepond-uploader is-three-grid">
        <div class="control">
            <div class="file is-boxed">
                <label class="file-label">
                    <input class="file-input" type="file" multiple name="files[]">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="lnil lnil-32 lnil-cloud-upload"></i>
                        </span>
                        <span class="file-label">
                            Seleccione los archivos…
                        </span>
                    </span>
                </label>
            </div>
            <!--<input type="file" class="filepond" name="filepond" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">-->
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'msj'; ?>
			<?php $n_att = 'Cuerpo del mensaje'; ?>
			<label><?= $n_att ?></label>
			<textarea id="sun-editorx" name="<?= $t_att ?>" class="textarea" rows="12" placeholder="<?= $n_att ?>" <?= $modo=='detalles'?'readonly disabled':'' ?> >{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}</textarea>
        </div>
    </div>
</div>

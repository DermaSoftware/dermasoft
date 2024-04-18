
<div class="column is-12">
	{{-- <hr> --}}
	<h2>Datos de la pasarela de pagos</h2>
</div>

<div class="column is-2">
    <div class="field">
        <div class="control">
            <div id="attachment" class="file has-name is-fullwidth">
                @if ($o->logo)
                <img src="{{ asset($o->logo) }}" alt="Imagen" style="width: 50px;
                border-radius: 30px;
                height: 50px;"/>
            @endif
            </div>
        </div>
    </div>
</div>
<div class="column is-10">
    <div class="field">
        <div class="control">
			<label>Logo</label>
			<div id="attachment" class="file has-name is-fullwidth">
				<label class="file-label">
					<input id="logo_setting" name="logo" class="file-input" type="file">
					<span class="file-cta is-fullwidth">
						<span class="file-icon"><i class="fas fa-cloud-upload-alt"></i></span>
						<span class="file-label">Seleccione un logo…</span>
					</span>
                    <span class="file-name" style="max-width:none !important;">
                        No hay fichero
                    </span>
				</label>
			</div>
		</div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'epaycokey'; ?>
            <?php $n_att = 'Key publica (EPAYCO)'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'epaycoidc'; ?>
            <?php $n_att = 'ID comerciante (EPAYCO)'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'epaycopri'; ?>
            <?php $n_att = 'Key privada (EPAYCO)'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<div class="column is-12">
	<hr>
	<h2>Datos de contacto</h2>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'chat'; ?>
            <?php $n_att = 'Chat (Talk.to)'; ?>
			<label><?= $n_att ?></label>
			<textarea name="{{$t_att}}" rows="4" class="textarea" placeholder="<?= $n_att ?> sin la etiqueta script" <?= $modo=='detalles'?'readonly disabled':'' ?> >{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}</textarea>
        </div>
    </div>
</div>

<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'whatsapp'; ?>
            <?php $n_att = 'Whatsapp'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'video'; ?>
            <?php $n_att = 'URL video'; ?>
			<label><?= $n_att ?></label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="https://www.youtube.com/embed/DAsd20yYx_w" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'' ?> />
        </div>
    </div>
</div>

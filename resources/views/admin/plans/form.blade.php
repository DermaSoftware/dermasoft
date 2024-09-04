<!--Field-->
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'name'; ?>
			<label>Nombre</label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Nombre" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-6">
    <div class="field">
        <div class="control">
            <?php $t_att = 'subtitle'; ?>
			<label>Subtítulo</label>
			<input name="{{$t_att}}" type="text" class="input" placeholder="Subtítulo" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'price'; ?>
			<label>Precio</label>
			<input name="{{$t_att}}" type="number" min="0" class="input" placeholder="Precio" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
			<label>Vigencia</label>
            <select class="input" name="validity" id="validity">
                @foreach ($validity_types as $item)
                    @isset($o)
                        @if ($item == $o->validity)
                            <option value="{{$item}}" selected>{{$item}}</option>
                        @endif
                    @endisset
                    @empty($o)
                        <option value="{{$item}}">{{$item}}</option>
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
            <?php $t_att = 'month'; ?>
			<label>Tiempo</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Tiempo (meses)" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
			<label>Portada</label>
			<div class="file has-name is-fullwidth">
                @isset($o)
                <img src="{{ asset($o->photo) }}" alt="Imagen" width="50" height="50">
                <label class="file-label">
					<input name="photo" class="file-input" type="file">
					<span class="file-cta is-fullwidth">
						<span class="file-icon"><i class="fas fa-cloud-upload-alt"></i></span>
						<span class="file-label">Seleccione una portada…</span>
					</span>
				</label>
                @endisset
			</div>
		</div>
    </div>
</div>
<!--Field-->
<div class="column is-12">
    <div class="field">
        <div class="control">
            <?php $t_att = 'description'; ?>
			<label>Descripción</label>
			<textarea name="{{$t_att}}" class="textarea" rows="4" placeholder="Descripción" <?= $modo=='detalles'?'readonly disabled':'required' ?> >{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}</textarea>
			<small>Podemos usar la etiqueta html para saltos de línea &#60;br&#62;</small>
        </div>
    </div>
</div>
<div class="column is-12">
    <hr>
</div>

<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'days'; ?>
			<label>Duración en días para suspender servicio</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Duración en días para suspender servicio" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'venues'; ?>
			<label>Cantidad de sedes habilitadas</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Cantidad de sedes habilitadas" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'users_admin'; ?>
			<label># usuarios rol ADMINISTRATIVO x sede</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="# usuarios rol ADMINISTRATIVO x sede" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'users_medical'; ?>
			<label>Cantidad de usuarios rol MEDICO</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Cantidad de usuarios rol MEDICO" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'email_count_smtp'; ?>
			<label>Capacidad de mensajes SMTP</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Capacidad de mensajes SMTP" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'mini_text'; ?>
			<label>Cantidad de mini mensajes de texto permitidos</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Cantidad de mini mensajes de texto permitidos" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'storage_capacity'; ?>
			<label>Capacidad de almacenamiento GB</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Capacidad de almacenamiento" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'price_storage_capacity'; ?>
			<label>Costo adicional capacidad de almacenamiento GB</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Costo adicional por capacidad de almacenamiento por GB en el servidor" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div>

<!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'state'; ?>
			<label>Estado</label>
			<select name="{{$t_att}}" class="input" <?= $modo=='detalles'?'readonly disabled':'required' ?>>
				<?php $options = ['active' => 'activo','inactive' => 'inactivo']; ?>
				<?php foreach($options as $key => $row){ ?>
				<option value="<?= $key ?>" <?= (isset($o->$t_att) AND $o->$t_att==$key)?'selected':'' ?>><?= $row ?></option>
				<?php } ?>
			</select>
        </div>
    </div>
</div>
{{-- <!--Field-->
<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'amount_mini_text'; ?>
			<label>Cantidad de mensajes de texto</label>
			<input name="{{$t_att}}" type="number" min="1" class="input" placeholder="Cantidad de mensajes de texto" value="{{ isset($o->$t_att)?$o->$t_att:old($t_att) }}" <?= $modo=='detalles'?'readonly disabled':'required' ?> />
        </div>
    </div>
</div> --}}
<div class="column is-4">
    <div class="field">
        <div class="control">
			<label>Back up de seguridad</label>
            <select class="input" name="sequrity_backup" id="sequrity_backup">
                @foreach ($sequrity_backup_types as $item)
                    @isset($o)
                        @if ($item == $o->sequrity_backup)
                            <option value="{{$item}}" selected>{{$item}}</option>
                        @endif
                    @endisset
                    @empty($o)
                        <option value="{{$item}}">{{$item}}</option>
                    @endempty

                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="column is-4">
    <div class="field">
        <div class="control">
            <?php $t_att = 'rtc_protocol'; ?>
            <input name="{{$t_att}}" id="{{$t_att}}" type="checkbox" class="checkbox" <?= (isset($o->$t_att) and $o->$t_att) ? 'checked':'' ?>/>
			<label class="checkbox">Uso de protocolo web RTC</label>
        </div>
    </div>
</div>

<!--Field-->

<input name="action_type" type="hidden" value="date_quote" />
<div class="columns is-multiline">
    <!--Field-->
    <div class="column is-6">
        <div class="field">
            <div class="control">
                <?php $t_att = 'campus'; ?>
                <?php $n_att = 'Sede'; ?>
                <label><?= $n_att ?></label>
                <select name="campus" id="campus" class="input">
                    @foreach ($campus as $item)
                        @if ($item->id == $o->campus)
                        <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif

                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <!--Field-->
    <div class="column is-6">
        <div class="field">
            <div class="control">
                <?php $t_att = 'query_type'; ?>
                <?php $n_att = 'Tipo de consulta'; ?>
                <label><?= $n_att ?></label>
                <select name="query_type" id="query_type" class="input">
                    <option value="0">---Seleccione---</option>
                    @foreach ($query_types as $item)
                        @if ($item->id == $o->qt_id)
                        <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                        @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif

                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <!--Field-->
    <div class="column is-6">
        <div class="field">
            <div class="control">
                <?php $t_att = 'doctor'; ?>
                <?php $n_att = 'Doctor'; ?>
                <label><?= $n_att ?></label>
                <select name="doctor" id="doctor" class="input" disabled>
                    <option value="0">---Seleccione---</option>
                    @if ($modo !== "crear")
                        <option selected value="{{$o->doctor_class->id}}">{{$o->doctor_class->name}}</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
    <!--Field-->
    <div class="column is-6 is-hidden">
        <div class="field">
            <div class="control">
                <?php $t_att = 'action_value'; ?>
                <?php $n_att = 'Fecha'; ?>
                <label><?= $n_att ?></label>
                <input id="date_quote" name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>"
                value="{{ isset($o->date_quote) ? $o->date_quote : old('date_quote') }}" required />
            </div>
        </div>
    </div>
    <!--Field-->
    <div class="column is-6 is-hidden">
        <div class="field">
            <div class="control">
                <?php $t_att = 'time_quote'; ?>
                <?php $n_att = 'Hora'; ?>
                <label><?= $n_att ?></label>
                <input name="<?= $t_att ?>" id="time_quote" type="text"
                    class="input" placeholder="<?= $n_att ?>" value="{{ isset($o->$t_att) ? $o->$t_att : old($t_att) }}" required />
            </div>
        </div>
    </div>
    <!--Field-->
    <div class="column is-6">
        <div class="field">
            <div class="control">
                <?php $n_att = 'Modalidad'; ?>
                <label><?= $n_att ?></label>
                <select name="modality" class="input" required>
                    <?php $options = ['Presencial', 'Teleconsulta', 'Domiciliaria']; ?>
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
                <?php $t_att = 'note'; ?>
                <?php $n_att = 'Nota'; ?>
                <label><?= $n_att ?></label>
                <input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>"
                    value="{{ isset($o->$t_att) ? $o->$t_att : old('note') }}" />
            </div>
        </div>
    </div>
    <!--Field-->
    <div class="column is-6">
        <div class="field">
            <div class="control" style="display: flex;flex-direction: row">
                <?php $n_att = 'Fecha seleccionada:'; ?>
                <label><?= $n_att ?></label>
                <div class="info-calendar" style="margin-left: 5px">

                </div>
            </div>
        </div>
    </div>
    <div class="column is-12">

        <div id='calendar'></div>

    </div>
</div>

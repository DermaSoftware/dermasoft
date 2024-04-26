<header class="modal-card-head">
    <p class="modal-card-title">Agregar</p>
    <button id="delete-modal" class="modal-close is-large" aria-label="close"></button>
</header>


<div class="modal-card-body">
    <form id="medical_prescription_form" action="{{ url($post_url) }}" method="post" class="modal-form">
        {{ csrf_field() }}
        <div class="inner-content">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="columns is-multiline">
                        <!--Field-->
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <label>Medicamento</label>
                                    <select class="input mp_f1_med select2_fsc">
                                        <?php foreach($o_medicines as $key_sel => $row_sel){ ?>
                                        <option value="<?= $row_sel->id ?> ?>"><?= $row_sel->name ?> -
                                            <?= $row_sel->description ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-3">
                            <div class="field">
                                <div class="control">
                                    <label>Dosis</label>
                                    <input type="text" class="input mp_f2_dose" placeholder="Dosis" />
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-3">
                            <div class="field">
                                <div class="control">
                                    <label>Frecuencia</label>
                                    <input type="text" class="input mp_f3_fre" placeholder="Frecuencia" />
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-3">
                            <div class="field">
                                <div class="control">
                                    <label>Vía de administración</label>
                                    <select class="input mp_f4_via">
                                        <option value="" selected disabled>--Seleccione--</option>
                                        <?php $options = ['Topico', 'Oral', 'Intravenoso', 'Intramuscular', 'Subcutáneo', 'Intralesional']; ?>
                                        <?php foreach($options as $key => $row){ ?>
                                        <option value="<?= $row ?>"><?= $row ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-3">
                            <div class="field">
                                <div class="control">
                                    <label>Duración (Días)</label>
                                    <input type="text" class="input mp_f5_dur"
                                        placeholder="Duración del tratamiento (Días)" />
                                </div>
                            </div>
                        </div>
                        <!--Field-->
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <label>Indicaciones</label>
                                    <textarea rows="2" class="textarea mp_f6_ind" placeholder="Indicaciones"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12">
                            <a href="javascript:void(0)"
                                class="button h-button is-primary is-dark-outlined btn_add_p">Agregar</a>
                        </div>
                        <div class="column is-12">
                            <hr>
                        </div>
                        <div class="column is-12 inner_table_mp <?= !isset($prescription) ? 'is-hidden' : '' ?>">
                            <div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
                                <h4 class="title is-5 is-narrow">Medicamentos seleccionados</h4>
                                <table class="table is-hoverable is-fullwidth table_precription_medicalp">
                                    <tbody>
                                        <tr>
                                            <th>Medicamento</th>
                                            <th>Dosis</th>
                                            <th>Frecuencia</th>
                                            <th>Vía de administración</th>
                                            <th>Duración (Días)</th>
                                            <th>Indicaciones</th>
                                            <th class="is-end">
                                                <div class="dark-inverted">
                                                    Eliminar
                                                </div>
                                            </th>
                                        </tr>
                                        @isset($prescription)
                                            @foreach ($prescription->prescriptionmedicines as $item)
                                                <tr>
                                                    <td><input type="hidden" name="prescription_med[]"
                                                            value="{{ $item->medicine_id }}">{{ $item->medicine_name }}</td>

                                                    <td><input type="hidden" name="prescription_dose[]"
                                                            value="{{ $item->dose }}">{{ $item->dose }}</td>
                                                    <td><input type="hidden" name="prescription_fre[]"
                                                            value="{{ $item->frecuency }}">{{ $item->frecuency }}</td>
                                                    <td><input type="hidden" name="prescription_via[]"
                                                            value="{{ $item->route_administration }}">{{ $item->route_administration }}
                                                    </td>
                                                    <td><input type="hidden" name="prescription_dur[]"
                                                            value="{{ $item->duration }}">{{ $item->duration }}</td>
                                                    <td><input type="hidden" name="prescription_ind[]"
                                                            value="{{ $item->indication }}">{{ $item->indication }}</td>
                                                    <td class="is-end">
                                                        <div><button type="button"
                                                                class="button is-danger is-circle is-elevated btn_mp_trash_sel_fn"><span
                                                                    class="icon is-small"><i
                                                                        class="fas fa-trash"></i></span></button></div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--Field-->
                        <div class="column is-3">
                            <div class="field">
                                <div class="control">
                                    <label>Vigencia (Días)</label>
                                    <input name="validity" type="number" class="input" value="<?= !empty($prescription) ? $prescription->validity : '' ?>"
                                        placeholder="Vigencia (Días)" />
                                </div>
                            </div>
                        </div>

                        <div class="column is-12">
                            <div class="field">
                                <div class="control"><label class="checkbox is-outlined is-info"><input
                                            name="notification_email" type="checkbox" value="yes"><span></span>
                                        Enviar al correo del paciente</label></div>
                            </div>
                            <div class="field">
                                <div class="control"><label class="checkbox is-outlined is-info"><input
                                            name="notification_whatsapp" type="checkbox" value="yes"><span></span>
                                        Enviar al whatsapp del paciente</label></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal-card-foot is-end">
    <div id="salvar" class="buttons">
        <button type="submit" class="button is-success">Salvar</button>
    </div>
</div>


<script>
    $(function() {
        $(function() {
            if ($(".select2_fsc").length) {
                $('.select2_fsc').each(function() {
                    $(this).select2({
                        theme: "classic",
                    });
                });
            }
        })

        $('.btn_mp_trash_sel_fn').each(function(i, v) {
            var btn = $(this);
            btn.on('click', () => {
                btn.parent().parent().parent().remove();
            });
        });

        //add mp prescription to table
        if ($('.btn_add_p').length) {
            $('.btn_add_p').on('click', () => {
                if ($('.inner_table_mp').hasClass('is-hidden')) {
                    $('.inner_table_mp').removeClass('is-hidden');
                }
                const x_f1 = '<td><input type="hidden" name="prescription_med[]" value="' + $(
                    '.mp_f1_med').val() + '">' + $('.mp_f1_med option:selected').html() + '</td>';
                const x_f2 = '<td><input type="hidden" name="prescription_dose[]" value="' + $(
                    '.mp_f2_dose').val() + '">' + $('.mp_f2_dose').val() + '</td>';
                const x_f3 = '<td><input type="hidden" name="prescription_fre[]" value="' + $(
                    '.mp_f3_fre').val() + '">' + $('.mp_f3_fre').val() + '</td>';
                const x_f4 = '<td><input type="hidden" name="prescription_via[]" value="' + $(
                    '.mp_f4_via').val() + '">' + $('.mp_f4_via').val() + '</td>';
                const x_f5 = '<td><input type="hidden" name="prescription_dur[]" value="' + $(
                    '.mp_f5_dur').val() + '">' + $('.mp_f5_dur').val() + '</td>';
                const x_f6 = '<td><input type="hidden" name="prescription_ind[]" value="' + $(
                    '.mp_f6_ind').val() + '">' + $('.mp_f6_ind').val() + '</td>';
                const x_trash =
                    '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_mp_trash_sel_fn"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                const item = '<tr>' + x_f1 + x_f2 + x_f3 + x_f4 + x_f5 + x_f6 + x_trash + '</tr>';
                $('.table_precription_medicalp tbody').append(item);
                $('.mp_f1_med').val('');
                $('.mp_f2_dose').val('');
                $('.mp_f3_fre').val('');
                $('.mp_f4_via').val('');
                $('.mp_f5_dur').val('');
                $('.mp_f6_ind').val('');
                trash_mp_all();
            });

            function trash_mp_all() {
                $('.btn_mp_trash_sel_fn').each(function(i, v) {
                    var btn = $(this);
                    btn.on('click', () => {
                        btn.parent().parent().parent().remove();
                    });
                });
            }
        }

    })
</script>

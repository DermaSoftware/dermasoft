@extends('layouts.app')
@section('content')
    <div class="account-wrapper">
        <div class="columns">
            <div class="column is-3">
                <form class="form_save_add_sign" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input name="urlredirect" type="hidden" value="normal" />
                    <div class="account-box is-form is-footerless">
                        <div class="form-body">
                            <div class="field">
                                <p class="control has-icons-left has-icons-right">
                                <div class="field">
                                    <div class="control">
                                        <label>Sedes</label>
                                        <select name="sede" class="input">
                                            <option value="0" selected>Todos</option>
                                            <?php foreach($campus as $key => $row){ ?>
                                            <option value="<?= $row->id ?>"><?= $row->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                </p>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label>Doctores</label>
                                    <select name="doctor" class="input">
                                        <option value="0" selected>Todos</option>
                                        <?php foreach($doctors as $key => $row){ ?>
                                        <option value="<?= $row->id ?>"><?= $row->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <p class="control">
                                    <button id="filtro" class="button is-success">
                                        Filtrar
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="column is-9">

                <div id='calendar'></div>

            </div>
        </div>
    </div>
    <div>
        <a class="button h-button is-rounded h-modal-trigger is-hidden btn_cita_show" data-modal="cita_modal">Right Actions</a>
    </div>


    <div id="cita_modal" class="modal h-modal">
        <div class="modal-background  h-modal-close"></div>
        <div class="modal-content">
            <div class="modal-card">
                <header class="modal-card-head">
                    <h3>Detalles de cita</h3>
                    <button type="button" class="h-modal-close ml-auto" aria-label="close"><i data-feather="x"></i></button>
                </header>
                <div class="modal-card-body">
                    <div class="inner-content">
                        <div class="r-card-advanced box_info">
                        </div>
                    </div>
                </div>
                <div class="modal-card-foot is-end">
                    <a class="button h-button is-rounded h-modal-close">Cerrar</a>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
@section('js')
    @parent
    <script>
        var modadity = <?php echo json_encode($modalidad); ?>;
        $(document).ready(function() {

                    const filtro = document.querySelector('button[id="filtro"]');
                    const doctor = document.querySelector('select[name="doctor"]');
                    const sede = document.querySelector('select[name="sede"]');
                    const _token = $("meta[name='csrf-token']").attr("content")
                    var data = {
                        _token: $("meta[name='csrf-token']").attr("content"),
                        "doctor": '',
                    }
                    filtro.addEventListener('click', async function(e) {
                        e.preventDefault();
                        var op_doctor = doctor.options[doctor.selectedIndex];
                        var op_doctor_value = op_doctor.value;
                        var op_sede = sede.options[sede.selectedIndex];
                        var op_sede_value = op_sede.value;
                        if (op_doctor_value !== '0' || op_sede_value !== '0') {
                            var data = {
                                _token: $("meta[name='csrf-token']").attr("content"),
                                "doctor": op_doctor_value,
                                "sede": op_sede_value,
                            }
                            var resps = get_days(data).then(resp => {
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                                    headerToolbar: {
                                        left: 'promptResource today prev,next',
                                        center: 'title',
                                        right: 'resourceTimelineDay,resourceTimelineThreeDays,timeGridWeek,dayGridMonth'
                                    },
                                    initialView: 'timeGridWeek',
                                    locale: 'es',
                                    selectable: true,
                                    // resources: JSON.parse(resp.doctors),
                                    events: JSON.parse(resp.locks_days),
                                });
                                calendar.render();
                            });
                        } else {
                            calendarEl.innerHTML = '';

                        }

                    });
                    var resp = get_days(data).then(resp => {
                        var calendarEl = document.getElementById('calendar');
                        const _token1 = $("meta[name='csrf-token']").attr("content")
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                            headerToolbar: {
                                left: 'promptResource today prev,next',
                                center: 'title',
                                right: 'resourceTimelineDay,resourceTimelineThreeDays,timeGridWeek,dayGridMonth'
                            },
                            initialView: 'timeGridWeek',
                            locale: 'es',
                            selectable: true,
                            // resources: JSON.parse(resp.doctors),
                            events: JSON.parse(resp.locks_days),
                            eventClick: function(info) {
                                var eventObj = info.event;
                                console.log(info)
                                if (eventObj.url) {
                                    var resp = get_detail(eventObj.url).then(resp => {
                                        debugger
                                        $('.btn_cita_show').trigger('click');
                                        $('.box_info').html(resp);

                                    });
                                    //window.open(eventObj.url);
                                    info.jsEvent
                                .preventDefault(); // prevents browser from following link in current tab.
                                }
                            },
                        });
                        calendar.render();
                    });

                    async function get_days(data) {
                        var uri = modadity == null ? '/patients/appointments_calendar/events' : `/patients/appointments_calendar/events/${modadity}`;
                        var response = await fetch(uri, {
                            method: "POST", // *GET, POST, PUT, DELETE, etc.
                            mode: "cors", // no-cors, *cors, same-origin
                            cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                            credentials: "same-origin", // include, *same-origin, omit
                            headers: {
                                "Content-Type": "application/json",
                                // 'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            redirect: "follow", // manual, *follow, error
                            referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                            body: JSON.stringify(data)
                        })
                        return response.json();

                        }
                    async function get_detail(url) {

                        var response = await fetch(url, {
                            method: "GET", // *GET, POST, PUT, DELETE, etc.
                            mode: "cors", // no-cors, *cors, same-origin
                            cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                            credentials: "same-origin", // include, *same-origin, omit
                            headers: {
                                "Content-Type": "application/json",
                                // 'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            redirect: "follow", // manual, *follow, error
                            referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                            // body: JSON.stringify(data)
                        })
                        console.log(response);
                        return response.text();

                        }
                    });
    </script>
@endsection

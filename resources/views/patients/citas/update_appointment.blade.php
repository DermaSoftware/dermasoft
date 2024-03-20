@extends('layouts.app')
@section('content')
    <div class="account-wrapper">
        <div class="columns">
            <div class="column is-12">
                <form class="form_save_add_sign" action="{{ url($menu . '/appointments/' . $o->uuid . '/edit') }}"
                    method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input name="urlredirect" type="hidden" value="normal" />
                    <div class="account-box is-form is-footerless">
                        <div class="form-head stuck-header">
                            <div class="form-head-inner">
                                <div class="left">
                                    <h3>{{ $title }}</h3>
                                    @if ($errors->any())
                                        <div class="message is-danger">
                                            <a class="delete"></a>
                                            <div class="message-body">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="right">
                                    <div class="buttons">
                                        <a href="{{ url($menu . '/appointments/' . $patient->uuid) }}" class="button h-button is-light is-dark-outlined">
                                            <span class="icon"><i
                                                    class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                                        </a>
                                        <button type="button"
                                            class="button h-button is-success is-raised btn_save_not_sign">Guardar</button>
                                        <button type="button"
                                            class="button h-button is-primary is-raised btn_save_add_sign">Guardar y
                                            registrar signos vitales</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-body">
                            <!--Fieldset-->
                            <div class="fieldsetx">
                                <div class="fieldset-heading">
                                </div>
                                <div class="columns is-multiline">
                                    @include($v_name . '.citas.form_edit', ['modo' => 'modificar'])
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('content')
@section('js')
    @parent
    <script>
        $(document).ready(async function() {

            const doctor = document.querySelector('select[name="doctor"]');
            doctor.removeAttribute('disabled');
            op = doctor.options[doctor.selectedIndex];
            var value = op.value;
            const campus = document.querySelector('select[name="campus"]');
            var campus_value = campus.options[campus.selectedIndex].value;
            var calendarEl = document.getElementById('calendar');
            if (value !== '0') {
                var data = {
                    _token: $("meta[name='csrf-token']").attr("content"),
                    "doctor": value,
                    "campus": campus_value,
                    "patient": <?= $patient ?>
                }
                const response = await fetch('/patients/get_habailable_days', {
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
                });
                var resp = await response.json();
                console.log(resp);

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'promptResource today prev,next',
                        center: 'title',
                        right: 'resourceTimelineDay,resourceTimelineThreeDays,timeGridWeek,dayGridMonth'
                    },
                    initialView: 'timeGridWeek',
                    locale: 'es',
                    selectable: true,
                    businessHours: resp.businessHours,
                    hiddenDays: JSON.parse(resp.str_days),
                    events: JSON.parse(resp.locks_days),
                    validRange: {
                        start: new Date()
                    },
                    dateClick: function(info) {
                        var fecha = info.date;
                        var hour = fecha.getHours() >= 10 ? fecha.getHours() :
                            `0${fecha.getHours()}`;
                        var minutes = fecha.getMinutes() >= 10 ? fecha.getMinutes() :
                            `0${fecha.getMinutes()}`;
                        var time = `${hour}:${minutes}`;

                        var month = fecha.getMonth() + 1 >= 10 ? fecha.getMonth() + 1 :
                            `0${fecha.getMonth() + 1}`;
                        var day = fecha.getDate() >= 10 ? fecha.getDate() : `0${fecha.getDate()}`;
                        var year = fecha.getFullYear();
                        var fecha = `${year}-${month}-${day}`;

                        $('.date-view-fsc').html(info.dateStr);
                        $('#date_quote').val(fecha);
                        $('#time_quote').val(time);
                        if ($('#date_quote').val() != '') {
                            $(".btn_send_calendar").prop('disabled', false);
                        }

                    },
                    eventClick: function(info) {
                        var eventObj = info.event;
                        if (eventObj.url) {
                            console.log(eventObj.url)
                            $.post(eventObj.url, {
                                _token: $("meta[name='csrf-token']").attr(
                                    "content")
                            }, function(data) {
                                $('.box_info_cite').html(data);
                                $('.btn_cita_show').trigger('click');
                            }, "html");
                            //window.open(eventObj.url);
                            info.jsEvent
                                .preventDefault(); // prevents browser from following link in current tab.
                        }
                    },
                });

                calendar.render();
            }
            /*op = doctor.options[doctor.selectedIndex];
            var value = op.value;
            var data = {
                _token: $("meta[name='csrf-token']").attr("content"),
                doctor: value,
                patient: <?= $patient ?>
            }
            const response = await fetch('/patients/get_habailable_days', {
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
            });

            debugger
            var resp = await response.json();
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                selectable: true,

                hiddenDays: JSON.parse(resp.str_days),
                events: JSON.parse(resp.locks_days),
                validRange: {
                    start: new Date()
                },
                dateClick: function(info) {
                    $('.date-view-fsc').html(info.dateStr);
                    $('#date_quote').val(info.dateStr);
                    if ($('#date_quote').val() != '') {
                        $(".btn_send_calendar").prop('disabled', false);
                    }
                },
                eventClick: function (info) {
                    var eventObj = info.event;
                    if (eventObj.url) {
                        console.log(eventObj.url)
                        $.post(eventObj.url, {
                            _token: $("meta[name='csrf-token']").attr("content")
                        }, function (data) {
                            $('.box_info_cite').html(data);
                            $('.btn_cita_show').trigger('click');
                        }, "html");
                        //window.open(eventObj.url);
                        info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
                    }
                },
            });

            calendar.render();*/
            doctor.addEventListener('change', async function() {
                op = doctor.options[doctor.selectedIndex];
                var value = op.value;
                const campus = document.querySelector('select[name="campus"]');
                var campus_value = campus.options[campus.selectedIndex].value;
                var calendarEl = document.getElementById('calendar');
                if (value !== '0') {
                    var data = {
                        _token: $("meta[name='csrf-token']").attr("content"),
                        "doctor": value,
                        "campus": campus_value,
                        "patient": <?= $patient ?>
                    }
                    const response = await fetch('/patients/get_habailable_days', {
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
                    });
                    var resp = await response.json();
                    console.log(resp);

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        headerToolbar: {
                            left: 'promptResource today prev,next',
                            center: 'title',
                            right: 'resourceTimelineDay,resourceTimelineThreeDays,timeGridWeek,dayGridMonth'
                        },
                        initialView: 'timeGridWeek',
                        locale: 'es',
                        selectable: true,
                        businessHours: resp.businessHours,
                        hiddenDays: JSON.parse(resp.str_days),
                        events: JSON.parse(resp.locks_days),
                        validRange: {
                            start: new Date()
                        },
                        dateClick: function(info) {
                            debugger
                            console.log(info.date.getTime())
                            var fecha = info.date;
                            var hour = fecha.getHours() >= 10 ? fecha.getHours() :
                                `0${fecha.getHours()}`;
                            var minutes = fecha.getMinutes() >= 10 ? fecha
                            .getMinutes() : `0${fecha.getMinutes()}`;
                            var time = `${hour}:${minutes}`;

                            var month = fecha.getMonth() + 1 >= 10 ? fecha.getMonth() +
                                1 : `0${fecha.getMonth() + 1}`;
                            var day = fecha.getDate() >= 10 ? fecha.getDate() :
                                `0${fecha.getDate()}`;
                            var year = fecha.getFullYear();
                            var fecha = `${year}-${month}-${day}`;

                            $('.date-view-fsc').html(info.dateStr);
                            $('#date_quote').val(fecha);
                            $('#time_quote').val(time);
                            if ($('#date_quote').val() != '') {
                                $(".btn_send_calendar").prop('disabled', false);
                            }

                        },
                        eventClick: function(info) {
                            var eventObj = info.event;
                            if (eventObj.url) {
                                console.log(eventObj.url)
                                $.post(eventObj.url, {
                                    _token: $("meta[name='csrf-token']").attr(
                                        "content")
                                }, function(data) {
                                    $('.box_info_cite').html(data);
                                    $('.btn_cita_show').trigger('click');
                                }, "html");
                                //window.open(eventObj.url);
                                info.jsEvent
                                    .preventDefault(); // prevents browser from following link in current tab.
                            }
                        },
                    });

                    calendar.render();
                } else {
                    calendarEl.innerHTML = '';
                }

            });

            //// get doctors
            const querytipes = document.querySelector('select[name="query_type"]');
            querytipes.addEventListener('change', async function() {
                op = querytipes.options[querytipes.selectedIndex];
                var value = op.value;
                if (value !== '0') {
                    var data = {
                        _token: $("meta[name='csrf-token']").attr("content"),
                        "doctor": value,
                        "patient": <?= $patient ?>
                    }
                    const response = await fetch('/patients/get_doctors/' + value, {
                        method: "GET", // *GET, POST, PUT, DELETE, etc.
                        mode: "cors", // no-cors, *cors, same-origin
                        cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                        credentials: "same-origin", // include, *same-origin, omit
                        headers: {
                            "Content-Type": "application/json",
                            // 'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        redirect: "follow", // manual, *follow, error
                        referrerPolicy: "no-referrer",
                    });
                    const resp = await response.json();
                    console.log(resp);
                    var html_options = '<option value="0">---Seleccione---</option>';
                    resp.forEach(element => {
                        html_options +=
                            `<option value="${element.id}">${element.name}</option>`;
                    });
                    doctor.removeAttribute('disabled');
                    doctor.innerHTML = html_options;
                    console.log(html_options);
                }
            });
        });
    </script>
@endsection
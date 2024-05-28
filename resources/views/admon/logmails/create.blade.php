@extends('layouts.app')
@section('content')
    <div class="account-wrapper">
        <div class="columns">
            <div class="column is-12">
                <form action="{{ url($menu) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                                        <a href="{{ url($menu) }}" class="button h-button is-light is-dark-outlined">
                                            <span class="icon"><i
                                                    class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                                        </a>
                                        <button type="submit" class="button h-button is-primary is-raised">Crear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-body">
                            <!--Fieldset-->
                            <div class="fieldsetx">
                                <div class="columns is-multiline">
                                    @include($v_name . '.form', ['modo' => 'crear'])
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
    <script>
        $(document).ready(async function() {
            $('#adjuntos').on('change', function(event) {
                var tmppath = URL.createObjectURL(event.target.files[0]);
                $("#photo_profile_img").fadeIn("fast").attr('src', tmppath);
            });

            /*const roles = document.querySelector('select[name="sel_users"]');
            const user_id = document.querySelector('select[name="user_id"]');
            roles.addEventListener('change', async function() {
                op = roles.options[roles.selectedIndex];
                var value = op.value;
                if (value !== '0') {
                    var data = {
                        _token: $("meta[name='csrf-token']").attr("content"),
                        "rol": value,
                    }
                    const response = await fetch('get_users', {
                        method: "POST", // *GET, POST, PUT, DELETE, etc.
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
                    // doctor.removeAttribute('disabled');
                    user_id.innerHTML = html_options;
                    console.log(html_options);
                }
            });*/
        });
    </script>
@endsection

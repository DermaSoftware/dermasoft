@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($menu.'/search_dermatology')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>Buscar paciente:</h3>
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
                                <a href="{{url($menu)}}" class="button h-button is-light is-dark-outlined">
                                    <span class="icon"><i class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                                </a>
                                <button id="buscar" type="submit" class="button h-button is-primary is-raised">Buscar</button>
                                <button class="button is-primary is-loading is-hidden">Loading</button>
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

							<!--Field-->
							<div class="column is-6">
								<div class="field">
									<div class="control">
										<?php $t_att = 'patient'; ?>
										<?php $n_att = 'Pacientes'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>" class="input patine_sl" required>
											<option value="0" selected disabled >--Seleccione--</option>
											@foreach ($company_patients as $item)
                                            <option value="{{$item->id}}">{{$item->name}} {{$item->lastname}} ({{$item->document_number}})</option>
                                            @endforeach
										</select>
									</div>
								</div>
							</div>
                            {{-- <!--Field-->
							<div class="column is-6">
								<div class="field">
									<div class="control">
										<?php $t_att = 'document_type'; ?>
										<?php $n_att = 'Tipo de documento'; ?>
										<label><?= $n_att ?></label>
										<select name="<?= $t_att ?>" class="input" required>
											<option value="0" selected disabled >--Seleccione--</option>
											<?php $options = ['cedula de ciudadanía','pasaporte','cedula de extranjería','carné diplomático','registro civil','tarjeta de identidad','adulto sin identificar','menor sin identificar','certificado de nacimiento','salvoconducto','pasaporte de la ONU','Permiso especial de permanencia']; ?>
											<?php foreach($options as $key => $row){ ?>
											<option value="<?= $row ?>"><?= $row ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div> --}}
							{{-- <div class="column is-6">
								<div class="field">
									<div class="control">
										<?php $t_att = 'document_number'; ?>
										<?php $n_att = 'Número de documento'; ?>
										<label><?= $n_att ?></label>
										<input name="<?= $t_att ?>" type="text" class="input" placeholder="<?= $n_att ?>" value="{{ old($t_att) }}" required />
									</div>
								</div>
							</div> --}}
                            <!--Field-->
							<div class="column is-6">
								<div class="field">
									<div class="control" id="app-box">
										<!-- <?php $t_att = 'appointment'; ?>
										<?php $n_att = 'Consulta'; ?>
										<label><?= $n_att ?></label> -->
                                        <div id="box"></div>
									</div>
								</div>
							</div>

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
        $(function() {
            if ($(".patine_sl").length) {
                $('.patine_sl').each(function () {
                    $(this).select2({
                        theme: "classic",
                    });
                });
            }
            // const patient = document.querySelector('select[name="patient"]');
            const appoint = document.querySelector('div[id="app-box"]');

            $('.patine_sl').on('change',function(){
                $('div[id="app-box"] #box').html('');
                $('#buscar').hide();
                $('button.is-loading').removeClass('is-hidden');
                op = this.options[this.selectedIndex];
                var value = op.value;
                if (value !== '0') {
                var data = {
                    _token: $("meta[name='csrf-token']").attr("content"),
                    "patient": value
                }
                const resp = get_days(data).then(resp => {

                    console.log(resp)
                    if(resp.data){
                        var html = '<label>Consultas</label>';
                        resp.data.forEach(element => {
                            var hc_type = element.hc_type;
                            var img = '';
                            if(hc_type == 'Dermatología general'){
                                img = `<img src="<?= asset('assets/img/landing/h/dermatology.jpg') ?>" alt="" width="50" height="50">`;
                            }
                            if(hc_type == 'Dermatología general control'){
                                img = `<img src="<?= asset('assets/img/landing/h/dermatology.jpg') ?>" alt="" width="50" height="50">`;
                            }
                            if(hc_type == 'Biopsías y/o procedimientos'){
                                img = `<img src="<?= asset('assets/img/landing/h/biopsies.jpg') ?>" alt="" width="50" height="50">`;
                            }
                            if(hc_type == 'Procedimientos Estéticos'){
                                img = `<img src="<?= asset('assets/img/landing/h/aesthetic.jpg') ?>" alt="" width="50" height="50">`;
                            }
                            if(hc_type == 'Descripción Quirúrgica'){
                                img = `<img src="<?= asset('assets/img/landing/h/surgical.jpg') ?>" alt="" width="50" height="50">`;
                            }
                            if(hc_type == 'Crioterapia'){
                                img = `<img src="<?= asset('assets/img/landing/h/crypy.jpg') ?>" alt="" width="50" height="50">`;
                            }
                            html += `
                                <label class="radio" style="display: flex;flex-direction: row;align-items: center">
                                    <input style="position: inherit;opacity: inherit;" value="${element.id}" type="radio" name="appointment" />
                                    <span>${img}</span><span> Consulta ${element.hc_type}(${element.date_quote} ${element.time_quote})</span>
                                </label>
                            `;
                        });
                        $('div[id="app-box"] #box').html(html);
                    }
                    $('button.is-loading').addClass('is-hidden');
                    $('#buscar').show();
                });
            }
            })

            async function get_days(data) {

            var response = await fetch('/clinichistory/user_appointments', {
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
            return response.json();
            }
        });
    </script>
@endsection

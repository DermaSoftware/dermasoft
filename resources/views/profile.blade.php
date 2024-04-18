@extends('layouts.app')

@section('content')
    <div class="account-wrapper">
        <div class="columns">
            <!--Navigation-->
            <div class="column is-4">
                <div class="account-box is-navigation">
                    <div class="media-flex-center">
                        <div class="h-avatar is-large">
                            <img class="avatar"
                                src="{{ !empty(Auth::user()->photo) ? Auth::user()->photo : 'https://via.placeholder.com/150x150' }}"
                                data-demo-src="{{ !empty(Auth::user()->photo) ? Auth::user()->photo : 'https://via.placeholder.com/150x150' }}"
                                alt="">
                            <img class="badge" src="<?= asset('assets/img/icons/flags/spain.svg') ?>"
                                data-demo-src="<?= asset('assets/img/icons/flags/spain.svg') ?>" alt="">
                        </div>
                        <div class="flex-meta">
                            <span>{{ Auth::user()->name }}</span>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!--Form-->
            <div class="column is-8">
                <form action="{{ url($menu) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="account-box is-form is-footerless">
                        <div class="form-head stuck-header">
                            <div class="form-head-inner">
                                <div class="left">
                                    <h3>Configuración de la cuenta</h3>
                                    <p>Ingrese la información para actualizar su perfil</p>
                                    @include('msj')
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
                                        <a href="{{ url('/') }}" class="button h-button is-light is-dark-outlined">
                                            <span class="icon"><i
                                                    class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                                        </a>
                                        <button type="submit" class="button h-button is-primary is-raised">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-body">
                            <!--Fieldset-->
                            <div class="fieldset">
                                <div class="fieldset-heading">
                                    <h4>Foto</h4>
                                    <p>Actualiza tu foto de perfil</p>
                                </div>
                                <div class="h-avatar profile-h-avatar is-xl">
                                    <img id="photo_profile_img" class="avatar"
                                        src="{{ !empty(Auth::user()->photo) ? Auth::user()->photo : 'https://via.placeholder.com/150x150' }}"
                                        data-demo-src="{{ !empty(Auth::user()->photo) ? Auth::user()->photo : 'https://via.placeholder.com/150x150' }}"
                                        alt="">
                                    <div class="filepond-profile-wrap is-hidden">
                                        <input id="photo_profile_acc" type="file" class="is-hidden" name="photo"
                                            accept="image/png, image/jpeg, image/gif">
                                    </div>
                                    <button type="button" id="photo_profile_btn"
                                        class="button is-circle edit-button is-edit"><span class="icon is-small"><i
                                                data-feather="edit-2"></i></span></button>
                                </div>
                            </div>
                            <!--Fieldset-->
                            <div class="fieldset">
                                <div class="fieldset-heading">
                                    <h4>Información básica</h4>
                                    <p>Actualiza la información básica de tu perfil</p>
                                </div>
                                <div class="columns is-multiline">
                                    <!--Field-->
                                    <div class="column is-12">
                                        <div class="field">
                                            <div class="control">
                                                <input name="name" type="text" class="input" placeholder="Su nombre"
                                                    value="{{ isset($o->name) ? $o->name : old('name') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="column is-12">
                                        <div class="field">
                                            <div class="control">
                                                <input name="email" type="email" class="input" placeholder="Su correo"
                                                    value="{{ isset($o->email) ? $o->email : old('email') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="column is-12">
                                        <div class="field">
                                            <div class="control">
                                                <input name="phone" type="text" class="input"
                                                    placeholder="Su teléfono"
                                                    value="{{ isset($o->phone) ? $o->phone : old('phone') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-12">
                                        <div class="field">
                                            <div class="control">

                                                <select class="input" name="charge" id="charge">
                                                    @foreach ($charges as $item)
                                                        @if ($item->id == $o->charge)
                                                            <option value="{{ $item->id }}" selected>
                                                                {{ $item->name }}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-12">
                                        <div class="field">
                                            <div class="control">
                                                <select class="input" name="charge" id="charge">
                                                    @foreach ($documents_type as $item)
                                                        @if ($item == $o->document_type)
                                                            <option value="{{ $item }}" selected>
                                                                {{ $item }}</option>
                                                        @else
                                                            <option value="{{ $item }}">{{ $item }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="column is-12">
                                            <div class="field">
                                                <div class="control">
                                                    <input name="document_number" type="text" class="input"
                                                        placeholder="Número de documento"
                                                        value="{{ isset($o->document_number) ? $o->document_number : old('document_number') }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php if(Auth::user()->role_cass == 'Medico'){ ?>
                                <hr>
                                <!--Fieldset-->
                                <div class="fieldset">
                                    <div class="fieldset-heading">
                                        <h4>Información profesional</h4>
                                        <p>Actualiza la información profesional</p>
                                    </div>
                                    <div class="columns is-multiline">
                                        <!--Field-->
                                        <div class="column is-12">
                                            <div class="field">
                                                <div class="control">
                                                    <label>Especialidad</label>
                                                    <?php $t_att = 'specialty'; ?>
                                                    <select name="<?= $t_att ?>" class="input">
                                                        <option value="0" selected disabled>--Seleccione--</option>
                                                        <?php foreach($o_specialties as $key => $row){ ?>
                                                        <option value="<?= $row->id ?>"
                                                            <?= (isset($o->$t_att) and $o->$t_att == $row->id) ? 'selected' : '' ?>>
                                                            <?= $row->name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Field-->
                                        <div class="column is-12">
                                            <div class="field">
                                                <div class="control">
                                                    <label>Tarjeta profesional</label>
                                                    <input name="professional_card" type="text" class="input"
                                                        placeholder="Tarjeta profesional"
                                                        value="{{ isset($o->professional_card) ? $o->professional_card : old('professional_card') }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Field-->
                                        <div class="column is-12">
                                            <div class="field">
                                                <div class="control">
                                                    <label>Firma</label>
                                                    <input name="signature" type="file" class="input">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php } ?>
                                <!--Fieldset-->
                                <div class="fieldset">
                                    <div class="fieldset-heading">
                                        <h4>Cambia la contraseña</h4>
                                        <p>Para mejorar la seguridad de la cuenta</p>
                                    </div>
                                    <div class="columns is-multiline">
                                        <!--Field-->
                                        <div class="column is-12">
                                            <div class="field">
                                                <div class="control has-icon">
                                                    <input name="password" type="password" class="input"
                                                        placeholder="Contraseña" required>
                                                    <div class="form-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-lock">
                                                            <rect x="3" y="11" width="18" height="11"
                                                                rx="2" ry="2"></rect>
                                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Fieldset-->
                                <div class="fieldset">
                                    <div class="fieldset-heading">
                                        <h4>Autenticación de 2 factores</h4>
                                        <p>Habilitar o deshabilitar la autenticación de 2 factores</p>
                                    </div>
                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="field">
                                                <div class="control has-icon">
                                                    <div class="switch-block no-padding-all">
                                                        <label class="form-switch is-primary">
                                                            <input name="twofa" type="checkbox" class="is-switch"
                                                                value="yes"
                                                                <?= (isset($o->twofa) and $o->twofa == 'yes') ? 'checked' : '' ?>>
                                                            <i></i>
                                                        </label>
                                                        <div class="text">
                                                            <span>Habilitar / deshabilitar autenticación de 2
                                                                factores</span>
                                                        </div>
                                                    </div>
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

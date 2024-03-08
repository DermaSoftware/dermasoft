@extends('layouts.app')
@section('content')
    <div class="account-wrapper">
        <div class="columns">
            <div class="column is-12">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            {{ $title }}
                        </p>
                        <a href="{{ url($menu) }}" class="button h-button is-light is-dark-outlined">
                            <span class="icon"><i class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                        </a>
                    </header>
                    <div class="card-content">
                        <div class="block">
                            <b>Asunto:</b> {{ $obj->subject }}
                        </div>
                        <div class="block">
                            <b>Enviado a:</b>{{ $obj->sel_users }}
                        </div>
                        <div class="block">
                            <form action="">
                                <textarea id="sun-editorx" class="textarea" rows="12" readonly>{{ $obj->msj }}</textarea>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

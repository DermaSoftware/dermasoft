@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($menu.'/'.$o->uuid)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			{{method_field('PATCH')}}
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>{{$title}}</h3>
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
                                <button type="submit" class="button h-button is-primary is-raised">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <!--Fieldset-->
                    <div class="fieldset">
                        <div class="fieldset-heading">
                            <h4>Complete los campos requeridos</h4>
                            <p></p>
                        </div>
                        <div class="columns is-multiline">
                            @include($v_name.'.form',['modo' => 'editar'])
                        </div>
                    </div>
                </div>
            </div>
			</form>
        </div>
    </div>
</div>
@endsection
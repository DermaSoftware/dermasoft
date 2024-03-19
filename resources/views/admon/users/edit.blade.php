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
                    <div class="fieldsetx">
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
@section('js')
    @parent
    <script>
        $(document).ready(function(){
            const rol = document.querySelector('select[name="role"]');

            var op = rol.options[rol.selectedIndex];
            var field_espec = document.querySelector('select[name="specialty"]');
            var signature = document.querySelector('input[name="signature"]');
            var professional_card = document.querySelector('input[name="professional_card"]');
            if(op.text !== "Medico"){
                debugger
                field_espec.setAttribute('disabled',false);
                signature.setAttribute('disabled',false);
                professional_card.setAttribute('disabled',false);
            }
            else{

                field_espec.removeAttribute('disabled');
                signature.removeAttribute('disabled');
                professional_card.removeAttribute('disabled');
            }
            rol.addEventListener('change',function(){
                op = rol.options[rol.selectedIndex];
                if(op.text !== "Medico"){
                    debugger
                    field_espec.setAttribute('disabled',false);
                    signature.setAttribute('disabled',false);
                    professional_card.setAttribute('disabled',false);
                }
                else{

                    field_espec.removeAttribute('disabled');
                    signature.removeAttribute('disabled');
                    professional_card.removeAttribute('disabled');
                }
            });
        });
    </script>
@endsection

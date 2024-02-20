@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form disabled action="{{url($menu.'/'.$o->uuid)}}" method="post" enctype="multipart/form-data">
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
                            @include($menu.'.form',['modo' => 'detalles'])
                        </div>
                    </div>
                </div>
            </div>
			</form>
        </div>
    </div>
</div>

<hr>

<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
		<div class="demo-card no-margin-bottom">
            <div class="card-head">
                <div class="left">
                    <h3 class="title is-thin is-5">Suscripciones</h3>
                </div>
                <div class="right">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="s-card">
    <table class="o_stable_fsc table display compact is-fullwidth" style="width:100%">
        <thead>
			<tr>
				<th>#</th>
				<th>Usuario</th>
                <th>Plan</th>
                <th>Factura</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Expira</th>
                <th>Estado</th>
			</tr>
        </thead>
        <tbody>
        <?php foreach($o_all as $key => $row){ ?>
		<tr id="<?= $row->uuid ?>">
            <td><?= $key+1 ?></td>
			<td><?= $row->getUser() ?></td>
			<td><?= $row->getPlan() ?></td>
			<td><?= $row->invoice ?></td>
			<td><?= $row->amount ?></td>
			<td><?= $row->date_init ?></td>
			<td><?= $row->expiration ?></td>
			<td><span class="tag is-<?= $row->status == 'active'?'success':'warning' ?> is-rounded"><?= $row->status == 'active'?'Pagado':'Pendiente' ?></span></td>
        </tr>
		<?php } ?>
		</tbody>
	</table>
</div>

@endsection
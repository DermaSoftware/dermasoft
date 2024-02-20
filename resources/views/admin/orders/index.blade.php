@extends('layouts.app')
@section('content')
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
		<div class="demo-card no-margin-bottom">
            <div class="card-head">
                <div class="left">
                    <h3 class="title is-thin is-5">{{$title}}</h3>
                </div>
                <div class="right">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('trash')
<div class="s-card">
    <table class="o_stable_fsc table display compact is-fullwidth" style="width:100%">
        <thead>
			<tr>
				<th>#</th>
                <th>Plan</th>
                <th>Empresa</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Estado</th>
			</tr>
        </thead>
        <tbody>
        <?php foreach($o_all as $key => $row){ ?>
		<tr id="<?= $row->uuid ?>">
            <td><?= $key+1 ?></td>
			<td><?= $row->getPlan() ?></td>
			<td><?= $row->getCompany() ?></td>
			<td><?= $row->amount ?></td>
			<td><?= $row->created_at ?></td>
			<td>
			<?php if($row->status == 'Completado'){ ?>
			<span class="tag is-<?= $row->status == 'Completado'?'success':'warning' ?> is-rounded"><?= $row->status ?></span>
			<?php } else { ?>
			<a href="<?= url($menu.'/'.$row->uuid) ?>"><span class="tag is-warning is-rounded">Re-enviar pago</span></a>
			<?php } ?>
			</td>
        </tr>
		<?php } ?>
		</tbody>
	</table>
</div>
@endsection
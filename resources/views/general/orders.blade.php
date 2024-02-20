@extends('layouts.app')
@section('content')
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
        <div class="demo-card has-more-margin">
            <div class="demo-title">
				<div class="form-head stuck-header">
					<div class="form-head-inner">
						<h3 class="title is-thin is-5">{{$title}}</h3>
					</div>
				</div>
            </div>
        </div>
        <div class="flex-table">
            <!--Table header-->
            <div class="flex-table-header">
				<span>#</span>
                <span>Plan</span>
                <span>Empresa</span>
                <span>Monto</span>
                <span>Fecha</span>
                <span>Estado</span>
            </div>
			<?php foreach($o_all as $key => $row){ ?>
            <!--Table item-->
            <div class="flex-table-item">
                <div class="flex-table-cell is-bold" data-th="Company">
                    <span class="dark-text"><?= $key+1 ?></span>
                </div>
				
				<div class="flex-table-cell" data-th="plan"><span class="light-text"><?= $row->getPlan() ?></span></div>
				<div class="flex-table-cell" data-th="company"><span class="light-text"><?= $row->getCompany() ?></span></div>
				<div class="flex-table-cell" data-th="amount"><span class="light-text money_to_fsc"><?= $row->amount ?></span></div>
				<div class="flex-table-cell" data-th="createdat"><span class="light-text"><?= $row->created_at ?></span></div>
				<div class="flex-table-cell" data-th="status">
					<?php if($row->status == 'Completado'){ ?>
					<span class="tag is-<?= $row->status == 'Completado'?'success':'warning' ?> is-rounded"><?= $row->status ?></span>
					<?php } else { ?>
					<a target="_blank" href="<?= url('payext/'.$row->uuid) ?>"><span class="tag is-warning is-rounded">Ir al pago</span></a>
					<?php } ?>
				</div>
            </div>
			<?php } ?>
        </div>
        <!--Table Pagination-->
    </div>
</div>
@endsection
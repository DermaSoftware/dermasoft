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
                <span>Factura</span>
                <span>Monto</span>
                <span>Fecha</span>
                <span>Expira</span>
                <span>Estado</span>
            </div>
			<?php foreach($o_all as $key => $row){ ?>
            <!--Table item-->
            <div class="flex-table-item">
                <div class="flex-table-cell is-bold" data-th="Company">
                    <span class="dark-text"><?= $key+1 ?></span>
                </div>
				
				<div class="flex-table-cell" data-th="plan"><span class="light-text"><?= $row->getPlan() ?></span></div>
				<div class="flex-table-cell" data-th="invoice"><span class="light-text"><?= $row->invoice ?></span></div>
				<div class="flex-table-cell" data-th="amount"><span class="light-text xmoney_to_fsc"><?= $row->amount ?></span></div>
				<div class="flex-table-cell" data-th="date_init"><span class="light-text"><?= $row->date_init ?></span></div>
				<div class="flex-table-cell" data-th="expiration"><span class="light-text"><?= $row->expiration ?></span></div>
				<div class="flex-table-cell" data-th="status"><span class="tag is-<?= $row->status == 'active'?'success':'warning' ?> is-rounded"><?= $row->status == 'active'?'Pagado':'Pendiente' ?></span></div>
            </div>
			<?php } ?>
        </div>
        <!--Table Pagination-->
    </div>
</div>
@endsection
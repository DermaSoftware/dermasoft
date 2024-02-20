@extends('layouts.app')
@section('content')
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
        <div class="demo-card has-more-margin">
            <div class="demo-title">
				<div class="form-head stuck-header">
					<div class="form-head-inner">
						<div class="left"><h3 class="title is-thin is-5">Mis tickets de soporte</h3></div>
						<div class="right">
							<a href="<?= url($menu.'/create') ?>" class="button h-button is-success is-rounded is-elevated">
								<span class="icon"><i class="fas fa-plus"></i></span>
								<span>Nuevo ticket</span>
							</a>
						</div>
					</div>
				</div>
            </div>
        </div>
        <div class="flex-table">
            <!--Table header-->
            <div class="flex-table-header">
				<span>#</span>
                <span>Asunto</span>
                <span>Fecha</span>
                <span>Estado</span>
                <span class="cell-end">Acciones</span>
            </div>
			<?php foreach($o_all as $key => $row){ ?>
            <!--Table item-->
            <div class="flex-table-item">
                <div class="flex-table-cell is-bold" data-th="Company">
                    <span class="dark-text"><?= $key+1 ?></span>
                </div>
                <div class="flex-table-cell" data-th="Title">
                    <span class="light-text"><?= $row->title ?></span>
                </div>
                <div class="flex-table-cell" data-th="Dateinit">
                    <span class="light-text"><?= $row->date_init ?></span>
                </div>
                <div class="flex-table-cell" data-th="Status">
                    <span class="tag is-<?= $row->status == 'active'?'success':'warning' ?> is-rounded"><?= $row->status ?></span>
                </div>
				<div class="flex-table-cell cell-end" data-th="Actions">
                    <div class="dropdown is-spaced is-dots is-right dropdown-trigger is-pushed-mobile is-up">
                        <div class="is-trigger" aria-haspopup="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="<?= url($menu.'/'.$row->id) ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-eye"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Ver</span>
                                        <span>Ver detalles del ticket</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
			<?php } ?>
        </div>
        <!--Table Pagination-->
        <!--<nav class="flex-pagination pagination is-rounded" aria-label="pagination">
            <a class="pagination-previous">Previous</a>
            <a class="pagination-next">Next</a>
            <ul class="pagination-list">
                <li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
                <li><span class="pagination-ellipsis">&hellip;</span></li>
                <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
                <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
                <li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
                <li><span class="pagination-ellipsis">&hellip;</span></li>
                <li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
            </ul>
        </nav>-->
    </div>
</div>
@endsection
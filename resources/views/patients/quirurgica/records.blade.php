@extends('layouts.app')
@section('content')
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
        <div class="demo-card has-more-margin">
            <div class="demo-title">
				<div class="form-head stuck-header">
					<div class="form-head-inner">
						<h3 class="title is-thin is-5">Historial de consultas <a target="_blank" href="<?= url($menu.'/records') ?>" class="button h-button is-primary is-rounded is-elevated" style="float: right;"><span class="icon"><i class="fas fa-download"></i></span> <span>Descargar historial</span></a></h3>
					</div>
				</div>
            </div>
        </div>
        <div class="flex-table">
            <!--Table header-->
            <div class="flex-table-header">
				<span>#</span>
                <span>Fecha de consulta</span>
                <span>Tipo de consulta</span>
                <span>Medico que atendió</span>
                <span>Sede</span>
                <span class="cell-end">Ver HC</span>
            </div>
			<?php foreach($o_all as $key => $row){ ?>
            <!--Table item-->
            <div class="flex-table-item">
                <div class="flex-table-cell is-bold" data-th="Company">
                    <span class="dark-text"><?= $key+1 ?></span>
                </div>
				<div class="flex-table-cell" data-th="created_at">
                    <span class="light-text"><?= $row->created_at ?></span>
                </div>
				<div class="flex-table-cell" data-th="external_cause">
                    <span class="light-text"><?= $row->external_cause ?></span>
                </div>
				<div class="flex-table-cell" data-th="doctor">
                    <span class="light-text"><?= $row->getDoctor() ?></span>
                </div>
				<div class="flex-table-cell" data-th="campus">
                    <span class="light-text"><?= $row->getCampus() ?></span>
                </div>
				<div class="flex-table-cell cell-end" data-th="Actions">
                    <div class="dropdown is-spaced is-dots is-right dropdown-trigger is-pushed-mobile is-up">
                        <div class="is-trigger" aria-haspopup="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a target="_blank" href="<?= url($menu.'/hcpdf/'.$row->uuid) ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-eye"></i>
                                    </div>
                                    <div class="meta">
                                        <span>PDF</span>
                                        <span>Ver HC</span>
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
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<form class="delete-form-fsc is-hidden" data-msj="<?php echo $tag_the.' '. strtolower($c_name) .' ha sido eliminad'. $tag_o .' correctamente.'; ?>">
{{csrf_field()}}
{{method_field('DELETE')}}
</form>
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
        <div class="demo-card has-more-margin">
            <div class="demo-title">
				<div class="form-head stuck-header">
					<div class="form-head-inner">
						<h3 class="title is-thin is-5">{{$title}} <a href="<?= url($menu.'/create') ?>" class="button h-button is-success is-rounded is-elevated" style="float: right;"><span class="icon"><i class="fas fa-plus"></i></span> <span>Crear <?= $c_name ?></span></a> <a href="<?= url($menu) ?>" class="button h-button is-primary is-rounded is-elevated" style="float: right;margin-right: 10px;"><span class="icon"><i class="fas fa-backspace"></i></span> <span>REGRESAR</span></a></h3>
					</div>
				</div>
            </div>
        </div>
        <div class="flex-table">
            <!--Table header-->
            <div class="flex-table-header">
				<span>#</span>
                <?php foreach($list_tbl_fsc as $key => $row){ ?>
				<span><?= $row ?></span>
				<?php } ?>
                <span class="cell-end">Acciones</span>
            </div>
			<?php foreach($o_all as $key => $row){ ?>
            <!--Table item-->
            <div class="flex-table-item">
                <div class="flex-table-cell is-bold" data-th="Company">
                    <span class="dark-text"><?= $key+1 ?></span>
                </div>
				<?php foreach($list_tbl_fsc as $keyx => $rowx){ ?>
				<?php if($keyx == 'name'){ ?>
				<div class="flex-table-cell" data-th="<?= $keyx ?>">
                    <span class="light-text"><?= $row->name ?> <?= $row->scd_name ?> <?= $row->lastname ?> <?= $row->scd_lastname ?></span>
                </div>
				<?php } else { ?>
				<div class="flex-table-cell" data-th="<?= $keyx ?>">
                    <span class="light-text"><?= $row->$keyx ?></span>
                </div>
				<?php } ?>
				<?php } ?>
				<div class="flex-table-cell cell-end" data-th="Actions">
                    <div class="dropdown is-spaced is-dots is-right dropdown-trigger is-pushed-mobile is-up">
                        <div class="is-trigger" aria-haspopup="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="<?= url($menu.'/'.$row->uuid.'/edit') ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-pencil-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Editar</span>
                                        <span>Modificar</span>
                                    </div>
                                </a>
								<a href="<?= url($menu.'/'.$row->uuid) ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-calender-alt-3"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Agendar</span>
                                        <span>Consulta</span>
                                    </div>
                                </a>
								<a href="<?= url($menu.'/suppdata/'.$row->uuid) ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-save-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Registrar</span>
                                        <span>Datos secundarios</span>
                                    </div>
                                </a>
								<a target="_blank" href="<?= url($menu.'/hdpdf/'.$row->uuid) ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-file-protection"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Habeas</span>
                                        <span>Data del paciente</span>
                                    </div>
                                </a>
								<a href="<?= url($menu.'/vitalsigns/'.$row->uuid) ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-hospital-sign"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Registrar</span>
                                        <span>Signos vitales</span>
                                    </div>
                                </a>
								<a href="<?= url($menu.'/gallery/'.$row->uuid) ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-image"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Registros</span>
                                        <span>Fotográficos</span>
                                    </div>
                                </a>
								<hr class="dropdown-divider">
                                <a href="javascript:void(0)" data-href="<?= url($menu.'/'.$row->uuid) ?>" data-itemtag="<?= $tag_the ?>" data-itemselect="<?= $tag_o ?>" data-nameitem="<?= $c_name ?>" class="dropdown-item is-media bg-danger text-fade-grey btn-delete-confirm">
                                    <div class="icon">
                                        <i class="lnil lnil-trash-can-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Eliminar</span>
                                        <span>Eliminar  <?= $tag_the ?> <?= $c_name ?></span>
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
        @include('layouts.pagination')
    </div>
</div>
@endsection
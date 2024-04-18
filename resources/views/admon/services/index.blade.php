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
                    <a href="<?= url($menu.'/create') ?>" class="button h-button is-success is-rounded is-elevated m-r-10"><span class="icon"><i class="fas fa-plus"></i></span> <span>Crear <?= $c_name ?></span></a>
					
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
				<?php foreach($list_tbl_fsc as $key => $row){ ?>
				<th><?= $row ?></th>
				<?php } ?>
				<th class="is-end no-sort"></th>
			</tr>
        </thead>
        <tbody>
        <?php foreach($o_all as $key => $row){ ?>
		<tr id="<?= $row->uuid ?>">
            <td><?= $key+1 ?></td>
			<?php foreach($list_tbl_fsc as $keyx => $rowx){ ?>
			<?php if($keyx == 'category'){ ?>
			<td><?= $row->category()->first()->name ?></td>
			<?php } else { ?>
			<td><?= $row->$keyx ?></td>
			<?php } ?>
			<?php } ?>
            <td class="is-end">
                <div>
                    <div class="dropdown is-spaced is-dots is-right dropdown-trigger is-pushed-mobile is-up">
                        <div class="is-trigger" aria-haspopup="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="<?= url($menu.'/'.$row->uuid.'/edit') ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-eye"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Editar</span>
                                        <span>Modificar  <?= $tag_the ?> <?= $c_name ?></span>
                                    </div>
                                </a>
								<hr class="dropdown-divider">
                                <a id="<?= $row->uuid ?>" href="javascript:void(0)" data-href="<?= url($menu.'/'.$row->uuid) ?>" data-itemtag="<?= $tag_the ?>" data-itemselect="<?= $tag_o ?>" data-nameitem="<?= $c_name ?>" class="dropdown-item is-media bg-danger text-fade-grey btn-delete-confirm-x">
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
            </td>
        </tr>
		<?php } ?>
		</tbody>
	</table>
</div>
@endsection
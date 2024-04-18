@extends('layouts.admin')
@section('content')
	<div class="row mb-3">
		<div class="col-12 d-sm-flex justify-content-between align-items-center">
			<h1 class="h3 mb-2 mb-sm-0">{{$title}}</h1>
			<a href="{{url($menu.'/create')}}" class="btn btn-sm btn-primary mb-0 text-uppercase">Crear <?= $c_name ?></a>
		</div>
	</div>
	<div class="card bg-transparent border">
		<div class="card-body">
			<form class="delete-form-fsc d-none" data-msj="<?php echo $tag_the.' '. $c_name .' ha sido eliminad'. $tag_o .' correctamente.'; ?>">
			{{csrf_field()}}
			{{method_field('DELETE')}}
			</form>
			<div class="table-responsive border-0 rounded-3">
				<table class="o_table_fsc table table-dark-gray align-middle p-4 mb-0 table-hover">
					<thead>
						<tr>
							<th scope="col" class="border-0 rounded-start">#</th>
							<?php foreach($list_tbl_fsc as $key => $row){ ?>
							<th scope="col" class="border-0"><?= $row ?></th>
							<?php } ?>
							<th scope="col" class="border-0 rounded-end no-sort text-center"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($o_all as $key => $row){ ?>
						<tr>
							<td><?= $key+1 ?></td>
							<?php foreach($list_tbl_fsc as $keyx => $rowx){ ?>
							<td><?= $row->$keyx ?></td>
							<?php } ?>
							<td class="text-center">
								<a href="<?= url($menu.'/'.$row->id.'/edit') ?>" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit fa-fw"></i></a>
								<a href="javascript:void(0)" data-href="<?= url($menu.'/'.$row->id) ?>" data-itemtag="<?= $tag_the ?>" data-itemselect="<?= $tag_o ?>" data-nameitem="<?= $c_name ?>" class="btn btn-sm btn-danger btn-delete-confirm"><i class="fas fa-trash fa-fw"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- Card body END -->
		@include('layouts.pagination')
	</div>
@endsection
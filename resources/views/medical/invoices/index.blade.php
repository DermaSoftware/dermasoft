@extends('layouts.app')
@section('content')
<div class="columns">
    <div class="column is-12">
        <!--Flex Table-->
		<div class="demo-card no-margin-bottom">
            <div class="card-head">
                <div class="left">
                    <h3 class="title is-thin is-5">Historial de <?= $c_names ?></h3>
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
				<th>Paciente</th>
				<th>Fecha</th>
				<th>Médico</th>
				<th>Total</th>
				<th>Estado</th>
				<th class="is-end no-sort"></th>
			</tr>
        </thead>
        <tbody>
        <?php foreach($o_all as $key => $row){ ?>
		<tr id="<?= $row->uuid ?>">
            <td><?= $key+1 ?></td>
			<?php $pac = $row->user()->first(); ?>
			<?php $full_name = $pac->name; ?>
			<?php $full_name .= empty($pac->scd_name)?'':' '.$pac->scd_name; ?>
			<?php $full_name .= ' '.$pac->lastname; ?>
			<?php $full_name .= ' '.$pac->scd_lastname; ?>
			<td><?= $full_name ?></td>
			<td><?= $row->created_at ?></td>
			<td><?= $row->getDoctor() ?></td>
			<td><?= $row->amount ?></td>
			<td><?= $row->state ?></td>
            <td class="is-end">
                <div>
                    <div class="dropdown is-spaced is-dots is-right dropdown-trigger is-pushed-mobile is-up">
                        <div class="is-trigger" aria-haspopup="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">

                                <?php if($row->state == 'COTIZACIÓN'){ ?>
                                <a href="<?= url($hc_view.'/edit/'.$row->uuid) ?>" class="dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-check-box"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Editar</span>
                                            <span>Cotización</span>
                                        </div>
                                </a>
								<a href="<?= url($hc_view.'/facend/'.$row->uuid) ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-check-box"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Aprobar</span>
                                        <span>Cotización</span>
                                    </div>
                                </a>
								<?php } ?>
								<hr class="dropdown-divider">
								<a target="_blank" href="<?= url($hc_view.'/facpdf/'.$row->uuid) ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-eye"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Ver</span>
                                        <span>PDF</span>
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

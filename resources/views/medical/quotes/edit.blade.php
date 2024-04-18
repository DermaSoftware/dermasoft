@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($hc_view.'/edit/'.$o_fac->uuid)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3><?= $c_name ?> - Paciente No. <?= $o->document_number ?> <small>(Factura: <?= $o_fac->uuid ?>)</small></h3>
                        </div>
                        <div class="right">
                            <div class="buttons">
                                <a href="{{url($hc_view.'/list/'.$o->uuid)}}" class="button h-button is-light is-dark-outlined">
                                    <span class="icon"><i class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    
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
					
					<div class="columns is-multiline">
						
						<div class="column is-12">
							<div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
								<h4 class="title is-5 is-narrow">Productos</h4>
								<table class="filter_table_fsc table is-hoverable is-fullwidth display compact" style="width:100%">
									<thead>
										<tr>
											<th>Categoría</th>
											<th>Sub-Categoría</th>
											<th>Código</th>
											<th>Producto</th>
											<th>Precio</th>
											<th>U/disponibles</th>
											<th class="is-end">
												<div class="dark-inverted">
													Eliminar
												</div>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($o_pds as $key_sel => $row_sel){ ?>
										<tr>
											<td><?= $row_sel->category()->first()->name ?></td>
											<td><?= $row_sel->subcategory()->first()->name ?></td>
											<td><?= $row_sel->code ?></td>
											<td><?= $row_sel->name ?></td>
											<td><?= $row_sel->price ?></td>
											<td><?= $row_sel->amount ?></td>
											<td class="is-end">
												<div class="dark-inverted">
													<button data-type="product" data-iditem="<?= $row_sel->uuid ?>" type="button" class="button is-primary is-circle is-elevated btn_ad_ppd_sv"><span class="icon is-small"><i data-feather="plus"></i></span></button>
												</div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						
						<div class="column is-12">
							<div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
								<h4 class="title is-5 is-narrow">Servicios</h4>
								<table class="filter_table_fsc table is-hoverable is-fullwidth display" style="width:100%">
									<thead>
										<tr>
											<th>Categoría</th>
											<th>Código</th>
											<th>Servicio</th>
											<th>Precio</th>
											<th class="is-end">
												<div class="dark-inverted">
													Eliminar
												</div>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($o_svs as $key_sel => $row_sel){ ?>
										<tr>
											<td><?= $row_sel->category()->first()->name ?></td>
											<td><?= $row_sel->code ?></td>
											<td><?= $row_sel->name ?></td>
											<td><?= $row_sel->price ?></td>
											<td class="is-end">
												<div class="dark-inverted">
													<button data-type="service" data-iditem="<?= $row_sel->uuid ?>" type="button" class="button is-primary is-circle is-elevated btn_ad_ppd_sv"><span class="icon is-small"><i data-feather="plus"></i></span></button>
												</div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						
						<div class="column is-12 inner_table_prods_svs">
							<div class="s-card" style="margin-top: 20px;max-height: 400px;overflow: auto;">
								<h4 class="title is-5 is-narrow">Productos y/o servicios seleccionados</h4>
								<table class="table is-hoverable is-fullwidth table_prods_svs" data-url="<?= url('quotes/getitem') ?>">
									<thead>
										<tr>
											<th>Código</th>
											<th>Producto y/o servicio</th>
											<th>Precio</th>
											<th>Cantidad</th>
											<th>Total</th>
											<th class="is-end">
												<div class="dark-inverted">
													Eliminar
												</div>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($all_items as $key_sel => $row_sel){ ?>
										<tr>
											<td><?= $row_sel->getProduct()->code ?></td>
											<td><?= $row_sel->getProduct()->name ?></td>
											<td><?= $row_sel->price ?></td>
											<td><?= $row_sel->amount ?></td>
											<td><?= $row_sel->total ?></td>
											<td class="is-end">
												<div class="dark-inverted">
													<button data-msj="Producto eliminado correctamente" data-url="<?= url('quotes/delprods/'.$row_sel->uuid) ?>" type="button" class="button is-warning is-circle is-elevated btn_delete_ppd_sv"><span class="icon is-small"><i data-feather="trash"></i></span></button>
												</div>
											</td>
										</tr>
										<?php } ?>
										<?php foreach($all_servs as $key_sel => $row_sel){ ?>
										<tr>
											<td><?= $row_sel->getService()->code ?></td>
											<td><?= $row_sel->getService()->name ?></td>
											<td><?= $row_sel->price ?></td>
											<td><?= $row_sel->amount ?></td>
											<td><?= $row_sel->total ?></td>
											<td class="is-end">
												<div class="dark-inverted">
													<button data-msj="Servicio eliminado correctamente" data-url="<?= url('quotes/delservs/'.$row_sel->uuid) ?>" type="button" class="button is-warning is-circle is-elevated btn_delete_ppd_sv"><span class="icon is-small"><i data-feather="trash"></i></span></button>
												</div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="column is-12">
							<h6>Total <span class="amount_total"><?= $o_fac->amount ?></span></h6>
							<hr>
						</div>
						
						<div class="column is-12">
							<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="notification_email" type="checkbox" value="yes"><span></span> Enviar al correo del paciente</label></div></div>
							<div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="notification_whatsapp" type="checkbox" value="yes"><span></span> Enviar al whatsapp del paciente</label></div></div>
						</div>
						
					</div>
					<hr>
					<div style="width: 100%;text-align: right;padding: 10px;"><button type="submit" class="button h-button is-primary is-raised">Guardar</button></div>
					
                </div>
            </div>
			</form>
        </div>
    </div>
</div>
@endsection
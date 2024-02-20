<!doctype html>
<html lang="es">
  <head>
    <title>Dermasoft</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="<?= public_path('assets/img/favicon.png') ?>" />
	<link rel="stylesheet" href="<?= public_path('assets/css/kv-mpdf-bootstrap.css') ?>">
  </head>
  <body>
    
	<h2 style="text-align: center;margin: 0;padding: 0;"><img src="<?= $logo ?>" alt="logo" style="display:inline;width: 100%;height: auto;max-width: 90px;float: left;" /><img src="<?= $photo ?>" class="img-thumbnail" alt="Foto" style="display:inline;width: 100%;height: auto;max-width: 90px;float: right;" /> <small><br>COTIZACIÓN DE PRODUCTOS Y/O SERVICIOS</small></h2>
	<h6 style="clear: both;">&nbsp;</h6>
	<?php setlocale(LC_TIME, 'spanish'); ?>
	<?php //$fechaaux = date('Y-m-d'); ?>
	<?php $fechaaux = $o_obj_item->created_at; ?>
	<?php $date_hc = strftime('%d de %B del %Y', strtotime($fechaaux)); ?>
	<h4 style="font-weight: normal;"><b><u>Fecha:</u></b> <?= $date_hc ?></h4>
	
	<h3>Información del paciente</h3>
	<p><b>Nombre:</b> <?= $full_name ?></p>
	<p><b>Tipo de documento:</b> <?= $o->document_type ?></p>
	<p><b>Número de documento:</b> <?= $o->document_number ?></p>
	<p><b>Teléfono celular:</b> <?= $o->fix_phone ?> <?= $o->phone ?></p>
	<p><b>Correo electrónico:</b> <?= $o->email ?></p>
	<p><b>Fecha de nacimiento:</b> <?= $o->birth ?></p>
	<p><b>Género:</b> <?= $o->gender ?></p>
	
	<h4>Lista de productos y/o servicios</h4>
	<table class="table table-striped">
        <thead>
			<tr>
				<th>Código</th>
				<th>Producto y/o servicio</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Total</th>
			</tr>
		</thead>
        <tbody>
			<?php foreach($all_items as $hkey => $hrow){ ?>
			<?php $xitem = $hrow->getProduct(); ?>
			<tr>
				<td><?= $xitem->code ?></td>
				<td><?= $xitem->name ?></td>
				<td><?= $hrow->price ?></td>
				<td><?= $hrow->amount ?></td>
				<td><?= $hrow->total ?></td>
			</tr>
			<?php } ?>
			<?php foreach($all_servs as $hkey => $hrow){ ?>
			<?php $xitem = $hrow->getService(); ?>
			<tr>
				<td><?= $xitem->code ?></td>
				<td><?= $xitem->name ?></td>
				<td><?= $hrow->price ?></td>
				<td><?= $hrow->amount ?></td>
				<td><?= $hrow->total ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
	<p><b>Total:</b> <?= $o_obj_item->amount ?></p>
	
	<h4 style="font-weight: bold;">Médico</h4>
	<h5 style="font-weight: normal;"><b><u>Doctor(a):</u></b> <?= $dfull_name ?></h5>
	<h5 style="font-weight: normal;"><b><u>Especialidad:</u></b> <?= (!empty($o_doctor->specialty) AND $o_doctor->specialty > 0)?$o_doctor->getSpecialty():'' ?></h5>
	<h5 style="font-weight: normal;"><b><u>Tarjeta profesional:</u></b> <?= !empty($o_doctor->professional_card)?$o_doctor->professional_card:'' ?> <img src="<?= $signature ?>" alt="signature" style="display:inline;width: 100%;height: auto;max-width: 200px;float: right;" /></h5>
	<p style="font-weight: normal;text-align: right;">Firma del doctor(a)</p>
	
  </body>
</html>
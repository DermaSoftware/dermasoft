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

    <h2 style="text-align: center;margin: 0;padding: 0;"><img src="<?= $logo ?>" alt="logo" style="display:inline;width: 100%;height: auto;max-width: 90px;float: left;" /><img src="<?= $photo ?>" class="img-thumbnail" alt="Foto" style="display:inline;width: 100%;height: auto;max-width: 90px;float: right;" /> <small><br>SOLICITUD DE PROCEDIMIENTOS</small></h2>

	<h6 style="clear: both;">&nbsp;</h6>

	<h3>Información del paciente</h3>

	<p><b>Nombre:</b> <?= $full_name ?></p>

	<p><b>Tipo de documento:</b> <?= $o->document_type ?></p>

	<p><b>Número de documento:</b> <?= $o->document_number ?></p>

	<p><b>Teléfono celular:</b> <?= $o->fix_phone ?> <?= $o->phone ?></p>

	<p><b>Correo electrónico:</b> <?= $o->email ?></p>

	<p><b>Ocupación:</b> <?= $o->occupation ?></p>

	<p><b>Fecha de nacimiento:</b> <?= $o->birth ?></p>

	<p><b>Género:</b> <?= $o->gender ?></p>



	<?php setlocale(LC_TIME, 'spanish'); ?>

	<?php foreach($arr as $akey => $arow){ ?>

	<?= $akey==0?'':'<br><hr><hr><hr><br>' ?>

	<?php $o_obj_item = $arow['o_obj_item']; ?>

	<?php $o_doctor = $arow['o_doctor']; ?>

	<?php $dfull_name = $arow['dfull_name']; ?>

	<?php $signature = $arow['signature']; ?>

	<?php $all_items = $arow['all_items']; ?>



	<?php $fechaaux = $o_obj_item->created_at; ?>

	<?php $date_hc = strftime('%d de %B del %Y', strtotime($fechaaux)); ?>

	<h3 style="text-align: center;">Prescripción médica</h3>

	<h4 style="font-weight: normal;"><b><u>Fecha:</u></b> <?= $date_hc ?></h4>

	<?php if(count($all_items) > 0){ ?>

	<br>

	<h4>solicitudes de procedimiento</h4>

	<table class="table table-striped">

        <thead>

			<tr>

				<th>Procedimiento</th>
				<th>Observaciones</th>

			</tr>

		</thead>

        <tbody>

			<?php foreach($all_items as $hkey => $hrow){ ?>

			<tr>

				<td><?= $hrow->name . '-' . $hrow->description ?></td>
				<td><?= $hrow->note ?></td>

			</tr>

			<?php } ?>

		</tbody>

	</table>

	<?php } ?>



	<h4 style="font-weight: bold;">Médico</h4>

	<h5 style="font-weight: normal;"><b><u>Doctor(a):</u></b> <?= $dfull_name ?></h5>

	<h5 style="font-weight: normal;"><b><u>Especialidad:</u></b> <?= (!empty($o_doctor->specialty) AND $o_doctor->specialty > 0)?$o_doctor->getSpecialty():'' ?></h5>

	<h5 style="font-weight: normal;"><b><u>Tarjeta profesional:</u></b> <?= !empty($o_doctor->professional_card)?$o_doctor->professional_card:'' ?> <img src="<?= $signature ?>" alt="signature" style="display:inline;width: 100%;height: auto;max-width: 200px;float: right;" /></h5>

	<p style="font-weight: normal;text-align: right;">Firma del doctor(a)</p>



	<?php } ?>



  </body>

</html>

<!doctype html>
<html lang="es">
  <head>
    <title>REGISTRO FOTOGRÁFICO - Paciente: <?= $full_name ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="<?= public_path('assets/img/favicon.png') ?>" />
	<link rel="stylesheet" href="<?= public_path('assets/css/kv-mpdf-bootstrap.css') ?>">
  </head>
  <body>
	<h2 style="text-align: center;margin: 0;padding: 0;"><img src="<?= $logo ?>" alt="logo" style="display:inline;width: 100%;height: auto;max-width: 90px;float: left;" /><img src="<?= $photo ?>" class="img-thumbnail" alt="Foto" style="display:inline;width: 100%;height: auto;max-width: 90px;float: right;" /> <small><br>REGISTRO FOTOGRÁFICO</small></h2>
	<h6 style="clear: both;">&nbsp;</h6>
	<?php setlocale(LC_TIME, 'spanish'); ?>
	<?php $fechaaux = date('Y-m-d'); ?>
	<h4 style="font-weight: normal;"><b><u>Fecha:</u></b> <?php echo strftime('%d de %B del %Y', strtotime($fechaaux)); ?></h4>
	<h4 style="font-weight: normal;"><b><u>Empresa:</u></b> <?= $company_name ?></h4>
	<h4 style="font-weight: normal;"><b><u>Paciente:</u></b> <?= $full_name ?></h4>
	<h4 style="font-weight: normal;"><b><u>Tipo de documento:</u></b> <?= !empty($o->document_type)?$o->document_type:'' ?></h4>
	<h4 style="font-weight: normal;"><b><u>Número de documento:</u></b> <?= !empty($o->document_number)?$o->document_number:'' ?></h4>
	<?php foreach($o_gallerys as $key => $row){ ?>
	<br><br>
	<img src="<?= public_path($row->photo_pp) ?>" alt="<?= $row->uuid ?>" style="display:inline;width: 100%;height: auto;max-width: 400px;" />
	<?php } ?>
  </body>
</html>
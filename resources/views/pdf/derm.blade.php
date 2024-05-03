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



	<h2 style="text-align: center;margin: 0;padding: 0;"><img src="<?= $logo ?>" alt="logo" style="display:inline;width: 100%;height: auto;max-width: 90px;float: left;" /><img src="<?= $photo ?>" class="img-thumbnail" alt="Foto" style="display:inline;width: 100%;height: auto;max-width: 90px;float: right;" /> <small><br>HC. No. <?= $o->document_number ?></small></h2>

	<h6 style="clear: both;">&nbsp;</h6>

	<?php setlocale(LC_TIME, 'spanish'); ?>

	<?php //$fechaaux = date('Y-m-d'); ?>

	<?php $fechaaux = $o_derm->created_at; ?>

	<?php $date_hc = strftime('%d de %B del %Y', strtotime($fechaaux)); ?>

	<h4 style="font-weight: normal;"><b><u>Fecha:</u></b> <?= $date_hc ?></h4>



	<br>

	<h2>Información general</h2>

	<h4>Datos personales</h4>

	<p><b>Primer nombre:</b> <?= $o->name ?></p>

	<p><b>Segundo nombre:</b> <?= $o->scd_name ?></p>

	<p><b>Primer apellido:</b> <?= $o->lastname ?></p>

	<p><b>Segundo apellido:</b> <?= $o->scd_lastname ?></p>

	<p><b>Tipo de documento:</b> <?= $o->document_type ?></p>

	<p><b>Número de documento:</b> <?= $o->document_number ?></p>

	<p><b>Teléfono celular:</b> <?= $o->fix_phone ?> <?= $o->phone ?></p>

	<p><b>Correo electrónico:</b> <?= $o->email ?></p>

	<p><b>Ocupación:</b> <?= $o->occupation ?></p>

	<p><b>Fecha de nacimiento:</b> <?= $o->birth ?></p>

	<p><b>Género:</b> <?= $o->gender ?></p>

	<p><b>Estado civil:</b> <?= $o->civil_status ?></p>

	<p><b>Dirección:</b> <?= $o->main_address ?></p>

	<p><b>Ciudad:</b> <?= $o->city ?></p>



	<h4>Datos de afiliación</h4>

	<p><b>Entidad:</b> <?= $o->eps ?></p>

	<p><b>Régimen:</b> <?= $o->regime ?></p>

	<p><b>Sucursal asignada:</b> <?= $o->getCampus() ?></p>

	<p><b>Estrato:</b> <?= $o->stratum ?></p>



	<?php if(!empty($o_vitalsigns->id)){ ?>

	<?php $x_options = ['heart_rate' => 'Frecuencia cardiaca','breathing_frequency' => 'Frecuencia respiratoria','weight' => 'Peso','blood_pressure' => 'Tensión arterial','temperature' => 'Temperatura','saturation' => 'Saturación','note' => 'Observaciones']; ?>

	<h4>Signos vitales</h4>

	<?php foreach($x_options as $key_aux => $row_aux){ ?>

	<p><b><?= $row_aux ?>:</b> <?= $o_vitalsigns->$key_aux ?></p>

	<?php } ?>

	<?php } ?>



	<br>

	<p><b>Causa externa:</b> <?= $o_derm->external_cause ?></p>

	<p><b>Finalidad consulta:</b> <?= $o_derm->consultation_purpose ?></p>



	<br>

	<h2>Anamnesis</h2>

    @foreach ($all_ann as $item)
        <div>
            <p><b>Motivo de la consulta:</b> <?= $item->reason ?></p>

            <p><b>Enfermedad actual:</b> <?= $item->current_illness ?></p>

            <p><b>Examen físico:</b> <?= $item->physical_exam ?></p>

            <p><b>Análisis y/u observaciones:</b> <?= $item->analysis ?></p>
        </div>
    @endforeach


	<br>

	<h2>Antecedentes</h2>

    @foreach ($all_back as $item)
        <div>
            <p><b>Antecedentes médicos:</b> <?= $o_derm->medical_history ?></p>

            <p><b>Antecedentes quirúrgicos:</b> <?= $o_derm->surgical_history ?></p>

            <p><b>Antecedentes alérgicos:</b> <?= $o_derm->allergic_history ?></p>

            <p><b>Antecedentes farmacológicos:</b> <?= $o_derm->drug_history ?></p>

            <p><b>Antecedentes familiares:</b> <?= $o_derm->family_history ?></p>

            <p><b>Otros antecedentes:</b> <?= $o_derm->other_history ?></p>
        </div>
    @endforeach




	<?php if(count($all_dgs) > 0){ ?>

	<br>

	<h2>Diagnósticos</h2>

	<table class="table table-striped">

        <thead>

			<tr>

				<th>Código</th>

				<th>Nombre</th>

				<th>Tipo</th>

			</tr>

		</thead>

        <tbody>

			<?php foreach($all_dgs as $hkey => $hrow){ ?>

			<tr>

				<td><?= $hrow->code ?></td>

				<td><?= $hrow->diagnostic ?></td>

				<td><?= $hrow->type_diagnostic ?></td>

			</tr>

			<?php } ?>

		</tbody>

	</table>

	<?php } ?>



	<?php if(count($all_ind) > 0){ ?>

	<br>

	<h2>Indicaciones</h2>

	<table class="table table-striped">

        <thead>

			<tr>

				<th>Indicación</th>

			</tr>

		</thead>

        <tbody>

			<?php foreach($all_ind as $hkey => $hrow){ ?>

			<tr>

				<td><?= $hrow->indication ?></td>

			</tr>

			<?php } ?>

		</tbody>

	</table>

	<?php } ?>



	<?php if(count($all_pre) > 0){ ?>

	<br>

	<h2>Prescripción médica</h2>

    @foreach ($all_pre as $item)
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Medicamento</th>

                    <th>Dosis</th>

                    <th>Frecuencia</th>

                    <th>Vía de administración</th>

                    <th>Duración (Días)</th>

                    <th>Indicaciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($item->medicines as $hrow)
                    <td><?= $hrow->medicine ?></td>

                    <td><?= $hrow->pivot->dose ?></td>

                    <td><?= $hrow->pivot->frequency ?></td>

                    <td><?= $hrow->pivot->route_administration ?></td>

                    <td><?= $hrow->pivot->duration ?></td>

                    <td><?= $hrow->pivot->indications ?></td>
                @endforeach
            </tbody>
        </table>
    @endforeach

	<?php } ?>



	<?php if(count($all_sex) > 0){ ?>

	<br>

	<h2>Solicitud de examenes</h2>

    @foreach ($all_sex as $item)
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Medicamento</th>

                    <th>Dosis</th>

                    <th>Frecuencia</th>

                    <th>Vía de administración</th>

                    <th>Duración (Días)</th>

                    <th>Indicaciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($item->laboratoryexams as $hrow)
                    <td><?= $hrow->name ?></td>

                    <td><?= $hrow->description ?></td>
                @endforeach
            </tbody>
        </table>
    @endforeach
	<?php } ?>



	<?php if(count($all_spr) > 0){ ?>

	<br>

	<h2>Solicitud de procedimientos</h2>

    @foreach ($all_spr as $item)
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Medicamento</th>

                    <th>Dosis</th>

                    <th>Frecuencia</th>

                    <th>Vía de administración</th>

                    <th>Duración (Días)</th>

                    <th>Indicaciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($item->procedures as $hrow)
                    <td><?= $hrow->name ?></td>
                    <td><?= $hrow->description ?></td>
                @endforeach
            </tbody>
        </table>
    @endforeach
	<?php } ?>
	<?php if(count($all_spa) > 0){ ?>

	<br>

	<h2>Solicitud de patalogías</h2>
    @foreach ($all_spa as $item)
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Medicamento</th>

                    <th>Dosis</th>

                    <th>Frecuencia</th>

                    <th>Vía de administración</th>

                    <th>Duración (Días)</th>

                    <th>Indicaciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($item->pathologies as $hrow)
                    <td><?= $hrow->name ?></td>
                    <td><?= $hrow->description ?></td>
                @endforeach
            </tbody>
        </table>
    @endforeach

	<?php } ?>



	<br>

	<h4 style="font-weight: normal;"><b><u>Nombre y apellidos:</u></b> <?= $full_name ?></h4>

	<h4 style="font-weight: normal;"><b><u>Tipo de documento:</u></b> <?= !empty($o->document_type)?$o->document_type:'' ?></h4>

	<h4 style="font-weight: normal;"><b><u>Número de documento:</u></b> <?= !empty($o->document_number)?$o->document_number:'' ?></h4>



	<br>

	<h4 style="font-weight: normal;"><b><u>Doctor(a):</u></b> <?= $dfull_name ?></h4>

	<h4 style="font-weight: normal;"><b><u>Especialidad:</u></b> <?= (!empty($o_doctor->specialty) AND $o_doctor->specialty > 0)?$o_doctor->getSpecialty():'' ?></h4>

	<h4 style="font-weight: normal;"><b><u>Tarjeta profesional:</u></b> <?= !empty($o_doctor->professional_card)?$o_doctor->professional_card:'' ?> <img src="<?= $signature ?>" alt="signature" style="display:inline;width: 100%;height: auto;max-width: 200px;float: right;" /></h4>

	<p style="font-weight: normal;text-align: right;">Firma del doctor(a)</p>



  </body>

</html>

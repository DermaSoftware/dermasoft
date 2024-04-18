<!doctype html>
<html lang="es">
	<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?= asset('assets/images/epayco.png') ?>" type="image/x-icon">
	<title>Epayco Response</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<style>
	.inner_count_fsc {
		position: relative;
		width: 100%;
		height: 140px;
		text-align: center;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.count_fsc {
		color: #fff;
		position: absolute;
		width: 140px;
		height: 140px;
		text-align: center;
		z-index: 2;
	}
	.box_count_fsc {
		position: absolute;
		width: 140px;
		height: 140px;
		background-color: #158a9d;
		z-index: 1;
		margin-top: -10px;
		border-radius: 50%;
	}
	</style>
	</head>
	<body>
	<div class="container">
		<div class="py-5 text-center">
			<img class="d-block mx-auto mb-3" src="<?= asset('assets/images/epayco.png') ?>" style="max-width: 100%;height: auto;" >
			<div class="bx-all-cont-nn-fss mb-5 pb-5">
				<img class="img_load_monkie d-block mx-auto mb-1" src="<?= asset('assets/images/load.gif') ?>" style="max-width: 300px;" >
				<p class="lead text-info">Pago Seguro con Epayco</p>
				<div class="inner_msj_fsc"><div class="alert alert-success" role="alert">El pago ha sido exitoso. Estamos redirigiendo a la pagina de inicio en:</div></div>
				<div class="inner_count_fsc mb-5"><span class="box_count_fsc"></span><span class="count_fsc display-1">10</span></div>
				<p class="text-danger inner_msj_warning_fsc">Espere un momento por favor mientras se procesan los datos de su pago, si usted realiza un pago por consignaci&oacute;n, puede usted cerrar esta p&aacute;gina si as&iacute; lo desea, y asegurese de recibir su tiquete o comprobante de pago en la entidad donde realice el pago, cuando la entidad realiza la confirmaci&oacute;n de su pago con nuestra plataforma, entonces se ver&aacute; reflejado su pago en el m&oacute;dulo correspondiente, esta acci&oacute;n de confirmaci&oacute;n puede tardar hasta 3 horas.</p>
				<ul class="list-group mb-5 pb-5 bx-data-pay">
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">Referencia</h6>
							<small class="text-muted"></small>
						</div>
						<span id="referencia" class="text-muted"></span>
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">Fecha</h6>
							<small class="text-muted"></small>
						</div>
						<span id="fecha" class="text-muted"></span>
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">Respuesta</h6>
							<small class="text-muted"></small>
						</div>
						<span id="respuesta" class="text-muted"></span>
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">Motivo</h6>
							<small class="text-muted"></small>
						</div>
						<span id="motivo" class="text-muted"></span>
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">Banco</h6>
							<small class="text-muted"></small>
						</div>
						<span id="banco" class="text-muted"></span>
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">Recibo</h6>
							<small class="text-muted"></small>
						</div>
						<span id="recibo" class="text-muted"></span>
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">C&oacute;digo de Aprobaci&oacute;n</h6>
							<small class="text-muted"></small>
						</div>
						<span id="approval_code" class="text-muted"></span>
					</li>
					<li class="list-group-item d-flex justify-content-between">
						<span>Total (COP)</span>
						<strong><span id="total"></span></strong>
					</li>
				</ul>
			</div>
		</div>
	</div>
		<nav class="navbar fixed-bottom navbar-light bg-light">
			<div class="container">
				<div class="py-5 text-center">
					<img class="d-block mx-auto" src="<?= asset('assets/images/epayco.jpg') ?>" style="max-width: 100%;height: auto;" >
				</div>
			</div>
		</nav>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script>
    function getQueryParam(param) {
      location.search.substr(1)
        .split("&")
        .some(function(item) {
          return item.split("=")[0] == param && (param = item.split("=")[1])
        })
      return param
    }
    $(document).ready(function() {
		$('.bx-data-pay').fadeOut();
		$('.inner_msj_fsc').fadeOut();
		$('.inner_count_fsc').fadeOut();
      var ref_payco = getQueryParam('ref_payco');
      var urlapp = "https://secure.epayco.co/validation/v1/reference/" + ref_payco;
      $.get(urlapp, function(response) {
        if (response.success) {
          if (response.data.x_cod_response == 1) {
			$('#fecha').html(response.data.x_transaction_date);
			$('#respuesta').html(response.data.x_response);
			$('#referencia').text(response.data.x_id_invoice);
			$('#motivo').text(response.data.x_response_reason_text);
			$('#recibo').text(response.data.x_transaction_id);
			$('#approval_code').text(response.data.x_approval_code);
			$('#banco').text(response.data.x_bank_name);
			$('#autorizacion').text(response.data.x_approval_code);
			$('#total').text(response.data.x_amount + ' ' + response.data.x_currency_code);
			$('.bx-data-pay').fadeIn();
			$.post("<?= url('pyconn') ?>", {
				_token: $("meta[name='csrf-token']").attr("content"),
				referencia: response.data.x_id_invoice,
				recibo: response.data.x_transaction_id,
				ref_payco: ref_payco,
				extra1: response.data.x_extra1,
				extra2: response.data.x_extra2,
				extra3: response.data.x_extra3,
				monto: response.data.x_amount,
				moneda: response.data.x_currency_code,
				respuesta: response.data.x_response,
				franchise: response.data.x_franchise
			}, function (data) {
				$('.inner_msj_warning_fsc').fadeOut();
				$('.img_load_monkie').removeClass('d-block');
				$('.img_load_monkie').fadeOut();
				$('.inner_msj_fsc').fadeIn();
				$('.inner_count_fsc').fadeIn();
				let count = 10;
				let interval = setInterval(() => {
					count--;
					const string_count = count < 10?'0'+count:count;
					$('.count_fsc').html(string_count);
					if(count <= 0){
						clearInterval(interval);
						location.href = "<?= url('finalized') ?>";
					}
				}, 1000);
			}, "html");
          }
          if (response.data.x_cod_response == 2) {
            //console.log('transacción rechazada');
			$('.bx-all-cont-nn-fss').html('<div class="alert alert-danger pt-4 pb-4" role="alert"><p class="lead m-0">Lo Sentimos!!! La transacci&oacute;n ha sido rechazada.</p></div><a href="<?php echo url('/'); ?>" class="btn btn-dark btn-xs mx-auto">Inicio</a>');
          }
          if (response.data.x_cod_response == 3) {
            //console.log('transacción pendiente');
			$('.bx-all-cont-nn-fss').html('<div class="alert alert-warning pt-4 pb-4" role="alert"><p class="lead m-0">Lo Sentimos!!! La transacci&oacute;n se encuentra pendiente, cada 10 segundos se actualizara la p&aacute;gina hasta que cambie el estado de la transacci&oacute;n, o si desea puede regresar al inicio:</p></div><a href="<?php echo url('/'); ?>" class="btn btn-dark btn-xs mx-auto">Inicio</a>');
			setInterval(function(){location.reload();}, 10000);
          }
          if (response.data.x_cod_response == 4) {
            //console.log('transacción fallida');
				$('.bx-all-cont-nn-fss').html('<div class="alert alert-danger pt-4 pb-4" role="alert"><p class="lead m-0">Lo Sentimos!!! La transacci&oacute;n es fallida</p></div><a href="<?php echo url('/'); ?>" class="btn btn-dark btn-xs mx-auto">Inicio</a>');
          }
        } else {
			$('.bx-all-cont-nn-fss').html('<div class="alert alert-danger pt-4 pb-4" role="alert"><p class="lead m-0">Lo Sentimos!!! Ha ocurrido un error consultando la informaci&oacute;n. Los datos de la transacci&oacute;n no son v&aacute;lidos</p></div><a href="<?php echo url('/'); ?>" class="btn btn-dark btn-xs mx-auto">Inicio</a>');
        }
      });
    });
	</script>
	</body>
</html>
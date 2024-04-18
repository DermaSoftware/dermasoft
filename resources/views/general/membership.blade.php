@extends('layouts.app')

@section('content')
<?php if($has_mship){ ?>
<div class="card card-body bg-transparent border rounded-3">
	<!-- Update plan START -->
	<div class="row g-4">
		<!-- Update plan item -->
		<div class="col-6 col-lg-3">
			<span>Plan activo</span>
			<h4><?= $lastplan->name ?></h4>
		</div>
		<!-- Update plan item -->
		<div class="col-6 col-lg-3">
			<span>Duración en meses</span>
			<h4><?= $lastplan->month ?></h4>
		</div>
		<!-- Update plan item -->
		<div class="col-6 col-lg-3">
			<span>Costo</span>
			<h4>$<?= $lastplan->price ?>/<?= $lastplan->badge_per ?></h4>
		</div>

		<!-- Update plan item -->
		<div class="col-6 col-lg-3">
			<span>Expira</span>
			<h4><?= $mship->expiration ?></h4>
		</div>
	</div>
	<!-- Update plan END -->

	<!-- Progress bar -->
	<div class="overflow-hidden my-4">
		<h6 class="mb-0"><?= $pg_mb ?>%</h6>
		<div class="progress progress-sm bg-primary bg-opacity-10">
			<div class="progress-bar bg-primary aos" role="progressbar" data-aos="slide-right" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" style="width: <?= $pg_mb ?>%" aria-valuenow="<?= $pg_mb ?>" aria-valuemin="0" aria-valuemax="100">
			</div>
		</div>
	</div>

	<!-- Button -->
	<div class="d-sm-flex justify-content-sm-between align-items-center">
		<div>
		<!-- Switch Content -->
			<!--<div class="d-sm-flex">
				<div class="form-check form-switch form-check-md">
					<input class="form-check-input" type="checkbox" id="checkPrivacy1" checked="">
					<label class="form-check-label" for="checkPrivacy1">Auto Renewal</label>
				</div>
			</div>-->
			<p class="mb-0 small">Su membresia expira: <?= $mship->expiration ?>. Para disfrutar de los beneficios de la plataforma le invitamos a renovar.</p>
		</div>	
		<!-- Buttons -->
		<div class="mt-2 mt-sm-0">
			<button type="button" class="btn btn-sm btn-danger-soft me-2 mb-0 d-none">Cancelar plan</button>
			<?php if($more_mb > 0){ ?>
			<a href="javascript:void(0)" class="btn btn-sm btn-success mb-0 btn_upgrade_plans_fsc">Actualizar</a>
			<?php } ?>
		</div>
	</div>
	<hr>
	<!-- Plan Benefits -->
	<div class="row">
		<h6 class="mb-3">El plan incluye</h6>
		<div class="col-md-6">
			<ul class="list-unstyled">
				<?= $lastplan->description ?>
			</ul>
		</div>
	</div>
</div>
<?php } ?>
<?php if(!$has_mship OR $more_mb > 0) { ?>
<section class="section_plans_fsc py-5 price-wrap <?= $more_mb > 0?'d-none':'' ?>">
  <div class="container">
    <div class="row g-4 position-relative mb-4">
      <!-- SVG decoration -->
      <figure class="position-absolute top-0 start-0 d-none d-sm-block">	
        <svg width="22px" height="22px" viewBox="0 0 22 22">
          <polygon class="fill-purple" points="22,8.3 13.7,8.3 13.7,0 8.3,0 8.3,8.3 0,8.3 0,13.7 8.3,13.7 8.3,22 13.7,22 13.7,13.7 22,13.7 "></polygon>
        </svg>
      </figure>
      
      <!-- Title and Search -->
      <div class="col-lg-10 mx-auto text-center position-relative">
        <!-- SVG decoration -->
        <figure class="position-absolute top-50 end-0 translate-middle-y d-none d-md-block">
          <svg width="27px" height="27px">
            <path class="fill-orange" d="M13.122,5.946 L17.679,-0.001 L17.404,7.528 L24.661,5.946 L19.683,11.533 L26.244,15.056 L18.891,16.089 L21.686,23.068 L15.400,19.062 L13.122,26.232 L10.843,19.062 L4.557,23.068 L7.352,16.089 L-0.000,15.056 L6.561,11.533 L1.582,5.946 L8.839,7.528 L8.565,-0.001 L13.122,5.946 Z"></path>
          </svg>
        </figure>
        <!-- Title -->
        <?php if(!$has_mship OR $more_mb == 0) { ?>
		<h1>Membresias</h1>
        <p class="mb-4 pb-1">Perceived end knowledge certainly day sweetness why cordially</p>
		<?php } ?>

        <!-- Switch START -->
        <form class="d-flex align-items-center justify-content-center d-none">
          <!-- Label -->
          <span class="h6 mb-0 fw-bold">Mensual</span>
          <!-- Switch -->
          <div class="form-check form-switch form-check-lg mx-3 mb-0">
            <input class="form-check-input mt-0 price-toggle" type="checkbox" id="flexSwitchCheckDefault">
          </div>
          <!-- Label -->
          <div class="position-relative">
            <span class="h6 mb-0 fw-bold">Anual</span>
            <span class="badge bg-danger bg-opacity-10 text-danger ms-1 position-absolute top-0 start-100 translate-middle mt-n2 ms-2 ms-md-5">10% discount</span>
          </div>
        </form>
        <!-- Switch END -->
      </div>
		</div>	
		<!-- Pricing START -->
		<div class="row g-4">
			<?php foreach($o_all as $key => $row){ ?>
			<!-- Pricing item START -->
			<div class="col-md-6">
				<div class="card border rounded-3 p-2 p-sm-4 h-100">
					<!-- Card Header -->
					<div class="card-header p-0">
						<!-- Price and Info -->
						<div class="d-flex justify-content-between align-items-center p-3 bg-light rounded-2">
							<!-- Info -->
							<div>
								<h5 class="mb-0"><?= $row->name ?></h5>
								<div class="badge text-<?= !empty($row->color)?$row->color:'bg-dark' ?> mb-0 rounded-pill"><?= $row->badge ?></div>
							</div>
							<!-- Price -->
							<div>
								<h4 class="text-success mb-0 plan-price" data-monthly-price="$<?= str_replace('.00','',number_format($row->price,2)) ?>" data-annual-price="$<?= str_replace('.00','',number_format($row->annual,2)) ?>">$<?= str_replace('.00','',number_format($row->price,2)) ?></h4>
								<p class="small mb-0">/ <?= $row->badge_per ?></p>
							</div>
						</div>
					</div>
					<!-- Divider -->
					<div class="position-relative my-3 text-center">
						<hr>
						<p class="small position-absolute top-50 start-50 translate-middle bg-body px-3"><?= $row->badge_divider ?></p>
					</div>
					<!-- Card Body -->
					<div class="card-body pt-0">
						<ul class="list-unstyled mt-2 mb-0">
							<?= $row->description ?>
						</ul>
					</div>
					<!-- Card Footer -->
					<?php if($row->price == 0){ ?>
					<div class="card-footer text-center d-grid pb-0">
						<button type="button" class="btn btn-light mb-0 btn_plan_price_free" data-url="<?= url('freeplan/'.$row->id) ?>">ADQUIRIR</button>
					</div>
					<?php } else { ?>
					<div class="card-footer text-center d-grid pb-0">
						<button type="button" class="btn btn-light mb-0 btn_plan_price_epayco">COMPRAR</button>
					</div>
					<form class="d-none">
					<script
					src="https://checkout.epayco.co/checkout.js"
					class="epayco-button"
					data-epayco-key="<?= env('EPAYCOKEY_FSC', '382c096da3f1534fc1af6f0d62361710') ?>"
					data-epayco-amount="<?= $row->price ?>"
					data-epayco-name="Pago de membresia"
					data-epayco-description="Pago de membresia <?= $row->name ?>"
					data-epayco-currency="COP"
					data-epayco-country="co"
					data-epayco-test="true"
					data-epayco-extra1="<?= Auth::user()->id ?>"
					data-epayco-extra2="<?= $row->id ?>"
					data-epayco-extra3="Plan"
					data-epayco-external="false"
					data-epayco-response="<?= url('pay/response'); ?>"
					data-epayco-confirmation="<?= url('epayconfirm.php'); ?>">
					</script>
					</form>
					<?php } ?>
				</div>
			</div>
			<!-- Pricing item END -->
			<?php } ?>
		</div>	<!-- Row END -->
		<!-- Pricing END -->
  </div>
</section>
<?php } ?>


@endsection

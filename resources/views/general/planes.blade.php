@extends('layouts.app')
@section('content')
    <?php /*if($o_all->count() > 0){ ?>
<div class="columns is-multiline">
    <?php foreach($o_all as $key => $row){ ?>

	<div class="column is-4">
        <div class="s-card is-raised demo-s-card">
            <div class="card-head">
                <div class="media-flex-center no-margin">
                    <div class="flex-meta">
                        <span><?= $row->name ?></span>
                        <span class="money_to_fsc"><?= $row->price ?></span>
                    </div>
                </div>
                <div class="dropdown is-spaced is-dots is-right dropdown-trigger is-up">
                    <div class="is-trigger" aria-haspopup="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </div>
                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-content">
							<?php if($row->price == 0){ ?>
							<a href="javascript:void(0)" class="dropdown-item is-media btn_plan_price_free" data-url="<?= url('freeplan/'.$row->id) ?>">
                                <div class="icon"><i class="lnil lnil-share"></i></div>
                                <div class="meta">
                                    <span>Adquirir</span>
                                    <span>Suscribirme al plan</span>
                                </div>
                            </a>
							<?php } else { ?>
							<a href="javascript:void(0)" class="dropdown-item is-media btn_plan_price_epayco">
                                <div class="icon"><i class="lnil lnil-share"></i></div>
                                <div class="meta">
                                    <span>Comprar</span>
                                    <span>Pagar online de forma segura</span>
                                </div>
                            </a>
							<form class="is-hidden">
								<script
								src="https://checkout.epayco.co/checkout.js"
								class="epayco-button"
								data-epayco-key="382c096da3f1534fc1af6f0d62361710"
								data-epayco-amount="<?php echo $row->price; ?>"
								data-epayco-name="Pago de suscripción"
								data-epayco-description="Pago de suscripción"
								data-epayco-currency="COP"
								data-epayco-country="co"
								data-epayco-test="true"
								data-epayco-extra1="<?php echo $us_id; ?>"
								data-epayco-extra2="<?php echo $row->id; ?>"
								data-epayco-extra3=""
								data-epayco-external="false"
								data-epayco-response="<?= url('pay/response'); ?>"
								data-epayco-confirmation="<?= url('epayconfirm.php'); ?>">
								</script>
							</form>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-inner">
                <p><?= $row->description ?></p>
            </div>
        </div>
    </div>
	<?php } ?>
</div>
<?php }*/ ?>




<style>

    .pricing-wrapper .pricing-plan .price::after {
    content: "" !important;

    font-size: 1rem;

    font-weight: normal;

    color: #a2a5b9;

    }
    .pricing-wrapper .pricing-plan .price .tiempo {
    font-size: 1rem;
    font-weight: normal;

    color: #a2a5b9;

    }
</style>

    <div class="section has-bg-dots">
        <div class="container">
            <!--Title-->
            <div class="section-title has-text-centered">
                <h2 class="title is-2"><?= $title ?></h2>
                <h4>Hay un plan adecuado para todos.</h4>
            </div>
        <?php if($o_all->count() > 0){ ?>
        <!--Wrapper-->
            <div class="pricing-wrapper">
            <?php foreach($o_all as $key => $row){ ?>
            <!--Pricing plan-->
                <div class="pricing-plan is-featured">
                    <div class="name"><?= $row->name ?></div>
                    <img
                        src="<?= !empty($row->photo) ? $row->photo : asset('assets/img/logos/logo/logo-platinum.svg') ?>"
                        alt="">
                    <div class="price money_to_fscx">
                        @if ($row->validity == "Mensual")
                        <?= $row->price  ?><span class="tiempo"><?= $row->month <= 1 ? '/por mes': '/' . $row->month . ' meses' ?></span>
                        @else
                            <?= $row->price  ?><span class="tiempo"><?= $row->month <= 1 ? '/por año' : '/' . $row->month . ' años'?></span>
                        @endif

                    </div>
                    <div class="trial"><?= $row->subtitle ?></div>
                    <hr>
                    <ul>
                        <?php $f = explode('<br>', $row->description); ?>
                        <?php foreach($f as $xrow){ ?>
                        <li>
                            <?= $xrow ?>
                        </li>
                        <?php } ?>
                    </ul>
                    <hr>
                    <div class="buttons text-center">
                        <!--<button class="button h-button is-dark-outlined">Skip</button>-->

                        @if ($company->plan_id == $row->id )
                            <button disabled class="button h-button is-success is-raised btn_plan_price_epayco"
                                    style="margin: 0 auto;">Membresía adquirida
                            </button>
                        @else
                            <button
                                class="{{$company->plan_id == 0 ? 'disabled ':'' }}button h-button is-success is-raised btn_plan_price_epayco"
                                style="margin: 0 auto;">{{$company->plan_id == 0 ? 'Membresia de prueba' : 'Pagar membresía'}}</button>
                        @endif
                        <form class="is-hidden">
                            <script
                                src="https://checkout.epayco.co/checkout.js"
                                class="epayco-button"
                                data-epayco-key="<?= !empty($o_setting->epaycokey) ? $o_setting->epaycokey : env('EPAYCOKEY_FSC', '382c096da3f1534fc1af6f0d62361710') ?>"
                                data-epayco-amount="<?= $row->price ?>"
                                data-epayco-name="Pago de membresía <?= $row->name ?>"
                                data-epayco-description="Pago de membresía <?= $row->name ?>"
                                data-epayco-currency="COP"
                                data-epayco-country="co"
                                data-epayco-test="<?= env('DATA_EPAYCO_TEST', false) ? 'true' : 'false' ?>"
                                data-epayco-extra1="<?= $row->uuid ?>"
                                data-epayco-extra2="<?= Auth::user()->uuid ?>"
                                data-epayco-extra3="<?= Auth::user()->company ?>"
                                data-epayco-external="false"
                                data-epayco-response="<?= url('payplan'); ?>"
                                data-epayco-confirmation="<?= url('epayconfirmres.php'); ?>">
                            </script>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>

@endsection

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
  <meta name="viewport" content="width=device-width" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>{{ config('app.name') }}</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
</head>
<body style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f8f8f8; margin: 0;">
  <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; background-color: #f4f8fb; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 15px;" bgcolor="#f8f8f8">
    <tr>
      <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="width:600; background-color: #ffffff; color: #514d6a; padding: 40px; margin-top: 40px; line-height: 28px;" bgcolor="#ffffff">
          <tr>
            <td style="text-align: center; vertical-align: top;">
              <img src="{{ asset('assets/media/logos/logo-letter-1.png') }}" alt="BonVue Admin Template" style="border:none; display:inline-block;" height="43" width="122">
            </td>
          </tr>
          <tr>
            <td style="text-align: center; padding-top: 50px; font-weight: 300; line-height: 48px; font-size: 42px; font-family: 'Open Sans',Helvetica,Arial,sans-serif; color: #111; letter-spacing: -1px;">
              Hola {{ $name }}
            </td>
          </tr>
          <tr>
            <td style="text-align: center; padding-top: 10px; font-weight: 300; line-height: 36px; font-size: 24px; font-family: 'Open Sans',Helvetica,Arial,sans-serif; color: #999; letter-spacing: -1px;">
              {{ $body }}
            </td>
          </tr>
          <tr>
            <td style="text-align: center; padding-top: 30px; vertical-align: top;">
              <img src="{{ asset('assets/media/icon-receipt.png') }}" alt="" style="border:none; display:inline-block;" height="128" width="128">
            </td>
          </tr>

          <?php if(count($o_pays) > 0){ ?>
          <tr>
            <td>
              <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                  <tr>
                    <td style="font-weight: 700; padding-bottom: 10px;">Factura</td>
                    <td>&nbsp;</td>
                    <td style="text-align: right; font-weight: 700; padding-bottom: 10px;">Valor pagado</td>
                  </tr>
                  <?php foreach($o_pays as $key => $row){ ?>
                  <tr>
                    <td style="text-align: left; padding: 10px 10px 10px 0px; border-top: 3px solid #eee;">
                        <?= !empty($row->receipt_url)?'<a href="'.$row->receipt_url.'" target="_blank">'.$row->payment_intent.'</a>':$row->payment_intent ?>
                    </td>
                    <td style="width: 10%; text-align: center; padding: 10px 10px; border-top: 3px solid #eee;">
                        (<?= $row->currency ?>)
                    </td>
                    <td style="width: 20%; text-align: right; padding: 10px 0px 10px 10px; white-space: nowrap; border-top: 3px solid #eee;">
                        <?= $row->amount ?>
                    </td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td style="padding: 10px 10px 10px 0px; border-top: 3px solid #eee;">
                      <span style="font-size: 18px; font-weight: bold">Total</span>
                    </td>
                    <td style="text-align: center; padding: 10px 10px; border-top: 3px solid #eee;">
                      &nbsp;
                    </td>
                    <td style="text-align: right; padding: 10px 0px 10px 10px; white-space: nowrap; border-top: 3px solid #eee;">
                      <span style="font-size: 18px; font-weight: bold">$ {{ $total_pays }}</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <?php } ?>
          <tr>
            <td>
              <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-top: 40px">
                <tbody>
                  <tr>
                    <th style="text-align: left; padding-bottom: 10px; border-bottom: 1px solid #eee;">Detalles de reserva</th>
                    <th style="text-align: left; padding-bottom: 10px; border-bottom: 1px solid #eee;">Valores</th>
                  </tr>
                  <tr>
                    <td style="padding-top: 10px;">
                      Plan
                      <br>
                      Cliente
                      <br>
                      Itinerario
                      <br>
                      Asiento
                      <br>
                      Código de reserva
                    </td>

                    <td style="padding-top: 10px;">
                      {{ $o_res->getPlan() }}
                      <br>
                      {{ $o_res->getUser() }}
                      <br>
                      {{ $o_res->getItinerary().' ('.$o_res->getItineraryDate().')' }}
                      <br>
                      {{ $o_res->seat }}
                      <br>
                      <?php echo $o_res->getInvoice(); ?>
                    </td>
                  </tr>

                </tbody>
              </table>

            </td>
          </tr>

          <tr>
            <td style="text-align: center; padding-top: 30px; padding-bottom: 60px;">
              <a href="{{ url('bookings/'.$o_res->id) }}" style="letter-spacing: -1px; font-family: 'Open Sans',Helvetica,Arial,sans-serif; text-decoration: none; display: block; line-height: 70px; padding-left: 30px; padding-right: 30px; border-radius: 3px; font-size: 24px; color: #fff; background-color: #8253eb;" target="_blank">
                VER DETALLES
              </a>
            </td>
          </tr>
        </table>
      </td>
    </tr>

    <tr>
      <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border:none; width:600; margin-top: 20px; margin-bottom: 40px; text-align: center; color: #85868a;">
          <tr>
            <td style="padding-top: 20px;">
              &copy; <?= date('Y') ?> {{ config('app.name') }}
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

</body>
</html>

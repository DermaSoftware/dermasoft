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
              Hola
            </td>
          </tr>
          <tr>
            <td style="text-align: center; padding-top: 10px; font-weight: 300; line-height: 26px; font-size: 16px; font-family: 'Open Sans',Helvetica,Arial,sans-serif; color: #999; letter-spacing: -1px;">
              Has recibido un nuevo mensaje de contacto:<br>
			  Nombre: {{ $name }}<br>
			  Correo: {{ $email }}<br>
			  Asunto: {{ $subject }}<br>
			  Mensaje: {{ $message }}<br>
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

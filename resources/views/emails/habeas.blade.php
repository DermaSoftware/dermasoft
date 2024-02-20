<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>{{ config('app.name', 'APP') }}</title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
    <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
        <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="javascript:void(0)" target="_blank"><img src="{{ asset('assets/img/favicon.png') }}" alt="{{ config('app.name', 'APP') }}" style="max-width: 120px;height: auto;border:none"></a> </td>
                    </tr>
                </tbody>
            </table>
            <div style="padding: 40px; background: #fff;">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td style="border-bottom:1px solid #f6f6f6;">
                                <h1 style="font-size:24px; font-family:arial; margin:0px; font-weight:bold;">Hola {{ $name_fsc }}!!!</h1>
                                <p style="margin-top:0px; color:#bbbbbb;font-size: 22px;">Queremos notificarte sobre el tratamiento de datos personales en nuestra plataforma, en este correo encontrarás un adjunto con el documento de aceptación del tratamiento de datos en nuestra plataforma.</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top:1px solid #f6f6f6; padding-top:20px; color:#777">Si no reconoces la informaci&oacute;n de este correo te pedimos que contactes al administrador y le comentes de inmediato.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="text-align: center; font-size: 16px; color: #b2b2b5; margin-top: 20px"><p>&copy; {{ config('app.name', 'APP') }} <?php echo date('Y'); ?></p></div>
        </div>
    </div>
</body>
</html>
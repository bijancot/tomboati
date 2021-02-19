<html>
    <head>
    <meta charset="utf-8" />

  <title>Anil Labs - Codeigniter mail templates</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style type="text/css">
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 20%;
            }
        </style>
    </head>
    
    <body>
        <p><strong>Konfirmasi Pergantian Password</strong></p>
        <p>Yth. Bapak/Ibu <strong><?php echo $NAMALENGKAP;?></strong></p>
        <p>Kami mendapat permintaan mengganti kata sandi, mengganti kata sandi dapat dilakukan melalui link dibawah ini </p>
        <p>Link : https://tomboati.bgskr-project.my.id/Admin/ChangePassword/<?php echo $IDUSERREGISTER?></p>
        <p>Jika Anda mengabaikan pesan ini, kata sandi tidak akan berubah</p>
    </body>
</html>
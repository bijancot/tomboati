
<?php
$email = "deblenk.dh@gmail.com";
$name = "dede";
$userid = "mimi";
$passw = "lala";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once "vendor/phpmailer/src/PHPMailer.php";
require_once "vendor/phpmailer/src/Exception.php";
require_once "vendor/phpmailer/src/OAuth.php";
require_once "vendor/phpmailer/src/POP3.php";
require_once "vendor/phpmailer/src/SMTP.php";

$from_name = "Admin Tombo Ati";
$user_email = "adm.tomboati@gmail.com";
$pass_email = "TomboAti123";

$email_penerima = "deblenk.dh@gmail.com";
$penerima_nama = "Dedy";

function randomPassword($panjang)
{
  $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
  $string = '';
  for ($i = 0; $i < $panjang; $i++) {
    $pos = rand(0, strlen($karakter) - 1);
    $string .= $karakter{
    $pos};
  }
  return $string;
}

//cara panggil random
$password = randomPassword(8);

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPOptions = array(
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    )
  );
  $mail->SMTPDebug = true;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = $user_email;                     //SMTP username
  $mail->Password   = $pass_email;                               //SMTP password
  $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
  $mail->Port       = 465;
  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  //Recipients
  $mail->setFrom($user_email, $from_name);
  $mail->addAddress($email_penerima, $penerima_nama);     //Add a recipient
  $mail->addReplyTo($user_email, 'Information');
  // $mail->addAddress('ellen@example.com');               //Name is optional
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');

  //Attachments
  // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  // $mail->AddEmbeddedImage('src=https://tomboati.bgskr-project.my.id/assets/img/logo_tomboati.png', 'background1img');
  $body = "
  <html>
    <head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <meta charset='utf-8' />
      <style type='text/css'>
      html{ height:100%; }
      body{ min-height:100%;  padding:0; margin:0; position:relative; }
      p {
        color:black;
      }
      footer{ 
          position:absolute; 
          bottom:0; 
          width:100%; 
          height:200px; 
      }

      article{
          width: 100%; 
          color: #000; 
      }

      header{ 
          background:#ecf0f1; 
          text-align: center;
          padding: 20px;
      }

      footer{ 
          border-top: 1px solid #abb7b7; 
      }

      .content-footer{
          padding: 5px 7px;
      }

      .content-penting{
          color: #6c7a89;
      }
    </style>
  </head>
  <body>
    <header>
      <img width='100px;' src='https://tomboati.bgskr-project.my.id/assets/img/logo_tomboati.png'>
    </header>

    <article>
    <p>Yth. Bapak/Ibu $name.</p>
    <p>Selamat permintaan Anda untuk menjadi mitra telah disetujui. Berikut data diri akun Anda : </p>
     <p>&nbsp;</p>
    <p>Username = <b>$userid</b> </p>
    <p>Password = <b>$password</b> </p>
    <p>&nbsp;</p>
    <p>Berikut link untuk menuju ke halaman landing page referral Anda.</p> 
    https://dash-tombo.bgskr-project.my.id/backoffice/
    
    <br><br>
    <p>Terima Kasih, </p>
    <p>&nbsp;</p>
    <p>Admin Tombo Ati</p>
    </article>
    <footer>
    <div class='content-footer'>
        <p>&copy; " . (int)date('Y') . " <strong>Tombo Ati</strong> All rights reserved</p>
        <hr>
        <div class='content-penting'>
            PENTING!
            Informasi yang disampaikan melalui e-mail ini hanya diperuntukkan bagi pihak penerima dan bersifat rahasia, jangan berikan informasi apapun kepada pihak lain demi keamanan akun Anda
        </div>
    </div>
</footer>
</body>     
</html>
    ";

  //content
  $mail->isHTML(true);                                //Set email format to HTML
  $mail->Subject = 'Verifikasi Permintaan Mitra';
  $mail->Body    = $body;
  // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  $err_msg = 'Email telah terkirim';
  echo $err_msg;
} catch (Exception $e) {
  echo "Gagal mengirim email. Mailer Error: {$mail->ErrorInfo}";
  $err_msg = "Gagal mengirim email. Mailer Error: {$mail->ErrorInfo}";
  echo $err_msg;
}

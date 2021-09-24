<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('config.php');
include('fungsi.php');

session_start();

$id = $_POST['id'];
$userid = $_POST['userid'];
$name = $_POST['name'];
$email = $_POST['email'];
$unik_password = $_POST['passw'];
$upline = $_POST['upline'];


$sql_upline = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$upline'");
$total_upline = mysqli_num_rows($sql_upline);
if ($total_upline == 0) {
    echo '<script type="text/javascript">alert("Username Upline Tidak Ditemukan");</script>';
    echo "<script type='text/javascript'>document.location.href = 'register.php?error=Username Upline tidak Ditemukan';</script>";
} else {
    // update data ke database
    if (mysqli_query($koneksi, "update mebers set upline='$upline', is_hr = '2' where id='$id'")) {
        // echo "BERHASIL";

        echo '<script type="text/javascript">alert("Pendaftaran Mitra Berhasil");</script>';
        echo "<script type='text/javascript'>document.location.href = 'register.php';</script>";
    
        // kirim email
        
        //Load Composer's autoloader
        require_once "plugins/phpmailer/src/PHPMailer.php";
        require_once "plugins/phpmailer/src/Exception.php";
        require_once "plugins/phpmailer/src/OAuth.php";
        require_once "plugins/phpmailer/src/POP3.php";
        require_once "plugins/phpmailer/src/SMTP.php";

        $from_name = "Admin Tombo Ati";
        $user_email = "adm.tomboati@gmail.com";
        $pass_email = "TomboAti123";

        $email_penerima = $email;
        $penerima_nama = $name;

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
            $mail->SMTPDebug = true;
            $mail->isSMTP();
            $mail->Host       = 'ssl://smtp.googlemail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $user_email;
            $mail->Password   = $pass_email;
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom($user_email, $from_name);
            $mail->addAddress($email_penerima, $penerima_nama);     //Add a recipient
            $mail->addReplyTo($user_email, 'Information');
            // $mail->addAddress('ellen@example.com');              
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

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
              <p>Password = <b>$unik_password</b> </p>
              <p>&nbsp;</p>
              <p>Berikut link untuk menuju ke halaman landing page. Login menggunakan Username dan Password anda</p> 
              <a href='$base_url'>$base_url</a>
              
              <p>&nbsp;</p>
              <p>Terima Kasih, </p>
              <p>&nbsp;</p>
              <p>Admin Tombo Ati</p>
              </article>
            <footer>
              <div class='content-footer'>
                  <p>&copy; 2021 <strong>Tombo Ati</strong> All rights reserved</p>
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
            $mail->isHTML(true);
            $mail->Subject = 'Verifikasi Permintaan Mitra';
            $mail->Body    = $body;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $msg_success = 'Email telah terkirim';
            echo $msg_success;
        } catch (Exception $e) {
            $msg_gagal = "Gagal mengirim email. Mailer Error: {$mail->ErrorInfo}";
            echo $msg_gagal;
        }
        
        
        // header("Location: register.php?error=SUCCESS");
        
    } else {
        echo "GAGAL";
    }
}

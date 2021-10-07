<?php
require_once "config.php";
require_once "config2.php";

if (function_exists($_GET['function'])) {
    $_GET['function']();
}

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function randomPassword($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
      $pos = rand(0, strlen($karakter)-1);
      $string .= $karakter{$pos};
    }
    return $string;
}

function pendaftaranMitra(){

  //Load Composer's autoloader
  require_once "../vendor/phpmailer/src/PHPMailer.php";
  require_once "../vendor/phpmailer/src/Exception.php";
  require_once "../vendor/phpmailer/src/OAuth.php";
  require_once "../vendor/phpmailer/src/POP3.php";
  require_once "../vendor/phpmailer/src/SMTP.php";

  global $connect, $connect2;

  $response       = [];

  //cara panggil random
  $password = randomPassword(8);
  $enc_password = md5($password);

  //Update Mitra dan insert password
  $randKTP        = rand();
  $data           = json_decode(file_get_contents("php://input"), true);
  $fotoktp        = $_FILES['fileKTP']['name'];
  $tempPath       = $_FILES['fileKTP']['tmp_name'];
  $fileSize       = $_FILES['fileKTP']['size'];

  if (empty($fotoktp)) {
      $errorMSG = json_encode(array("message" => "File KTP Kosong", "status" => false));
      echo $errorMSG;
  } else {
      $upload_path = '../upload/users/'; // set upload folder path 

      $fileExt = strtolower(pathinfo($fotoktp, PATHINFO_EXTENSION));
      $valid_extensions = array('jpeg', 'jpg', 'png');

      if (in_array($fileExt, $valid_extensions)) {
              $file_foto_ktp = $randKTP.'_'.$fotoktp;

              if ($fileSize < 2000000) {
                  move_uploaded_file($tempPath, $upload_path . $file_foto_ktp);
                  $file_foto_ktp_db = 'https://tomboatitour.biz/dashboard/upload/users/'.$file_foto_ktp;
              } else {
                  $errorMSG = json_encode(array("message" => "File KTP maksimal 2MB", "status" => false));
                  echo $errorMSG;
              }
          
      } else {
          $errorMSG = json_encode(array("message" => "Hanya file JPG, JPEG & PNG", "status" => false));
          echo $errorMSG;
      }
  }

  $idUserRegisterLogin  = $_GET['idUserRegister'];
  $nomorKTP             = $_POST['nomorKTP'];
  $email                = $_POST['email'];
  $name                 = $_POST['namaLengkap'];
  $provinsi             = $_POST['provinsi'];
  $kota                 = $_POST['kotaKabupaten'];
  $kecamatan            = $_POST['kecamatan'];
  $address              = $_POST['alamat'];
  $kodePos              = $_POST['kodePOS'];
  $country              = $_POST['kewarganegaraan'];
  $username             = $_POST['username'];
  $nomorHP              = $_POST['nomorHP'];
  $createdAt            = date('Y-m-d H:i:s');
  $msg                  = null;
  
  $get_data_username                  = $connect->query("SELECT * FROM mebers WHERE userid = '".$username."' "); 
  $get_status_user                    = $connect->query("SELECT * FROM mebers WHERE id = '".$idUserRegisterLogin."' "); 

  $get_rows_username                  = mysqli_num_rows($get_data_username); 
  
  if($get_rows_username == null){

    $status_user_login  = null;
    $username_login     = null;

    while($row = mysqli_fetch_array($get_status_user)){
        $status_user_login  = $row['paket'];
        $username_login     = $row['userid'];
    }

    if($status_user_login == 'MITRA'){
        //insert into mebers
        mysqli_query($connect, "INSERT INTO mebers(paket, timer, ktp, email, name, propinsi, kota, kecamatan, address, kode_pos, country, userid, passw, fotoktp, hphone, sponsor) 
        VALUES('MITRA', '$createdAt', '$nomorKTP', '$email', '$name','$provinsi','$kota','$kecamatan','$address','$kodePos', '$country','$username', '$password', '$file_foto_ktp_db', '$nomorHP', '$username_login')");

        //get_data_after_insert_db_dashboard_tombo
        $get_data_after_insert_db_dashboard_tombo = $connect->query("SELECT * FROM mebers WHERE userid = '".$username."' "); 
                    
        $idUserRegister = null;
        while($row = mysqli_fetch_array($get_data_after_insert_db_dashboard_tombo)){
            $idUserRegister = $row['id'];
        }

        //insert into user_register
        mysqli_query($connect2, "INSERT INTO USER_REGISTER(KODEREFERRAL, STATUS_USER, CREATED_AT, NOMORKTP, EMAIL, NAMALENGKAP, PROVINSI, KOTA, KECAMATAN, ALAMAT, KODEPOS, NEGARA, USERNAME, PASSWORD, FILEKTP, NOMORHP, IDUSERREGISTER) 
        VALUES('$username_login', 'MITRA', '$createdAt', '$nomorKTP', '$email', '$name','$provinsi','$kota','$kecamatan','$address','$kodePos', '$country','$username', '$password', '$file_foto_ktp_db', '$nomorHP', '$idUserRegister')");
    }else{
        //insert into mebers
        mysqli_query($connect, "INSERT INTO mebers(paket, timer, ktp, email, name, propinsi, kota, kecamatan, address, kode_pos, country, userid, passw, fotoktp, hphone, sponsor) 
        VALUES('MITRA', '$createdAt', '$nomorKTP', '$email', '$name','$provinsi','$kota','$kecamatan','$address','$kodePos', '$country','$username', '$password', '$file_foto_ktp_db', '$nomorHP', 'company')");

        //get_data_after_insert_db_dashboard_tombo
        $get_data_after_insert_db_dashboard_tombo = $connect->query("SELECT * FROM mebers WHERE userid = '".$username."' "); 
                    
        $idUserRegister = null;
        while($row = mysqli_fetch_array($get_data_after_insert_db_dashboard_tombo)){
            $idUserRegister = $row['id'];
        }

        //insert into user_register
        mysqli_query($connect2, "INSERT INTO USER_REGISTER(KODEREFERRAL, STATUS_USER, CREATED_AT, NOMORKTP, EMAIL, NAMALENGKAP, PROVINSI, KOTA, KECAMATAN, ALAMAT, KODEPOS, NEGARA, USERNAME, PASSWORD, FILEKTP, NOMORHP, IDUSERREGISTER) 
        VALUES('company', 'MITRA', '$createdAt', '$nomorKTP', '$email', '$name','$provinsi','$kota','$kecamatan','$address','$kodePos', '$country','$username', '$password', '$file_foto_ktp_db', '$nomorHP', '$idUserRegister')");
    }

    
    //insert chat_room tomboati
    mysqli_query($connect2, "INSERT INTO CHAT_ROOM(IDUSERREGISTER) VALUES('$idUserRegister')");
    
    
    $from_name    = "Admin Tombo Ati";
    $user_email   = "tomboatitour@gmail.com";
    $pass_email   = "Bismillah5758";

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
        // $mail->SMTPDebug = true;                   
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
          <img width='100px;' src='https://tomboatitour.biz/assets/img/logo_tomboati.png'>
        </header>

        <article>
          <p>Yth. Bapak/Ibu $name.</p>
          <p>Selamat permintaan Anda untuk menjadi mitra telah disetujui. Berikut data diri akun Anda : </p>
          <p>&nbsp;</p>
          <p>Username = <b>$username</b> </p>
          <p>Password = <b>$password</b> </p>
          <p>&nbsp;</p>
          <p>Berikut link untuk menuju ke halaman landing page. Login menggunakan Username dan Password anda</p> 
          https://tomboatitour.biz/backoffice/
          
          <p>&nbsp;</p>
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
        $mail->isHTML(true);
        $mail->Subject = 'Akun Mitra Baru';
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $msg = "Sukses Kirim Email";

    } catch (Exception $e) {
        $msg = "Gagal mengirim email. Mailer Error: {$mail->ErrorInfo}";
        echo $msg;

        $response=array(
          'error'                     => true,
          'send'                      =>'Gagal kirim email'
        );
    }

    $response=array(
      'error'                     => false,
      'message'                   =>'Sukses Register Mitra',
      'email'                     => $msg,
      'status_user'               => $status_user_login
    );

  }else{
    $response = array(
      'error'     => true,
      'message'   => 'Username sudah terdaftar sebelumnya'
    );
  }

  header('Content-Type: application/json');
  echo json_encode($response);

}




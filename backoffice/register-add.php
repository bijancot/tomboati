
<?php

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 'off');

include('config.php');
include('fungsi.php');

session_start();


$sql = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id = '$_SESSION[id]' ");
$row = mysqli_fetch_assoc($sql);
$username = $row['userid'];
$id = $row['id'];

$query_point = mysqli_query($koneksi, "SELECT SUM(jumlah) as 'total_point' FROM hm2_pending_deposits WHERE status='processed' AND type='point' AND user_id='$_SESSION[id]' ");
$query_total2 = mysqli_fetch_array($query_point);
$point_total = $query_total2['total_point'];

// $error = $_POST['error'];
$userid = $_POST['userid'];
$name = $_POST['name'];
$hphone = $_POST['hphone'];
$email = $_POST['email'];
$ktp = $_POST['ktp'];
$fotoktp = $_POST['fotoktp'];
$address = $_POST['address'];
$kecamatan = $_POST['kecamatan'];
$kota = $_POST['kota'];
$propinsi = $_POST['propinsi'];
$kode_pos = $_POST['kode_pos'];
$country = $_POST['country'];
$bank = $_POST['bank'];
$rekening = $_POST['rekening'];
$atasnama = $_POST['atasnama'];
$username = $row['userid'];
$upline = $_POST['upline'];

if (isset($_POST['button'])) {

    // function acak2($panjang)
    // {
    //     $karakter = '0123456789';
    //     $string = '';
    //     for ($i = 0; $i < $panjang; $i++) {
    //         $pos = rand(0, strlen($karakter) - 1);
    //         $string .= $karakter{
    //             $pos};
    //     }
    //     return $string;
    // }

    // $unik_password = acak2(8);
    // $unik_transaksi = acak2(4);
    // $enc_password = md5($unik_password);

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
    $unik_password = randomPassword(8);
    $unik_transaksi = randomPassword(4);
    $enc_password = md5($unik_password);

    // $id = $_POST['id'];
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $hphone = $_POST['hphone'];
    $email = $_POST['email'];
    $ktp = $_POST['ktp'];
    $address = $_POST['address'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $propinsi = $_POST['propinsi'];
    $kode_pos = $_POST['kode_pos'];
    $country = $_POST['country'];
    $bank = $_POST['bank'];
    $cabang = $_POST['cabang'];
    $rekening = $_POST['rekening'];
    $atasnama = $_POST['atasnama'];
    $username = $row['userid'];
    $upline = $_POST['upline'];
    $sponsor = $_POST['sponsor'];

    $g2 = $row['sponsor'];
    $g3 = $row['g2'];
    $g4 = $row['g3'];
    $g5 = $row['g4'];
    $g6 = $row['g5'];
    $g7 = $row['g6'];
    $g8 = $row['g7'];
    $g9 = $row['g8'];
    $g10 = $row['g9'];


    // upline yang diisi hanya boleh dengan username yang sudah ada uplinenya
    // $sql_upline_kosong = mysqli_query($koneksi, "SELECT upline FROM mebers WHERE userid = '$upline' ");
    // $row_upline_kosong = mysqli_fetch_assoc($sql_upline_kosong);

    // Pengecekan Upline harus ada dengan sponsor anda
    $sql_upline = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$upline' && sponsor='$username'");
    $total_upline = mysqli_num_rows($sql_upline);

    // Pengecekan Username
    $sql_username = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$userid'");
    $total_username = mysqli_num_rows($sql_username);
    // jika total upline 0 berarti upline tidak ada
    // jika total upline ada 1 berarti userid ada
    if (($total_upline == 0) && ($username != $upline)) {
        $_SESSION["uplinenotfound"] = 'Upline tidak Ditemukan';
        echo "<script type='text/javascript'>document.location.href = 'register.php?error=Username Upline tidak Ditemukan&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&fotoktp=$fotoktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
    } else if ($total_username != 0) {
        $_SESSION["usernameexist"] = 'Username sudah Digunakan';
        echo "<script type='text/javascript'>document.location.href = 'register.php?error=Username Sudah Digunakan&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&fotoktp=$fotoktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
        // } else if($row_upline_kosong['upline'] == NULL){
        //     $_SESSION["emptyupline"] = 'Username Masih Tidak Memiliki Sponsor';
        //     echo "<script type='text/javascript'>document.location.href = 'register.php?error=Username Masih Tidak Memiliki Sponsor&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&fotoktp=$fotoktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
    } else {
        // echo "MASUK DEK";
        // UPLOAD FOTO KTP
        $ekstensi_diperbolehkan    = array('PNG', 'JPG', 'JPEG', 'png', 'jpg', 'jpeg');
        $nama = $_FILES['fotoktp']['name'];
        $temp = explode('.', $nama);
        $ekstensi = strtolower(end($temp));
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $ukuran    = $_FILES['fotoktp']['size'];
        $file_tmp = $_FILES['fotoktp']['tmp_name'];

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($file_tmp, 'img/foto-ktp/' . $newfilename);
                $fotoktp = $base_url . 'img/foto-ktp/' . $newfilename;
            } else {

                $_SESSION["imagebig"] = 'Ukuran File Gambar Terlalu Besar!';
                // echo '<script type="text/javascript">swal("Gagal!", "Ukuran File Gambar Terlalu Besar!", "error");</script>';
                echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ukuran file gambar terlalu besar&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&fotoktp=$fotoktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
            }
        } else {
            $_SESSION["imagenotcorrect"] = 'Ekstensi File Gambar Tidak Diperbolehkan!';
            // echo '<script type="text/javascript>swal("Gagal!", "Ekstensi File Gambar Tidak Diperbolehkan!", "error");</script>';
            echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ekstensi file gambar tidak boleh&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&fotoktp=$fotoktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
        }

        // photo username

        if ($sponsor == 'company') {
            $is_hr = 2;
        } else {
            $is_hr = 1;
        }

        $no_hp = "62".$hphone;

        $photo = $base_url . 'gambar_customer/users.png';
        $insert_dash = mysqli_query($koneksi, "INSERT INTO mebers 
(sponsor, upline, g2, g3, g4, g5, g6, g7, g8, g9, g10, userid, name, hphone, email, fotoktp, ktp, address, kecamatan, kota, propinsi, kode_pos, country, bank, cabang, rekening, atasnama, passw, photo, is_hr, usertoken, timer)
VALUES
('$sponsor', '$upline', '$g2', '$g3', '$g4', '$g5', '$g6', '$g7', '$g8', '$g9', '$g10', '$userid', '$name', '$no_hp', '$email', '$fotoktp', '$ktp', '$address', '$kecamatan', '$kota', '$propinsi', '$kode_pos', '$country', '$bank', '$cabang', '$rekening', '$atasnama', '$unik_password','$photo', '$is_hr', 'tokenTomboAti', now())") or die(mysqli_error());

        // config tombo (Db)
        require_once 'config-tombo.php';
        $insert_tombo = mysqli_query($koneksi_tombo, "INSERT INTO USER_REGISTER 
        (STATUS_USER, NOMORKTP, EMAIL, PASSWORD, NAMALENGKAP, KODEREFERRALFROM, KODEREFERRAL, NOMORHP, FILEKTP, FOTO, USERNAME, KECAMATAN, ALAMAT, USERTOKEN, PROVINSI, KODEPOS, ATASNAMA, REKENING, BANK, CABANG, NEGARA, KOTA, CREATED_AT)
        VALUES
        ('MITRA', '$ktp', '$email', '$unik_password', '$name', '$upline', '$sponsor', '$no_hp', '$fotoktp', '$photo', '$userid', '$kecamatan', '$address', 'tokenTomboAti', '$propinsi', '$kode_pos', '$atasnama', '$rekening', '$bank', '$cabang', '$country', '$kota', now())") or die(mysqli_error($koneksi_tombo));

        if ($insert_tombo) {
            $last_id = mysqli_insert_id($koneksi_tombo);
            // echo ($last_id);
            mysqli_query($koneksi_tombo, "INSERT INTO CHAT_ROOM (IDUSERREGISTER) VALUES ('$last_id')");
        }
        //Kirim Email

        //         $newuser_msg = " 
        // $name, welcome to TomboAtiTour.com

        // Your Account :
        // Username  : $username
        // Password : $unik_password
        // Transaction Password : $unik_transaksi
        // Email : $email
        // Mobile Phone  : $hphone

        // Login to member area :
        // http://TomboAtiTour.com/dashboard/login.php.

        // ----------------------------
        // Webmaster
        // TomboAtiTour.com
        // admin@TomboAtiTour.com

        // ";

        //         $admin_varian = "admin@TomboAtiTour.com";
        //         $admin_em = "TomboAtiTour.com <admin@TomboAtiTour.com>";
        //         $pastitle = "Welcome to TomboAtiTour.com";
        //         $pastitle2 = "New Member TomboAtiTour.com";

        //         $headers = "From: $admin_em\r\n";
        //         $headers .= "Reply-To: $admin_em\r\n";
        //         $headers .= "X-Priority: 1\r\n";
        //         $headers .= "X-Mailer: PHP/" . phpversion();

        //           mail($email, $pastitle, $newuser_msg, $headers);
        //            mail($admin_varian, $pastitle2, $newuser_msg, $headers);

        //Load Composer's autoloader
        require_once "plugins/phpmailer/src/PHPMailer.php";
        require_once "plugins/phpmailer/src/Exception.php";
        require_once "plugins/phpmailer/src/OAuth.php";
        require_once "plugins/phpmailer/src/POP3.php";
        require_once "plugins/phpmailer/src/SMTP.php";

        // $email = $_POST['email'];
        // $name = $_POST['name'];
        // $userid = $_POST['userid'];

        $email_penerima = $email;
        $penerima_nama = $name;

        $from_name = "Admin Tombo Ati";
        $user_email = "tomboatitour@gmail.com";
        $pass_email = "Bismillah5758";

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
            $mail->SMTPDebug = false;
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
            // echo $msg_success;
        } catch (Exception $e) {
            $msg_gagal = "Gagal mengirim email. Mailer Error: {$mail->ErrorInfo}";
            // echo $msg_gagal;
        }

        $_GET = array(); // lets pretend nothing was posted
        $_POST = array(); // lets pretend nothing was posted

        $_SESSION["berhasil"] = 'Pendaftaran mitra berhasil!';
        // echo '<script type="text/javascript">swal("Berhasil!", "Pendaftaran mitra berhasil!", "success");</script>';

        // header("Location: register.php?error=SUCCESS");
        echo "<script type='text/javascript'>document.location.href = 'register.php';</script>";
    }
}

?>
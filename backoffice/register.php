<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
include 'header.php';

$query_point = mysqli_query($koneksi, "SELECT SUM(jumlah) as 'total_point' FROM hm2_pending_deposits WHERE status='processed' AND type='point' AND user_id='$row[id]' ");
$query_total2 = mysqli_fetch_array($query_point);
$point_total = $query_total2['total_point'];

$error = $_GET['error'];
$userid = $_GET['userid'];
$name = $_GET['name'];
$hphone = $_GET['hphone'];
$email = $_GET['email'];
$ktp = $_GET['ktp'];
$fotoktp = $_GET['fotoktp'];
$address = $_GET['address'];
$kecamatan = $_GET['kecamatan'];
$kota = $_GET['kota'];
$propinsi = $_GET['propinsi'];
$kode_pos = $_GET['kode_pos'];
$country = $_GET['country'];
$bank = $_GET['bank'];
$rekening = $_GET['rekening'];
$atasnama = $_GET['atasnama'];
$username = $row['userid'];
$upline = $_GET['upline'];

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

    $id = $_POST['id'];
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


    // Pengecekan Upline harus ada dengan sponsor anda
    $sql_upline = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$upline' && sponsor='$username'");
    $total_upline = mysqli_num_rows($sql_upline);

    // Pengecekan Username
    $sql_username = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$userid'");
    $total_username = mysqli_num_rows($sql_username);
    // jika total upline 0 berarti upline tidak ada
    // jika total upline ada 1 berarti userid ada
    if (($total_upline == 0) && ($username != $upline)) {
        echo '<script type="text/javascript">alert("Username Upline Tidak Ditemukan");</script>';
        echo "<script type='text/javascript'>document.location.href = 'register.php?error=Username Upline tidak Ditemukan&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&fotoktp=$fotoktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
    } else if ($total_username != 0) {
        echo '<script type="text/javascript">alert("Username Sudah Digunakan");</script>';
        echo "<script type='text/javascript'>document.location.href = 'register.php?error=Username Sudah Digunakan&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&fotoktp=$fotoktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
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
                echo '<script type="text/javascript">alert("UKURAN FILE TERLALU BESAR");</script>';
                echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ukuran file gambar terlalu besar';</script>";
            }
        } else {
            echo '<script type="text/javascript>alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");</script>';
            echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ukuran file gambar terlalu besar';</script>";
        }

        // photo username

        $photo = $base_url . 'gambar_customer/users.png';
        $insert_dash = mysqli_query($koneksi, "INSERT INTO mebers 
(sponsor, upline, g2, g3, g4, g5, g6, g7, g8, g9, g10, userid, name, hphone, email, fotoktp, ktp, address, kecamatan, kota, propinsi, kode_pos, country, bank, cabang, rekening, atasnama, passw, photo, is_hr, usertoken, timer)
VALUES
('$sponsor', '$upline', '$g2', '$g3', '$g4', '$g5', '$g6', '$g7', '$g8', '$g9', '$g10', '$userid', '$name', '$hphone', '$email', '$fotoktp', '$ktp', '$address', '$kecamatan', '$kota', '$propinsi', '$kode_pos', '$country', '$bank', '$cabang', '$rekening', '$atasnama', '$unik_password','$photo', '1', 'tokenTomboAti', now())") or die(mysqli_error());

        // config tombo (Db)
        require_once 'config-tombo.php';
        $insert_tombo = mysqli_query($koneksi_tombo, "INSERT INTO USER_REGISTER 
        (STATUS_USER, NOMORKTP, EMAIL, PASSWORD, NAMALENGKAP, KODEREFERRALFROM, KODEREFERRAL, NOMORHP, FILEKTP, FOTO, USERNAME, KECAMATAN, ALAMAT, USERTOKEN, PROVINSI, KODEPOS, ATASNAMA, REKENING, BANK, CABANG, NEGARA, KOTA, CREATED_AT)
        VALUES
        ('MITRA', '$ktp', '$email', '$unik_password', '$name', '$upline', '$sponsor', '$hphone', '$fotoktp', '$photo', '$userid', '$kecamatan', '$address', 'tokenTomboAti', '$propinsi', '$kode_pos', '$atasnama', '$rekening', '$bank', '$cabang', '$country', '$kota', now())") or die(mysqli_error($koneksi_tombo));

        if ($insert_tombo) {
            $last_id = mysqli_insert_id($koneksi_tombo);
            echo ($last_id);
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
            echo $msg_success;
        } catch (Exception $e) {
            $msg_gagal = "Gagal mengirim email. Mailer Error: {$mail->ErrorInfo}";
            echo $msg_gagal;
        }

        $_GET = array(); // lets pretend nothing was posted
        $_POST = array(); // lets pretend nothing was posted

        echo '<script type="text/javascript">alert("Pendaftaran Mitra Berhasil");</script>';

        // header("Location: register.php?error=SUCCESS");
        echo "<script type='text/javascript'>document.location.href = 'register.php';</script>";
    }
}

if ($sum_register > 0) {
    $status = '<button class="btn btn-success" name="button" type="submit">Next</button> <input type="reset" class="btn btn-danger" name="reset" value="Reset">';
} else {
    // pengecekan username
    if ($username == "company") {
        $status = '<button class="btn btn-success" name="button" type="submit">Next</button> <input type="reset" class="btn btn-danger" name="reset" value="Reset">';
    } else {
        $status = '<a class="btn btn-success" href="point-add.php">Saldo Point Register Tidak Cukup</a>';
    }
}

mysqli_query($koneksi, "UPDATE mebers SET is_seen_notifikasi_mitra='1' AND sponsor='$row[userid]' AND paket='MITRA'");


?>
</div>
</div>
</div>

<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>Register Mitra</h5>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index"><i class="ik ik-home"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div> -->
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#permintaan-mitra" role="tab" aria-controls="pills-timeline" aria-selected="true">Permintaan Mitra</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#form-register" role="tab" aria-controls="pills-profile" aria-selected="false">Form Register</a>
                        </li>
                    </ul>
                    <!-- Permintaan -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="permintaan-mitra" role="tabpanel" aria-labelledby="pills-timeline-tab">
                            <div class="card-body p-0 table-border-style">
                                <div class="card-body ">
                                    <?php
                                    $query1 = "select * from mebers where sponsor ='$username' AND (paket = 'MITRA' || paket = 'RESELLER') AND upline IS NULL ORDER BY timer DESC";
                                    $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error());
                                    ?>

                                    <table class="table table-hover" border="0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No. </center>
                                                </th>
                                                <th>
                                                    <center>Tanggal </i></center>
                                                </th>
                                                <th>
                                                    <center>Username </i></center>
                                                </th>
                                                <th>
                                                    <center>Nama Jamaah </i></center>
                                                </th>
                                                <th>
                                                    <center>Peserta</center>
                                                </th>
                                                <th>
                                                    <center>Kota </i></center>
                                                </th>
                                                <th>
                                                    <center>ID Link </i></center>
                                                </th>
                                                <th>
                                                    <center>Contact </center>
                                                </th>
                                                <th>
                                                    <center>Aksi</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 0;
                                        while ($data = mysqli_fetch_array($tampil)) {
                                            $no++;
                                        ?>

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <right><?php echo $no; ?>.</center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['timer']; ?></center>
                                                    </td>
                                                    <td>
                                                        <left>
                                                            <img src="gambar_customer/users.png" class="img-circle" alt="User Image" style="border: 2px solid #3C8DBC;" width="50" height="50" /> <?php echo $data['userid']; ?>
                                                        </left>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['name']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['paket']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['kota']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['upline']; ?></center>
                                                    </td>
                                                    <td>
                                                        <right><?php echo $data['hphone']; ?><br><?php echo $data['right']; ?></right>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <button class="btn btn-info" name="register-detail" type="button" data-toggle="modal" data-target="#detail-registerModal<?php echo $data['id']; ?>">Detail</button>
                                                            <button class="btn btn-warning" name="register-edit" type="button" data-toggle="modal" data-target="#edit-registerModal<?php echo $data['id']; ?>">Edit</a>
                                                        </center>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="detail-registerModal<?php echo $data['id']; ?>" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Detail Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row py-2">
                                                                    <div class="col-4">Username</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['userid']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Nama</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['name']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Nomor HP</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['hphone']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Email</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['email']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">KTP</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['ktp']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Provinsi</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['propinsi']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Kota / Kabupaten</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['kota']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Kecamatan</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['kecamatan']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Alamat</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['address']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Kode Pos</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['kode_pos']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Negara</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['country']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Bank</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['bank']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Cabang</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['cabang']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Rekening</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['rekening']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col-4">Account Name</div>
                                                                    <div class="col-1 text-left">:</div>
                                                                    <div class="col-7 text-left text-bold"><?php echo $data['atasnama']; ?></div>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <div class="col">Foto KTP</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col"><img src="<?php echo $data['fotoktp']; ?>" style="max-width: 200px;"></div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="edit-registerModal<?php echo $data['id']; ?>" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <form method="post" action="register-edit.php">
                                                                <div class="modal-body">
                                                                    <p>Memberikan ID Link untuk :</p>
                                                                    <div class="row py-2">
                                                                        <div class="col-4">Username</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><?php echo $data['userid']; ?></div>
                                                                    </div>
                                                                    <div class="row py-2">
                                                                        <div class="col-4">Nama</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><?php echo $data['name']; ?></div>
                                                                    </div>
                                                                    <div class="row py-2">
                                                                        <div class="col-4">Nomor HP</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><?php echo $data['hphone']; ?></div>
                                                                    </div>
                                                                    <div class="row py-2">
                                                                        <div class="col-4">KTP</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><?php echo $data['ktp']; ?></div>
                                                                    </div>
                                                                    <div class="row py-2">
                                                                        <div class="col-4">Email</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><?php echo $data['email']; ?></div>
                                                                    </div>
                                                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                                    <input type="hidden" name="userid" value="<?php echo $data['userid']; ?>">
                                                                    <input type="hidden" name="name" value="<?php echo $data['name']; ?>">
                                                                    <input type="hidden" name="email" value="<?php echo $data['email']; ?>">
                                                                    <input type="hidden" name="passw" value="<?php echo $data['passw']; ?>">
                                                                    <!-- username mitra -->
                                                                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                                                                    <div class="row py-2">
                                                                        <div class="col-4">ID Link</div>
                                                                        <div class="col-1 text-left">:</div>
                                                                        <div class="col-7 text-left text-bold"><input name="upline" type="text" class="form-control" placeholder="ID Link" id="idUserEdit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-warning" name="btn-register-edit" type="submit">Perbarui</a>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php
                                        }
                                            ?>

                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="form-register" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                <div class="state">
                                    <h6>Poin Register</h6>
                                    <?php
                                    if ($username == "company") {
                                    ?>
                                        <h2>Tidak terbatas</h2>
                                    <?php
                                    } else {
                                    ?>
                                        <h2><?php echo number_format($sum_register, 0, ',', '.'); ?></h2>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Freelance<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <?php if ($username == "company") { ?>
                                                        <input name="sponsor" type="text" class="form-control" id="sponsor" placeholder="Sponsor" value="<?php echo $_GET['sponsor']; ?>" required />
                                                    <?php } else { ?>
                                                        <input name="sponsor" type="text" class="form-control" id="sponsor" placeholder="Sponsor" value="<?php echo $row['userid']; ?>" readonly />
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">ID Link<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="upline" type="text" class="form-control" id="idLink" placeholder="ID Link" value="<?php echo $_GET['upline']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="userid" type="text" class="form-control" id="userid" placeholder="Username" value="<?php echo $_GET['userid']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="name" type="text" class="form-control" id="exampleInputUsername2" placeholder="name" value="<?php echo $_GET['name']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">HP<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="hphone" type="text" class="form-control" id="exampleInputUsername2" placeholder="hphone" value="<?php echo $_GET['hphone']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="email" type="email" class="form-control" id="exampleInputUsername2" placeholder="email" value="<?php echo $_GET['email']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">KTP<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="ktp" type="number" class="form-control" id="exampleInputUsername2" placeholder="nik" value="<?php echo $_GET['ktp']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="foto-KTP" class="col-sm-3 col-form-label">Foto KTP<br><small>Maksimal 5 MB</small><span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="fotoktp" type="file" class="form-control-file" id="foto-KTP" value="<?php echo $_GET['fotoktp']; ?>" required />
                                                    <small> Format : .jpg .jpeg .png </small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Negara<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="country" type="text" class="form-control" id="exampleInputUsername2" placeholder="Negara" value="<?php echo $_GET['country']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Propinsi<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="propinsi" type="hidden" class="form-control" id="propinsi" />
                                                    <select class="select2-data-array browser-default form-control" id="select2-propinsi" required></select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kota<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="kota" type="hidden" class="form-control" id="kota" />
                                                    <select class="select2-data-array browser-default form-control" id="select2-kota" required></select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kecamatan<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="kecamatan" type="hidden" class="form-control" id="kecamatan" />
                                                    <select class="select2-data-array browser-default form-control" id="select2-kecamatan" required></select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Alamat<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="address" type="text" class="form-control" id="exampleInputUsername2" placeholder="Alamat" value="<?php echo $_GET['address']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kodepos<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input name="kode_pos" type="number" class="form-control" id="exampleInputUsername2" placeholder="Kodepos" value="<?php echo $_GET['kode_pos']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bank</label>
                                                <div class="col-sm-9">
                                                    <input name="bank" type="text" class="form-control" id="exampleInputUsername2" placeholder="Bank" value="<?php echo $_GET['bank']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Cabang</label>
                                                <div class="col-sm-9">
                                                    <input name="cabang" type="text" class="form-control" id="exampleInputUsername2" placeholder="Cabang" value="<?php echo $_GET['cabang']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Rekening</label>
                                                <div class="col-sm-9">
                                                    <input name="rekening" type="text" class="form-control" id="exampleInputUsername2" placeholder="Account" value="<?php echo $_GET['rekening']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Account Name</label>
                                                <div class="col-sm-9">
                                                    <input name="atasnama" type="text" class="form-control" id="exampleInputUsername2" placeholder="Account Name" value="<?php echo $_GET['atasnama']; ?>" />
                                                </div>
                                            </div>
                                            <?php echo $status; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="col-md-6">
                                <form class="forms-sample" action="" method="post">
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input name="userid" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $row['userid']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password Baru</label>
                                        <div class="col-sm-9">
                                            <input name="userid" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $row['userid']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password Lama</label>
                                        <div class="col-sm-9">
                                            <input name="userid" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" value="<?php echo $row['userid']; ?>" />
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<?php
include 'footer.php';
?>
<script>
    var urlPropinsi = "https://ibnux.github.io/data-indonesia/propinsi.json";
    var urlKota = "https://ibnux.github.io/data-indonesia/kabupaten/";
    var urlKecamatan = "https://ibnux.github.io/data-indonesia/kecamatan/";

    console.log('url: ' + urlPropinsi);
    $.getJSON(urlPropinsi, function(res) {
        console.log("INSIDE FUNC");
        //console.log(res);

        var data = $.map(res, function(obj) {
            obj.text = obj.nama

            return obj;
        });
        //console.log(data);
        loadPropinsi(data);
    });

    function fetchDataKota(idPropinsi) {
        let url = urlKota + idPropinsi + ".json";
        console.log('url kota : ' + url);
        $.getJSON(url, function(res) {
            console.log("INSIDE fetchDataKota");
            //console.log(res);

            var data = $.map(res, function(obj) {
                obj.text = obj.nama

                return obj;
            });
            //console.log(data);
            loadKota(data);
        });
    }

    function fetchDataKecamatan(idKota) {
        let url = urlKecamatan + idKota + ".json";
        console.log('url kec : ' + url);
        $.getJSON(url, function(res) {
            console.log("INSIDE fetchDataKecamatan");
            //console.log(res);

            var data = $.map(res, function(obj) {
                obj.text = obj.nama

                return obj;
            });
            //console.log(data);
            loadKecamatan(data);
        });
    }

    function loadPropinsi(data) {
        console.log('loadPropinsi');
        $("#select2-propinsi").select2({
            dropdownAutoWidth: true,
            width: '100%',
            data: data
        })
    };

    function loadKota(data) {
        console.log('loadKota');
        $("#select2-kota").select2({
            dropdownAutoWidth: true,
            width: '100%',
            data: data
        })
    };

    function loadKecamatan(data) {
        console.log('loadKecamatan');
        $("#select2-kecamatan").select2({
            dropdownAutoWidth: true,
            width: '100%',
            data: data
        })
    };

    function clearOptions(id) {
        console.log("on clearOptions");

        //$('#' + id).val(null);
        $('#' + id).empty().trigger('change');
    }

    var selectProv = $('#select2-propinsi');
    $(selectProv).change(function() {
        console.log("on change selectProv");

        var value = $(selectProv).val();
        var text = $('#select2-propinsi :selected').text();
        console.log("value = " + value + " / " + "text = " + text);
        $('#propinsi').val(text);

        clearOptions('select2-kota');
        dataKota = fetchDataKota(value);
        loadKota(dataKota);

    });

    var selectKab = $('#select2-kota');
    $(selectKab).change(function() {
        console.log("on change selectKota");

        var value = $(this).val();
        var text = $('#select2-kota :selected').text();
        console.log("value = " + value + " / " + "text = " + text);
        $('#kota').val(text);

        clearOptions('select2-kecamatan');
        dataKecamatan = fetchDataKecamatan(value);
        loadKecamatan(dataKecamatan);
    });

    var selectKec = $('#select2-kecamatan');
    $(selectKec).change(function() {
        console.log("on change selectKec");

        var value = $(this).val();
        var text = $('#select2-kecamatan :selected').text();
        console.log("value = " + value + " / " + "text = " + text);
        $('#kecamatan').val(text);
    });

    // SPASI DI USERNAME
    $(function() {
        $('#userid').on('keypress', function(e) {
            if (e.which == 32) {
                console.log('Space Detected');
                return false;
            }
        });
    });

    $(function() {
        $('#idUserEdit').on('keypress', function(e) {
            if (e.which == 32) {
                console.log('Space Detected');
                return false;
            }
        });
    });

    $(function() {
        $('#idLink').on('keypress', function(e) {
            if (e.which == 32) {
                console.log('Space Detected');
                return false;
            }
        });
    });

    $(function() {
        $('#sponsor').on('keypress', function(e) {
            if (e.which == 32) {
                console.log('Space Detected');
                return false;
            }
        });
    });
</script>
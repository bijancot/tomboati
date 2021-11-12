
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
// $fotoktp = $_POST['fotoktp'];
$address = $_POST['address'];
$kecamatan = $_POST['kecamatan'];
$kota = $_POST['kota'];
$propinsi = $_POST['propinsi'];
$kode_pos = $_POST['kode_pos'];
$country = $_POST['country'];
// $buktibayar = $_POST['buktibayar'];
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

    
    function random_id()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $rand_alnum = substr(str_shuffle($permitted_chars), 0, 3);
        $date = date('Ymdhis');
        $rand_result = $date.$rand_alnum;

        return $rand_result;
    }

    // random id
    $random_id = random_id();

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

    // jika username = company, tidak ada pengecekan upline
    if ($username == "company") {
        if ($total_username != 0) {
            $_SESSION["usernameexist"] = 'Username sudah Digunakan';
            echo "<script type='text/javascript'>document.location.href = 'register.php?error=Username Sudah Digunakan&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
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

                    $_SESSION["imagebigktp"] = 'Ukuran File KTP Gambar Terlalu Besar!';
                    // echo '<script type="text/javascript">swal("Gagal!", "Ukuran File Gambar Terlalu Besar!", "error");</script>';
                    echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ukuran file gambar terlalu besar&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
                }
            } else {
                $_SESSION["imagenotcorrectktp"] = 'Ekstensi File KTP Tidak Diperbolehkan!';
                // echo '<script type="text/javascript>swal("Gagal!", "Ekstensi File Gambar Tidak Diperbolehkan!", "error");</script>';
                echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ekstensi file gambar tidak boleh&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
            }


            // UPLOAD BUKTI BAYAR
            $ekstensi_diperbolehkan    = array('PNG', 'JPG', 'JPEG', 'png', 'jpg', 'jpeg');
            $nama = $_FILES['buktibayar']['name'];
            $temp = explode('.', $nama);
            $ekstensi = strtolower(end($temp));
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $ukuran    = $_FILES['buktibayar']['size'];
            $file_tmp = $_FILES['buktibayar']['tmp_name'];

            if ($nama == "") {
                $buktibayar = NULL;
            } else {
                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                    if ($ukuran < 1044070) {
                        move_uploaded_file($file_tmp, 'gambar_transfer/' . $newfilename);
                        $buktibayar = $base_url . 'gambar_transfer/' . $newfilename;
                    } else {

                        $_SESSION["imagebigbayar"] = 'Ukuran File Gambar Terlalu Besar!';
                        // echo '<script type="text/javascript">swal("Gagal!", "Ukuran File Gambar Terlalu Besar!", "error");</script>';
                        echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ukuran file gambar terlalu besar&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
                    }
                } else {
                    $_SESSION["imagenotcorrectbayar"] = 'Ekstensi File Gambar Tidak Diperbolehkan!';
                    // echo '<script type="text/javascript>swal("Gagal!", "Ekstensi File Gambar Tidak Diperbolehkan!", "error");</script>';
                    echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ekstensi file gambar tidak boleh&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
                }
            }
            // photo username

            if ($sponsor == 'company') {
                $is_hr = 2;
            } else {
                $is_hr = 1;
            }

            $no_hp = "62" . $hphone;

            $photo = $base_url . 'gambar_customer/users.png';
            $insert_dash = mysqli_query($koneksi, "INSERT INTO mebers 
    (id, sponsor, upline, g2, g3, g4, g5, g6, g7, g8, g9, g10, userid, name, hphone, email, fotoktp, ktp, address, kecamatan, kota, propinsi, kode_pos, country, bank, cabang, rekening, atasnama, passw, bukti_bayar, photo, is_hr, usertoken, timer)
    VALUES
    ('$random_id','$sponsor', '$upline', '$g2', '$g3', '$g4', '$g5', '$g6', '$g7', '$g8', '$g9', '$g10', '$userid', '$name', '$no_hp', '$email', '$fotoktp', '$ktp', '$address', '$kecamatan', '$kota', '$propinsi', '$kode_pos', '$country', '$bank', '$cabang', '$rekening', '$atasnama', '$unik_password', '$buktibayar', '$photo', '$is_hr', 'tokenTomboAti', now())") or die(mysqli_error($koneksi));

            // config tombo (Db)
            require_once 'config-tombo.php';
            $insert_tombo = mysqli_query($koneksi_tombo, "INSERT INTO USER_REGISTER 
            (IDUSERREGISTER, STATUS_USER, NOMORKTP, EMAIL, PASSWORD, NAMALENGKAP, KODEREFERRALFROM, KODEREFERRAL, BUKTIBAYAR, NOMORHP, FILEKTP, FOTO, USERNAME, KECAMATAN, ALAMAT, USERTOKEN, PROVINSI, KODEPOS, ATASNAMA, REKENING, BANK, CABANG, NEGARA, KOTA, CREATED_AT)
            VALUES
            ('$random_id','MITRA', '$ktp', '$email', '$unik_password', '$name', '$upline', '$sponsor', '$buktibayar', '$no_hp', '$fotoktp', '$photo', '$userid', '$kecamatan', '$address', 'tokenTomboAti', '$propinsi', '$kode_pos', '$atasnama', '$rekening', '$bank', '$cabang', '$country', '$kota', now())") or die(mysqli_error($koneksi_tombo));

            if ($insert_tombo) {
                // $last_id = mysqli_insert_id($koneksi_tombo);
                // echo ($last_id);
                mysqli_query($koneksi_tombo, "INSERT INTO CHAT_ROOM (IDUSERREGISTER) VALUES ('$random_id')");
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
                <p>BISMILLAHIRROHMANIRROHIIM</p>
                <p>Dengan kesungguhan hati yang paling dalam, saya niat daftar berangkat ke Baitullah untuk Umroh / Haji dan mendaftar sebagai Mitra TomboAti, semoga Allah SWT memberikan ridlo dan pertolongan-Nya, dimudahkan dan dilancarkan. AamiinYRA…</p>
                <p>Sebagai bentuk kesungguhan dan keseriusan maka segala persyaratan dan ketentuan yang ditetapkan sudah kami baca dan setujui, serta secara bertahap akan kami penuhi sampai keberangkakan yang sudah dijadwalkan.</p>
                <p><b>SYARAT DAN KETENTUAN UMUM </b></p>
                
                <p><b>A. SYARAT PENDAFTARAN</b></p>
                <p>Untuk awal cukup mengisi Formulir Pendaftaran</p>
            
                <p><b> B. SYARAT BERKAS KEBERANGKATAN</b></p>
                <p>
                1.	Paspor masa berlaku min. 1 tahun dari tanggal keberangkatan <br>
                2.	Foto Kopy KTP dan Kartu Keluarga <br>
                3.	Buku Nikah (bagi suami + istri) <br>
                4.	Akte Lahir (bagi anak-anak) <br>
                5.	Surat Muhrim (bagi wanita yang berangkat tanpa didampingi oleh muhrimnya) <br>
                6.	Foto berwarna 4 x 6 = 3 lembar <br>
                Note : Diserahkan paling lambat 1 bulan sebelum keberangkatan yang telah ditentukan. <br>
                </p>
            
                <p><b> C. SYARAT PEMBAYARAN</b>
                <br>
                1.	Untuk mewujudkan Niat ke Baitullah dapat diawali dengan setor minimal Rp 100.000,- <br>
                2.	Biaya paket dalam mata uang US Dollar, bisa dibayar rupiah dengan kurs yang berlaku pada saat pembayaran dilakukan. <br>
                3.	Pembayaran melalui Kantor Cabang atau Mitra kami dapat dilakukan melalui bank (transfer) ke Rekening, dimohon jamaah menunjukkan bukti transfer asli dari bank yang bersangkutan untuk diberikan tanda bukti (kwitansi) pembayaran. <br>
                4.	Pembayaran dianggap sah apabila transfer melalui rekening Perusahaan a/n <br>
                <b>PT. TOMBO ATI MASYHUR</b> <br>
            
                -	MANDIRI	:  144-00-159-77-298 <br>
                -	BRI 		:  0429-01-000-592-560 <br>
                -	BCA 		:  440-031-5758 <br>
                - BSI		  : <br>  
                5.	Pembayaran diluar ketentuan diatas, bukan tanggung jawab kami.<br>
                6.	Harga dan jadwal dapat berubah disebabkan oleh adanya perubahan tarif dan jadwal penerbangan, regulasi baru Negara tujuan dan lain-lain tanpa mengurangi nilai Ibadah. <br>    
                </p>
            
                <p><b>D. BIAYA SUDAH TERMASUK</b></p>
                <p>
                1.	Tiket Pesawat Sub - Mad / Jed PP sesuai program <br>
                2.	Akomodasi / Hotel sesuai program <br>
                3.	Bimbingan Manasik Umrah	<br>
                4.	Transportasi Bus AC eksekutif <br>
                5.	Konsumsi 3 kali sehari menu Indonesia <br>
                6.	Muthawwif / Pembimbing berpengalaman <br>
                7.	Air zam – zam 5 liter <br>
                8.	Bagasi sesuai dengan ketentuan penerbangan max 20 kg <br>
                9.	Asuransi perjalanan selama mengikuti program <br>
                </p>
            
                <p><b>E.  BIAYA BELUM TERMASUK</b></p>
                <p>
                1.	Airport handling dan Perlengkapan ibadah : koper, tas tentengan, tas pasport, kain ihrom, mukena, jilbab, seragam <br>
                2.	Pembuatan Pasport dan penambahan nama (bila diperlukan) <br>
                3.	Pengurusan surat Muhrim (bila diperlukan) <br>
                4.	Pemeriksaan kesehatan dan vaksin Miningitis <br>
                5.	Kursi roda pada waktu thawaf dan sa'i bagi yang memerlukan <br>
                6.	Akomodasi, Transportasi dan acara diluar program <br>
                7.	Pengeluaran pribadi : telp, laundry dll <br>
                8.	Kehilangan barang / bagasi diluar tanggung jawab penyelenggara <br>
                9.	Force Majeur <br>
                </p>
            
                <p><b>F.  PEMBATALAN</b></p>
                <p>
                1.	Sejak pendaftaran sampai lima minggu sebelum keberangkatan dikenakan biaya sebesar 25% dari harga program umroh. <br>
                2.	Tiga minggu sebelum keberangkatan, dikenakan biaya sebesar 75% dari harga program umroh. <br>
                3.	Dua minggu sebelum keberangkatan, dikenakan biaya sebesar 100% dari harga program umroh. <br> 
                4.	Batal karena sakit / meninggal pengembalian sesuai jumlah biaya yang masih bisa diuangkan dikurangi biaya administrasi USD 200. <br>
                </p>
                
                <p><b>G.  KETENTUAN</b></p>
                <p>
                1.	Setiap orang dapat mengajukan menjadi Mitra Freelance, atau Jamaah yang telah mereferensikan jamaah lainnya secara otomatis menjadi Mitra TomboAti Tour. <br>
                2.	Mitra akan mendapat Faedah dan Hadiah yang telah ditentukan oleh TomboAti Tour. <br>
                3.	Dalam kondisi tertentu keberangkatan Umroh / Haji dapat dialihkan atau dipindah tangan kan ke orang lain atas persetujuan dari Tombo Ati Tour. <br>
                4.	Rooming list bersifat kondisional, apabila jamaah tidak mendapat kamar yang diinginkan maka jamaah bersedia upgrade dengan harga yang berlaku. <br>
                5.	Apabila terjadi delay dalam penerbangan maka sepenuhnya adalah tanggung jawab Airlines yang bersangkutan karena sudah diluar kendali travel. <br>
                6.	Apabila ada jamaah yang sakit dan memerlukan perawatan medis, maka pihak TomboAti Tour akan membantu pelaksanaannya sesuai ketentuan dari Asuransi, apabila upaya perawatan dilakukan sendiri untuk biaya merupakan tanggung jawab jamaah yang bersangkutan. <br>
                7.	Apabila ada jamaah yang meninggal dunia dalam perjalanan maka jenazah akan dimakamkan ditempat yang ditunjuk oleh yang berwenang kecuali ada permintaan dari keluarga untuk dibawa pulang maka TomboAti Tour melaksanakan sesuai aturan dan ketentuan dari Asuransi. <br>
                8.	Apabila selama perjalanan Umrah terjadi hal diluar dugaan maka pihak TomboAti Tour berhak mengambil keputusan sebagai solusi terbaik yang harus dilakukan. <br>
                9.	Biaya Visa max USD 185. <br>
                10.	Segala hal yang belum tertuang dalam persyaratan Umroh / Haji akan dibicarakan dan diselesaikan sebelum keberangkatan. <br>
                Dengan ini saya sudah membaca, mempelajari dan memahami segala persyaratan dan ketentuan yang telah di tetapkan dan menyatakan setuju mendaftar Umroh / Haji menjadi Mitra TomboAti menuju Baitullah <br>
                </p>
                <p>Hormat kami,</p>
                <p><b>Tombo Ati Tour & Travel</b></p>
                <hr>
            
                        
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
    } else {
        if (($total_upline == 0) && ($username != $upline)) {
            $_SESSION["uplinenotfound"] = 'Upline tidak Ditemukan';
            echo "<script type='text/javascript'>document.location.href = 'register.php?error=Username Upline tidak Ditemukan&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
        } else if ($total_username != 0) {
            $_SESSION["usernameexist"] = 'Username sudah Digunakan';
            echo "<script type='text/javascript'>document.location.href = 'register.php?error=Username Sudah Digunakan&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
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

                    $_SESSION["imagebigktp"] = 'Ukuran File KTP Gambar Terlalu Besar!';
                    // echo '<script type="text/javascript">swal("Gagal!", "Ukuran File Gambar Terlalu Besar!", "error");</script>';
                    echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ukuran file gambar terlalu besar&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
                }
            } else {
                $_SESSION["imagenotcorrectktp"] = 'Ekstensi File KTP Tidak Diperbolehkan!';
                // echo '<script type="text/javascript>swal("Gagal!", "Ekstensi File Gambar Tidak Diperbolehkan!", "error");</script>';
                echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ekstensi file gambar tidak boleh&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
            }


            // UPLOAD BUKTI BAYAR
            $ekstensi_diperbolehkan    = array('PNG', 'JPG', 'JPEG', 'png', 'jpg', 'jpeg');
            $nama = $_FILES['buktibayar']['name'];
            $temp = explode('.', $nama);
            $ekstensi = strtolower(end($temp));
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $ukuran    = $_FILES['buktibayar']['size'];
            $file_tmp = $_FILES['buktibayar']['tmp_name'];

            if ($nama == "") {
                $buktibayar = NULL;
            } else {
                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                    if ($ukuran < 1044070) {
                        move_uploaded_file($file_tmp, 'gambar_transfer/' . $newfilename);
                        $buktibayar = $base_url . 'gambar_transfer/' . $newfilename;
                    } else {

                        $_SESSION["imagebigbayar"] = 'Ukuran File Gambar Terlalu Besar!';
                        // echo '<script type="text/javascript">swal("Gagal!", "Ukuran File Gambar Terlalu Besar!", "error");</script>';
                        echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ukuran file gambar terlalu besar&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
                    }
                } else {
                    $_SESSION["imagenotcorrectbayar"] = 'Ekstensi File Gambar Tidak Diperbolehkan!';
                    // echo '<script type="text/javascript>swal("Gagal!", "Ekstensi File Gambar Tidak Diperbolehkan!", "error");</script>';
                    echo "<script type='text/javascript'>document.location.href = 'register.php?error=Ekstensi file gambar tidak boleh&name=$name&userid=$userid&email=$email&hphone=$hphone&ktp=$ktp&address=$address&kecamatan=$kecamatan&kota=$kota&propinsi=$propinsi&kode_pos=$kode_pos&country=$country&bank=$bank&rekening=$rekening&atasnama=$atasnama&upline=$upline&sponsor=$sponsor&cabang=$cabang';</script>";
                }
            }
            // photo username

            if ($sponsor == 'company') {
                $is_hr = 2;
            } else {
                $is_hr = 1;
            }

            $no_hp = "62" . $hphone;

            $photo = $base_url . 'gambar_customer/users.png';
            $insert_dash = mysqli_query($koneksi, "INSERT INTO mebers 
(id, sponsor, upline, g2, g3, g4, g5, g6, g7, g8, g9, g10, userid, name, hphone, email, fotoktp, ktp, address, kecamatan, kota, propinsi, kode_pos, country, bank, cabang, rekening, atasnama, passw, bukti_bayar, photo, is_hr, usertoken, timer)
VALUES
('$random_id','$sponsor', '$upline', '$g2', '$g3', '$g4', '$g5', '$g6', '$g7', '$g8', '$g9', '$g10', '$userid', '$name', '$no_hp', '$email', '$fotoktp', '$ktp', '$address', '$kecamatan', '$kota', '$propinsi', '$kode_pos', '$country', '$bank', '$cabang', '$rekening', '$atasnama', '$unik_password', '$buktibayar', '$photo', '$is_hr', 'tokenTomboAti', now())") or die(mysqli_error($koneksi));

            // config tombo (Db)
            require_once 'config-tombo.php';
            $insert_tombo = mysqli_query($koneksi_tombo, "INSERT INTO USER_REGISTER 
        (IDUSERREGISTER, STATUS_USER, NOMORKTP, EMAIL, PASSWORD, NAMALENGKAP, KODEREFERRALFROM, KODEREFERRAL, BUKTIBAYAR, NOMORHP, FILEKTP, FOTO, USERNAME, KECAMATAN, ALAMAT, USERTOKEN, PROVINSI, KODEPOS, ATASNAMA, REKENING, BANK, CABANG, NEGARA, KOTA, CREATED_AT)
        VALUES
        ('$random_id', 'MITRA', '$ktp', '$email', '$unik_password', '$name', '$upline', '$sponsor', '$buktibayar', '$no_hp', '$fotoktp', '$photo', '$userid', '$kecamatan', '$address', 'tokenTomboAti', '$propinsi', '$kode_pos', '$atasnama', '$rekening', '$bank', '$cabang', '$country', '$kota', now())") or die(mysqli_error($koneksi_tombo));

            if ($insert_tombo) {
                // $last_id = mysqli_insert_id($koneksi_tombo);
                // echo ($last_id);
                mysqli_query($koneksi_tombo, "INSERT INTO CHAT_ROOM (IDUSERREGISTER) VALUES ('$random_id')");
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
            <p>BISMILLAHIRROHMANIRROHIIM</p>
            <p>Dengan kesungguhan hati yang paling dalam, saya niat daftar berangkat ke Baitullah untuk Umroh / Haji dan mendaftar sebagai Mitra TomboAti, semoga Allah SWT memberikan ridlo dan pertolongan-Nya, dimudahkan dan dilancarkan. AamiinYRA…</p>
            <p>Sebagai bentuk kesungguhan dan keseriusan maka segala persyaratan dan ketentuan yang ditetapkan sudah kami baca dan setujui, serta secara bertahap akan kami penuhi sampai keberangkakan yang sudah dijadwalkan.</p>
            <p><b>SYARAT DAN KETENTUAN UMUM </b></p>
            
            <p><b>A. SYARAT PENDAFTARAN</b></p>
            <p>Untuk awal cukup mengisi Formulir Pendaftaran</p>
        
            <p><b> B. SYARAT BERKAS KEBERANGKATAN</b></p>
            <p>
            1.	Paspor masa berlaku min. 1 tahun dari tanggal keberangkatan <br>
            2.	Foto Kopy KTP dan Kartu Keluarga <br>
            3.	Buku Nikah (bagi suami + istri) <br>
            4.	Akte Lahir (bagi anak-anak) <br>
            5.	Surat Muhrim (bagi wanita yang berangkat tanpa didampingi oleh muhrimnya) <br>
            6.	Foto berwarna 4 x 6 = 3 lembar <br>
            Note : Diserahkan paling lambat 1 bulan sebelum keberangkatan yang telah ditentukan. <br>
            </p>
        
            <p><b> C. SYARAT PEMBAYARAN</b>
            <br>
            1.	Untuk mewujudkan Niat ke Baitullah dapat diawali dengan setor minimal Rp 100.000,- <br>
            2.	Biaya paket dalam mata uang US Dollar, bisa dibayar rupiah dengan kurs yang berlaku pada saat pembayaran dilakukan. <br>
            3.	Pembayaran melalui Kantor Cabang atau Mitra kami dapat dilakukan melalui bank (transfer) ke Rekening, dimohon jamaah menunjukkan bukti transfer asli dari bank yang bersangkutan untuk diberikan tanda bukti (kwitansi) pembayaran. <br>
            4.	Pembayaran dianggap sah apabila transfer melalui rekening Perusahaan a/n <br>
            <b>PT. TOMBO ATI MASYHUR</b> <br>
        
            -	MANDIRI	:  144-00-159-77-298 <br>
            -	BRI 		:  0429-01-000-592-560 <br>
            -	BCA 		:  440-031-5758 <br>
            - BSI		  : <br>  
            5.	Pembayaran diluar ketentuan diatas, bukan tanggung jawab kami.<br>
            6.	Harga dan jadwal dapat berubah disebabkan oleh adanya perubahan tarif dan jadwal penerbangan, regulasi baru Negara tujuan dan lain-lain tanpa mengurangi nilai Ibadah. <br>    
            </p>
        
            <p><b>D. BIAYA SUDAH TERMASUK</b></p>
            <p>
            1.	Tiket Pesawat Sub - Mad / Jed PP sesuai program <br>
            2.	Akomodasi / Hotel sesuai program <br>
            3.	Bimbingan Manasik Umrah	<br>
            4.	Transportasi Bus AC eksekutif <br>
            5.	Konsumsi 3 kali sehari menu Indonesia <br>
            6.	Muthawwif / Pembimbing berpengalaman <br>
            7.	Air zam – zam 5 liter <br>
            8.	Bagasi sesuai dengan ketentuan penerbangan max 20 kg <br>
            9.	Asuransi perjalanan selama mengikuti program <br>
            </p>
        
            <p><b>E.  BIAYA BELUM TERMASUK</b></p>
            <p>
            1.	Airport handling dan Perlengkapan ibadah : koper, tas tentengan, tas pasport, kain ihrom, mukena, jilbab, seragam <br>
            2.	Pembuatan Pasport dan penambahan nama (bila diperlukan) <br>
            3.	Pengurusan surat Muhrim (bila diperlukan) <br>
            4.	Pemeriksaan kesehatan dan vaksin Miningitis <br>
            5.	Kursi roda pada waktu thawaf dan sa'i bagi yang memerlukan <br>
            6.	Akomodasi, Transportasi dan acara diluar program <br>
            7.	Pengeluaran pribadi : telp, laundry dll <br>
            8.	Kehilangan barang / bagasi diluar tanggung jawab penyelenggara <br>
            9.	Force Majeur <br>
            </p>
        
            <p><b>F.  PEMBATALAN</b></p>
            <p>
            1.	Sejak pendaftaran sampai lima minggu sebelum keberangkatan dikenakan biaya sebesar 25% dari harga program umroh. <br>
            2.	Tiga minggu sebelum keberangkatan, dikenakan biaya sebesar 75% dari harga program umroh. <br>
            3.	Dua minggu sebelum keberangkatan, dikenakan biaya sebesar 100% dari harga program umroh. <br> 
            4.	Batal karena sakit / meninggal pengembalian sesuai jumlah biaya yang masih bisa diuangkan dikurangi biaya administrasi USD 200. <br>
            </p>
            
            <p><b>G.  KETENTUAN</b></p>
            <p>
            1.	Setiap orang dapat mengajukan menjadi Mitra Freelance, atau Jamaah yang telah mereferensikan jamaah lainnya secara otomatis menjadi Mitra TomboAti Tour. <br>
            2.	Mitra akan mendapat Faedah dan Hadiah yang telah ditentukan oleh TomboAti Tour. <br>
            3.	Dalam kondisi tertentu keberangkatan Umroh / Haji dapat dialihkan atau dipindah tangan kan ke orang lain atas persetujuan dari Tombo Ati Tour. <br>
            4.	Rooming list bersifat kondisional, apabila jamaah tidak mendapat kamar yang diinginkan maka jamaah bersedia upgrade dengan harga yang berlaku. <br>
            5.	Apabila terjadi delay dalam penerbangan maka sepenuhnya adalah tanggung jawab Airlines yang bersangkutan karena sudah diluar kendali travel. <br>
            6.	Apabila ada jamaah yang sakit dan memerlukan perawatan medis, maka pihak TomboAti Tour akan membantu pelaksanaannya sesuai ketentuan dari Asuransi, apabila upaya perawatan dilakukan sendiri untuk biaya merupakan tanggung jawab jamaah yang bersangkutan. <br>
            7.	Apabila ada jamaah yang meninggal dunia dalam perjalanan maka jenazah akan dimakamkan ditempat yang ditunjuk oleh yang berwenang kecuali ada permintaan dari keluarga untuk dibawa pulang maka TomboAti Tour melaksanakan sesuai aturan dan ketentuan dari Asuransi. <br>
            8.	Apabila selama perjalanan Umrah terjadi hal diluar dugaan maka pihak TomboAti Tour berhak mengambil keputusan sebagai solusi terbaik yang harus dilakukan. <br>
            9.	Biaya Visa max USD 185. <br>
            10.	Segala hal yang belum tertuang dalam persyaratan Umroh / Haji akan dibicarakan dan diselesaikan sebelum keberangkatan. <br>
            Dengan ini saya sudah membaca, mempelajari dan memahami segala persyaratan dan ketentuan yang telah di tetapkan dan menyatakan setuju mendaftar Umroh / Haji menjadi Mitra TomboAti menuju Baitullah <br>
            </p>
            <p>Hormat kami,</p>
            <p><b>Tombo Ati Tour & Travel</b></p>
            <hr>
        
                
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
}

?>
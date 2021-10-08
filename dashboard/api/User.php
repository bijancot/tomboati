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

function registerMitra_post()
{
    global $connect, $connect2;

    $response       = [];
    $randKTP        = rand();
    $data           = json_decode(file_get_contents("php://input"), true);
    $fotoktp        = $_FILES['fotoktp']['name'];
    $tempPath       = $_FILES['fotoktp']['tmp_name'];
    $fileSize       = $_FILES['fotoktp']['size'];

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

    $randProfil     = rand();
    $fotoprofil     = $_FILES['fotoprofil']['name'];
    $tempPath       = $_FILES['fotoprofil']['tmp_name'];
    $fileSize       = $_FILES['fotoprofil']['size'];

    if (empty($fotoprofil)) {
        $errorMSG = json_encode(array("message" => "File Foto Profil Kosong", "status" => false));
        echo $errorMSG;
    } else {
        $upload_path = '../upload/users/'; // set upload folder path 

        $fileExt = strtolower(pathinfo($fotoprofil, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png');

        if (in_array($fileExt, $valid_extensions)) {
            $file_foto_profil = $randProfil.'_'.$fotoprofil;

            if ($fileSize < 2000000) {
                move_uploaded_file($tempPath, $upload_path . $file_foto_profil);
                $file_foto_profil_db = 'https://tomboatitour.biz/dashboard/upload/users/'.$file_foto_profil;
            } else {
                $errorMSG = json_encode(array("message" => "File Foto Profil maksimal 2MB", "status" => false));
                echo $errorMSG;
            }
            
        } else {
            $errorMSG = json_encode(array("message" => "Format Foto Profil  JPG, JPEG & PNG", "status" => false));
            echo $errorMSG;
        }
    }

    $randBukti      = rand();
    $buktiBayar     = $_FILES['buktibayar']['name'];
    $tempPath       = $_FILES['buktibayar']['tmp_name'];
    $fileSize       = $_FILES['buktibayar']['size'];

    if (empty($buktiBayar)) {
        $errorMSG = json_encode(array("message" => "File Bukti Bayar Kosong", "status" => false));
        echo $errorMSG;
    } else {
        $upload_path = '../upload/users/'; // set upload folder path 

        $fileExt = strtolower(pathinfo($buktiBayar, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png');

        if (in_array($fileExt, $valid_extensions)) {
                
            $file_bukti_bayar = $randBukti.'_'.$buktiBayar;

            if ($fileSize < 2000000) {
                move_uploaded_file($tempPath, $upload_path . $file_bukti_bayar);
                $file_bukti_bayar_db = 'https://tomboatitour.biz/dashboard/upload/users/'.$file_bukti_bayar;
            } else {
                $errorMSG = json_encode(array("message" => "File Bukti Bayar maksimal 2MB", "status" => false));
                echo $errorMSG;
            }
            
        } else {
            $errorMSG = json_encode(array("message" => "Format file Bukti Bayar  JPG, JPEG & PNG", "status" => false));
            echo $errorMSG;
        }
    }

    $idUserRegister = $_GET['idUserRegister'];
    $ktp            = $_POST['ktp'];
    $email          = $_POST['email'];
    $username       = $_POST['username'];
    $bank           = $_POST['bank'];
    $rekening       = $_POST['rekening'];
    $atasnama       = $_POST['atasnama'];
    $cabang         = $_POST['cabang'];
    $createdAt      = date('Y-m-d H:i:s');
    
    if($idUserRegister != '' &&  $ktp != '' && $email != '' && $username != '' && $bank != '' && $rekening != '' && $atasnama != '' && $cabang != '' ){ 
        $get_data_username                  = $connect->query("SELECT * FROM mebers WHERE userid = '".$username."' "); 

        $get_rows_username                  = mysqli_num_rows($get_data_username); 
        
        if($get_rows_username == null){
            //db dashboard tombo

            mysqli_query($connect, "UPDATE mebers SET paket='BARU', ktp='$ktp', email='$email', userid='$username', bank='$bank', rekening='$rekening', atasnama='$atasnama', cabang='$cabang' , bukti_bayar='$file_bukti_bayar_db', photo='$file_foto_profil_db', fotoktp='$file_foto_ktp_db', timer='$createdAt' WHERE id='$idUserRegister' ");
                        
            // //db tomboati
            mysqli_query($connect2, "UPDATE USER_REGISTER SET STATUS_USER='BARU', NOMORKTP='$ktp', EMAIL='$email', USERNAME='$username', BANK='$bank', REKENING='$rekening', ATASNAMA='$atasnama', CABANG='$cabang', BUKTIBAYAR='$file_bukti_bayar_db', FOTO='$file_foto_profil_db', FILEKTP='$file_foto_ktp_db', UPDATED_AT='$createdAt' WHERE IDUSERREGISTER='$idUserRegister' ");

            $response = array(
                'error'     => false,
                'message'   => 'Sukses Register'
            );
        }else{
            $response = array(
                'error'     => true,
                'message'   => 'Username sudah terdaftar sebelumnya'
            );
        }
    }else{
        $response = array(
            'error'     => true,
            'message'   => 'Terdapat data kosong'
        );
    }
    

    header('Content-Type: application/json');
    echo json_encode($response);
}

function registerDataDiri_post()
{
    global $connect, $connect2;

    $response       = [];

    $idUserRegister = $_GET['idUserRegister'];
    $nama           = $_POST['nama'];
    $provinsi       = $_POST['provinsi'];
    $kota           = $_POST['kota'];
    $kecamatan      = $_POST['kecamatan'];
    $address        = $_POST['address'];
    $kodePos        = $_POST['kodePos'];
    $country        = $_POST['country'];

    if($idUserRegister != '' &&  $nama != '' && $provinsi != '' && $kota != '' && $kecamatan != '' && $address != '' && $kodePos != '' ){ 
        mysqli_query($connect, "UPDATE mebers SET country='$country', name='$nama', propinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', address='$address', kode_pos='$kodePos' WHERE id='$idUserRegister' ");
                    
        // //db tomboati
        mysqli_query($connect2, "UPDATE USER_REGISTER SET NEGARA='$country', NAMALENGKAP='$nama', PROVINSI='$provinsi', KOTA='$kota', KECAMATAN='$kecamatan', ALAMAT='$address', KODEPOS='$kodePos' WHERE IDUSERREGISTER='$idUserRegister' ");

        $response = array(
            'error'     => false,
            'message'   => 'Sukses Update Profil'
        );
            
    }else{
        $response = array(
            'error'     => true,
            'message'   => 'Terdapat data kosong'
        );
    }
    

    header('Content-Type: application/json');
    echo json_encode($response);
}

function login_post()
{
    global $connect, $connect2;
    $response       = [];
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $user_token     = $_POST['token'];


    $data = [];

    $get_all_data_register = $connect->query("SELECT * FROM mebers WHERE (userid ='" . $username . "' AND passw='" . $password . "') AND (paket='MITRA' OR paket='RESELLER') ");
    $get_rows = mysqli_num_rows($get_all_data_register);


    if ($get_rows > 0) {
        mysqli_query($connect, "UPDATE mebers SET usertoken='" . $user_token . "' WHERE userid='" . $username . "'");

        mysqli_query($connect2, "UPDATE USER_REGISTER SET USERTOKEN='" . $user_token . "' WHERE USERNAME='" . $username . "'");

        $get_data_by_username = mysqli_query($connect2, "SELECT * FROM USER_REGISTER JOIN CHAT_ROOM ON CHAT_ROOM.IDUSERREGISTER = USER_REGISTER.IDUSERREGISTER WHERE USERNAME ='" . $username . "' AND PASSWORD='" . $password . "'");
         
        while ($row = mysqli_fetch_object($get_data_by_username)) {
            $data[] = $row;
        }
        $response = array(
            'error'     => false,
            'message'   => 'Sukses Login',
            'data'      => $data
        );
    } else {
        $response = array(
            'error'     => true,
            'message'   => 'Gagal Login'
            
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function ganti_password(){
    global $connect, $connect2;
    $response           = [];
    $idUserRegister     = $_GET['idUserRegister'];
    $oldPassword        = $_POST['oldPassword'];
    $newPassword        = $_POST['newPassword'];
    $repeatPassword     = $_POST['repeatPassword'];

    $get_data_mebers = $connect->query("SELECT * FROM mebers WHERE id = '$idUserRegister' "); 
                
    $get_old_password = null;
    while($row = mysqli_fetch_array($get_data_mebers)){
        $get_old_password = $row['passw'];
    }

    if($oldPassword == $get_old_password){
        if($newPassword == $repeatPassword){
            mysqli_query($connect, "UPDATE mebers SET passw='" . $newPassword . "' WHERE id='" . $idUserRegister . "'");

            mysqli_query($connect2, "UPDATE USER_REGISTER SET PASSWORD='" . $newPassword . "' WHERE IDUSERREGISTER='" . $idUserRegister . "'");
            
            $response = array(
                'error'     => false,
                'message'   => 'Sukses ganti password'
                
            );
        }else{
            $response = array(
                'error'     => true,
                'message'   => 'Pastikan konfirmasi password dengan password baru sama'
                
            );
        }
    }else{
        $response = array(
            'error'     => true,
            'message'   => 'Password tidak tersedia'
            
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function logout_post()
{
    global $connect, $connect2;
    $response       = [];
    $email          = $_POST['email'];

    $get_data_by_email = $connect2->query("SELECT * FROM USER_REGISTER  WHERE EMAIL ='" . $email . "'");
    $get_rows = mysqli_num_rows($get_data_by_email);

    if ($get_rows >= 0) {
        mysqli_query($connect, "UPDATE mebers SET usertoken='" . null . "' WHERE email='" . $email . "'");

        mysqli_query($connect2, "UPDATE USER_REGISTER SET USERTOKEN='" . null . "' WHERE EMAIL='" . $email . "'");

        $response = array(
            'error'     => false,
            'message'   => 'Sukses Logout'
        );
    } else {
        $response = array(
            'error'     => true,
            'message'   => 'Gagal Logout'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function ubah_data_profil(){
    
    global $connect, $connect2;
    $response           = [];

    $idUserRegister = $_GET['idUserRegister'];
    $nama           = $_POST['nama'];
    $provinsi       = $_POST['provinsi'];
    $kota           = $_POST['kota'];
    $kecamatan      = $_POST['kecamatan'];
    $address        = $_POST['address'];
    $kodePos        = $_POST['kodePos'];
    $country        = $_POST['country'];
    $email          = $_POST['email'];

    if($idUserRegister != '' &&  $nama != '' && $provinsi != '' && $kota != '' && $kecamatan != '' && $address != '' && $kodePos != '' && $country != '' && $email != ''){ 
        $get_id                  = $connect->query("SELECT * FROM mebers WHERE id = '".$idUserRegister."' "); 
        $get_rows_id             = mysqli_num_rows($get_id);

        if($get_rows_id > 0){
            mysqli_query($connect, "UPDATE mebers SET country='$country', name='$nama', propinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', address='$address', kode_pos='$kodePos', email='$email' WHERE id='$idUserRegister' ");
                    
            // //db tomboati
            mysqli_query($connect2, "UPDATE USER_REGISTER SET NEGARA='$country', NAMALENGKAP='$nama', PROVINSI='$provinsi', KOTA='$kota', KECAMATAN='$kecamatan', ALAMAT='$address', KODEPOS='$kodePos', EMAIL='$email' WHERE IDUSERREGISTER='$idUserRegister' ");
    
            $response = array(
                'error'     => false,
                'message'   => 'Sukses Update Profil'
            );   
        }else{
            $response = array(
                'error'     => true,
                'message'   => 'Gagal Update Profil'
            ); 
        }

       
    }else{
        $response = array(
            'error'     => true,
            'message'   => 'Terdapat data kosong'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function ubah_foto_profil(){
    
    global $connect, $connect2;
    $response           = [];

    $idUserRegister = $_GET['idUserRegister'];

    $randProfil     = rand();
    $fotoprofil     = $_FILES['fotoprofil']['name'];
    $tempPath       = $_FILES['fotoprofil']['tmp_name'];
    $fileSize       = $_FILES['fotoprofil']['size'];

    if (empty($fotoprofil)) {
        $errorMSG = json_encode(array("message" => "File Foto Profil Kosong", "error" => true));
        echo $errorMSG;
    } else {
        $upload_path = '../upload/users/'; // set upload folder path 

        $fileExt = strtolower(pathinfo($fotoprofil, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png');

        if (in_array($fileExt, $valid_extensions)) {
            $file_foto_profil = $randProfil.'_'.$fotoprofil;

            if ($fileSize < 2000000) {
                move_uploaded_file($tempPath, $upload_path . $file_foto_profil);
                $file_foto_profil_db = 'https://tomboatitour.biz/dashboard/upload/users/'.$file_foto_profil;
            } else {
                $errorMSG = json_encode(array("message" => "File Foto Profil maksimal 2MB", "status" => false));
                echo $errorMSG;
            }
            
        } else {
            $errorMSG = json_encode(array("message" => "Format Foto Profil  JPG, JPEG & PNG", "status" => false));
            echo $errorMSG;
        }
    }
    
    mysqli_query($connect, "UPDATE mebers SET photo='$file_foto_profil_db' WHERE id='$idUserRegister' ");
            
    // //db tomboati
    mysqli_query($connect2, "UPDATE USER_REGISTER SET FOTO='$file_foto_profil_db' WHERE IDUSERREGISTER='$idUserRegister' ");

    $response = array(
        'error'         => false,
        'message'       => 'Sukses Update Foto Profil',
        'file_foto'     => $file_foto_profil_db
    );  

    header('Content-Type: application/json');
    echo json_encode($response);
}

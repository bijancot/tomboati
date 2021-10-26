<?php
require_once "config.php";
require_once "config2.php";

if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function register()
{
    global $connect, $connect2;

    $nomorHP        = $_POST['nomorHP'];
    $referral       = $_POST['referral'];
    $user_token     = $_POST['token'];
    $createdAt      = date('Y-m-d H:i:s');

    $data_dash_tombo = [];
    $data_tomboati = [];

    //get_data
    $get_phone_from_data_register       = $connect->query("SELECT * FROM mebers WHERE hphone ='" . $nomorHP . "'");
    $get_referral_from_data_register    = $connect->query("SELECT * FROM mebers WHERE userid ='" . $referral . "'");
    $get_phone_refferal                 = $connect->query("SELECT * FROM mebers WHERE hphone ='" . $nomorHP . "' AND sponsor ='" . $referral . "'");
    $get_phone                          = $connect->query("SELECT hphone FROM mebers ");
    $get_sponsor                        = $connect->query("SELECT sponsor FROM mebers WHERE hphone ='" . $nomorHP . "'");

    //get_rows
    $get_rows_phone                     = mysqli_num_rows($get_phone_from_data_register);
    $get_rows_referral                  = mysqli_num_rows($get_referral_from_data_register);
    $get_rows_phone_referral            = mysqli_num_rows($get_phone_refferal);

    if ($get_rows_phone_referral != null) {
        $get_data_after_insert_db_dashboard_tombo = $connect->query("SELECT * FROM mebers WHERE paket = 'USER' AND hphone ='" . $nomorHP . "' AND sponsor = '" . $referral . "' ");

        $get_id_from_data_after_insert = null;
        while ($row = mysqli_fetch_array($get_data_after_insert_db_dashboard_tombo)) {
            $get_id_from_data_after_insert = $row['id'];
        }
        mysqli_query($connect2, "UPDATE USER_REGISTER SET USERTOKEN='$user_token' WHERE IDUSERREGISTER=" . $get_id_from_data_after_insert . "");

        //update_user_token_db_dashboard_tombo
        mysqli_query($connect, "UPDATE mebers SET usertoken='$user_token' WHERE id=" . $get_id_from_data_after_insert . "");

        $get_data_register_by_phone = mysqli_query($connect, "SELECT * FROM mebers WHERE id=" . $get_id_from_data_after_insert . "");
        $get_data_register_by_phone_tomboati = mysqli_query($connect2, "SELECT * FROM USER_REGISTER JOIN CHAT_ROOM ON CHAT_ROOM.IDUSERREGISTER = USER_REGISTER.IDUSERREGISTER WHERE USER_REGISTER.IDUSERREGISTER=" . $get_id_from_data_after_insert . "");
        $get_rows = mysqli_num_rows($get_data_register_by_phone);

        while ($row = mysqli_fetch_object($get_data_register_by_phone)) {
            $data_dash_tombo[] = $row;
        }

        while ($row_tomboati = mysqli_fetch_object($get_data_register_by_phone_tomboati)) {
            $data_tomboati[] = $row_tomboati;
        }

        $response = array(
            'error'     => true,
            'message'   => 'Sukses Login',
            'data_db_dash_tombo'        => $data_dash_tombo,
            'data_tomboati'             => $data_tomboati
        );
    } elseif ($get_rows_phone == null && $get_rows_referral != null) {
        mysqli_query($connect, "INSERT INTO mebers(paket, hphone, sponsor, timer) VALUES('USER', '$nomorHP', '$referral', '$createdAt')");

        //get_data_after_insert_db_dashboard_tombo
        $get_data_after_insert_db_dashboard_tombo = $connect->query("SELECT * FROM mebers WHERE paket = 'USER' AND hphone ='" . $nomorHP . "' AND sponsor = '" . $referral . "' ");

        $get_id_from_data_after_insert = null;
        while ($row = mysqli_fetch_array($get_data_after_insert_db_dashboard_tombo)) {
            $get_id_from_data_after_insert = $row['id'];
        }

        //db tomboati
        mysqli_query($connect2, "INSERT INTO USER_REGISTER(STATUS_USER, IDUSERREGISTER, NOMORHP,KODEREFERRAL, CREATED_AT) VALUES('USER', '$get_id_from_data_after_insert','$nomorHP','$referral', '$createdAt')");

        //update_user_token_db_tombo
        mysqli_query($connect2, "UPDATE USER_REGISTER SET USERTOKEN='$user_token' WHERE IDUSERREGISTER=" . $get_id_from_data_after_insert . "");

        //update_user_token_db_dashboard_tombo
        mysqli_query($connect, "UPDATE mebers SET usertoken='$user_token' WHERE id=" . $get_id_from_data_after_insert . "");

        //insert chat_room tomboati
        mysqli_query($connect2, "INSERT INTO CHAT_ROOM(IDUSERREGISTER) VALUES('$get_id_from_data_after_insert')");

        $get_data_register_by_phone = mysqli_query($connect, "SELECT * FROM mebers WHERE id=" . $get_id_from_data_after_insert . "");
        $get_data_register_by_phone_tomboati = mysqli_query($connect2, "SELECT * FROM USER_REGISTER JOIN CHAT_ROOM ON CHAT_ROOM.IDUSERREGISTER = USER_REGISTER.IDUSERREGISTER WHERE USER_REGISTER.IDUSERREGISTER=" . $get_id_from_data_after_insert . "");
        $get_rows = mysqli_num_rows($get_data_register_by_phone);

        while ($row = mysqli_fetch_object($get_data_register_by_phone)) {
            $data_dash_tombo[] = $row;
        }

        while ($row_tomboati = mysqli_fetch_object($get_data_register_by_phone_tomboati)) {
            $data_tomboati[] = $row_tomboati;
        }

        $response = array(
            'error'                     => false,
            'message'                   => 'Sukses Register',
            'data_db_dash_tombo'        => $data_dash_tombo,
            'data_tomboati'             => $data_tomboati
        );
    } elseif ($get_rows_referral == null) {
        $response = array(
            'error'     => true,
            'message'   => 'Refferral Tidak Tersedia'
        );
    } elseif ($get_phone != $nomorHP && $get_sponsor != null) {
        $response = array(
            'error'     => true,
            'message'   => 'No HP Anda telah terdaftar dengan refferal lain'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

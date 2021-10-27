<?php
class Aksi
{
    private $conTombo = null;
    private $conDash = null;

    public function __construct()
    {
        require('Koneksi.php');
        $this->conTombo = new Koneksi('tomboati');
        $this->conDash = new Koneksi('dash_tombo');
    }

    public function register()
    {
        $POST = $_POST;
        $CEK_REFERRAL = $this->executeDash("SELECT * FROM mebers WHERE userid ='" . $POST['referral'] . "' AND paket != 'USER'");
        $CEK_USER = $this->executeDash("SELECT * FROM mebers WHERE hphone ='" . $POST['nomorHP'] . "' ORDER BY paket DESC");

        if ($CEK_REFERRAL->num_rows < 1) {
            $RESPONSE = [
                'error'     => true,
                'message'   => 'Refferral Tidak Tersedia'
            ];
        } else {
            if ($CEK_USER->num_rows < 1) {
                $DATE = $this->getDateNow();
                $this->executeDash("INSERT INTO mebers(paket, hphone, sponsor, timer, usertoken) VALUES('USER','" . $POST['nomorHP'] . "','" . $POST['referral'] . "','" . $DATE . "','" . $POST['token'] . "')");
                $USER = $this->executeDash("SELECT id FROM mebers WHERE timer ='" . $DATE . "'")->fetch_array(MYSQLI_ASSOC);
                $this->executeTombo("INSERT INTO USER_REGISTER(STATUS_USER, IDUSERREGISTER, NOMORHP, KODEREFERRAL, CREATED_AT, USERTOKEN) VALUES('USER','" . $USER['id'] . "','" .  $POST['nomorHP'] . "','" . $POST['referral'] . "','" . $DATE . "','" . $POST['token'] . "')");
                $this->executeTombo("INSERT INTO CHAT_ROOM(IDUSERREGISTER) VALUES('" . $USER['id'] . "')");

                $DATA_TOMBO = $this->executeTombo("SELECT * FROM USER_REGISTER, CHAT_ROOM WHERE USER_REGISTER.IDUSERREGISTER = CHAT_ROOM.IDUSERREGISTER AND USER_REGISTER.IDUSERREGISTER ='" . $USER['id'] . "'")->fetch_object();
                $DATA_DASH = $this->executeDash("SELECT * FROM mebers WHERE id ='" . $USER['id'] . "'")->fetch_object();
                $RESPONSE = [
                    'error'                     => false,
                    'message'                   => 'Sukses Daftar',
                    'data_db_dash_tombo'        => $DATA_DASH,
                    'data_tomboati'             => $DATA_TOMBO
                ];
            } else {
                $DATA_USER = $CEK_USER->fetch_array(MYSQLI_ASSOC);
                if (strcmp($DATA_USER['paket'], 'USER') != 0) {
                    $RESPONSE = [
                        'error'     => true,
                        'message'   => 'Akun anda terdaftar sebagai mitra, silahkan masuk sebagai mitra'
                    ];
                } else if (strcmp($DATA_USER['sponsor'], $POST['referral']) != 0) {
                    $RESPONSE = [
                        'error'     => true,
                        'message'   => 'Refferal anda salah'
                    ];
                } else {
                    $this->executeDash("UPDATE mebers SET usertoken ='" . $POST['token'] . "' WHERE id ='" . $DATA_USER['id'] . "'");
                    $this->executeTombo("UPDATE USER_REGISTER SET USERTOKEN ='" . $POST['token'] . "' WHERE IDUSERREGISTER ='" . $DATA_USER['id'] . "'");
                    $DATA_TOMBO = $this->executeTombo("SELECT * FROM USER_REGISTER, CHAT_ROOM WHERE USER_REGISTER.IDUSERREGISTER = CHAT_ROOM.IDUSERREGISTER AND USER_REGISTER.IDUSERREGISTER ='" . $DATA_USER['id'] . "'")->fetch_object();
                    $RESPONSE = [
                        'error'                     => false,
                        'message'                   => 'Sukses Masuk',
                        'data_db_dash_tombo'        => $DATA_USER,
                        'data_tomboati'             => $DATA_TOMBO
                    ];
                }
            }
        }
        echo json_encode($RESPONSE);
    }

    public function login()
    {
        $POST = $_POST;
        $CEK_USER = $this->executeDash("SELECT id, passw FROM mebers WHERE userid ='" . $POST['username'] . "'");
        if ($CEK_USER->num_rows < 1) {
            $RESPONSE = [
                'error'     => true,
                'message'   => 'Akun anda tidak ditemukan'
            ];
        } else {
            $DATA_USER = $CEK_USER->fetch_array(MYSQLI_ASSOC);
            if (strcmp($DATA_USER['passw'], $POST['password']) != 0) {
                $RESPONSE = [
                    'error'     => true,
                    'message'   => 'Password anda salah'
                ];
            } else {
                $this->executeDash("UPDATE mebers SET usertoken ='" . $POST['token'] . "' WHERE id ='" . $DATA_USER['id'] . "'");
                $this->executeTombo("UPDATE USER_REGISTER SET USERTOKEN ='" . $POST['token'] . "' WHERE IDUSERREGISTER ='" . $DATA_USER['id'] . "'");
                $DATA_USER = $this->executeTombo("SELECT * FROM USER_REGISTER, CHAT_ROOM WHERE USER_REGISTER.IDUSERREGISTER = CHAT_ROOM.IDUSERREGISTER AND USER_REGISTER.IDUSERREGISTER ='" . $DATA_USER['id'] . "'")->fetch_object();
                $RESPONSE = [
                    'error'     => false,
                    'message'   => 'Sukses login',
                    'data'      => $DATA_USER
                ];
            }
        }
        echo json_encode($RESPONSE);
    }

    public function logout()
    {
        $POST = $_POST;
        $DATA_USER = $this->executeDash("SELECT id FROM mebers WHERE userid ='" . $POST['username'] . "'");
        if ($DATA_USER->num_rows < 1) {
            $RESPONSE = [
                'error'     => true,
                'message'   => 'Gagal logout!'
            ];
        } else {
            $this->executeDash("UPDATE mebers SET usertoken =null WHERE userid ='" . $POST['username'] . "'");
            $this->executeTombo("UPDATE USER_REGISTER SET USERTOKEN =null WHERE USERNAME ='" . $POST['username'] . "'");
            $RESPONSE = [
                'error'     => false,
                'message'   => 'Berhasil logout!'
            ];
        }
        echo json_encode($RESPONSE);
    }

    public function poin()
    {
        $USERNAME = $_GET['userid'];
        $POIN = $this->executeDash("SELECT ROUND(SUM(point), 2) AS poin FROM bonus_titik WHERE userid ='" . $USERNAME . "'")->fetch_array(MYSQLI_ASSOC);;
        if ($POIN['poin'] == null) {
            $RESPONSE = [
                'error'         => true,
                'message'       => 'Gagal tampil poin',
                'poin'          => '0'
            ];
        } else {
            $RESPONSE = [
                'error'         => false,
                'message'       => 'Sukses tampil poin',
                'poin'          => $POIN['poin']
            ];
        }
        echo json_encode($RESPONSE);
    }

    private function executeTombo($query)
    {
        return $this->conTombo->execute($query);
    }

    private function executeDash($query)
    {
        return $this->conDash->execute($query);
    }

    private function getDateNow()
    {
        return date('Y-m-d H:i:s');
    }
}

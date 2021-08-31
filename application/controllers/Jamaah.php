<?php
class Jamaah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->library('table');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
        $this->load->model('MJamaah');
        
    }

    public function index()
    {
        //notifikasi
        $countMessage           = $this->MNotifikasi->countMessage();
        $dataNotifChat          = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        $dataJamaahUmroh             = $this->MJamaah->getJamaahUmroh();
        $dataJamaahWisataHalal       = $this->MJamaah->getJamaahWisataHalal();
        
        $updateJamaah           = $this->MJamaah->updateJamaah();
        
        $data = array(
            'title'             => 'Jamaah | Tombo Ati',
            'jamaah'            => $dataJamaahUmroh,
            'wisataHalal'       => $dataJamaahWisataHalal,
            'countMessage'      => $countMessage,
            'dataNotifChat'     => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('jamaah/VJamaah', $data);
    }

    public function notifJamaah(){
         //notifikasi
         $countMessage           = $this->MNotifikasi->countMessage();
         $dataNotifChat          = $this->MNotifikasi->dataNotifChat();
         $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();
 
         $dataJamaah             = $this->MJamaah->getJamaahUmroh();
         
         $updateJamaah           = $this->MJamaah->updateJamaah();
         
         $data = array(
             'title'             => 'Jamaah | Tombo Ati',
             'jamaah'            => $dataJamaah,
             'countMessage'      => $countMessage,
             'dataNotifChat'     => $dataNotifChat,
             'countJamaahDaftar' => $countJamaahDaftar
         );
 
         redirect('Jamaah');
    }

    public function aksiVerifikasiPendaftaran($kodePendaftaran){
        //verif pendaftaran
        $this->MJamaah->verifPendaftaranJamaah($kodePendaftaran);

        //verif transaksi
        $this->MJamaah->verifTransaksiJamaah($kodePendaftaran);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Jamaah berhasil diverifikasi! </div>');

        $dataNotif = $this->db->query('SELECT USERTOKEN, PENDAFTARAN.NAMALENGKAP AS NAMALENGKAP FROM PENDAFTARAN JOIN USER_REGISTER ON USER_REGISTER.IDUSERREGISTER = PENDAFTARAN.IDUSERREGISTER WHERE KODEPENDAFTARAN ='.$kodePendaftaran)->result();
        
        $token          = null;
        $namaLengkap    = null;

        foreach ($dataNotif as $data) {
            $token          = $data->USERTOKEN;
            $namaLengkap    = $data->NAMALENGKAP;
        }
        
        $dataNotif = array(
            'token'         => $token,
            'namaLengkap'   => $namaLengkap
        );

        $this->load->view('notif/verifikasiPendaftaranJamaah', $dataNotif);
        redirect('Jamaah');
    }

    public function aksiCabutVerifikasiPendaftaran($kodePendaftaran){
        //cabut pendaftaran
        $this->MJamaah->cabutPendaftaranJamaah($kodePendaftaran);

        //cabut transaksi
        $this->MJamaah->cabutTransaksiJamaah($kodePendaftaran);
        
        // echo $this->db->last_query();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Cabut verifikasi berhasil! </div>');

        $dataNotif = $this->db->query('SELECT USERTOKEN, PENDAFTARAN.NAMALENGKAP AS NAMALENGKAP FROM PENDAFTARAN JOIN USER_REGISTER ON USER_REGISTER.IDUSERREGISTER = PENDAFTARAN.IDUSERREGISTER WHERE KODEPENDAFTARAN ='.$kodePendaftaran)->result();
        
        $token          = null;
        $namaLengkap    = null;

        foreach ($dataNotif as $data) {
            $token          = $data->USERTOKEN;
            $namaLengkap    = $data->NAMALENGKAP;
        }
        
        $dataNotif = array(
            'token'         => $token,
            'namaLengkap'   => $namaLengkap
        );

        $this->load->view('notif/cabutVerifikasiPendaftaranJamaah', $dataNotif);

        redirect('Jamaah');
    }

    public function aksiHapusJamaah($kodePendaftaran)
    { 
        //delete
        $this->MJamaah->deleteJamaah($kodePendaftaran);
        
        //alert ketika sudah terhapus
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Jamaah berhasil dihapus! </div>');

        redirect('Jamaah');
    }
}
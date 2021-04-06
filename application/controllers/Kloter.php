<?php
class Kloter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->library('table');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
        $this->load->model('MKloter');
        
    }

    public function index()
    {
        //notifikasi
        $countMessage           = $this->MNotifikasi->countMessage();
        $dataNotifChat          = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        $dataJamaah             = $this->MKloter->getKloterbyPaket();
        // $countJamaah            = $this->MKloter->countKloterbyPaket();
        
        $updateJamaah           = $this->MKloter->updateJamaah();
        
        $data = array(
            'title'             => 'Kloter Paket | Tombo Ati',
            'jamaah'            => $dataJamaah,
            // 'count'             => $countJamaah,
            'countMessage'      => $countMessage,
            'dataNotifChat'     => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('kloter/VKloter', $data);
    }

    public function aturKloter($IDPAKET)
    {
        //notifikasi
        $countMessage           = $this->MNotifikasi->countMessage();
        $dataNotifChat          = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        // Data utama Paket
        $databyPaket            = $this->MKloter->getSelectPaket($IDPAKET);
        // Untuk data kloter
        $databyKloter           = $this->MKloter->getKloter($IDPAKET);
        // Data untuk orang yang belum masuk kloter
        $unkownKloter           = $this->MKloter->getUnknownKloter($IDPAKET);
        
        $updateJamaah           = $this->MKloter->updateJamaah();
        
        $data = array(
            'title'             => 'Kloter | Tombo Ati',
            'paket'             => $databyPaket,
            'kloter'            => $databyKloter,
            'unkownKloter'      => $unkownKloter,
            'countMessage'      => $countMessage,
            'dataNotifChat'     => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('kloter/VAturKloter', $data);
    }

    public function tambahKloter($IDPAKET)
    {
        //notifikasi
        $countMessage           = $this->MNotifikasi->countMessage();
        $dataNotifChat          = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        // Data utama Paket
        $databyPaket            = $this->MKloter->getSelectPaket($IDPAKET);
        // Data untuk orang yang belum masuk kloter
        $unkownKloter           = $this->MKloter->getUnknownKloter($IDPAKET);

        $updateJamaah           = $this->MKloter->updateJamaah();
        
        $data = array(
            'title'             => 'Kloter | Tombo Ati',
            'idPaket'           => $IDPAKET,
            'paket'             => $databyPaket,
            'unkownKloter'      => $unkownKloter,
            'countMessage'      => $countMessage,
            'dataNotifChat'     => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('kloter/VTambahKloter', $data);
    }

    public function aksiTambahKloter($IDPAKET)
    {
        $idPaket = $IDPAKET;

        $idMasterPaket = $this->input->post('idMasterPaket');
        $kodePendaftaran = $this->input->post('kodePendaftaranJamaah');
        // $kloter = $this->input->post('kloter');
        foreach ($kodePendaftaran as $object) {
            $data = array(
                'KODEPENDAFTARAN' => $object,
                'KLOTER' => $idPaket.'-'.$idMasterPaket.'-'.$this->input->post('kloter')
            );

            $this->MKloter->addKloter($data);
        }

        //alert
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kloter berhasil ditambahkan! </div>');

        redirect('Kloter/aturKloter/'.$idPaket);
    }

    public function editKloter($kloter)
    {
        //notifikasi
        $countMessage           = $this->MNotifikasi->countMessage();
        $dataNotifChat          = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        //MEMOTONG KLOTER
        $idPaket = substr($kloter, 0, 4);
        $idMasterPaket = substr($kloter, 5, 7);
        $kodeKloter = substr($kloter, 13);

        // Data Kloter
        $dataKloter             = $this->MKloter->getEditKloter($idPaket, $kloter);
        // Data untuk orang yang belum masuk kloter
        $unkownKloter           = $this->MKloter->getUnknownKloter($idPaket);

        $updateJamaah           = $this->MKloter->updateJamaah();
        
        $data = array(
            'title'             => 'Kloter | Tombo Ati',
            'kodeKloter'        => $kloter,
            'kloter'            => $dataKloter,
            'unkownKloter'      => $unkownKloter,
            'countMessage'      => $countMessage,
            'dataNotifChat'     => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('kloter/VEditKloter', $data);
    }

    public function aksiEditKloter($kloter)
    {

        $idPaket = $this->input->post('idPaket');
        $idMasterPaket = $this->input->post('idMasterPaket');
        // Jamaah yang baru masuk
        $kodePendaftaranJamaah = $this->input->post('kodePendaftaranJamaah');
        // Jamaah yang sudah masuk
        $kodePendaftaranJamaahKloter = $this->input->post('kodePendaftaranJamaahKloter');

        // Kloter yang diproses
        $oldKloter = $kloter;

        $kloter = $idPaket.'-'.$idMasterPaket.'-'.$this->input->post('kloter');

        // Ini jika merubah nama kloter nya
        if($oldKloter != $kloter){
            foreach ($kodePendaftaranJamaahKloter as $object) {
                $data = array(
                    'KODEPENDAFTARAN' => $object,
                    'KLOTER' => $kloter
                );
            // update yang baru
                $this->MKloter->addKloter($data);
            }
        //alert
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Nama Kloter berhasil diperbarui! </div>');
        }

        // Jika menambahkan orang
        if($kodePendaftaranJamaah != NULL){
        // Ini jika hanya menambah orang di kloter
            foreach ($kodePendaftaranJamaah as $object) {
                $data = array(
                    'KODEPENDAFTARAN' => $object,
                    'KLOTER' => $kloter
                );
            // update yang baru
                $this->MKloter->addKloter($data);
            }
        //alert
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Jamaah berhasil diperbarui! </div>');
        }

        redirect('Kloter/editKloter/'.$kloter);
    }

    public function aksiHapusKloter($kloter)
    {

        //MEMOTONG KLOTER
        $idPaket = substr($kloter, 0, 4);
        $idMasterPaket = substr($kloter, 5, 7);
        $kodeKloter = substr($kloter, 13);

        //delete
        $this->MKloter->deleteKloter($kloter);


        //alert
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kloter berhasil dihapus! </div>');

        redirect('Kloter/aturKloter/'.$idPaket);
    }

    public function aksiHapusJamaahKloter($kloter, $kodePendaftaran)
    {
        //delete
        $this->MKloter->deleteJamaahKloter($kodePendaftaran);

        //alert
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Jamaah berhasil dihapus! </div>');

        redirect('Kloter/editKloter/'.$kloter);
    }

    // Menyimpan karomah
    public function aksiKaromahKloter($kloter)
    {
        //MEMOTONG KLOTER
        $idPaket = substr($kloter, 0, 4);
        $idMasterPaket = substr($kloter, 5, 7);
        $kodeKloter = substr($kloter, 13);

        $kodePendaftaran = $this->input->post('karomah'.$kloter);
        // Pengecekan karomah
        if($kodePendaftaran != NULL){

            // tambah karomah yang baru
            $data = array(
                'KODEPENDAFTARAN' => $kodePendaftaran
            );

            $this->MKloter->addKaromah($data);
            
            // Untuk mengecek karomah di kloter 
            $checkKaromah = $this->MKloter->checkKaromah($kloter);

            // Jika karomah sebelumnya beda
            if($checkKaromah[0]['JUMLAH'] > 1){
            // pengecekan karomah yang sebelumnya
                $data = array(
                    'KODEPENDAFTARAN' => $kodePendaftaran,
                    'KLOTER' => $kloter
                );

                $this->MKloter->deleteKaromah($data);
            }
        // Jika sama tidak akan berubah
        }
        
        redirect('Kloter/aturKloter/'.$idPaket);
    }

    public function notifJamaah(){
         //notifikasi
     $countMessage           = $this->MNotifikasi->countMessage();
     $dataNotifChat          = $this->MNotifikasi->dataNotifChat();
     $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

     $dataJamaah             = $this->MKloter->getJamaah();

     $updateJamaah           = $this->MKloter->updateJamaah();

     $data = array(
         'title'             => 'Jamaah | Tombo Ati',
         'jamaah'            => $dataJamaah,
         'countMessage'      => $countMessage,
         'dataNotifChat'     => $dataNotifChat,
         'countJamaahDaftar' => $countJamaahDaftar
     );

     redirect('Kloter');
 }

 public function aksiVerifikasiPendaftaran($kodePendaftaran){
        //verif
    $this->MKloter->verifPendaftaranJamaah($kodePendaftaran);

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
    redirect('Kloter');
}

public function aksiCabutVerifikasiPendaftaran($kodePendaftaran){
        //verif
    $this->MKloter->cabutPendaftaranJamaah($kodePendaftaran);

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

    redirect('Kloter');
}
}
<?php
class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
        $this->load->model('MPembayaran');
    }
    
    public function index()
    {
        //notifikasi
        $countMessage           = $this->MNotifikasi->countMessage();
        $dataNotifChat          = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();
        $pembayaran             = $this->MPembayaran->getPembayaran();
        $countJamaahBayar       = $this->MNotifikasi->countJamaahBayar();

        $data = array(
            'title'             => 'Pembayaran | Tombo Ati',
            'countMessage'      => $countMessage,
            'dataNotifChat'     => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar,
            'countJamaahBayar'  => $countJamaahBayar,
            'pembayaran'        => $pembayaran
        );
        
        $this->template->view('pembayaran/VPembayaran', $data);
    }

    public function detailPembayaran($idPembayaran)
    {
        //notifikasi
        $countMessage           = $this->MNotifikasi->countMessage();
        $dataNotifChat          = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();
        $pembayaran             = $this->MPembayaran->getDetailPembayaran($idPembayaran);
        $countJamaahBayar       = $this->MNotifikasi->countJamaahBayar();

        $data = array(
            'title'             => 'Pembayaran | Tombo Ati',
            'countMessage'      => $countMessage,
            'dataNotifChat'     => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar,
            'countJamaahBayar'  => $countJamaahBayar,
            'pembayaran'        => $pembayaran
        );
        
        $this->template->view('pembayaran/VDetailPembayaran', $data);
    }

    public function notifPembayaran()
    {
        //notifikasi
        $countMessage           = $this->MNotifikasi->countMessage();
        $dataNotifChat          = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();
        $countJamaahBayar       = $this->MNotifikasi->countJamaahBayar();

        $updateJamaah           = $this->MPembayaran->updatePembayaran();
        
        $data = array(
            'title'             => 'Jamaah | Tombo Ati',
            'jamaah'            => $dataJamaah,
            'countMessage'      => $countMessage,
            'dataNotifChat'     => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar,
            'countJamaahBayar'  => $countJamaahBayar
        );

        redirect('Pembayaran');
    }

    public function aksiVerifikasiPembayaran($idPembayaran, $idDetailPembayaran){
        //verif pendaftaran
        $this->MPembayaran->verifDetailPembayaran($idDetailPembayaran);

        $dataPembayaran = $this->db->query('SELECT SUM(JUMLAHPEMBAYARAN) AS JUMLAH, TOTALPEMBAYARAN FROM DETAIL_PEMBAYARAN JOIN PEMBAYARAN ON PEMBAYARAN.IDPEMBAYARAN = DETAIL_PEMBAYARAN.IDPEMBAYARAN WHERE DETAIL_PEMBAYARAN.IDPEMBAYARAN = "'.$idPembayaran.'" AND DETAIL_PEMBAYARAN.STATUSPEMBAYARAN = 1')->result();
        
        foreach($dataPembayaran as $data){
            $sisaPembayaran     = $data->JUMLAH;
            $totalPembayaran    = $data->TOTALPEMBAYARAN;
        }

        
        $sisa = $totalPembayaran - $sisaPembayaran;

        $this->MPembayaran->updateSisaPembayaran($sisa, $idPembayaran);

        //verif transaksi
        if($sisa <= 0){
            $this->MPembayaran->updatePembayaranTransaksi($idPembayaran);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pembayaran berhasil diverifikasi! </div>');

        $dataNotif = $this->db->query('SELECT USERTOKEN FROM DETAIL_PEMBAYARAN JOIN PEMBAYARAN ON PEMBAYARAN.IDPEMBAYARAN = DETAIL_PEMBAYARAN.IDPEMBAYARAN JOIN TRANSAKSI ON TRANSAKSI.IDTRANSAKSI = PEMBAYARAN.IDTRANSAKSI JOIN PENDAFTARAN ON PENDAFTARAN.KODEPENDAFTARAN = TRANSAKSI.KODEPENDAFTARAN JOIN USER_REGISTER ON USER_REGISTER.IDUSERREGISTER = PENDAFTARAN.IDUSERREGISTER WHERE IDDETAILPEMBAYARAN = "'.$idDetailPembayaran.'"')->result();

        $token          = null;

        foreach ($dataNotif as $data) {
            $token          = $data->USERTOKEN;
        }

        $dataNotif = array(
            'token'         => $token
        );

        $this->load->view('notif/verifikasiPembayaranJamaah', $dataNotif);
        redirect('Pembayaran/detailPembayaran/'.$idPembayaran);
    }

    public function aksiCabutVerifikasiPembayaran($idPembayaran, $idDetailPembayaran){
        //verif pendaftaran
        $this->MPembayaran->cabutVerifDetailPembayaran($idDetailPembayaran);
        
        $dataPembayaran = $this->db->query('SELECT SUM(JUMLAHPEMBAYARAN) AS JUMLAH, TOTALPEMBAYARAN FROM DETAIL_PEMBAYARAN JOIN PEMBAYARAN ON PEMBAYARAN.IDPEMBAYARAN = DETAIL_PEMBAYARAN.IDPEMBAYARAN WHERE DETAIL_PEMBAYARAN.IDPEMBAYARAN = "'.$idPembayaran.'" AND DETAIL_PEMBAYARAN.STATUSPEMBAYARAN = 1')->result();
        
        foreach($dataPembayaran as $data){
            $sisaPembayaran     = $data->JUMLAH;
            $totalPembayaran    = $data->TOTALPEMBAYARAN;

        }

        
        $sisa = $totalPembayaran - $sisaPembayaran;

        $this->MPembayaran->updateSisaPembayaran($sisa, $idPembayaran);
        //verif transaksi
        // $this->MPembayaran->verifPembayaran($idPembayaran);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pembayaran berhasil dicabut verifikasi! </div>');

        $dataNotif = $this->db->query('SELECT USERTOKEN FROM DETAIL_PEMBAYARAN JOIN PEMBAYARAN ON PEMBAYARAN.IDPEMBAYARAN = DETAIL_PEMBAYARAN.IDPEMBAYARAN JOIN TRANSAKSI ON TRANSAKSI.IDTRANSAKSI = PEMBAYARAN.IDTRANSAKSI JOIN PENDAFTARAN ON PENDAFTARAN.KODEPENDAFTARAN = TRANSAKSI.KODEPENDAFTARAN JOIN USER_REGISTER ON USER_REGISTER.IDUSERREGISTER = PENDAFTARAN.IDUSERREGISTER WHERE IDDETAILPEMBAYARAN = "'.$idDetailPembayaran.'"')->result();

        $token          = null;

        foreach ($dataNotif as $data) {
            $token          = $data->USERTOKEN;
        }

        $dataNotif = array(
            'token'         => $token
        );

        $this->load->view('notif/cabutVerifikasiPembayaranJamaah', $dataNotif);

        redirect('Pembayaran/detailPembayaran/'.$idPembayaran);
    }

}

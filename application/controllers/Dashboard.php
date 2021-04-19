<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
    }

    public function index()
    {   
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();
        $countJamaahBayar       = $this->MNotifikasi->countJamaahBayar();

        $data = array(
            'title' => 'Dashboard | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar,
            'countJamaahBayar' => $countJamaahBayar
        );

        $data['totalUser']			= $this->MUser->totalUser();
        $data['totalPaketAktif']	= $this->MPaket->totalPaketAktif();
        $data['totalPaketNonaktif']	= $this->MPaket->totalPaketNonaktif();
        
        //Change this 
        $this->template->view('admin/VDashboard', $data);
    }
}
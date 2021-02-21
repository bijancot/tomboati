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

        $data = array(
            'title' => 'Dashboard | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $data['totalUser']			= $this->MUser->totalUser();

        //Change this 
        $this->template->view('admin/VDashboard', $data);
    }
}
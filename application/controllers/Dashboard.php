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

        $data = array(
            'title' => 'Dashboard | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );
        $this->template->load('template/template', 'admin/VDashboard', $data);
        $this->load->view("template/script.php");
    }
}
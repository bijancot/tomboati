<?php
class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->library('table');
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
    }

    public function index()
    {

        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        // echo $this->db->last_query();
        //parse
        $data = array(
            'title' => 'Pengumuman | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat,
            'countJamaahDaftar' => $countJamaahDaftar
        );

        $this->template->view('pengumuman/VPengumuman', $data);
    }
}

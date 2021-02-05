<?php
class Komunitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
    }
    public function index()
    {
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title' => 'Komunitas | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );
        $this->template->load('template/template', 'komunitas/VKomunitas', $data);
        $this->load->view("template/script.php");
    }
    public function tambahKomunitas()
    {
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title' => 'Tambah Komunitas | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );
        
        $this->template->load('template/template', 'komunitas/VTambahKomunitas', $data);
        $this->load->view("template/script.php");
    }
}

<?php
class KataMutiara extends CI_Controller
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
            'title' => 'Kata Mutiara | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $this->template->load('template/template', 'katamutiara/VKataMutiara', $data);
        $this->load->view("template/script.php");
    }
    
    public function tambahKataMutiara()
    {
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title' => 'Tambah Kata Mutiara | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $this->template->load('template/template', 'katamutiara/VtambahKataMutiara', $data);
        $this->load->view("template/script.php");
    }
    public function editKataMutiara()
    {
        //notifikasi
        $countMessage    = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title' => 'Edit Kata Mutiara | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );
        
        $this->template->load('template/template', 'katamutiara/VEditKataMutiara', $data);
        $this->load->view("template/script.php");
    }
    public function hapusKataMutiara()
    {

    }
    
}

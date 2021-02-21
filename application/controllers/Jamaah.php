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

        $dataJamaah             = $this->MJamaah->getJamaah();
        
        $updateJamaah           = $this->MJamaah->udpateJamaah();
        
        $data = array(
            'title'             => 'Jamaah | Tombo Ati',
            'jamaah'            => $dataJamaah,
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
 
         $dataJamaah             = $this->MJamaah->getJamaah();
         
         $updateJamaah           = $this->MJamaah->udpateJamaah();
         
         $data = array(
             'title'             => 'Jamaah | Tombo Ati',
             'jamaah'            => $dataJamaah,
             'countMessage'      => $countMessage,
             'dataNotifChat'     => $dataNotifChat,
             'countJamaahDaftar' => $countJamaahDaftar
         );
 
         redirect('Jamaah');
    }
}
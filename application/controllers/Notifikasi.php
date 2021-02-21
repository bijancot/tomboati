<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
        $this->load->model('MChat');
        $this->load->model('MNotifikasi');
    }
    
	public function listNotifikasi()
	{
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );
		$this->load->view('template/header-notif', $data);
    }
    
    public function listNotifikasiJamaah()
	{
        $countJamaahDaftar      = $this->MNotifikasi->countJamaahDaftar();

        $data = array(
            'countJamaahDaftar' => $countJamaahDaftar
        );
        
		$this->load->view('template/header-notifJamaah', $data);
	}
}

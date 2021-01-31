<?php
class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('table');
    }
    public function index()
    {
        $data = array('title' => 'Pembayaran | Tombo Ati');
        $this->template->load('template/template', 'pembayaran/VPembayaran', $data);
        $this->load->view("template/script.php"); 
    }
}

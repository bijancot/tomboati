<?php
class KataMutiara extends CI_Controller
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
        $data = array('title' => 'Kata Mutiara | Tombo Ati');
        $this->template->load('template/template', 'katamutiara/VKataMutiara', $data);
        $this->load->view("template/script.php");
    }
    
    public function tambahKataMutiara()
    {
        $data = array('title' => 'Tambah Kata Mutiara | Tombo Ati');
        $this->template->load('template/template', 'katamutiara/VtambahKataMutiara', $data);
        $this->load->view("template/script.php");
    }
    public function editKataMutiara()
    {
        $data = array('title' => 'Edit Kata Mutiara | Tombo Ati');
        $this->template->load('template/template', 'katamutiara/VEditKataMutiara', $data);
        $this->load->view("template/script.php");
    }
    public function hapusKataMutiara()
    {

    }
    
}

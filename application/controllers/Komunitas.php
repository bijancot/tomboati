<?php
class Komunitas extends CI_Controller
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
        $data = array('title' => 'Komunitas | Tombo Ati');
        $this->template->load('template/template', 'komunitas/VKomunitas', $data);
        $this->load->view("template/script.php");
    }
    public function tambahKomunitas()
    {
        $data = array('title' => 'Tambah Komunitas | Tombo Ati');
        $this->template->load('template/template', 'komunitas/VTambahKomunitas', $data);
        $this->load->view("template/script.php");
    }
}

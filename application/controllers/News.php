<?php
class News extends CI_Controller
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
        $data = array('title' => 'News | Tombo Ati');
        $this->template->load('template/template', 'news/VNews', $data);
        $this->load->view("template/script.php");
    }

    public function tambahNews()
    {
        $data = array('title' => 'Tambah News | Tombo Ati');
        $this->template->load('template/template', 'news/VTambahNews', $data);
        $this->load->view("template/script.php");
    }

    public function editNews()
    {
        $data = array('title' => 'Edit News | Tombo Ati');
        $this->template->load('template/template', 'news/VEditNews', $data);
        $this->load->view("template/script.php");
    }

    public function hapusNews()
    {

    }
}
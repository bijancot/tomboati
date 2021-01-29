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
    }

    public function tambahNews()
    {
        $data = array('title' => 'Tambah News | Tombo Ati');
        $this->template->load('template/template', 'news/VTambahNews', $data);
    }

    public function editNews()
    {
        $data = array('title' => 'Tambah News | Tombo Ati');
        $this->template->load('template/template', 'news/VEditNews', $data);
    }
}
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
        $data = array('title' => 'News');
        $this->template->load('template/template', 'news/VNews', $data);
    }

    public function tambahBerita()
    {
        $data = array('title' => 'News');
        $this->template->load('template/template', 'news/VTambahBerita', $data);
    }
}
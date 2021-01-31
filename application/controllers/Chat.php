<?php
class Chat extends CI_Controller
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
        $data = array('title' => 'Chat | Tombo Ati');
        $this->template->load('template/template', 'chat/VChat', $data);
        $this->load->view("template/script.php");
    }
}

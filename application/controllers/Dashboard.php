<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $data = array('title' => 'Dashboard | Tombo Ati');
        $this->template->load('template/template', 'admin/VDashboard', $data);
        $this->load->view("template/script.php");
    }
}
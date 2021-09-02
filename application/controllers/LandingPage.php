<?php
class LandingPage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {   
        $data = array(
            'title' => 'Landing Page | Tombo Ati'
        );
        
        $this->load->view('landingpage/VLandingPage', $data);
    }
}
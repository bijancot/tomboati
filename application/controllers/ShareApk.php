<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ShareApk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'download'));
    }

    public function index()
    {
        redirect('https://play.google.com/store/apps/details?id=com.tomboati.tour');
        // force_download('https://play.google.com/store/apps/details?id=com.tomboati.tour', NULL);
    }
}

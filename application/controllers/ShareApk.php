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
        force_download('assets/tomboati.apk', NULL);
    }
}

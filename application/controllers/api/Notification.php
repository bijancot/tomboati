<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
{
    /**
     * Send to a single device
     */
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
    }

    public function sendNotification()
    {
        $query = $this->db->query('SELECT USERTOKEN FROM USER_REGISTER WHERE USERTOKEN IS NOT NULL')->result();

        $data = array(
            'dataToken' => $query
        );

        $this->load->view('notif/template', $data);
    }
}
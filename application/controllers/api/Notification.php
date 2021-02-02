<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
{
    /**
     * Send to a single device
     */
    public function sendNotification()
    {
        $this->load->view('notif');
    }
}
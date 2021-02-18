<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('MNotifikasi');
    }
    
    public function index()
    {
        $this->load->view('admin/VLogin');
    }

    public function auth_admin()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        // $auth = $this->Mlogin->auth($user, $pass

        if ($email === "admin@tomboati.com" && $pass === "admin") {
            $session = array(
                'who' => "admin",
                'isLogin' => true
            );
            $this->session->set_userdata($session);

            redirect('Dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email / password salah! </div>');
            redirect('Admin');
        }
    }

    public function ChangePassword()
    {
        $countMessage   = $this->MNotifikasi->countMessage();
        $dataNotifChat   = $this->MNotifikasi->dataNotifChat();

        $data = array(
            'title' => 'Change Password | Tombo Ati',
            'countMessage' => $countMessage,
            'dataNotifChat' => $dataNotifChat
        );

        $this->template->view('admin/VChangePassword', $data);
    }
}

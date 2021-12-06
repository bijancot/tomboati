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

            redirect('Home');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email / password salah! </div>');
            redirect('Admin');
        }
    }

    public function ChangePassword()
    {
        $data = array(
            'title' => 'Reset Password | Tombo Ati'
        );

        $this->load->view('admin/VChangePassword', $data);
    }

    public function PrivacyPolicy()
    {
        $this->load->view('VPrivacyPolicy');
    }
}

<?php
class Login extends CI_Controller
{
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
			redirect('Login');
		}
	}
}

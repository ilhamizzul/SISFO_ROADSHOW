<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect('Dashboard');
		} else {
			$this->load->view('admin/login_view');	
		}
	}

	public function login()
	{
		if ($this->login_model->auth() == TRUE) {
			$this->session->set_flashdata('success', 'Selamat Datang '.$this->session->userdata('status'));
			redirect('Dashboard');
		} else {
			$this->session->set_flashdata('failed', 'Login Gagal, Silahkan Coba Lagi');
			redirect('Login');
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
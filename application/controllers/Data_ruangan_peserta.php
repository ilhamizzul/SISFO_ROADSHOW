<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ruangan_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_ruangan_peserta_model');
		$this->load->model('input_ruangan_peserta_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'admin/data_ruangan_peserta_view';
			$data['JSON'] = 'JSON/data_ruangan_peserta_JSON';
			$this->load->view('admin/index', $data);
		} else {
			redirect('Login');
		}
		
			
	}

	public function input_ruangan_peserta()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'admin/input_ruang_peserta_view';
			$data['JSON'] = 'JSON/input_ruangan_peserta_JSON';
			$this->load->view('admin/index', $data);
		} else {
			redirect('Login');
		}
		
			
	}

}

/* End of file data_ruangan_peserta.php */
/* Location: ./application/controllers/data_ruangan_peserta.php */
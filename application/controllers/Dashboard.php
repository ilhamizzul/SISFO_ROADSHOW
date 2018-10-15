<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'admin/dashboard';
			$data['count_peserta'] = $this->dashboard_model->count_peserta();
			$data['count_peserta_hadir'] = $this->dashboard_model->count_peserta_hadir();
			$data['count_peserta_tidak_hadir'] = $this->dashboard_model->count_peserta_tidak_hadir();
			$data['JSON'] = 'JSON/data_dashboard_JSON';
			$this->load->view('admin/index', $data);
		} else {
			redirect('Login');
		}
		
			
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
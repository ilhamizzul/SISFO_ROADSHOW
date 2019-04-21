<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->load->model('Year_recap_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$recap_data = $this->Year_recap_model->get_data_recap();
			$data['main_view'] = 'admin/dashboard';
			$data['count_peserta'] = $this->dashboard_model->count_peserta();
			$data['count_dokumen'] = $this->dashboard_model->count_dokumen();
			$data['count_peserta_hadir'] = $this->dashboard_model->count_peserta_hadir();
			$data['count_peserta_tidak_hadir'] = $this->dashboard_model->count_peserta_tidak_hadir();
			$data['recap_data'] = json_encode($recap_data);
			$data['JSON'] = 'JSON/data_dashboard_JSON';
			$this->load->view('admin/index', $data);
		} else {
			redirect('Login');
		}	
	}

	public function recap_all_data()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->Year_recap_model->data_recap() == TRUE) {
				$this->session->set_flashdata('success', 'Data Berhasil Di Rekap');
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('failed', 'Data Gagal Di Rekap, Silahkan Hubungi Admin');
				redirect('dashboard');
			}
		} else {
			redirect('login');
		}
		

		
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_nomor_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_nomor_peserta_model');
		$this->load->model('Input_nomor_peserta_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'admin/data_nomor_peserta_view';
			$data['JSON'] = 'JSON/data_nomor_peserta_JSON';
			$data['data_nomor_peserta_active'] = $this->Data_nomor_peserta_model->get_nomor_peserta();
			$data['data_nomor_peserta_non_active'] = $this->Data_nomor_peserta_model->get_nomor_peserta_non_active();
			$this->load->view('admin/index', $data);		
		} else {
			redirect('Login');
		}
			
	}

	public function get_nomor_peserta_by_id($id_nmr_peserta)
	{
		$nmr_peserta_by_id = $this->Data_nomor_peserta_model->get_nomor_peserta_by_id($id_nmr_peserta);

		echo json_encode($nmr_peserta_by_id);
	}

	public function input_nomor_peserta()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'admin/input_nomor_peserta_view';
			$data['JSON'] = 'JSON/input_nomor_peserta_JSON';
			$this->load->view('admin/index', $data);
		} else {
			redirect('Login');
		}
		
		
	}

	public function save()
	{
		$datatable = $this->input->post('data_table');
		for ($i=0; $i<count($datatable); $i++) {
			$data[] = array(
				'nomor_peserta'	=> $datatable[$i]['nomor_peserta'],
				'status'	=> $datatable[$i]['status']
			);
			$this->Input_nomor_peserta_model->add_no_peserta($data[$i]);
		}

	}

	public function check()
	{
		$data = $this->Input_nomor_peserta_model->check_nomor_peserta($this->input->post('nomor_peserta'));
		// print_r($data);
		echo json_encode(array('c'=>count($data)));
	}

	public function delete_nmr_peserta($id_nmr_peserta)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->Data_nomor_peserta_model->delete_nmr_peserta($id_nmr_peserta) == TRUE) {
				$this->session->set_flashdata('success', 'Nomor Peserta Berhasil Dihapus');
				redirect('Data_nomor_peserta');
			} else {
				$this->session->set_flashdata('failed', 'Nomor Peserta Gagal Dihapus');
				redirect('Data_nomor_peserta');
			}
		} else {
			redirect('Login');
		}
		
	}

}

/* End of file data_nomor_peserta.php */
/* Location: ./application/controllers/data_nomor_peserta.php */
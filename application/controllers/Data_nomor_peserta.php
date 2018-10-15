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
		$data['main_view'] = 'admin/data_nomor_peserta_view';
		$data['JSON'] = 'JSON/data_nomor_peserta_JSON';
		$data['data_nomor_peserta'] = $this->Data_nomor_peserta_model->get_nomor_peserta();
		$this->load->view('admin/index', $data);		
	}

	public function input_nomor_peserta()
	{
		$data['main_view'] = 'admin/input_nomor_peserta_view';
		$data['JSON'] = 'JSON/input_nomor_peserta_JSON';
		$this->load->view('admin/index', $data);
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
		echo json_encode(array('c'=>count($data)));
	}

}

/* End of file data_nomor_peserta.php */
/* Location: ./application/controllers/data_nomor_peserta.php */
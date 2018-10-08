<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_nomor_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_nomor_peserta_model');
		$this->load->model('input_nomor_peserta_model');
	}

	public function index()
	{
		$data['main_view'] = 'admin/data_nomor_peserta_view';
		$data['JSON'] = 'JSON/data_nomor_peserta_JSON';
		$this->load->view('admin/index', $data);		
	}

	public function input_nomor_peserta()
	{
		$data['main_view'] = 'admin/input_nomor_peserta_view';
		$data['JSON'] = 'JSON/input_nomor_peserta_JSON';
		$this->load->view('admin/index', $data);
	}

}

/* End of file data_nomor_peserta.php */
/* Location: ./application/controllers/data_nomor_peserta.php */
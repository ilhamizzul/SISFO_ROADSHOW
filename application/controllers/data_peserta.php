<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_peserta_model');
	}

	public function index()
	{
		$data['main_view'] = 'admin/data_peserta_view';
		$this->load->view('admin/index', $data);	
	}

}

/* End of file data_peserta.php */
/* Location: ./application/controllers/data_peserta.php */
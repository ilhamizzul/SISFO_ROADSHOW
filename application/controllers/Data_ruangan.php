<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ruangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_ruangan_model');
	}

	public function index()
	{
		$data['main_view'] = 'admin/data_ruangan_view';
		$data['JSON'] = 'JSON/data_ruangan_JSON';
		$data['data_ruangan'] = $this->Data_ruangan_model->get_data_ruangan();
		$this->load->view('admin/index', $data);			
	}

}

/* End of file data_ruangan.php */
/* Location: ./application/controllers/data_ruangan.php */
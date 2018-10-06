<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ruangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_ruangan_model');
	}

	public function index()
	{
		$data['main_view'] = 'admin/data_ruangan_view';
		$data['JSON'] = 'JSON/data_ruangan_JSON';
		$this->load->view('admin/index', $data);			
	}

}

/* End of file data_ruangan.php */
/* Location: ./application/controllers/data_ruangan.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_admin_model');
	}

	public function index()
	{
		$data['main_view'] = 'admin/data_admin_view';
		$data['JSON'] = 'JSON/data_admin_JSON';
		$this->load->view('admin/index', $data);
	}

}

/* End of file data_admin.php */
/* Location: ./application/controllers/data_admin.php */
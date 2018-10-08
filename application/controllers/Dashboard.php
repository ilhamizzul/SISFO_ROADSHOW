<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_dashboard');
	}

	public function index()
	{
		$data['main_view'] = 'admin/dashboard';
		$data['JSON'] = 'JSON/data_dashboard_JSON';
		$this->load->view('admin/index', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
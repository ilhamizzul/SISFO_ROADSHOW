<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_asset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('asset_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'admin/asset_view';
			$data['JSON'] = 'JSON/asset_JSON';
			$this->load->view('admin/index', $data);
		} else {
			redirect('login');
		}		
	}

	public function email()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'admin/email_asset_view';
			$data['JSON'] = 'JSON/asset_JSON';
			$this->load->view('admin/index', $data);
		} else {
			redirect('login');
		}
		
	}

}

/* End of file data_asset.php */
/* Location: ./application/controllers/data_asset.php */
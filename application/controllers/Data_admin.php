<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('status') == 'super_admin') {
				$data['main_view'] = 'admin/data_admin_view';
				$data['JSON'] = 'JSON/data_admin_JSON';
				$data['data_admin'] = $this->Data_admin_model->get_data_admin();
				$this->load->view('admin/index', $data);
			} else {
				redirect('Login');
			}
			
		} else {
			redirect('Login');
		}
		
				
	}

	public function tambah_admin()
	{
		if ($this->Data_admin_model->add_admin() == TRUE) {
			$this->session->set_flashdata('success', 'Tambah Data Admin Berhasil');
			redirect('Data_admin');
		} else {
			$this->session->set_flashdata('failed', 'Tambah Data Admin Gagal');
			redirect('Data_admin');
		}
		
	}

	public function get_data_admin_by_id($id_admin)
	{
		$data_admin_by_id = $this->Data_admin_model->get_data_admin_by_id($id_admin);

		echo json_encode($data_admin_by_id);
	}

	public function delete_admin($id_admin)
	{
		if ($this->Data_admin_model->delete_data_admin($id_admin) == TRUE) {
			$this->session->set_flashdata('success', 'Data Admin Berhasil Dihapus');
			redirect('Data_admin');
		} else {
			$this->session->set_flashdata('failed', 'Data Admin Gagal Dihapus');
			redirect('Data_admin');
		}
		
	}

}

/* End of file data_admin.php */
/* Location: ./application/controllers/data_admin.php */
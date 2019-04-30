<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sekolah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_sekolah_model');
	}

	public function index()
	{
		$data['main_view'] = 'admin/data_sekolah_view';
		$data['data_sekolah'] = $this->Data_sekolah_model->get_data_sekolah();
		$data['JSON'] = 'JSON/data_sekolah_JSON';
		$this->load->view('admin/index', $data);
	}

	public function get_sekolah_by_id($id_sekolah)
	{
		$get_sekolah_by_id = $this->Data_sekolah_model->get_data_sekolah_by_id($id_sekolah);

		echo json_encode($get_sekolah_by_id);
	}

	public function tambah_data_sekolah()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->Data_sekolah_model->tambah_data_sekolah() == true) {
				$this->session->set_flashdata('success', 'Data Sekolah Berhasil Ditambah');
				redirect('Data_sekolah');
			} else {
				$this->session->set_flashdata('failed', 'Data Sekolah Gagal Ditambah');
				redirect('Data_sekolah');
			}
			
		} else {
			redirect('login');
		}
		
	}

	public function hapus_data_sekolah($id_sekolah)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->Data_sekolah_model->hapus_data_sekolah($id_sekolah) == TRUE) {
				$this->session->set_flashdata('success', 'Data Sekolah Berhasil Dihapus');
				redirect('Data_sekolah');
			} else {
				$this->session->set_flashdata('failed', 'Data Sekolah Gagal Dihapus, Silahkan Hubungi Admin');
				redirect('Data_sekolah');
			}
			
		} else {
			redirect('login');
		}
		
	}

}

/* End of file Data_sekolah.php */
/* Location: ./application/controllers/Data_sekolah.php */
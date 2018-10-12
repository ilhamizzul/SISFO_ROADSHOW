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

	public function tambah_ruangan()
	{
		if ($this->Data_ruangan_model->add_data_ruangan() == TRUE) {
			$this->session->set_flashdata('success', 'Data ruangan berhasil ditambahkan!');
			redirect('Data_ruangan');
		} else {
			$this->session->set_flashdata('failed', 'Data ruangan gagal ditambah, silahkan hubungi developer');
			redirect('Data_ruangan');
		}
		
	}

	public function get_ruang_by_id($id_ruang)
	{
		$data_ruangan_by_id = $this->Data_ruangan_model->get_data_ruangan_by_id($id_ruang);

		echo json_encode($data_ruangan_by_id);
	}

	public function hapus($id)
	{
		if ($this->Data_ruangan_model->delete_data_ruangan($id) == TRUE) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
			redirect('Data_ruangan');
		} else {
			$this->session->set_flashdata('failed', 'Data Ruangan Gagal Dihapus, Silahkan Hubungi Developer');
			redirect('Data_ruangan');
		}

		
	}

}

/* End of file data_ruangan.php */
/* Location: ./application/controllers/data_ruangan.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_peserta_model');
		$this->load->model('Data_ruangan_model');
		$this->load->model('Data_nomor_peserta_model');
	}

	public function index()
	{
		$data['main_view'] = 'admin/data_peserta_view';
		$data['data_ruangan'] = $this->Data_ruangan_model->get_data_ruangan();
		$data['data_peserta'] = $this->Data_peserta_model->get_data_peserta();
		$data['data_nomor_peserta'] = $this->Data_nomor_peserta_model->get_nomor_peserta_non_active();
		$data['JSON'] = 'JSON/data_peserta_JSON';
		$this->load->view('admin/index', $data);	
	}

	public function get_peserta_by_id($id_peserta)
	{
		$get_peserta_by_id = $this->Data_peserta_model->get_data_peserta_by_id($id_peserta);

		echo json_encode($get_peserta_by_id);
	}

	public function tambah_data_peserta()
	{
		$idnmr = $this->input->post('id_nmr');
		$data = array(
			'id_nmr' 		=> $idnmr, 
			'nama_peserta'	=> $this->input->post('nama_peserta'), 
			'email' 		=> $this->input->post('email'), 
			'no_hp' 		=> $this->input->post('no_hp'), 
			'asal_sekolah' 	=> $this->input->post('asal_sekolah'), 
			'kelas' 		=> $this->input->post('kelas'), 
			'id_ruang' 		=> $this->input->post('ruang_ujian'), 
			'status_absen' 	=> 'tidak_hadir' 
		);

		$data2 = array(
			'status' => 'aktif' 
		);

		if ($this->Data_peserta_model->add_data_peserta($data, $idnmr) == TRUE) {
			$this->Data_nomor_peserta_model->edit_status_nomor_peserta($data2, $idnmr);
			$this->session->set_flashdata('success', 'Tambah Data Peserta Berhasil');
			redirect('Data_peserta');
		} else {
			$this->session->set_flashdata('failed', 'Tambah Data Gagal, Silahkan Coba Lagi');
			redirect('Data_peserta');
		}
		
	}

}

/* End of file data_peserta.php */
/* Location: ./application/controllers/data_peserta.php */
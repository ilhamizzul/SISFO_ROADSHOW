<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_peserta_model');
		$this->load->model('Data_ruangan_model');
		$this->load->model('Data_nomor_peserta_model');
		$this->load->model('Year_recap_model');
		$this->load->model('Data_sekolah_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'admin/data_peserta_view';
			$data['data_ruangan'] = $this->Data_ruangan_model->get_data_ruangan();
			$data['data_peserta'] = $this->Data_peserta_model->get_data_peserta();
			$data['data_sekolah'] = $this->Data_sekolah_model->get_data_sekolah();
			$data['data_nomor_peserta'] = $this->Data_nomor_peserta_model->get_nomor_peserta_non_active();
			$data['JSON'] = 'JSON/data_peserta_JSON';
			$this->load->view('admin/index', $data);	
		} else {
			redirect('Login');
		}
	}

	public function get_peserta_by_id($id_peserta)
	{
		$get_peserta_by_id = $this->Data_peserta_model->get_data_peserta_by_id($id_peserta);

		echo json_encode($get_peserta_by_id);
	}

	public function tambah_data_peserta()
	{
		$idnmr = $this->input->post('id_nmr');
		$idtahun = $this->Year_recap_model->get_data_by_year(date('Y'));
		$data = array(
			'id_nmr' 		=> $idnmr, 
			'nama_peserta'	=> $this->input->post('nama_peserta'), 
			'email' 		=> $this->input->post('email'), 
			'no_hp' 		=> $this->input->post('no_hp'), 
			'id_sekolah' 	=> $this->input->post('asal_sekolah'), 
			'id_ruang' 		=> $this->input->post('ruang_ujian'), 
			'pilihan_soal'	=> $this->input->post('pilihan_soal'),
			'status_absen' 	=> 'tidak_hadir', 
			'id_tahun'		=> $idtahun->id
		);

		$data2 = array(
			'status' => 'aktif' 
		);
		if ($idtahun->status != '1') { // belum di rekap
			if ($this->Data_peserta_model->add_data_peserta($data, $idnmr) == TRUE) {
				$this->Data_nomor_peserta_model->edit_status_nomor_peserta($data2, $idnmr);
				$this->session->set_flashdata('success', 'Tambah Data Peserta Berhasil');
				redirect('Data_peserta');
			} else {
				$this->session->set_flashdata('failed', 'Tambah Data Gagal, Silahkan Coba Lagi');
				redirect('Data_peserta');
			}
		} else { //sudah di rekap
			$this->session->set_flashdata('failed', 'Data peserta sudah di rekap dan tidak bisa menambah data lagi hingga event selanjutnya');
			redirect('data_peserta');
		}
		// var_dump($this->Year_recap_model->get_data_by_year(date('Y')));
		
			
		
	}

	public function delete_peserta($id_peserta, $id_nmr_peserta)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->Data_peserta_model->delete_data_peserta($id_peserta) == TRUE) {
				$this->Data_nomor_peserta_model->delete_nmr_peserta($id_nmr_peserta);
				$this->session->set_flashdata('success', 'Data Peserta Berhasil Dihapus');
				redirect('Data_peserta');
			} else {
				$this->session->set_flashdata('failed', 'Data Peserta Gagal Dihapus');
				redirect('Data_peserta');
			}
		} else {
			redirect('Login');
		}
	}

	public function edit_status_absen($id_peserta)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->Data_peserta_model->edit_status_absen($id_peserta) == TRUE) {
				$this->session->set_flashdata('success', 'Update Absen Berhasil');
				redirect('Data_peserta');
			} else {
				$this->session->set_flashdata('failed', 'Ubah Absen Gagal');
				redirect('Data_peserta');
			}
		} else {
			redirect('Login');
		}
	}

}

/* End of file data_peserta.php */
/* Location: ./application/controllers/data_peserta.php */
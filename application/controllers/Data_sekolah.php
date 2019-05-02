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
		if ($this->session->userdata('logged_in') == true) {
			$data['main_view'] = 'admin/data_sekolah_view';
			$data['data_sekolah'] = $this->Data_sekolah_model->get_data_sekolah();
			$data['JSON'] = 'JSON/data_sekolah_JSON';
			$this->load->view('admin/index', $data);
		} else {
			redirect('login');
		}
		
			
	}

	public function data_per_sekolah($id_sekolah, $nama_sekolah)
	{
		if($this->session->userdata('logged_in') == true) {
			$year = $this->Data_sekolah_model->get_year();
			$i = 0;
			do {
				if ($this->Data_sekolah_model->count_all_participate_by_year($id_sekolah, $year[$i]->tahun) != 0) {
					$data_count[$i]['tahun'] = $year[$i]->tahun;
					$data_count[$i]['total_peserta'] = $this->Data_sekolah_model->count_all_participate_by_year($id_sekolah, $year[$i]->tahun);

					$data_count_tipe_soal[$i]['tahun'] = $year[$i]->tahun;
					$data_count_tipe_soal[$i]['teknik'] = $this->Data_sekolah_model->count_all_teknik_participate_by_year($id_sekolah, $year[$i]->tahun);
					$data_count_tipe_soal[$i]['non_teknik'] = $data_count[$i]['total_peserta'] - $data_count_tipe_soal[$i]['teknik'];
				}
				$i++;
			} while($i <= count($year)-1);
			$data['main_view'] = 'admin/sekolah_view';
			$data['JSON'] = 'JSON/data_sekolah_JSON';
			$data['nama_sekolah'] = $nama_sekolah;
			$data['data_count'] = json_encode($data_count);
			$data['data_count_tipe_soal'] = json_encode($data_count_tipe_soal);
			$this->load->view('admin/index', $data);	
		} else {
			redirect('login');
		}
		
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
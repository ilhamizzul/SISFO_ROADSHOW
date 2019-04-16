<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_dokumen_soal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_dokumen_soal_model');
		$this->load->helper('file');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'admin/dokumen_soal_view';
			$data['dokumen_soal'] = $this->Data_dokumen_soal_model->get_dokumen();
			$data['JSON'] = 'JSON/data_dokumen_soal_JSON';
			$this->load->view('admin/index', $data);
		} else {
			redirect('login');
		}
		
	}

	public function filter_dokumen()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->Data_dokumen_soal_model->get_dokumen() != NULL) {
				if ($this->input->post('filter_dokumen') == 'none') {
					redirect('Data_dokumen_soal');
				} else {
					$data['main_view'] = 'admin/dokumen_soal_view';
					$data['dokumen_soal'] = $this->Data_dokumen_soal_model->get_filtered_dokumen();
					$data['JSON'] = 'JSON/data_dokumen_soal_JSON';
					$this->load->view('admin/index', $data);
				}
			} else {
				$this->session->set_flashdata('failed', 'Data Dokumen Kosong');
				redirect('Data_dokumen_soal');
			}
		} else {
			redirect('login');
		}
	}

	public function get_dokumen_by_id($id_dokumen)
	{
		$data_dokumen_id = $this->Data_dokumen_soal_model->get_dokumen_by_id($id_dokumen);

		echo json_encode($data_dokumen_id);
	}

	public function tambah_dokumen_soal()
	{
		$tipe = $this->input->post('tipe_dokumen');
		if($tipe == 'jawaban') {
			$config['upload_path'] = './uploads/dokumen_soal/jawaban/';
		} else {
			$config['upload_path'] = './uploads/dokumen_soal/soal/';
		}
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '6100';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file_soal')){
			$this->session->set_flashdata('failed', $this->upload->display_errors());
			redirect('Data_dokumen_soal');
		}
		else{
			if($this->Data_dokumen_soal_model->tambah_dokumen($this->upload->data()) == TRUE) {
				$this->session->set_flashdata('success', 'Upload Dokumen Berhasil!');
				redirect('Data_dokumen_soal');
			} else {
				$this->session->set_flashdata('failed', 'Upload Dokumen Gagal! Silahkan Coba Lagi.');
				redirect('Data_dokumen_soal');
			}
		}
	}

	public function delete_dokumen($id_dokumen, $tipe_dokumen, $file_soal)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if($tipe_dokumen == 'jawaban') {
				$path = './uploads/dokumen_soal/jawaban/';
			} else {
				$path = './uploads/dokumen_soal/soal/';
			}
			if (!unlink($path.$file_soal)) {
				if ($this->Data_dokumen_soal_model->hapus_dokumen($id_dokumen) == TRUE) {
					$this->session->set_flashdata('success', 'Dokumen Berhasil Dihapus');
					redirect('Data_dokumen_soal');
				} else {
					$this->session->set_flashdata('failed', 'Dokumen Gagal Dihapus, Silahkan Coba Lagi!');
					redirect('Data_dokumen_soal');
				}
			} else {
				$this->session->set_flashdata('failed', 'Hapus File Gagal, Silahkan Hubungi Admin');
				redirect('Data_dokumen_soal');
				// echo base_url().$path.$file_soal;
			}
		} else {
			redirect('login');
		}
		
	}

	public function edit_dokumen_soal($id_dokumen, $file_soal, $tipe_dokumen)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($tipe_dokumen == 'jawaban') {
				$path = './uploads/dokumen_soal/jawaban/';
			} else {
				$path = './uploads/dokumen_soal/soal/';
			}
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'pdf';
			$config['max_size']  = '6100';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('file_soal')){
				if ($this->Data_dokumen_soal_model->edit_data_dokumen($id_dokumen) == TRUE) {
					$this->session->set_flashdata('success', 'Edit Data Dokumen Berhasil');
					redirect('Data_dokumen_soal');
				} else {
					$this->session->set_flashdata('failed', 'Edit Data Gagal, Silahkan Coba Lagi');
					redirect('Data_dokumen_soal');
				}
			}
			else{
				unlink($path.$file_soal);
				if ($this->Data_dokumen_soal_model->edit_dokumen($id_dokumen, $this->upload->data()) == TRUE) {
					$this->session->set_flashdata('success', 'Edit Dokumen Berhasil');
					redirect('Data_dokumen_soal');
				} else {
					$this->session->set_flashdata('failed', 'Edit Data Gagal, Silahkan Coba Lagi');
					redirect('Data_dokumen_soal');
				}
				
			}
		} else {
			redirect('login');
		}
		
		
	}

}

/* End of file Data_dokumen_soal.php */
/* Location: ./application/controllers/Data_dokumen_soal.php */
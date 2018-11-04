<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ruangan_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_peserta_model');
		$this->load->model('Data_ruangan_peserta_model');
		$this->load->model('input_ruangan_peserta_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
            $data['data_ruangan'] = $this->Data_ruangan_peserta_model->get_data_ruangan();
            $data['data_peserta'] = $this->Data_ruangan_peserta_model->get_data_peserta();
			$data['main_view'] = 'admin/data_ruangan_peserta_view';
			$data['JSON'] = 'JSON/data_ruangan_peserta_JSON';
			$this->load->view('admin/index', $data);
		} else {
			redirect('Login');
		}
	}

	public function data_peserta($id_ruang){
        if ($this->session->userdata('logged_in') == TRUE) {
            $data['data_ruang'] = $this->Data_ruangan_peserta_model->get_data_ruangan($id_ruang);
            $data['data_peserta_ruang'] = $this->Data_ruangan_peserta_model->get_data_peserta($id_ruang);
            $data['main_view'] = 'admin/data_ruangan_peserta_view';
            $data['JSON'] = 'JSON/data_ruangan_peserta_JSON';
            $this->load->view('admin/index', $data);
        } else {
            redirect('Login');
        }
    }

    public function absensi_peserta($id_ruang)
    {
    	if ($this->session->userdata('logged_in') == TRUE) {
    		$data['data_peserta_hadir'] = $this->Data_ruangan_peserta_model->get_data_peserta_by_hadir($id_ruang);
    		$data['data_peserta_non_hadir'] = $this->Data_ruangan_peserta_model->get_data_peserta_by_non_hadir($id_ruang);
    		$data['main_view'] = 'admin/data_ruangan_absensi_peserta_view';
    		$data['JSON'] = 'JSON/data_ruangan_peserta_JSON';
    		$this->load->view('admin/index', $data);
    	} else {
    		redirect('Login');
    	}
    	
    }

    public function update_absensi()
    {
    	if ($this->session->userdata('logged_in') == TRUE) {
			$this->Data_ruangan_peserta_model->update_absen();
			

    	} else {
    		redirect('Login');
    	}
    	
    }



	public function input_ruangan_peserta($id_ruang)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
            $data['data_ruang'] = $this->Data_ruangan_peserta_model->get_data_ruangan($id_ruang);
		    $data['data_peserta']=$this->Data_ruangan_peserta_model->get_data_peserta_all();
			$data['main_view'] = 'admin/input_ruang_peserta_view';
			$data['JSON'] = 'JSON/input_ruang_peserta_JSON';
			$this->load->view('admin/index', $data);
		} else {
			redirect('Login');
		}

	}

	public function update_ruangan_peserta($id_ruang){
        if ($this->session->userdata('logged_in') == TRUE) {
                if($this->input_ruangan_peserta_model->update_ruangan_peserta($id_ruang)==TRUE){
                	$this->session->set_flashdata('success', 'Tambah Peserta Ruangan Berhasil');
                	redirect('Data_ruangan_peserta/data_peserta/'.$id_ruang, 'refresh');
                }else{
                	$this->session->set_flashdata('failed', 'Tambah Peserta Ruangan Gagal, Silahkan Hubungi Admin');
                    redirect('Data_ruangan_peserta/data_peserta/'.$id_ruang, 'refresh');
                }
        } else {
            redirect('Login');
        }
    }

    

}

/* End of file data_ruangan_peserta.php */
/* Location: ./application/controllers/data_ruangan_peserta.php */
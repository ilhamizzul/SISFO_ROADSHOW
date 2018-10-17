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

	public function get_data_by_id($id_ruang){
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

	public function edit_ruangan($id_ruang){
        if ($this->session->userdata('logged_in') == TRUE) {
                if($this->input_ruangan_peserta_model->edit_ruangan($id_ruang)==TRUE){
                	redirect('Data_ruangan_peserta/input_ruangan_peserta/'.$id_ruang,'refresh');
                }else{
                    redirect('Login');
                }
        } else {
            redirect('Login');
        }
    }

    

}

/* End of file data_ruangan_peserta.php */
/* Location: ./application/controllers/data_ruangan_peserta.php */
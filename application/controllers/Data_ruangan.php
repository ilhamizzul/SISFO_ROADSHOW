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

	public function randomize()
	{
		$j = 1;
		$peserta = $this->Data_ruangan_model->count_peserta_no_room();
		$count_room = $this->Data_ruangan_model->get_id_ruangan();
		$div_peserta = count($peserta) % count($count_room);
		for ($i=0; $i < count($peserta) ; $i++) { 
			$this->Data_ruangan_model->edit_ruangan_peserta($peserta[$i]->id_peserta, $count_room[$j]->id_ruang);
			
			if ($j < count($count_room)-1) {
				$j++;
			} else {
				$j = 1;
			}
			
		}
		$this->session->set_flashdata('success', 'Data Ruangan Peserta Berhasil Diubah');
		redirect('Data_ruangan');
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

	public function edit_letak_ruangan($id_ruang)
    {

    	if ($this->session->userdata('logged_in') == TRUE) {
                if($this->Data_ruangan_model->edit_letak_ruangan($id_ruang)==TRUE){
                	redirect('Data_ruangan');
                }else{
                    redirect('Login');
                }
        } else {
            redirect('Login');
        }
    }

}

/* End of file data_ruangan.php */
/* Location: ./application/controllers/data_ruangan.php */
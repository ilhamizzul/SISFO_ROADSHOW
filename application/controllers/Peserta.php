<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Peserta_model');
	}


	public function index()
	{
		if ($this->session->userdata('logged_in_peserta') == FALSE) {
			$data['JSON'] = 'JSON/data_admin_JSON';
			$this->load->view('peserta/index', $data);		
		}else{
			if($this->Peserta_model->cek_data_diri()==FALSE){
						redirect('Peserta/registrasi','refresh');
			}else{
				redirect('Peserta/landing','refresh');
			}
		}
		
	}

	public function cek_nomor_peserta()
	{
		
			if($this->Peserta_model->cek_nomor_peserta()==TRUE){
				if($this->Peserta_model->cek_data_diri()==FALSE){
					if($this->Peserta_model->rubah_status_aktivasi()==TRUE){
						redirect('Peserta/registrasi','refresh');
					}else{
						redirect('Peserta/registrasi','refresh');
					}
				}else{
					redirect('Peserta/landing','refresh');
				}
	        }else{
	        	redirect('Peserta/end_session','refresh');
	        }
		
	}


    public function landing()
    {

    	if ($this->session->userdata('logged_in_peserta') == TRUE) {
    		
    		$data['data_diri'] = $this->Peserta_model->lihat_data_diri();
			$data['JSON'] = 'JSON/data_admin_JSON';
        	$this->load->view('peserta/landing', $data);
		}else{
			redirect('Peserta','refresh');
		}
        
    }

    public function registrasi()
    {
    	if ($this->session->userdata('logged_in_peserta') == TRUE) {
    		if ($this->Peserta_model->cek_data_diri() == FALSE) {
    			if ($this->Peserta_model->cek_status_aktivasi() == TRUE){
    				$data['JSON'] = 'JSON/data_admin_JSON';
        			$this->load->view('peserta/regis_peserta', $data);	
    			}else{
    				redirect('Peserta/landing');
    			}	
    		}else{
    			redirect('Peserta','refresh');
    		}
		}else{
			redirect('Peserta','refresh');
		}
    }

    public function save_registrasi()
    {
    	$idnmr = $this->session->userdata('id_nmr');
		$data = array(
			'id_nmr' 		=> $idnmr, 
			'nama_peserta'	=> $this->input->post('nama_peserta'), 
			'email' 		=> $this->input->post('email'), 
			'no_hp' 		=> $this->input->post('no_hp'), 
			'asal_sekolah' 	=> $this->input->post('asal_sekolah'), 
			'kelas' 		=> $this->input->post('kelas'), 
			'id_ruang' 		=> '1',
			'status_absen' 	=> 'tidak_hadir' 
		);

		if ($this->Peserta_model->add_data_peserta($data) == TRUE) {
			$this->session->set_flashdata('success', 'Tambah Data Peserta Berhasil');
			redirect('Peserta/landing');
		} else {
			$this->session->set_flashdata('failed', 'Tambah Data Gagal, Silahkan Coba Lagi');
			redirect('Peserta/registrasi');
		}
    }


    public function end_session()
    {
    	$this->session->sess_destroy();
		redirect('Peserta/index');
    }

    public function absen(){
    	if($this->session->userdata('logged_in_peserta')==TRUE){
    		redirect('Peserta/do_absen','refresh');
    	}else{
    		$data['JSON'] = 'JSON/data_admin_JSON';
			$this->load->view('peserta/absen', $data);
    	}
    }

    public function hadir(){
    	if ($this->session->userdata('status_absen')=='hadir') {
    		$data['JSON'] = 'JSON/data_admin_JSON';
			$this->load->view('peserta/hadir', $data);
    	}else{
    		redirect('Peserta/absen','refresh');
    	}
    }

    public function end_session_absen()
    {
    	$this->session->sess_destroy();
		redirect('Peserta/absen');
    }

    public function do_absen(){
    		if($this->session->userdata('logged_in_peserta')==FALSE){
    		    if($this->Peserta_model->cek_peserta_hadir()==TRUE){
					if($this->session->userdata('status_absen')=='tidak_hadir'){
						if($this->Peserta_model->rubah_status_absen()==TRUE){
							redirect('Peserta/hadir','refresh');
						}else{
							
						}
					}else{
						redirect('Peserta/hadir','refresh');
					}
		        }else{
		        	redirect('Peserta/end_session_absen','refresh');
		        }				
    		}else{
	    		if($this->Peserta_model->cek_peserta_aktif()==TRUE){
					if($this->session->userdata('status_absen')=='tidak_hadir'){
						if($this->Peserta_model->rubah_status_absen()==TRUE){
							redirect('Peserta/hadir','refresh');
						}else{
							
						}
					}else{
						redirect('Peserta/hadir','refresh');
					}
		        }else{
		        	redirect('Peserta/absen','refresh');
		        }	
    		}			
    }

}

/* End of file peserta.php */
/* Location: ./application/controllers/peserta.php */
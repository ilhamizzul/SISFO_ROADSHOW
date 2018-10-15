<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/*$this->load->model('');*/
	}


	public function index()
	{
		$data['JSON'] = 'JSON/data_admin_JSON';
		$this->load->view('peserta/index', $data);	
	}

    public function landing()
    {
        $data['JSON'] = 'JSON/data_admin_JSON';
        $this->load->view('peserta/landing', $data);
    }

    public function registrasi()
    {
        $data['JSON'] = 'JSON/data_admin_JSON';
        $this->load->view('peserta/regis_peserta', $data);
    }

}

/* End of file peserta.php */
/* Location: ./application/controllers/peserta.php */
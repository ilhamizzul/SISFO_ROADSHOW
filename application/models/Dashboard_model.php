<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function count_peserta()
	{
		return $this->db->count_all_results('tb_peserta');
	}	
	public function count_dokumen()
	{
		return $this->db->count_all_results('tb_dokumen_soal');
	}	

	public function count_peserta_hadir()
	{
		return $this->db->where('status_absen', 'hadir')
						->count_all_results('tb_peserta');
	}

	public function count_peserta_tidak_hadir()
	{
		return $this->db->where('status_absen', 'tidak_hadir')
						->count_all_results('tb_peserta');
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */
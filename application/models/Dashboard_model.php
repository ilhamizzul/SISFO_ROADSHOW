<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function count_peserta()
	{
		return $this->db->join('tb_total_registration', 'tb_total_registration.id = tb_peserta.id_tahun')
						->where('tahun', date('Y'))
						->where('status', 0)
						->count_all_results('tb_peserta');
	}	
	public function count_dokumen()
	{
		return $this->db->count_all_results('tb_dokumen_soal');
	}	

	public function count_peserta_hadir()
	{
		return $this->db->join('tb_total_registration', 'tb_total_registration.id = tb_peserta.id_tahun')
						->where('tahun', date('Y'))
						->where('status', 0)
						->where('status_absen', 'hadir')
						->count_all_results('tb_peserta');
	}

	public function count_peserta_tidak_hadir()
	{
		return $this->db->join('tb_total_registration', 'tb_total_registration.id = tb_peserta.id_tahun')
						->where('tahun', date('Y'))
						->where('status', 0)
						->where('status_absen', 'tidak_hadir')
						->count_all_results('tb_peserta');
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */
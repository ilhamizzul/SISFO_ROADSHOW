<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Year_recap_model extends CI_Model {

	public function get_data_by_year($tahun)
	{
		return $this->db->select('id, status, tahun')
						->from('tb_total_registration')
						->where('tahun', $tahun)
						->get()
						->row();
	}

	public function get_data_recap()
	{
		return $this->db->select('tahun, total_terdaftar, total_hadir, total_tidak_hadir')
						->where('status', 1)
						->from('tb_total_registration')
						->get()
						->result();
	}

	public function data_recap()
	{
		$data = $this->get_data_by_year(2018);
		$all_peserta = $this->db->where('id_tahun', $data->id)->count_all_results('tb_peserta');
		$peserta_hadir = $this->db->where('status_absen', 'hadir')
									->where('id_tahun', $data->id)
									->count_all_results('tb_peserta');
		$peserta_tidak_hadir = $this->db->where('status_absen', 'tidak_hadir')
									->where('id_tahun', $data->id)
									->count_all_results('tb_peserta');

		$data_recap = array(
			'total_terdaftar' => $all_peserta,
			'total_hadir' => $peserta_hadir,
			'total_tidak_hadir' => $peserta_tidak_hadir,
			'status' => 1
		);

		$this->db->where('tahun', 2018)->update('tb_total_registration', $data_recap);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}
	

}

/* End of file Year_recap_model.php */
/* Location: ./application/models/Year_recap_model.php */
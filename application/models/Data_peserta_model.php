<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_peserta_model extends CI_Model {

	public function get_data_peserta()
	{
		return $this->db->select('*')
						->from('tb_peserta')
						->join('tb_nmrpeserta', 'tb_nmrpeserta.id_nmr = tb_peserta.id_nmr')
						->join('tb_ruang', 'tb_ruang.id_ruang = tb_peserta.id_ruang')
						->get()
						->result();
	}

	public function get_data_peserta_by_id($id_peserta)
	{
		return $this->db->where('id_peserta', $id_peserta)
						->get('tb_peserta')
						->row();
	}

	public function add_data_peserta($data, $idnmr)
	{

		return $this->db->insert('tb_peserta', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function delete_data_peserta($id_peserta)
	{
		return $this->db->where('id_peserta', $id_peserta)->delete('tb_peserta');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function edit_status_absen($id_peserta)
	{
		$data = array('status_absen' => 'hadir' );

		return $this->db->where('id_peserta', $id_peserta)
						->update('tb_peserta', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

}

/* End of file data_peserta_model.php */
/* Location: ./application/models/data_peserta_model.php */
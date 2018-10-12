<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_nomor_peserta_model extends CI_Model {

	public function get_nomor_peserta()
	{
		return $this->db->select('*')
						->from('tb_nmrpeserta')
						->get()
						->result();
	}

	public function get_nomor_peserta_non_active()
	{
		return $this->db->select('*')
						->from('tb_nmrpeserta')
						->where('status', 'nonaktif')
						->get()
						->result();
	}

	public function edit_status_nomor_peserta($data2, $idnmr)
	{
		return $this->db->where('id_nmr', $idnmr)->update('tb_nmrpeserta', $data2);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

}

/* End of file data_nomor_peserta_model.php */
/* Location: ./application/models/data_nomor_peserta_model.php */
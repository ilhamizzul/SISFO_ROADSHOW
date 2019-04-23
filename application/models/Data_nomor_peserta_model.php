<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_nomor_peserta_model extends CI_Model {

	public function get_nomor_peserta()
	{
		return $this->db->select('tb_nmrpeserta.id_nmr, nomor_peserta, tb_nmrpeserta.status')
						->join('tb_peserta', 'tb_peserta.id_nmr = tb_nmrpeserta.id_nmr')
						->join('tb_total_registration', 'tb_total_registration.id = tb_peserta.id_tahun')
						->from('tb_nmrpeserta')
						->where('tb_nmrpeserta.status', 'aktif')
						->where('tahun', date('Y'))
						->where('tb_total_registration.status', 0)
						->get()
						->result();
	}

	public function get_nomor_peserta_by_id($id_nmr_peserta)
	{
		return $this->db->where('id_nmr', $id_nmr_peserta)
						->get('tb_nmrpeserta')
						->row();
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

	public function delete_nmr_peserta($id_nmr_peserta)
	{
		return  $this->db->where('id_nmr', $id_nmr_peserta)
						->delete('tb_nmrpeserta');
		
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file data_nomor_peserta_model.php */
/* Location: ./application/models/data_nomor_peserta_model.php */
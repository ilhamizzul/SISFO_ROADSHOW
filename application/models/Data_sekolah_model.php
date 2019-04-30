<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sekolah_model extends CI_Model {

	public function get_data_sekolah()
	{
		return $this->db->get('tb_sekolah')
						->result();
	}

	public function get_data_sekolah_by_id($id_sekolah)
	{
		return $this->db->where('id_sekolah', $id_sekolah)
						->get('tb_sekolah')
						->row();
	}

	public function tambah_data_sekolah()
	{
		$data = array(
			'nama_sekolah' => $this->input->post('nama_sekolah'),
			'alamat_sekolah' => $this->input->post('alamat_sekolah') 
		);

		$this->db->insert('tb_sekolah', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
		
	}

	public function hapus_data_sekolah($id_sekolah)
	{
		$this->db->where('id_sekolah', $id_sekolah)->delete('tb_sekolah');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
		
	}

}

/* End of file Data_sekolah_model.php */
/* Location: ./application/models/Data_sekolah_model.php */
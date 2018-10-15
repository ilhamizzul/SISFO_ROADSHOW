<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_admin_model extends CI_Model {

	public function get_data_admin()
	{
		return $this->db->select('*')
						->from('tb_admin')
						->where('status', 'admin')
						->get()
						->result();
	}	

	public function add_admin()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'), 
			'sekolah' => $this->input->post('sekolah'),
			'status' => 'admin'
		);

		return $this->db->insert('tb_admin', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_data_admin_by_id($id_admin)
	{
		return $this->db->where('id_admin', $id_admin)
						->get('tb_admin')
						->row();
	}

	public function delete_data_admin($id_admin)
	{
		return $this->db->where('id_admin', $id_admin)
						->delete('tb_admin');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

}

/* End of file data_admin_model.php */
/* Location: ./application/models/data_admin_model.php */
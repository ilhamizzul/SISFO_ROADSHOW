<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ruangan_model extends CI_Model {

	public function get_data_ruangan()
	{
		return $this->db->select('*')
						->from('tb_ruang')
						->get()
						->result();
	}	

	public function add_data_ruangan()
	{
		$data = array(
			'nama_ruang' => $this->input->post('nama_ruang'),
			'letak_ruang' =>  $this->input->post('letak_ruang')
		);

		return $this->db->insert('tb_ruang', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_data_ruangan_by_id($id_ruang)
	{
		return $this->db->where('id_ruang', $id_ruang)
						->get('tb_ruang')
						->row();
	}

	public function delete_data_ruangan($id)
	{
		return $this->db->where('id_ruang', $id)->delete('tb_ruang');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_letak_ruangan($id_ruang)
	{
		$data = array(
			'nama_ruang' => $this->input->post('nama_ruang'),
			'letak_ruang' =>  $this->input->post('letak_ruang')
		);
    	$this->db->set($data)
    				->where('id_ruang',$id_ruang)
    			 	->update('tb_ruang');

	    if($this->db->affected_rows()>0){
	    	return TRUE;
	    }else{
	    	return FALSE;
	    }
	}

}

/* End of file data_ruangan_model.php */
/* Location: ./application/models/data_ruangan_model.php */
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
	public function get_id_ruangan()
	{
		return $this->db->select('id_ruang')
						->from('tb_ruang')
						->get()
						->result();
	}
	public function count_peserta_no_room()
	{
		// return $this->db->
		return $this->db->select('id_peserta')
						->where('id_ruang', 1)
						->from('tb_peserta')
						->get()
						->result();
	}

	public function add_data_ruangan()
	{
		$data = array(
			'nama_ruang' => $this->input->post('nama_ruang'),
			'letak_ruang' =>  $this->input->post('letak_ruang')
		);

		$this->db->insert('tb_ruang', $data);

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
	public function edit_ruangan_peserta($id_peserta, $id_ruangan)
	{
		$data = array('id_ruang' => $id_ruangan);
		$this->db->where('id_peserta', $id_peserta)
				->update('tb_peserta', $data);
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
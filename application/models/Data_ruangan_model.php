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

}

/* End of file data_ruangan_model.php */
/* Location: ./application/models/data_ruangan_model.php */
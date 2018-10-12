<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_admin_model extends CI_Model {

	public function get_data_admin()
		{
			return $this->db->select('*')
							->from('tb_admin')
							->get()
							->result();
		}	

}

/* End of file data_admin_model.php */
/* Location: ./application/models/data_admin_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Year_recap_model extends CI_Model {

	public function get_id_by_year($tahun)
	{
		return $this->db->select('id')
						->from('tb_total_registration')
						->where('tahun', $tahun)
						->get()
						->row();
	}
	

}

/* End of file Year_recap_model.php */
/* Location: ./application/models/Year_recap_model.php */
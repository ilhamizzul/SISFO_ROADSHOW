<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_model extends CI_Model {

	public function get_email_asset()
	{
		return $this->db->select('email_img_1, email_img_2, tryout_location, tryout_duedate')
						->from('tb_imgasset')
						->get()
						->row();
	}

	public function update_email_asset()
		{
			// $data = array(
			// 	'' => $this->input->post(''),
			// 	'' => $this->input->post(''),
			// 	'' => $this->input->post(''),
			// 	'' => $this->input->post(''), 
			// );
		}	

}

/* End of file asset_model.php */
/* Location: ./application/models/asset_model.php */
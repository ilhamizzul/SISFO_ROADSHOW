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

}

/* End of file data_nomor_peserta_model.php */
/* Location: ./application/models/data_nomor_peserta_model.php */
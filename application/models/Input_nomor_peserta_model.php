<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_nomor_peserta_model extends CI_Model {

		
	public function add_no_peserta($data) {
		$this->db->insert('tb_nmrpeserta', $data);
	}

}

/* End of file input_nomor_peserta_model.php */
/* Location: ./application/models/input_nomor_peserta_model.php */
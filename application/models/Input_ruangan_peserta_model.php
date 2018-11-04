<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_ruangan_peserta_model extends CI_Model {

    public function update_ruangan_peserta($id_ruang){
    	$id_peserta = $this->input->post('id_peserta');
    	$data = array('id_ruang' => $id_ruang );

    	return $this->db->where('id_peserta',$id_peserta)
    			 		->update('tb_peserta', $data);

	    if($this->db->affected_rows()>0){
	    	return TRUE;
	    }else{
	    	return FALSE;
	    }
    }
	

}

/* End of file input_ruangan_peserta_model.php */
/* Location: ./application/models/input_ruangan_peserta_model.php */

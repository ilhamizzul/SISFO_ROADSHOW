<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_ruangan_peserta_model extends CI_Model {

    public function edit_ruangan($id_ruang){
    	$id_peserta = $this->input->post(id_peserta);
    $this->db->set('id_ruang',$id_ruang)
    				->where('id_peserta',$id_peserta)
    			 	->update('tb_peserta');

	    if($this->db->affected_rows()>0){
	    	return TRUE;
	    }else{
	    	return FALSE;
	    }
    }
	

}

/* End of file input_ruangan_peserta_model.php */
/* Location: ./application/models/input_ruangan_peserta_model.php */

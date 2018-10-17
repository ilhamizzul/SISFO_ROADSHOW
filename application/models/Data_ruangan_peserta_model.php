<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ruangan_peserta_model extends CI_Model {

    public function get_data_ruangan($id_ruang)
    {
        return $this->db->select('*')
                        ->where('id_ruang',$id_ruang)
                        ->get('tb_ruang')
                        ->row();
    }

    public function get_data_peserta($id_ruang){
        return $this->db->select('*')
                    ->join('tb_nmrpeserta', 'tb_nmrpeserta.id_nmr = tb_peserta.id_nmr')
                    ->from('tb_peserta')
                    ->where('id_ruang',$id_ruang)
                    ->get()
                    ->result();
    }

    public function get_data_peserta_by_id($id_peserta)
    {
        return $this->db->select('*')
                    ->join('tb_nmrpeserta', 'tb_nmrpeserta.id_nmr = tb_peserta.id_nmr')
                    ->from('tb_peserta')
                    ->where('id_peserta',$id_peserta)
                    ->get()
                    ->row();
    }

    public function get_data_ruangan_all()
    {
        return $this->db->select('*')
                        ->get('tb_ruang')
                        ->result();
    }


    public function get_data_peserta_all()
    {
        return $this->db->select('*')
            ->order_By('asal_sekolah')
            ->from('tb_peserta')
            ->where('id_ruang','1')
            ->join('tb_nmrpeserta', 'tb_nmrpeserta.id_nmr = tb_peserta.id_nmr')
            ->get()
            ->result();
    }
}

/* End of file data_ruangan_peserta_model.php */
/* Location: ./application/models/data_ruangan_peserta_model.php */
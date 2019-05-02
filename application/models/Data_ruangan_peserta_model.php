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
                    ->join('tb_total_registration', 'tb_total_registration.id = tb_peserta.id_tahun')
                    ->from('tb_peserta')
                    ->where('tahun', date('Y'))
                    ->where('tb_total_registration.status', 0)
                    ->where('id_ruang',$id_ruang)
                    ->get()
                    ->result();
    }

    public function get_data_peserta_by_hadir($id_ruang){
        return $this->db->select('*')
                    ->join('tb_nmrpeserta', 'tb_nmrpeserta.id_nmr = tb_peserta.id_nmr')
                    ->from('tb_peserta')
                    ->where('id_ruang',$id_ruang)
                    ->where('status_absen', 'hadir')
                    ->get()
                    ->result();
    }

    public function get_data_peserta_by_non_hadir($id_ruang){
        return $this->db->select('*')
                    ->join('tb_nmrpeserta', 'tb_nmrpeserta.id_nmr = tb_peserta.id_nmr')
                    ->from('tb_peserta')
                    ->where('id_ruang',$id_ruang)
                    ->where('status_absen', 'tidak_hadir')
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
        return $this->db->select('nama_peserta, nama_sekolah')
            ->order_By('tb_peserta.id_sekolah')
            ->from('tb_peserta')
            ->where('id_ruang','1')
            ->join('tb_nmrpeserta', 'tb_nmrpeserta.id_nmr = tb_peserta.id_nmr')
            ->join('tb_sekolah', 'tb_sekolah.id_sekolah = tb_peserta.id_sekolah')
            ->get()
            ->result();
    }

    public function update_absen()
    {
        $anu;   
        $update = $this->input->post('id_peserta');
        for ($i=0; $i <count($update) ; $i++) { 
            $data = array('status_absen' => 'hadir' );
            return $this->db->where('id_peserta', $update[$i])
                    ->update('tb_peserta', $data);
        }
    }
}

/* End of file data_ruangan_peserta_model.php */
/* Location: ./application/models/data_ruangan_peserta_model.php */
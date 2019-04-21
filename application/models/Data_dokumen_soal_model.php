<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_dokumen_soal_model extends CI_Model {

	public function get_dokumen()
	{
		return $this->db->get('tb_dokumen_soal')->result();
	}

	public function get_filtered_dokumen()
	{
		$tipe = $this->input->post('filter_dokumen');
		return $this->db->where('tipe_dokumen_soal', $tipe)
						->get('tb_dokumen_soal')
						->result();

	}

	public function get_dokumen_by_id($id)
	{
		return $this->db->where('id_dokumen', $id)
						->get('tb_dokumen_soal')
						->row();
	}

	public function tambah_dokumen($file_dokumen)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array(
			'id_dokumen'		=> date('m').date('d').date('h').date('i').date('s'),
			'nama_dokumen_soal' => $this->input->post('tipe_dokumen').' '.$this->input->post('tipe_soal').' tahun '.$this->input->post('tahun_dokumen_soal'),
			'tipe_dokumen_soal' => $this->input->post('tipe_dokumen'),
			'tipe_soal' => $this->input->post('tipe_soal'),
			'tahun_dokumen_soal' => $this->input->post('tahun_dokumen_soal'),
			'file_soal' => $file_dokumen['file_name']
		);

		return $this->db->insert('tb_dokumen_soal', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function edit_dokumen($id_dokumen, $file_dokumen)
	{
		$data = array(
			'nama_dokumen_soal' => $this->input->post('nama_dokumen'),
			'tahun_dokumen_soal' => $this->input->post('tahun_dokumen_soal'),
			'file_soal' =>  $file_dokumen['file_name']
		);

		return $this->db->where('id_dokumen', $id_dokumen)->update('tb_dokumen_soal', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_data_dokumen($id_dokumen)
	{
		$data = array(
			'nama_dokumen_soal' => $this->input->post('nama_dokumen'),
			'tahun_dokumen_soal' => $this->input->post('tahun_dokumen_soal')
		);

		return $this->db->where('id_dokumen', $id_dokumen)->update('tb_dokumen_soal', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus_dokumen($id_dokumen)
	{
		return $this->db->where('id_dokumen', $id_dokumen)
						->delete('tb_dokumen_soal');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

}

/* End of file Data_dokumen_soal_model.php */
/* Location: ./application/models/Data_dokumen_soal_model.php */
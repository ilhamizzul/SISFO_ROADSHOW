<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_model extends CI_Model {

	public function cek_nomor_peserta()
	{
		$nomor_peserta = $this->input->post('input_nopes');
		$query = $this->db->where('nomor_peserta', $nomor_peserta)
						  ->get('tb_nmrpeserta');

		$data_peserta = $query->row_array();

			$session_peserta = array(
				'logged_in_peserta' => TRUE,
				'nomor_peserta' => $data_peserta['nomor_peserta'],
				'id_nmr' => $data_peserta['id_nmr']
			);
			
		$this->session->set_userdata( $session_peserta );


		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function cek_peserta_aktif()
	{
		$nomor_peserta = $this->session->userdata('nomor_peserta');
		$query = $this->db->where('nomor_peserta', $nomor_peserta)
						  ->join('tb_peserta', 'tb_nmrpeserta.id_nmr = tb_peserta.id_nmr')
						  ->get('tb_nmrpeserta');

		$data_peserta = $query->row_array();

			$session_peserta = array(
				'logged_in_peserta' => TRUE,
				'nomor_peserta' => $data_peserta['nomor_peserta'],
				'id_nmr' => $data_peserta['id_nmr'],
				'status_absen' => $data_peserta['status_absen']
			);
			
		$this->session->set_userdata( $session_peserta );


		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

	public function cek_peserta_hadir()
	{
		$nomor_peserta = $this->input->post('input_nopes');
		$query = $this->db->where('nomor_peserta', $nomor_peserta)
						  ->join('tb_peserta', 'tb_nmrpeserta.id_nmr = tb_peserta.id_nmr')
						  ->get('tb_nmrpeserta');

		$data_peserta = $query->row_array();

			$session_peserta = array(
				'logged_in_peserta' => TRUE,
				'nomor_peserta' => $data_peserta['nomor_peserta'],
				'id_nmr' => $data_peserta['id_nmr'],
				'status_absen' => $data_peserta['status_absen']
			);
			
		$this->session->set_userdata( $session_peserta );


		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

	public function cek_data_diri()
	{
		$nomor_peserta = $this->session->userdata('nomor_peserta');
		$query = $this->db->select('*')
                 		  ->join('tb_nmrpeserta', 'tb_nmrpeserta.id_nmr = tb_peserta.id_nmr')
                    	  ->from('tb_peserta')
                    	  ->where('nomor_peserta',$nomor_peserta)
                    	  ->get()
                    	  ->row();

		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	public function lihat_data_diri()
	{
		$nomor_peserta = $this->session->userdata('nomor_peserta');
		return $this->db->select('*')
                 		  ->join('tb_peserta', 'tb_nmrpeserta.id_nmr = tb_peserta.id_nmr')
                 		  ->join('tb_ruang', 'tb_ruang.id_ruang = tb_peserta.id_ruang')
                    	  ->from('tb_nmrpeserta')
                    	  ->where('nomor_peserta',$nomor_peserta)
                    	  ->get()
                    	  ->row();
	}

	public function cek_status_aktivasi()
	{
		$nomor_peserta = $this->session->userdata('nomor_peserta');
		$query = $this->db->select('*')
                    	  ->from('tb_nmrpeserta')
                    	  ->where('nomor_peserta',$nomor_peserta)
                    	  ->where('status','aktif')
                    	  ->get()
                    	  ->row();

		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function rubah_status_aktivasi()
	{
		$nomor_peserta = $this->session->userdata('nomor_peserta');
		$query = $this->db->set('status','aktif')
						  ->where('nomor_peserta',$nomor_peserta)
						  ->update('tb_nmrpeserta');
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function add_data_peserta($data)
	{

		return $this->db->insert('tb_peserta', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function rubah_status_absen()
	{
		$id_nmr = $this->session->userdata('id_nmr');
		$query = $this->db->set('status_absen','hadir')
						  ->where('id_nmr',$id_nmr)
						  ->update('tb_peserta');

		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function mailer($email)
	{
		$config = array(
			'protocol' => 'smtp', 
			'smtp_host' => 'ssl://smtp.googlemail.com', 
			'smtp_port' => 465, 
			'smtp_user' => 'testmailercodeigniter@gmail.com', 
			'smtp_pass' => 'testermail123'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('testmailercodeigniter@gmail.com', 'Telkom University');
		$this->email->to($email);
		$this->email->subject('Test Email PROTECT 2K18');
		$this->email->message('WOOOHOOOO ISOOO CUUUYYY');
		$this->email->send();
		if ($this->email->send()) {
			echo 'berhasil berhasil berhasil';
		} else {
			show_error($this->email->print_debugger());
		}
	}

}

/* End of file Peserta_model */
/* Location: ./application/models/Peserta_model */

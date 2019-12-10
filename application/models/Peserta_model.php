<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_model extends CI_Model {

	public function get_data_sekolah()
	{
		return $this->db->select('id_sekolah, nama_sekolah')
						->from('tb_sekolah')
						->get()
						->result();
	}

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
                 		  ->join('tb_sekolah', 'tb_sekolah.id_sekolah = tb_peserta.id_sekolah')
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

	public function mailer($email, $username, $no_peserta)
	{
		$config = array(
			'mailtype' => 'html',
			'protocol' => 'smtp', 
			'smtp_host' => 'ssl://smtp.googlemail.com', 
			'smtp_port' => 465, 
			// 'smtp_user' => 'ProTelkomCommunity@gmail.com', 
			// 'smtp_pass' => '/*protect2013*/'
			'smtp_user' => 'protectprobolinggocommunity@gmail.com', 
			'smtp_pass' => 'protectprobolinggo'
			
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('ProTelkomCommunity@gmail.com', 'PROTECT2K18');
		$this->email->to($email);
		$this->email->subject('Thank You For Your Participate PROTECT 2K18!');
		$this->email->message(
					'<!DOCTYPE html>
					<html lang="en">
					<head>
					    <meta charset="UTF-8">
					    <title>Mail</title>
					    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
					    <style>
					        body {
					            font-family: "Roboto", sans-serif; }

					        table {
					            margin: 0px auto;
					            width: 600px;
					            padding: 0px;
					            border-collapse: collapse; }

					        td {
					            padding-left: 4%;
					            margin: 0px; }

					        .header {
					            width: 100%;
					            color: #af7bb5;
					            background-color: white; }
					        .header a {
					            text-decoration: none; }
					        .header a:hover {
					            color: #eaa2f0; }

					        .title {
					            width: 60%; }

					        .body {
					            width: 60%; }

					        p {
					            margin-bottom: 25%;
					            font-size: 14px; }
					        p span {
					            font-weight: bold;
					            font-size: 16px;
					            color: #af7bb5; }

					        #line {
					            background-color: transparent; }

					        .img-right {
					            width: 40%;
					            padding: 0px;
					            text-align: right; }

					        .img-bottom {
					            width: 40%;
					            padding: 0px;
					            text-align: right;
					            vertical-align: bottom; }

					        .footer {
					            width: 100%;
					            color: #af7bb5;
					            background-color: white; }
					        .footer a {
					            text-decoration: none; }
					        .footer a:hover {
					            color: #eaa2f0; }
					    </style>
					</head>
					<body>

					    <table border="0" >
					        <!--header-->
					        <tr id="header">
					            <td class="header">
					                <a href=""><b><img src="http://funkyimg.com/i/2MMYc.png" style="height:40px; width:200px;"></b></a>
					            </td>
					            <td class="img-right" id="line" rowspan="2">
					                <img src="http://funkyimg.com/i/2MMTE.png" alt="">
					            </td>
					        </tr>
					        <!--title-->
					        <tr>
					            <td class="title">
					                <h2>Hello, '.$username.'</h2>
					            </td>
					        </tr>
					        <!--body-->
					        <tr>
					            <td class="body">
					                <p id="body">
					                    Selamat Anda sudah terdaftar untuk mengikuti Try Out SMB Telkom University dengan nomor peserta <span>'.$no_peserta.'</span>
					                    <br><br>
					                    Untuk mengingatkan, Try Out akan dilaksakan pada:
					                    <br><br>
					                    Hari, Tanggal: <span>Minggu, 06 Januari 2019</span>
					                    <br>
					                    Tempat: <span>SMAN 1 Kota Probolinggo</span>
					                    <br><br>
					                    Ruangan peserta akan di update pada website protect pada tanggal 5 Januari 2019.
					                    <br><br>
					                    Terimakasih.
					                </p>
					            </td>

					            <td class="img-bottom" rowspan="2">
					                <img src="http://funkyimg.com/i/2MMT7.png" alt="">
					            </td>
					        </tr>
					        <!--footer-->
					        <tr>
					            <td class="footer">
					                <a href="https://www.instagram.com/protect.telkom/?hl=en"><h5>@protect.telkom</h5></a>
					            </td>
					        </tr>

					    </table>

					</body>
					</html>'
		);	
		if ($this->email->send()) {
			echo 'berhasil berhasil berhasil';
		} else {
			show_error($this->email->print_debugger());
		}
	}

}

/* End of file Peserta_model */
/* Location: ./application/models/Peserta_model */

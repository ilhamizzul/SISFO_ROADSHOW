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

	public function mailer($email, $username, $no_peserta)
	{
		$config = array(
			'mailtype' => 'html',
			'protocol' => 'smtp', 
			'smtp_host' => 'ssl://smtp.googlemail.com', 
			'smtp_port' => 465, 
			'smtp_user' => 'testmailercodeigniter@gmail.com', 
			'smtp_pass' => 'testermail123'
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

	// public function email_text()
	// {
	// 	return '<p id="body">
	// 	            Selamat Anda sudah terdaftar untuk mengikuti Try Out SMB Telkom University dengan nomor peserta <span>109845</span>
 //                    <br><br>
	// 	            Untuk mengingatkan, Try Out akan dilaksakan pada:
	// 	            <br><br>
	// 	            Hari, Tanggal: <span>Minggu, 06 Januari 2019</span>
	// 	            <br>
	// 	            Tempat: <span>SMAN 1 Kota Probolinggo</span>
	// 	            <br><br>
 //                    Ruangan peserta akan di update pada website protect pada tanggal 5 Januari 2019.
 //                    <br><br>
 //                    Terimakasih.
	// 	        </p>';
	// }

	// public function email_template($params=array())
	// {
	// 	$_template ='';
	// 	$_template .='<!DOCTYPE html>';
	// 	$_template .='<html lang="en">';
	// 	$_template .='<head>';
	// 	    $_template .= '<meta charset="UTF-8">';
	// 	    $_template .= '<title>Mail</title>';
	// 	    $_template .= '<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">';
	// 	    $_template .= '<style>';
	// 	        $_template.='body {font-family: "Roboto", sans-serif; }';
	// 	        $_template.='table {margin: 0px auto; width: 600px; padding: 0px; border-collapse: collapse; }';
	// 	        $_template.='td { padding-left: 4%; margin: 0px; }';
	// 	        $_template.='.header { width: 100%; color: #af7bb5; background-color: white; }';
	// 	        $_template.='.header a { text-decoration: none; }';
	// 	        $_template.='.header a:hover { color: #eaa2f0; }';
	// 	        $_template.='.title { width: 60%; }';
	// 	        $_template.='.body { width: 60%; }';
	// 	        $_template.='p { margin-bottom: 25%; font-size: 14px; }';
	// 	        $_template.='p span { font-weight: bold; font-size: 16px; color: #af7bb5; }';
	// 	        $_template.='#line { background-color: transparent; }';
	// 	        $_template.='.img-right { width: 40%; padding: 0px; text-align: right; }';
	// 	        $_template.='.img-bottom { width: 40%; padding: 0px; text-align: right; vertical-align: bottom; }';
	// 	        $_template.='.footer { width: 100%; color: #af7bb5; background-color: white; }';
	// 	        $_template.='.footer a { text-decoration: none; }';
	// 	        $_template.='.footer a:hover { color: #eaa2f0; }';
	// 	    $_template.='</style>';
	// 	$_template.='</head>';
	// 	$_template.='<body>';
	// 	    $_template.='<table border="0" >';
	// 	        $_template.='<tr id="header">';
	// 	            $_template.='<td class="header">';
	// 	                $_template.='<a href=""><b><h3>PROTECT</h3></b></a>';
	// 	            $_template.='</td>';
	// 	            $_template.='<td class="img-right" id="line" rowspan="2">';
	// 	                $_template.='<img src="'.base_url().'assets/img/Layer4.png" alt="">';
	// 	            $_template.='</td>';
	// 	        $_template.='</tr>';
	// 	        $_template.='<tr>';
	// 	            $_template.='<td class="title">';
	// 	                $_template.='<h2>Hello, Jhon</h2>';
	// 	            $_template.='</td>';
	// 	        $_template.='</tr>';
	// 	        $_template.='<tr>';
	// 	            $_template.='<td class="body">';
	// 	                $_template.='{contents}';
	// 	            $_template.='</td>';
	// 	            $_template.='<td class="img-bottom" rowspan="2">';
	// 	                $_template.='<img src="'.base_url().'assets/img/Layer2.png" alt="">';
	// 	            $_template.='</td>';
	// 	        $_template.='</tr>';
	// 	        $_template.='<tr>';
	// 	            $_template.='<td class="footer">';
	// 	                $_template.='<a href=""><h5>@protect.telkom</h5></a>';
	// 	            $_template.='</td>';
	// 	        $_template.='</tr>';
	// 	    $_template.='</table>';
	// 	$_template.='</body>';
	// 	$_template.='</html>';
	// }

}

/* End of file Peserta_model */
/* Location: ./application/models/Peserta_model */

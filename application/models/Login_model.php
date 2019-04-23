<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function check_auth()
	{
		date_default_timezone_set('Asia/Jakarta');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$current_time = date('Y-m-d H:i:s'); // get curent time ASIA JAKARTA

		$login_status = $this->db->select('online_status, last_login')
								->from('tb_admin')
								->where('username', $username)
								->where('password', $password)
								->get()
								->row(0);
		
		$timespan = strtotime($current_time) - strtotime($login_status->last_login); // get time differences

		if ($login_status->online_status == 1 && $timespan <= 7200 ) {
			return false;
		} else if (($login_status->online_status == 1 && $timespan > 7200) || $login_status->online_status == 0){
			return true;
		}
		// return $login_status;
	}

	// session_cache_expire();


	public function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->where('username', $username)
						->where('password', $password)
						->get('tb_admin');


		if ($this->db->affected_rows() > 0) {
			$data = $query->row_array();

			$update_data = array(
				'online_status' => TRUE,
				'last_login' => date_default_timezone_get('Asia/Jakarta') 
			);

			$this->db->where('username', $username)->update('tb_admin', $update_data);

			$session = array(
				'logged_in' => TRUE,
				'username' => $data['username'],
				'sekolah' => $data['sekolah'],
				'status' => $data['status']
			);
			
			$this->session->set_userdata( $session );

			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function logout()
	{
		$update_data = array(
			'online_status' => FALSE, 
		);
		return $this->db->where('username', $this->session->userdata('username'))->update('tb_admin', $update_data);
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */
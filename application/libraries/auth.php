<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth {

	var $CI = null;

	function Auth()
	{
		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->library(array('loader','fungsi','simplival'));
	}
	function checkIP()
	{
		$domain = isset($_SERVER['HTTP_X_FORWARDED_FOR'])
		 ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
		$this->CI->db->from('allowed_ip');
		$this->CI->db->where('ip_address',$domain);
		$exist = $this->CI->db->count_all_results();
		if($exist == 0)
		{
			/* NTAR DIAKTIFKAN LAGI */
			/*echo $this->CI->fungsi->warning($this->CI->config->item('project_name').' tidak memperbolehkan Login di Area Anda',site_url());
			die(); */
		}
	}
	function checkOnline($id)
	{
		$this->CI->db->where('user_id',$id);
		$this->CI->db->from('online');
		return $this->CI->db->count_all_results();
	}
	function getLastActivity($id)
	{
		$this->CI->db->select('last_activity');
		$this->CI->db->from('online');
		$this->CI->db->where('user_id',$id);
		$data = $this->CI->db->get();
		$row = $data->row();
		return $row->last_activity;
	}
	function getDiff($old,$now)
	{
	    if($old == '' OR $now == '')
	    {
	       return TRUE;
	    }
		$old_y = date('Y',$old);
		$old_m = date('n',$old);
		$old_d = date('j',$old);
		$old_g = date('G',$old);
		$old_i = date('i',$old);
		//$old_s = date('s',$old);
		$now_y = date('Y',$now);
		$now_m = date('n',$now);
		$now_d = date('j',$now);
		$now_g = date('G',$now);
		$now_i = date('i',$now);
		//$now_s = date('s',$now);
		//start checking
		if($now_y!=$old_y){return TRUE;}
		if($now_m!=$old_m){return TRUE;}
		if($now_d!=$old_d){return TRUE;}
		if($now_g!=$old_g){return TRUE;}
		// ignore second
		$diff_minute = $now_i - $old_i;
		if($diff_minute >= 10){ return TRUE;}
		return FALSE;
	}
	function process_login($login = NULL)
	{
	     	// A few safety checks
	    	// Our array has to be set
	    	$this->checkIP();
	    	if(!isset($login))
		        return FALSE;
		
	    	//Our array has to have 2 values
	     	//No more, no less!
	    	if(count($login) != 2)
	         	return FALSE;
		
	     	$username = $login['username'];
	     	$password = $login['password'];
	
		$this->CI->db->from('user');
		$this->CI->db->where('user_username', $username);
		$this->CI->db->where('user_aktif', '1');
		$this->CI->db->where("user_password=PASSWORD('$password')");
		$query = $this->CI->db->get();

	     	foreach ($query->result() as $row)
        	{
        		$user_id=$row->user_id;
			$username= $row->user_username;
			$level = $row->level_id;
			$namafull=$row->user_nama;
			$count = $row->user_logincount;
			$status_online = $this->checkOnline($user_id);
			$count++;
			if($status_online == 1)
			{
				$now = time();
				$old = $this->getLastActivity($user_id);
				if(!$this->getDiff($old,$now))
				{
					echo $this->CI->fungsi->warning('Anda masih tercatat dalam database sebagai user online.\nIni mungkin terjadi karena :\n1. Anda belum \'Logout\' pada waktu terakhir kali Anda login, atau \n2. Ada orang lain yang sedang menggunakan user Anda. \nJika kemungkinan pertama memang benar, Anda hanya perlu menunggu sekitar 10 menit dari \nsejak aktivitas terakhir Anda di SIKeu. Jika 10 menit berselang namun \nAnda masih tetap tidak bisa login, maka kemungkinan kedua bisa jadi benar. \nJika Anda tidak yakin, silakan hubungi Administrator untuk konfirmasi. \nHal ini penting untuk mengindari adanya pemakaian user oleh orang yang tidak bertanggung jawab.',site_url());
					die();
				}else{
					$this->CI->db->delete('online',array('user_id'=>$user_id));
				}
			}
        	}
	
	     	if ($query->num_rows() == 1)
	     	{
	       	 	$newdata = array(
	       	 	    'user_id'	=> $user_id,
                            'username'  => $username,
                            'level'    	=> $level,
                            'nama'  	=> $namafull,
                            'logged_in' => TRUE,
                            'login_ke' 	=> $count,
               		);
		// Our user exists, set session.
		$this->CI->session->set_userdata($newdata);	  
		$kegiatan='Login '.$this->CI->config->item('project_name').' by '.$namafull;
		$this->CI->fungsi->catat($kegiatan);
		// update counter login
		$this->CI->db->where('user_id',$user_id);
		$this->CI->db->update('user',array('user_logincount'=>$count));
		// insert user_id to table 'online'
		$this->CI->db->insert('online',array('user_id'=>$user_id));
		return TRUE;
		}
		else 
		{
		    // No existing user.
		    return FALSE;
		}
	 }
 
       /**
         *
         * This function restricts users from certain pages.
         * use restrict(TRUE) if a user can't access a page when logged in
         *
         * @access	public
         * @param	boolean	wether the page is viewable when logged in
         * @return	void
         */	
    	function restrict($logged_out = FALSE)
    	{
		$this->checkIP();
		// If the user is logged in and he's trying to access a page
		// he's not allowed to see when logged in,
		// redirect him to the index!
		if ($logged_out && $this->logged_in())
		{
		      echo $this->CI->fungsi->warning('Maaf, sepertinya Anda sudah login...',site_url());
		      die();
		}
		
		// If the user isn' logged in and he's trying to access a page
		// he's not allowed to see when logged out,
		// redirect him to the login page!
		if ( ! $logged_out && ! $this->logged_in()) 
		{
		      echo $this->CI->fungsi->warning('Anda diharuskan untuk Login bila ingin mengakses halaman Administrasi.',site_url());
		      die();
		}
     	}

/**
 *
 * Checks if a user is logged in
 *
 * @access	public
 * @return	boolean
 */	
    	function logged_in()
      	{
      		if ($this->CI->session->userdata('username') == FALSE)
	         {
	    	    	return FALSE;
	         }
	        else 
	         {
	         return TRUE;
	         }
    }
    function logout() 
    {
		$kegiatan='Logout '.$this->CI->config->item('project_name').' by '.$this->CI->session->userdata('nama');
		$this->CI->fungsi->catat($kegiatan);
		// delete the 'online' status 
		$user_id=$this->CI->session->userdata('user_id');
		$this->CI->db->delete('online',array('user_id'=>$user_id));
		// destroy the session
		$this->CI->session->sess_destroy();	
		return TRUE;
    }
	
}
// End of library class
// Location: system/application/libraries/Auth.php

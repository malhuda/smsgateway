<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MySession{
	function __construct(){
       $this->CI =& get_instance();	   
    }
	function GetAccess(){		
		 if($this->CI->uri->segment(1)=='backend'){
			$this->GetAccessBackend();	
		 }		 
	}
	function GetAccessBackend(){		
		$this->CI->config->load('session_backend');
		$this->CI->load->library('session',$this->CI->config->item('my_session'));
		//$this->CI->load->helper('form');		
		if($this->CI->session->userdata('user_name')){
			if($this->CI->uri->segment(2)=='login'){
				if($this->CI->uri->segment(4)){
					redirect(str_replace('|','/',$this->CI->uri->segment(4)));
				}elseif($this->CI->uri->segment(3)=='index'){
					redirect('backend/main');
				}
			}else{				
				// if($this->CI->uri->segment(2)!='main'){
					// $this->CI->load->model(array('Menu_access_model'));
					// $this->CI->akses=$this->CI->Menu_access_model->get_access();
					//$this->CI->load->library('backend/widget',$this->CI->akses);					
					// if($this->CI->akses['0']==""){
						// redirect('backend/main/denied');
					// }else{
						// if(isset($this->CI->akses[$this->CI->uri->segment(3)])){
							// if($this->CI->akses[$this->CI->uri->segment(3)]==""){
								// redirect('backend/main/denied');
							// }else{
								$this->CI->db->query("ALTER SESSION SET NLS_DATE_FORMAT='DD-MM-YYYY'");
								// if(count($_POST)==0){
									// header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); // Date in the past
									// header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); // always modified
									// header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
									// header("Cache-Control: post-check=0, pre-check=0", FALSE);
									// header("Pragma: no-cache");
								// }		
							// }							
						// }
					// }
				// }				
			}
		 }else{		
			if($this->CI->uri->segment(2)!='login'){
				$url_param=($this->CI->uri->segment(2)!=null)?$this->CI->uri->segment(2):'';
				$url_param.=($this->CI->uri->segment(3)!=null)?'|'.$this->CI->uri->segment(3):'';
				$url_param.=($this->CI->uri->segment(4)!=null)?'|'.$this->CI->uri->segment(4):'';
				redirect('backend/login/index/'.$url_param);
			}
		}		
	}
}
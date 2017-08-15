<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Simplival
{
	function Simplival()
	{
		$this->SV =& get_instance();
		$this->SV->load->library('validation');
		$this->SV->load->library(array('loader','encrypt','session'));
		$this->SV->load->helper(array('security','string'));
		//$this->SV->load->model('menumodel');
	}
	function acceptData($value)
	{
		foreach($value as $key => $val)
		{	
			$data[$val]  = $this->SV->input->post($val,TRUE);
			if(!is_array($data[$val]))
			{
    			$data[$val]  	= strip_image_tags($data[$val]);
    			$data[$val]	= quotes_to_entities($data[$val]);
    			$data[$val]  	= encode_php_tags($data[$val]);
    			$data[$val]  	= trim($data[$val]);
    		}
		}		
		return $data;
	}
	function simpleAccept($value)
	{
		foreach($value as $key => $val)
		{	
			$data[$val]  = $this->SV->input->post($val);
		}
		return $data;
	}
	function alert($msg)
	{
		$output="<script> window.alert(\"$msg\")</script>";
		echo $output;
	}
	function setFields($data){
		foreach($data as $key => $val)
		{
			$fields[$val] = $val;		
		}
		$this->SV->validation->set_fields($fields);
	}
	function cek($idmenu,$active=true,$return=false)
	{
		$status_user=$this->SV->session->userdata('level');
		$arr = $this->SV->menumodel->getArrayMenu($idmenu,$active);
		if(in_array($status_user,$arr)==FALSE)
		{
			if($return)
			{
				return false;
			}
			else
			{
				echo $this->SV->fungsi->warning("Maaf, Anda tidak berhak untuk mengakses halaman ini.");
				die();
			}
		}
		else
		{
		    if($return)
		    {
		        return true;
		    }
		}
	}
	function cek_data($data)
	{
		if($data->num_rows()>0)
		{
			return;
		}else{
			redirect('home','refresh');
		}
	}
}

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Widget_library
{
	function Widget_library()
	{
		$this->CI =& get_instance();
		$this->CI->load->library(array('user_agent'));
		//$this->no_ie();
		$this->CI->auth->checkIP();
	}
	function showAgent()
	{		
		if ($this->CI->agent->is_browser())
		{
			 $agent = $this->CI->agent->browser().' '.$this->CI->agent->version();
		}
		elseif ($this->CI->agent->is_robot())
		{
			 $agent = $this->CI->agent->robot();
		}
		elseif ($this->CI->agent->is_mobile())
		{
			 $agent = $this->CI->agent->mobile();
		}
		else
		{
			 $agent = 'Not Detected';
		}
		$data['agent']= $agent;
		$data['platform']=$this->CI->agent->platform(); // Platform info (Windows, Linux, Mac, etc.) 
		return $data;
	}
	function no_ie()
	{
		$agen = $this->showAgent();
		$browser = $agen['agent'];
		if(stristr($browser,'internet') != FALSE)
		{
			exit('Anda tidak diperbolehkan menggunakan browser Internet Explorer');
		}
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	function lookup($keyword){
		$this->db->distinct("NOMOR_KONTAK");
        $this->db->like('NOMOR_KONTAK',$keyword);
        $query = $this->db->get("kontak_adb");    
        return $query->result();
    }
	}
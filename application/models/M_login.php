<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class M_login extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  
  
  public function ambilPengguna($username, $password, $status, $level)
  {
    $this->db->select('*');
    $this->db->from('ASSET_USER');
    $this->db->where('USERNAME', $username);
    $this->db->where('PASSWORD', $password);
    $this->db->where('STATUS', $status);
    $this->db->where('LEVEL_LOGIN', $level);
          $query = $this->db->get();
    
    return $query->num_rows();

/*
             return $this->db->get()->num_rows();
*/
  }
  
  
  public function dataPengguna($username)
  {
   $this->db->select('USERNAME');
   $this->db->select('NAMA');
   $this->db->select('FOTO');
   $this->db->select('NO_PROP');
   $this->db->select('NO_KAB');
   $this->db->select('LEVEL_LOGIN');
   $this->db->where('USERNAME', $username);
   $query = $this->db->get('ASSET_USER');
   
   return $query->row();
  }
  
}  

?>
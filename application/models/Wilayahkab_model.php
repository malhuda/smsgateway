<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Wilayahkab_model extends CI_Model {
	var $tabel='SETUP_KAB';	
	function __construct(){
        parent::__construct();
    }
	function get($criteria=null,$limit=null,$offset=1){
		 $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('USERNAME');
         $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
		 $data["show"] = 0;
		 $user == $this->m_login->dataPengguna($user);
         $this->db->select('USERNAME');
		 $this->db->select('NAMA');
		 $this->db->select('FOTO');
		 $this->db->select('NO_PROP');
		 $this->db->select('NO_KAB');
		 $this->db->where('USERNAME', $user);
		 $query = $this->db->get('ASSET_USER');
   	 	 foreach($query->result()as $pengguna){
         $pengguna->NO_PROP;
         $pengguna->NO_KAB; }
		 $this->db->select("*")->from("ASSET_USER")->join('SETUP_PROP', 'ASSET_USER.NO_PROP = SETUP_PROP.NO_PROP','left')->join('SETUP_KAB', 'ASSET_USER.NO_PROP=SETUP_KAB.NO_PROP AND ASSET_USER.NO_KAB = SETUP_KAB.NO_KAB','left')->where("ASSET_USER.NO_PROP",$pengguna->NO_PROP)->where("ASSET_USER.NO_KAB",$pengguna->NO_KAB);
		 $this->db->order_by($this->tabel.".NO_KAB");
		return $this->db->get_where("",$criteria,$limit,$offset)->result_array();
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Propinsi_model_session extends CI_Model {
	var $tabel='ASSET_USER';	
	function __construct(){
        // Call the Model constructor
        parent::__construct();
		//$this->CI=& get_instance();
    }
	
	function get_session($criteria=null,$limit=null,$offset=1){
		 $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('USERNAME');
         $NO_PROP = $this->session->userdata('NO_PROP');
         $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
		 $data["show"] = 0;
		 $user == $this->m_login->dataPengguna($user,$NO_PROP,$NO_KAB);
         $this->db->select('USERNAME');
		 $this->db->select('NAMA');
		 $this->db->select('FOTO');
		 $this->db->select('NO_PROP');
		 $this->db->select('NO_KAB');
		 $this->db->where('NO_PROP', $NO_PROP);
		 $this->db->where('USERNAME', $user);
		 $query = $this->db->get('ASSET_USER');
   		 foreach($query->result()as $pengguna){
        $pengguna->NO_PROP; 
     	 }

		 $this->db->select("*")->from("ASSET_USER")->join('SETUP_PROP', 'ASSET_USER.NO_PROP = SETUP_PROP.NO_PROP','left')->where("ASSET_USER.NO_PROP",$pengguna->NO_PROP);
		 
		 $this->db->order_by($this->tabel.".NO_PROP");
		return $this->db->get_where($this->tabel,$criteria,$limit,$offset)->result_array();
	}
	function get_in($criteria=null,$in,$limit=null,$offset=1){
		foreach($in as $kolom=>$isi){
			$this->db->where_in($kolom, $isi);
		}
		$this->db->order_by($this->tabel.".NO_PROP");
		return $this->db->get_where($this->tabel,$criteria,$limit,$offset)->result_array();
	}	
	function getDetail($criteria){
		return $this->db->get_where($this->tabel,$criteria)->row();
	}
	function getList($criteria){
		$this->db->order_by('NO_PROP');
		if(count($criteria) == 0){
			return $this->db->get_where($this->tabel)->result_array();
		}
		return $this->db->get_where($this->tabel,$criteria)->result_array();
	}
	
	function getKorwil(){
		$this->db->select('X_DUPLICATE_RESULTS_R_OUT');
		$this->db->distinct();
		$this->db->order_by('X_DUPLICATE_RESULTS_R_OUT');
		return $this->db->get($this->tabel)->result_array();
	}
	
	function count_result($criteria){
		$this->db->where($criteria);
		return $this->db->count_all_results($this->tabel);
	}
	
	function insert($data){		
		$this->db->insert($this->tabel,$data);
		return $this->db->affected_rows();
	}
	
	function delete($criteria){
		$data=$this->get($criteria);
		$hasil=0;
		if(count($data)>0){					
			$this->CI->load->model('Kabupaten_model');
			for($i=0;$i<count($data);$i++){
				$hasil+=$this->CI->Kabupaten_model->delete(array($this->CI->Kabupaten_model->tabel.'.NO_PROP'=>$data[$i]['NO_PROP']));
			}
		}	
		$this->db->delete($this->tabel,$criteria);
		$hasil+=$this->db->affected_rows();
		return $hasil;
	}
	
	function update($data,$criteria){
		$this->db->update($this->tabel,$data,$criteria);
		return $this->db->affected_rows();
	}
}
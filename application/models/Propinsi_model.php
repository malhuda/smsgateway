<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Propinsi_model extends CI_Model {
	var $tabel='SETUP_PROP';	
	function __construct(){
        // Call the Model constructor
        parent::__construct();
		//$this->CI=& get_instance();
    }
	function get($criteria=null,$limit=null,$offset=1){
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
		$this->db->select('SETUP_PROP');
		$this->db->distinct();
		$this->db->order_by('SETUP_PROP');
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
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kabupaten_model extends CI_Model {
	var $tabel='SETUP_KAB';
	function __construct(){
        // Call the Model constructor
        parent::__construct();		
    }
	function get($criteria,$limit=null,$offset=null){		
		$this->db->select($this->tabel.".*,SETUP_PROP.NAMA_PROP",false);
		$this->db->join('SETUP_PROP',$this->tabel.".NO_PROP=SETUP_PROP.NO_PROP");
		$this->db->order_by($this->tabel.'.NO_KAB','ASC');
		return $this->db->get_where($this->tabel,$criteria,$limit,$offset)->result_array();
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
			$this->CI->load->model('Kecamatan_model');
			for($i=0;$i<count($data);$i++){
				$hasil+=$this->CI->Kecamatan_model->delete(array($this->CI->Kecamatan_model->tabel.'.NO_KAB'=>$data[$i]['NO_KAB']));
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
	function getList($criteria){
		$this->db->order_by('NO_PROP,NO_KAB');
		if(count($criteria) == 0){
			return $this->db->get_where($this->tabel)->result_array();
		}
		return $this->db->get_where($this->tabel,$criteria)->result_array();
	}
	function getDetail($criteria){
		return $this->db->get_where($this->tabel,$criteria)->row();
	}
	function sum($table,$sum,$criteria){
		$this->db->select_sum($sum);
		return $this->db->get_where($table,$criteria)->row();
	}
	function sumDetail($table,$sum,$criteria){
		foreach($sum as $SUM) {
			$this->db->select_sum($SUM);
		}
		return $this->db->get_where($table,$criteria)->row();
	}
}
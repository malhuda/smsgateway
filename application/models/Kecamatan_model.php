<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kecamatan_model extends CI_Model {
	var $tabel='SETUP_KEC';
	function __construct(){
        // Call the Model constructor
        parent::__construct();		
    }
	function get($criteria,$limit=null,$offset=1){
		$this->db->select($this->tabel.".*,SETUP_PROP.NAMA_PROP,SETUP_KAB.NAMA_KAB",false);
		$this->db->join('SETUP_PROP',$this->tabel.".NO_PROP=SETUP_PROP.NO_PROP");
		$this->db->join('SETUP_KAB',$this->tabel.".NO_PROP=SETUP_KAB.NO_PROP AND ".$this->tabel.".NO_KAB=SETUP_KAB.NO_KAB");
		$this->db->order_by($this->tabel.'.NO_KEC','ASC');
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
			$this->CI->load->model('Kelurahan_model');
			for($i=0;$i<count($data);$i++){
				$hasil+=$this->CI->Kelurahan_model->delete(array($this->CI->Kelurahan_model->tabel.'.NO_KEC'=>$data[$i]['NO_KEC']));
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
		$this->db->order_by('NO_PROP,NO_KAB,NO_KEC');
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
	function get_sum($select,$sum,$criteria=null){
		$this->db->select($select);
		foreach($sum as $kolom){
			$this->db->select_sum($kolom);
		}
		$this->db->group_by(explode(',',$select));
		return $this->db->get_where($this->tabel,$criteria)->result_array();
	}
}
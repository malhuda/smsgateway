<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Kontak_adb_model extends CI_Model {
		var $table = 'kontak_adb';
  public function get_param($ID)
    {
        $this->db->from("kontak_adb");
        $this->db->where('ID',$ID);
        $query = $this->db->get();

        return $query->row();
    }public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
function list_table($total,$segment){
		$this->db->order_by("UPDATED",'desc');
		return $query = $this->db->get('kontak_adb',$total,$segment)->result_array();
	}

 function search_kontak_list($WILAYAH,$total,$segment)    {
 	$this->db->where("WILAYAH",$WILAYAH);
        return $query = $this->db->get('kontak_adb',$total,$segment)->result_array();
    }
	function count_table(){
		return $this->db->get('kontak_adb')->num_rows();
	}

}
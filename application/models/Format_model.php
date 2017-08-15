<?php
		class Format_model extends CI_Model{
		function show_format_id($id){
		$this->db->select('*');
		$this->db->from('tbl_autoreply');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
function list_table($total,$segment){
		return $query = $this->db->get('tbl_autoreply',$total,$segment)->result_array();
	}function show_format(){
$query = $this->db->get('tbl_autoreply');
$query_result = $query->result();
return $query_result;
}
 function show_id_format($data){
$this->db->select('*');
$this->db->from('tbl_autoreply');
$this->db->where('id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
	function count_table(){
		return $this->db->get('tbl_autoreply')->num_rows();
	}

}
<?php
class Update_model extends CI_Model{
// Function To Fetch All Students Record
function show_user(){
$query = $this->db->get('ASSET_USER');
$query_result = $query->result();
return $query_result;
}
// Function To Fetch Selected Student Record
function show_user_username($data){
$this->db->select('*');
$this->db->from('ASSET_USER');
$this->db->where('ID', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
// Update Query For Selected Student
function update_user_username($USERNAME,$data){
$this->db->where('USERNAME', $USERNAME);
$this->db->update('ASSET_USER', $data);
}
function list_table($total,$segment){
                    $this->db->order_by("ID",'asc');
		return $query = $this->db->get('ASSET_USER',$total,$segment)->result_array();
	}
 
	function count_table(){
		return $this->db->get('ASSET_USER')->num_rows();
	}

}
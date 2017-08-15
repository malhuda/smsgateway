<?php
		class Group_model extends CI_Model{
		function show_grup_id($id_grup){
		$this->db->select('*');
		$this->db->from('grup_kontak');
		$this->db->where('id_grup', $id_grup);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}

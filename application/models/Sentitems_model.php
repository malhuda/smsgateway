<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Sentitems_model extends CI_Model {
  public function get_param($ID)
    {
        $this->db->from("sentitems");
        $this->db->where('ID',$ID);
        $query = $this->db->get();
        return $query->row();
    }
function list_table($total,$segment){
                $this->db->where("DestinationNumber!=858")->order_by("SendingDateTime",'desc');
		return $query = $this->db->get('sentitems',$total,$segment)->result_array();
	}
 
	function count_table(){
		return $this->db->get('sentitems')->num_rows();
	}

}
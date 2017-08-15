<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Inbox_model extends CI_Model {
  public function get_param($ID)
    {
        $this->db->from("inbox");
        $this->db->where('ID',$ID);
        $query = $this->db->get();
        return $query->row();
    }function list_table($total,$segment){
                    
                    /*$this->db->select("inbox.ID,inbox.ReceivingDateTime,inbox.UpdatedInDB,inbox.Coding,inbox.UDH,inbox.Class,inbox.SenderNumber,inbox.TextDecoded,inbox.Processed,kontak_adb.KODE,kontak_adb.WILAYAH,kontak_adb.NAMA_ADB,kontak_adb.NOMOR_KONTAK,kontak_adb.EMAIL");
                    $this->db->from("inbox");
                    $this->db->join("kontak_adb","inbox.SenderNumber=kontak_adb.NOMOR_KONTAK");
                    $this->db->order_by("UpdatedInDB",'desc');*/
                    $this->db->where("SenderNumber!='Telkomsel'")->where("SenderNumber!='OPTIN TSEL'")->where("SenderNumber!=858")->where("SenderNumber!=88331")->where("SenderNumber!=88330")->order_by("UpdatedInDB",'desc');
		return $query = $this->db->get("inbox",$total,$segment)->result_array();
	}
 
	function count_table(){
       $this->db->where("SenderNumber!='Telkomsel'")->where("SenderNumber!='OPTIN TSEL'")->where("SenderNumber!=88331")->where("SenderNumber!=88330")->order_by("UpdatedInDB",'desc');
		return $this->db->get('inbox')->num_rows();
	}

}



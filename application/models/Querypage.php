<?php
class Querypage extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    function insert_adb($dataarray)
    {
        for($i=1;$i<count($dataarray);$i++){
             $data = array(
                'WILAYAH'=>$dataarray[$i]['WILAYAH'],
                'NAMA_ADB'=>$dataarray[$i]['NAMA_ADB'],
                'NOMOR_KONTAK'=>$dataarray[$i]['NOMOR_KONTAK'],
                'EMAIL'=>$dataarray[$i]['EMAIL'],
                'PASSWORD_DKB_GANDA_ANOMALI'=>$dataarray[$i]['PASSWORD_DKB_GANDA_ANOMALI'],
                'PASSWORD_DEM'=>$dataarray[$i]['PASSWORD_DEM'],
                'PASSWORD_DUPLICATE_RECORD'=>$dataarray[$i]['PASSWORD_DUPLICATE_RECORD'],
                'PASSWORD_WKTP_NON_REKAM'=>$dataarray[$i]['PASSWORD_WKTP_NON_REKAM'],
                'PASSWORD_CAPIL'=>$dataarray[$i]['PASSWORD_CAPIL'],
                'PASSWORD_EKTP_MISSING'=>$dataarray[$i]['PASSWORD_EKTP_MISSING'],
                'KODE'=>$dataarray[$i]['KODE'],
                'PASSWORD_EKTP_CETAK'=>$dataarray[$i]['PASSWORD_EKTP_CETAK']
            );
            $this->db->insert('kontak_adb', $data);
        }
 }
 function search_adb($dataarray){
        for($i=1;$i<count($dataarray);$i++){
            $search = array(
                'KODE'=>$dataarray[$i]['KODE']
            );
 }
  $data = array();
  $this->db->where($search);
  $this->db->limit(1);
  $Q = $this->db->get('kontak_adb');
  if($Q->num_rows() > 0){
  $data = $Q->row_array();
  }
  $Q->free_result();
  return $data;
 }
}
  /*function update_chapter($dataarray)
      {
        for($i=1;$i<count($dataarray);$i++){
            $data = array(
                'KODE'=>$dataarray[$i]['KODE'],
                'NAMA_KABUPATEN'=>$dataarray[$i]['NAMA_KABUPATEN'],
                'NAMA_ADB'=>$dataarray[$i]['NAMA_ADB'],
                'NOMOR_KONTAK'=>$dataarray[$i]['NOMOR_KONTAK'],
                'EMAIL'=>$dataarray[$i]['EMAIL'],
                'PASSWORD_DKB_GANDA_ANOMALI'=>$dataarray[$i]['PASSWORD_DKB_GANDA_ANOMALI'],
                'PASSWORD_DEM'=>$dataarray[$i]['PASSWORD_DEM'],
                'PASSWORD_DUPLICATE_RECORD'=>$dataarray[$i]['PASSWORD_DUPLICATE_RECORD'],
                'PASSWORD_WKTP_NON_REKAM'=>$dataarray[$i]['PASSWORD_WKTP_NON_REKAM'],
                'PASSWORD_CAPIL'=>$dataarray[$i]['PASSWORD_CAPIL'],
                'PASSWORD_EKTP_MISSING'=>$dataarray[$i]['PASSWORD_EKTP_MISSING'],
                'PASSWORD_EKTP_CETAK'=>$dataarray[$i]['PASSWORD_EKTP_CETAK'],
                'OPERATOR'=>$dataarray[$i]['OPERATOR']
            );
            $param = array(
               'KODE'=>$dataarray[$i]['KODE']
            );
            $this->db->where($param);
           return $this->db->update('kontak_adb',$data);   
        }
 }
  function search_chapter($dataarray){
        for($i=1;$i<count($dataarray);$i++){
            $search = array(
                'KODE'=>$dataarray[$i]['KODE']
            );
 }
  $data = array();
  $this->db->where($search);
  $this->db->limit(1);
  $Q = $this->db->get('kontak_adb');
  if($Q->num_rows() > 0){
  $data = $Q->row_array();
  }
  $Q->free_result();
  return $data;
 }*/
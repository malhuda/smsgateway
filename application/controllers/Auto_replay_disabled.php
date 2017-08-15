<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
*  @author/Developer : Andre Marbun S.Kom
*  @project    : APLIKASI SMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL
*  @Copyright    : TIM PDAK DITJEN DUKCAPIL KEMENDAGRI
*/
class Auto_replay_disabled extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); // Date in the past
        header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); // always modified
        header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
        header("Cache-Control: post-check=0, pre-check=0", FALSE);
        header("Pragma: no-cache");
        $this->load->helper('text');
        $this->load->model(array('m_login'));   
        $this->load->library('pagination'); 
        $this->load->library(array('form_validation','upload'));
        $this->load->library('widget_wilayah');
        $this->load->database() ;
        $this->load->helper('csv_helper');
        $this->load->library(array('Excel_generator','upload'));
        $this->load->library('encrypt');
        $this->load->helper('addon');
        $this->load->library('widget_wilayah');
        $this->load->database() ;
        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->database();
       }
 public function index()
    {
         
             $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
             $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
             $data['inbox'] = $this->gammu->inbox()->result_array();
             $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
             $data['title'] = 'AUTO REPLAY RUNNING';
    $this->load->view('auto_replay', $data);
    }  
    public function proses_auto_replay(){
             
       $query = $this->db->query("select kontak_adb.NOMOR_KONTAK,
        kontak_adb.WILAYAH,
        kontak_adb.NAMA_ADB,
        kontak_adb.PASSWORD_DKB_GANDA_ANOMALI,
        kontak_adb.PASSWORD_DEM,
        kontak_adb.PASSWORD_DUPLICATE_RECORD,
        kontak_adb.PASSWORD_WKTP_NON_REKAM,
        kontak_adb.PASSWORD_CAPIL,
        kontak_adb.PASSWORD_EKTP_MISSING,
        kontak_adb.PASSWORD_EKTP_CETAK,
        inbox.ID,
        inbox.UpdatedInDb,
        inbox.TextDecoded,
        inbox.Processed,
        inbox.SenderNumber
        from kontak_adb left join inbox on kontak_adb.NOMOR_KONTAK=inbox.SenderNumber where inbox.Processed = 'false' and inbox.SenderNumber!=858");
      foreach ($query->result_array() as $data){
      $NOMOR_KONTAK = $data['NOMOR_KONTAK'];
      $WILAYAH = $data['WILAYAH'];
      $NAMA_ADB = $data['NAMA_ADB'];
      $PASSWORD_DKB_GANDA_ANOMALI = $data['PASSWORD_DKB_GANDA_ANOMALI'];
      $PASSWORD_DEM = $data['PASSWORD_DEM'];
      $PASSWORD_DUPLICATE_RECORD = $data['PASSWORD_DUPLICATE_RECORD'];
      $PASSWORD_WKTP_NON_REKAM = $data['PASSWORD_WKTP_NON_REKAM'];
      $PASSWORD_CAPIL = $data['PASSWORD_CAPIL'];
      $PASSWORD_EKTP_MISSING = $data['PASSWORD_EKTP_MISSING'];
      $PASSWORD_EKTP_CETAK = $data['PASSWORD_EKTP_CETAK'];
      $ID = $data['ID'];
      $SenderNumber = $data['SenderNumber'];
      $msg = strtoupper($data['TextDecoded']);
      $pecah = explode(" ", $msg); 
      $Contak_Person = "081295305565";
      $balasan_acc = "P.DkbGndAnm=". $data["PASSWORD_DKB_GANDA_ANOMALI"]."".
           "P.Dem=". $data["PASSWORD_DEM"]."".
           "P.DRcrd=". $data["PASSWORD_DUPLICATE_RECORD"]."".
           "P.WnRkm=". $data["PASSWORD_WKTP_NON_REKAM"]."".
           "P.Cpl=". $data["PASSWORD_CAPIL"]."".
           "P.EMsng=". $data["PASSWORD_EKTP_MISSING"]."".
           "P.ECtk=". $data["PASSWORD_EKTP_CETAK"];
        $balasan_vailed = "KEYWORD SALAH ,SILAHKAN KETIK PASSWORD DKB kirim ke 081210997334. CP :Rey ,081295305565";
        
         if(isset($data["SenderNumber"])==0){
           echo "<script>
             alert('Tidak ada pesan baru,tutup halaman ini ?');
              close();
            </script>";
        }  elseif(isset($data["SenderNumber"])!=0){
          
        $this->db->select('keyword1');
        $this->db->from('tbl_autoreply')->where("keyword1",$pecah[0]);     
        $query1 = $this->db->get("")->result_array();
        foreach($query1 as $key=>$value){
       $data["query1"][$key]["keyword1"] = $value["keyword1"];
        }
             $this->db->select('*');
        $this->db->from('tbl_autoreply')->where("keyword2",$pecah[1]);     
        $query2 = $this->db->get("")->result_array();
        foreach($query2 as $key=>$value){
        $data["query2"][$key]["keyword2"] = $value["keyword2"];
        }
      $this->db->select('*');
        $this->db->from('tbl_autoreply')->where("keyword1",$pecah[0])->where("keyword2",$pecah[1]);     
        $query3 = $this->db->get("")->result_array();
        foreach($query3 as $key=>$value){
     $data["query3"][$key]["keyword1"] = $value["keyword1"];
     $data["query3"][$key]["keyword2"] = $value["keyword2"];
        }
        if(isset($value["keyword1"]) == $pecah[0] && $data["query3"][$key]["keyword2"] == $pecah[1]){
          $insert = array('DestinationNumber'=>$SenderNumber,
       'TextDecoded'=>$balasan_acc);
       $this->db->insert("outbox",$insert);
       $update = array('Processed'=>'true');
       $this->db->where("ID",$ID);
       $this->db->update("inbox",$update);
       $this->db->where("NOMOR_KONTAK",$SenderNumber);
       $this->db->set("COUNTER","COUNTER+1",FALSE);
       $this->db->update("kontak_adb");
       $create = $this->db->trans_complete();

       if($create == TRUE){
          echo "<script>
             alert('Auto replay berhasi dikirim ,tutup halaman ini ?');
              close();
            </script>";
             }
             elseif($create == FALSE)
             {
             echo "<script>
               alert('Auto replay gagal dikirim ,tutup halaman ini ?');
              close();
           </script>";
            }
              }
                else{
              $insert_vailed = array('DestinationNumber'=>$SenderNumber,
        'TextDecoded'=>$balasan_vailed);
        $query_insert_vailed =  $this->db->insert("outbox",$insert_vailed);
        $update_vailed = array('Processed'=>'true');
        $this->db->where("ID",$ID);
        $this->db->update("inbox",$update_vailed);
        $create = $this->db->trans_complete();
       if($create == TRUE){
          echo "<script>
             alert('Auto replay berhasi dikirim ,tutup halaman ini ?');
              close();
            </script>";
             }
             elseif($create == FALSE)
             {
             echo "<script>
               alert('Auto replay gagal dikirim ,tutup halaman ini ?');
              close();
           </script>";
            }
            }
          }
        
          }
        }
      }
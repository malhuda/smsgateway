        
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
*  @author/Developer : Andre Marbun S.Kom
*  @project    : APLIKASI SMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL
*  @Copyright    : TIM PDAK DITJEN DUKCAPIL KEMENDAGRI
*/
class Auto_replay_broadcast extends CI_Controller
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
              if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('Login/login_form');
    }else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('USERNAME');
         $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
         }
             $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
             $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
             $data['inbox'] = $this->gammu->inbox()->result_array();
             $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
             $data['title'] = 'BROADCAST AUTO REPLAY RUNNING';
    $this->load->view('auto_replay_broadcast', $data);
    }  
    public function proses_auto_replay(){
              if($this->session->userdata('isLogin') == FALSE){
      redirect('Login/login_form');
    }
    else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('USERNAME');
         $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
         }
       $query = $this->db->query("select SenderNumber,TextDecoded,ReceivingDateTime,Processed,ID from inbox WHERE NOT EXISTS (select NOMOR_KONTAK from kontak_adb
                WHERE inbox.SenderNumber = kontak_adb.NOMOR_KONTAK)and inbox.Processed='false'");
      foreach ($query->result_array() as $data){
      $ID = $data['ID'];
      $SenderNumber = $data['SenderNumber'];
      $msg = strtoupper($data['TextDecoded']);
      $pecah = explode(" ", $msg);     
      $balasan_registrasi = "MAAF DATA ANDA BELUM TERDAFTAR DI SISTEM KAMI ,SILAHKAN HUBUNGI OPERATOR TIM TEKNIS PDAK UNTUK MENDAFTARKAN DATA ANDA. CP :Rey ,081295305565";
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
       'TextDecoded'=>$balasan_registrasi);
       $this->db->insert("outbox",$insert);
       $update = array('Processed'=>'true');
       $this->db->where("ID",$ID);
       $this->db->update("inbox",$update);
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
        $create =  $this->db->update("inbox",$update_vailed);
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
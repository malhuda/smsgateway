<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
*  @author/Developer : Andre Marbun S.Kom
*  @project    : APLIKASI SMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL
*  @Copyright    : TIM PDAK DITJEN DUKCAPIL KEMENDAGRI
*/
class Auto_replay extends CI_Controller
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
    $data['title'] = 'AUTO REPLAY RUNNING';
    $this->load->view('auto_replay', $data);
    } 
  public function proses_auto_replay()
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
        $query = $this->db->query("SELECT * FROM inbox WHERE Processed = 'false'")->get()->result_array();
        foreach($query as $key=>$value){
        $data["query"][$key]["UpdatedInDB"] = $value["UpdatedInDB"];
        $data["query"][$key]["ReceivingDateTime"] = $value["ReceivingDateTime"];
        $data["query"][$key]["Text"] = $value["Text"];
        $data["query"][$key]["Coding"] = $value["Coding"];
        $data["query"][$key]["UDH"] = $value["UDH"];
        $data["query"][$key]["SMSCNumber"] = $value["SMSCNumber"];
        $data["query"][$key]["SenderNumber"] = $value["SenderNumber"];
        $data["query"][$key]["Class"] = $value["Class"];
        $data["query"][$key]["TextDecoded"] = $value["TextDecoded"];
        $data["query"][$key]["ID"] = $value["ID"];
        $data["query"][$key]["RecipientID"] = $value["RecipientID"];
        $data["query"][$key]["Processed"] = $value["Processed"]; 
        $id = $value['ID'];
        $noPengirim = $value['SenderNumber'];
        $msg = strtoupper($value['TextDecoded']);
        $pecah = explode(" ", $msg);
        $query1 = $this->db->query("SELECT keyword1 FROM tbl_autoreply WHERE keyword1='$pecah[0]'")->get(""); 
        $data1 = $this->db->result_array($query1);
        foreach($data1 as $key=>$value){
        $data["data1"][$key]["keyword1"] = $value["keyword1"];
      if ($pecah[0]== $data1[0])
      { 
       $keyword2 = $pecah[1];
       $query2 =  $this->db->query("SELECT * FROM tbl_autoreply WHERE keyword2='$keyword2'")->get("");
       $hasil2 = $this->db->result_array($query2);
          if (count($hasil2) == 0)
         $reply = "Keyword tidak ditemukan";
         else
         {  
            $data2 = $hasil2;
            $pesan = $data2[3];
            $reply = $pesan;
          }
      }
    else $reply = "Maaf perintah salah"; 
  $query_multiple = "INSERT INTO outbox(DestinationNumber, TextDecoded) VALUES ('$noPengirim', '$reply')";
  $query_multiple = "UPDATE inbox SET Processed = 'true' WHERE ID = '$ID'";
      if($query_multiple){
          echo "<script>
             alert('Auto replay berhasi dikirim ,tutup halaman ini ?');
              close();
            </script>";
             }
             else
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
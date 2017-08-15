<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
*  @author/Developer : Andre Marbun S.Kom
*  @project    : APLIKASI SMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL
*  @Copyright    : TIM PDAK DITJEN DUKCAPIL KEMENDAGRI
*/
class program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();    
        header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); 
        header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); 
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", FALSE);
        header("Pragma: no-cache");
        $this->load->helper('text');
        $this->load->database();
        $this->load->helper(array('url','html','form'));
        $this->load->library('pagination'); 
        $this->load->library(array('form_validation','upload'));
        $this->load->library('encrypt');
        $this->load->helper('addon');
        $this->load->library('widget_wilayah');
        $this->load->library(array('session'));
        $this->load->model(array('m_login','update_model','gammu')); 
                $this->load->library('user_agent');
  
        $this->load->database();     
          } 
          public function load()
          {
               if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('login/login_form');
    }
    else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('USERNAME');
         $level = $this->session->userdata('LEVEL_LOGIN');
         $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
         $data['pengguna'] = $this->m_login->dataPengguna($user,$level);
                  }         
                   if ($this->agent->is_browser())
          {
              $data["agent"] = $this->agent->browser().' '.$this->agent->version();
          }
          elseif ($this->agent->is_robot())
          {
              $data["agent"] = $this->agent->robot();
          }
          elseif ($this->agent->is_mobile())
          {
              $data["agent"] = $this->agent->mobile();
          }
          else
          {
              $data["agent"] = 'Unidentified User Agent';
          }
          
             $data['browser_server'] = $_SERVER['HTTP_USER_AGENT'];
             $data['status_koneksi_gammunya'] = $this->gammu->status_koneksi_gammunya()->result_array();
             $query =$this->db->query("select * from phones;");
             $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
             $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
             $data['inbox'] = $this->gammu->inbox()->result_array();
             $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
             $data['title'] = 'APLIKASI SMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL';   
             $data['main'] = 'load_page';
             $this->load->view('main_v', $data);
    }
   public function index()
          {
               if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('login/login_form');
    }else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('USERNAME');
         $level = $this->session->userdata('LEVEL_LOGIN');
         $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
         $data['pengguna'] = $this->m_login->dataPengguna($user,$level);
                  }         
                   if ($this->agent->is_browser())
          {
              $data["agent"] = $this->agent->browser().' '.$this->agent->version();
          }
          elseif ($this->agent->is_robot())
          {
              $data["agent"] = $this->agent->robot();
          }
          elseif ($this->agent->is_mobile())
          {
              $data["agent"] = $this->agent->mobile();
          }
          else
          {
              $data["agent"] = 'Unidentified User Agent';
          }
          
             $data['browser_server'] = $_SERVER['HTTP_USER_AGENT'];
             $data['status_koneksi_gammunya'] = $this->gammu->status_koneksi_gammunya()->result_array();
             $query =$this->db->query("select * from phones;");
             $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
             $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
             $data['inbox'] = $this->gammu->inbox()->result_array();
             $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
             $data['title'] = 'APLIKASI SMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL';   
             $data['main'] = 'main_page';
             $this->load->view('main_v', $data);
    }public function load_page()
          {
               if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('login/login_form');
    }else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('USERNAME');
         $level = $this->session->userdata('LEVEL_LOGIN');
         $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
         $data['pengguna'] = $this->m_login->dataPengguna($user,$level);
                  }         
                   if ($this->agent->is_browser())
          {
              $data["agent"] = $this->agent->browser().' '.$this->agent->version();
          }
          elseif ($this->agent->is_robot())
          {
              $data["agent"] = $this->agent->robot();
          }
          elseif ($this->agent->is_mobile())
          {
              $data["agent"] = $this->agent->mobile();
          }
          else
          {
              $data["agent"] = 'Unidentified User Agent';
          }
          
             $data['browser_server'] = $_SERVER['HTTP_USER_AGENT'];
             $data['status_koneksi_gammunya'] = $this->gammu->status_koneksi_gammunya()->result_array();
             $query =$this->db->query("select * from phones;");
             $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
             $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
             $data['inbox'] = $this->gammu->inbox()->result_array();
             $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
             $data['title'] = 'APLIKASI SMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL';   
             $this->load->view('main_page', $data);
      }
     function cek_pulsa_modemnya(){
      $pulsa = $this->input->post("pulsa");
      if($pulsa){
       $get_cek_pulsa_service = array(); 
       $file = "C:/xampp/htdocs/smsgateway/media/get_cek_pulsa_service.cmd"; 
       exec( $file, $get_cek_pulsa_service ); 
       implode($get_cek_pulsa_service);
       redirect('program ','refresh'); 
      }
       else
      {
        }
     }
    function aktifkan_gammu(){
      $aktifkan = $this->input->post("aktifkan");
      if($aktifkan){
       $get_start_service = array();
        $file = "C:/xampp/htdocs/smsgateway/media/start.cmd"; 
       exec( $file, $get_start_service ); 
       implode($get_start_service);
       redirect('program ','refresh'); 
    }
      else
    {
      }
    }
    function stop_gammu(){
      $hentikan = $this->input->post("hentikan");
      if($hentikan){
       $get_stop_service = array(); 
       $file = "C:/xampp/htdocs/smsgateway/media/stop.cmd"; 
       exec( $file, $get_stop_service ); 
       implode($get_stop_service);
       redirect('program ','refresh'); 
       }
       else
      {
    }
  }
}
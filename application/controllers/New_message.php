<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
*  @author/Developer : Andre Marbun S.Kom
*  @project    : APLIKASI SMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL
*  @Copyright    : TIM PDAK DITJEN DUKCAPIL KEMENDAGRI
*/
class New_message extends CI_Controller
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
        $this->load->model(array('m_login','Autocomplete_model'));   
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
       function cari_nomor_kontak(){
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; 
        $query = $this->Autocomplete_model->lookup($keyword); 
        if( ! empty($query) )
        {
            $data['response'] = 'true'; 
            $data['message'] = array();
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->NOMOR_KONTAK,
                                        'value' => $row->NOMOR_KONTAK,
                                        ''
                                     ); 
           }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); 
        }
        else
        {
            $this->load->view('new_message/index',$data); 
        }
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
        $data['title'] = 'NEW MESSAGE';
        $data["main"] = "new_message";
        $this->load->view('main_v', $data);
    }   
    function sent_message()
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
        $this->form_validation->set_error_delimiters("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                                        x
                                                   </button>", "</button></div>");
        $this->form_validation->set_rules('DestinationNumber', 'HO.HP', 'required|min_length[11]|max_length[14]');
        $this->form_validation->set_rules('TextDecoded', 'PESAN', 'required|min_length[3]|max_length[160]');
        if ($this->form_validation->run() == FALSE)
    {
   $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
             $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
             $data['inbox'] = $this->gammu->inbox()->result_array();
             $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
    $data['title'] = ' NEW MESSAGE';   
        $data['main'] = 'new_message';
        $this->load->view('main_v', $data);
    }
    else
    {
    
   $data = array(
        'DestinationNumber' => $this->input->post('DestinationNumber'),
        'TextDecoded' => $this->input->post('TextDecoded')
      );
    $create  = $this->db->insert('outbox',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Message Sent Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong! Message Vailed.</button></p></strong></div>");
                redirect('sent');   
            }
        }
      }

    
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
*  @author/Developer : Andre Marbun S.Kom
*  @project    : APLIKASI DESK PEMANTAUAN PILKADA SE INDONESIA
*  @Copyright    : TIM PDAK DITJEN DUKCAPIL KEMENDAGRI
*/
class Res extends CI_Controller
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
        $this->load->model(array('m_login','Pilkada_model'));   
        $autoload['helper'] = array('form');
        $this->load->library('pagination'); 
        $this->load->library(array('form_validation','upload'));
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
        
         $data["show"] = 0;
        $data["NO_PROP"] = $data["NO_KAB"] = 0;
        $data["biodata"] = null;
        $data['biodata'] = $this->Pilkada_model->generate();
        $data['checkbox'] = $this->Pilkada_model->checkbox();         
        $data["show"] = 1;
        $data['title'] = 'PENYUSUNAN TPS BERDASARKAN DATA PEMILIH BERDASARKAN HASIL SINGKRONISASI';
  
         $this->load->view('Home_v', $data);
    }

    function save()
    {
       if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('Login/login_form');
    }else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('USERNAME');
         $level = $this->session->userdata('LEVEL_LOGIN');
         $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
         $data['pengguna'] = $this->m_login->dataPengguna($user,$level);
        }
            $this->form_validation->set_rules('TANGGAL', 'Tanggal', 'trim|required');
            $this->form_validation->set_rules('SOLUSI', 'Solusi', 'trim|required|min_length[10]|max_length[1000]|xss_clean');
            $this->form_validation->set_rules('PERMASALAHAN', 'Permasalahan', 'trim|required|min_length[10]|max_length[1000]|xss_clean');
            $this->form_validation->set_rules('KETERANGAN', 'Keterangan', 'trim|required|min_length[10]|max_length[1000]|xss_clean');
            $this->form_validation->set_error_delimiters("<div class='span4 alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='left'>","</button></p></strong></div>");
        if ($this->form_validation->run() == FALSE){
           $data["show"] = 0;
        $data["NO_PROP"] = $data["NO_KAB"] = 0;
        $data["biodata"] = null;

        $data['biodata'] = $this->Pilkada_model->generate();
        $data['checkbox'] = $this->Pilkada_model->checkbox();         
       $data["show"] = 1;
        $data['title'] = ' FORM PENYUSUNAN TPS BERDASARKAN DATA PEMILIH BERDASARKAN HASIL SINGKRONISASI';   
        $this->load->view('home_v', $data);
               
            }
            else{

                $this->Penyusunan_data_model->create();
            }
        } 
 function multiple()
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
            $this->form_validation->set_rules('TANGGAL', 'Tanggal', 'trim|required');
            $this->form_validation->set_rules('SOLUSI', 'Solusi', 'trim|required|min_length[10]|max_length[1000]|xss_clean');
            $this->form_validation->set_rules('PERMASALAHAN', 'Permasalahan', 'trim|required|min_length[10]|max_length[1000]|xss_clean');
            $this->form_validation->set_rules('KETERANGAN', 'Keterangan', 'trim|required|min_length[10]|max_length[1000]|xss_clean');
            $this->form_validation->set_error_delimiters("<div class='span4 alert alert-dark alert-dismissable source'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='white'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='left'>","</button></p></strong></div>");
        if ($this->form_validation->run() == FALSE){
              
      redirect('res');
            
            }
            else{

             $this->Pilkada_model->sources();
            $create = $this->db->trans_complete();
             echo "<script type='text/javascript' src='http://code.jquery.com/jquery-latest.js'></script>
    <script type='text/javascript'> 
      $('div').ready( function() {
        $('#hidden').delay(2000).fadeOut();
      });
    </script>";
       if ($create) $this->session->set_flashdata('message', "<div class='span4 alert alert-dark alert-dismissable source' id='hidden'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'><strong>x</strong>
                                            </font></button><strong><p align='center'>Data Berhasil Disimpan.<img src=".base_url('assets/opensource/source/loading.gif')."></button></p></strong></div>");
        else $this->session->set_flashdata('message', "<div class='span4 alert alert-dark alert-dismissable source' id='hidden'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'><strong>x</strong>
                                            </font></button><strong><p align='center'>Maaf Terjadi Kesalahan ,Data Gagal Disimpan .');</p></strong></button></div>");
    $data["show"] = 0;
        $data["NO_PROP"] = $data["NO_KAB"] = 0;
        $data["biodata"] = null;

        $data['biodata'] = $this->Pilkada_model->generate();
        $data['checkbox'] = $this->Pilkada_model->checkbox();         
       $data["show"] = 1;
        $data['title'] = ' FORM PENYUSUNAN TPS BERDASARKAN DATA PEMILIH BERDASARKAN HASIL SINGKRONISASI';   
        $this->load->view('home_v', $data);            } }
         
    }
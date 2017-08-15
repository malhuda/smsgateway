<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
*  @author/Developer : Andre Marbun S.Kom
*  @project    : APLIKASI SMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL
*  @Copyright    : TIM PDAK DITJEN DUKCAPIL KEMENDAGRI
*/
class Format_broadcast extends CI_Controller
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
        $this->load->model(array('m_login','format_model'));   
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
       } public function hapus_semua()
     {
   $hapus = $this->db->query("delete from tbl_autoreply");
   if($hapus){
    echo "<script>
        alert('Semua Data Berhasil Dihapus')
        </script>";
        redirect("format_broadcast/cek");
   }else{
    echo "<script>
        alert('Data Gagal Dihapus')
        </script>";
           redirect("format_broadcast/cek");
        } 
      }function edit()
  {
          if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('login/login_form');
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
         $id = $this->uri->segment(3);
    $data['broadcast'] = $this->format_model->show_format();
    $data['single_format'] = $this->format_model->show_id_format($id);
    $data['title'] = ' EDIT FORMAT';   
        $data['main'] = 'edit_format';
        $this->load->view('main_v', $data);

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
            $data['title'] = 'FORMAT SMS';
        $data["main"] = "format_broadcast";
        $this->load->view('main_v', $data);
    }   
    function save_format()
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
        $this->form_validation->set_rules('keyword1', 'Format Pertama', 'required|min_length[3]|max_length[160]');
        $this->form_validation->set_rules('keyword2', 'Format Kedua', 'required|min_length[3]|max_length[160]');
        $this->form_validation->set_rules('result', 'Format Tampilan', 'required|min_length[5]|max_length[160]');
        if ($this->form_validation->run() == FALSE)
    {
           $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
             $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
             $data['inbox'] = $this->gammu->inbox()->result_array();
             $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
    $data['title'] = ' NEW FORMAT BROADCAST';   
        $data['main'] = 'format_broadcast';
        $this->load->view('main_v', $data);
    }
    else
    {
    
   $data = array(
        'keyword1' => $this->input->post('keyword1'),
        'keyword2' => $this->input->post('keyword2'),
        'result' => $this->input->post('result')
      );
    $create  = $this->db->insert('tbl_autoreply',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Format Broadcast Success Saving.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong! Process Vailed.</button></p></strong></div>");
                redirect('format_broadcast/cek');   
            }
        }public function cek()
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
              $data["count_table"]= $this->format_model->count_table();
              $config['base_url'] = base_url().'format_broadcast/cek/';
              $config['total_rows'] = $data["count_table"];
              $config['per_page'] = 10;     
              $config['full_tag_open'] = '<ul class="pagination">';
              $config['full_tag_close'] = '</ul>';
              $config['first_link'] = false;
              $config['last_link'] = false;
              $config['first_tag_open'] = '<li>';
              $config['first_tag_close'] = '</li>';
              $config['prev_link'] = '&laquo';
              $config['prev_tag_open'] = '<li class="prev">';
              $config['prev_tag_close'] = '</li>';
              $config['next_link'] = '&raquo';
              $config['next_tag_open'] = '<li>';
              $config['next_tag_close'] = '</li>';
              $config['last_tag_open'] = '<li>';
              $config['last_tag_close'] = '</li>';
              $config['cur_tag_open'] = '<li class="active"><a href="#">';
              $config['cur_tag_close'] = '</a></li>';
              $config['num_tag_open'] = '<li>';
              $config['num_tag_close'] = '</li>';
              $segment = $this->uri->segment('3');
              $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
              $data['biodata'] = $this->format_model->list_table($config['per_page'],$segment);
              $this->pagination->initialize($config); 
        
        
        $data['title'] = 'LIST FORMAT BROADCAST';
        $data["main"] = "list_format_broadcast";
        $this->load->view('main_v', $data);
    }  
    public function ajax_delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('tbl_autoreply');
    echo json_encode(array("status" => TRUE));
  }function multiple_proses()
          {
          $id = $this->input->post('id');
           $id = implode(',',$id); 
          $query = $this->db->query("delete FROM tbl_autoreply WHERE id IN ($id)");
    if ($query) $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process is successful, data successfully deleted.</button></p></strong></div>");
        else $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Oh snap ! Something wrong ,Please check before using any database !</button></p></strong></div>");
            redirect('format_broadcast/cek');
        }
     
    function update_format($id)  {
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
          $id = $this->uri->segment(3);
          $data = array(
            'keyword1' => $this->input->post('keyword1'),
            'keyword2' => $this->input->post('keyword2'),
            'result' => $this->input->post('result'),
            );
         
      $this->db->where('id', $id);
    $update = $this->db->update('tbl_autoreply',$data);
        if ($update)$this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                 redirect('format_broadcast/cek');  
                }
        }
       
  
  
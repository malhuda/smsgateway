<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
*  @author/Developer : Andre Marbun S.Kom
*  @project    : APLIKASI STATUS PEREKAMAN KTP ELEKTRONIK
*  @Copyright    : TIM PDAK DITJEN DUKCAPIL KEMENDAGRI
*/
class Load_ajax extends CI_Controller
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
        $this->load->model(array('m_login','Periode_model'));   
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
  public function ajax_edit($NIK)
  {
    $data = $this->Periode_model->get_by_id($NIK);
    $data->TGL_LHR = ($data->TGL_LHR == '0000-00-00') ? '' : $data->TGL_LHR; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }public function ajax_update()
  {
    $this->_validate();
    $data = array(
        'NIK' => $this->input->post('NIK'),
        'NAMA_LGKP' => $this->input->post('NAMA_LGKP'),
        'TMPT_LHR' => $this->input->post('TMPT_LHR'),
      );
    $query = $this->Periode_model->update(array('NIK' => $this->input->post('NIK')), $data);
    echo json_encode(array("status" => TRUE));
  }private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('NIK') == '')
    {
      $data['inputerror'][] = 'NIK';
      $data['error_string'][] = 'NIK HARUS DIISI';
      $data['status'] = FALSE;
    }

    if($this->input->post('NAMA_LGKP') == '')
    {
      $data['inputerror'][] = 'NAMA_LGKP';
      $data['error_string'][] = 'NAMA LENGKAP HARUS DIISI';
      $data['status'] = FALSE;
    }

    if($this->input->post('TGL_LHR') == '')
    {
      $data['inputerror'][] = 'TGL_LHR';
      $data['error_string'][] = 'TANGGAL LAHIR HARUS DIISI';
      $data['status'] = FALSE;
    }

    if($this->input->post('TMPT_LHR') == '')
    {
      $data['inputerror'][] = 'TMPT_LHR';
      $data['error_string'][] = 'TEMPAT LAHIR HARUS DIISI';
      $data['status'] = FALSE;
    }


    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }
public function ajax_edit_201501($NIK)
  {
    $data = $this->Periode_model->get_by_id_201501($NIK);
    $data->TGL_LHR = ($data->TGL_LHR == '00/00/0000') ? '' : $data->TGL_LHR; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }public function ajax_update_201501()
  {
    $this->_validate201501();
        $NIK = $this->input->post("NIK");
            $NAMA_LGKP = $this->input->post("NAMA_LGKP");
                $TMPT_LHR = $this->input->post("TMPT_LHR");
                   $TGL_LHR = $this->input->post("TGL_LHR");
                   $REFERENSI = $this->input->post("REFERENSI");
                     $QUERY_U = ("UPDATE DATA_ANOMALI_201501 SET NAMA_LGKP='".$NAMA_LGKP."' ,TMPT_LHR='".$TMPT_LHR."',NIK='".$NIK."' WHERE NIK=".$NIK);                        
                          $this->db->set('NIK_U', $NIK);
                        $this->db->set('NAMA_LGKP_U', $NAMA_LGKP);
                     $this->db->set('TMPT_LHR_U', $TMPT_LHR);
                 $this->db->set('QUERY_U', $QUERY_U);
                 $this->db->set('REFERENSI', $REFERENSI);
              $this->db->set('TGL_LHR_U',"to_date('$TGL_LHR','dd/mm/yyyy')",false);
            $this->db->where('NIK', $NIK);
         $this->db->update('DATA_ANOMALI_201501'); 
         /* echo "<script>
               window.history && window.history.pushState && window.history.pushState(null, null, 'http://".$_SERVER["SERVER_NAME"].":86/anomali/Load_ajax/limabelaskosongsatu');
               location.hash = '#';
               window.location.assign('http://localhost:86/anomali/Load_ajax/limabelaskosongsatu');
               location.href = 'http://localhost:86/anomali/Load_ajax/limabelaskosongsatu';
                history.pushState();
                        location.reload(); 

              </script>";*/
        echo json_encode(array("status" => TRUE));

      }private function _validate201501()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;
    

    if($this->input->post('NIK') == '')
    {
      $data['inputerror'][] = 'NIK';
      $data['error_string'][] = 'NIK HARUS DIISI';
      $data['status'] = FALSE;
    }

    if($this->input->post('NAMA_LGKP') == '')
    {
      $data['inputerror'][] = 'NAMA_LGKP';
      $data['error_string'][] = 'NAMA LENGKAP HARUS DIISI';
      $data['status'] = FALSE;
    }

    if($this->input->post('TGL_LHR') == '')
    {
      $data['inputerror'][] = 'TGL_LHR';
      $data['error_string'][] = 'TANGGAL LAHIR HARUS DIISI';
      $data['status'] = FALSE;
    }

    if($this->input->post('TMPT_LHR') == '')
    {
      $data['inputerror'][] = 'TMPT_LHR';
      $data['error_string'][] = 'TEMPAT LAHIR HARUS DIISI';
      $data['status'] = FALSE;
    }


    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }
     public function index()
                    {
                    $this->load->helper('form');
                  if($this->session->userdata('isLogin') == FALSE)
               {
                redirect('login/login_form');
            }
              else
            {    
              $data = array();
                  $this->load->model('m_login');
                     $user = $this->session->userdata('USERNAME');
                      $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
                         $data['pengguna'] = $this->m_login->dataPengguna($user);
                         }
                          $data["show"] = 0;
                        $data["NO_PROP"] = $data["NO_KAB"] =  0;
                          $data["biodata"] = null;
                            $data["kategori"] = 0;
                            $data["kword"] = "*";
                          if(isset($_POST["tabel"])){
                        $criteria = array();
                      $like = array();
                    $data["NO_PROP"] = $_POST["tabel"]["NO_PROP"];
                  $data["NO_KAB"] = $_POST["tabel"]["NO_KAB"];
            if($_POST["tabel"]["NO_PROP"] != 0) $criteria["DATA_ANOMALI_201401.NO_PROP"] = $_POST["tabel"]["NO_PROP"];
          unset($_POST["tabel"]["NO_PROP"]);
        if($_POST["tabel"]["NO_KAB"] != 0) $criteria["DATA_ANOMALI_201401.NO_KAB"] = $_POST["tabel"]["NO_KAB"];
      unset($_POST["tabel"]["NO_KAB"]);
              $jumlah = $this->db->select("*");
                  $this->db->from('DATA_ANOMALI_201401');
             $jumlah = $this->db->count_all_results("");
             $this->load->library('widget_paging',array('jumlah'=>$jumlah));     
              $offset=$thishis->widget_paging->awal_data(array('halaman'=>isset($_POST['page'])?$_POST['page']:1,'input'=>array('name'=>'page','id'=>'page')));
                   $this->db->select("*")->from("DATA_ANOMALI_201401");
                  $biodata = $this->db->get("",$this->widget_paging->batas_halaman,$offset)->result_array();
                    $data["offset"] = $offset;
                  foreach($biodata as $key=>$value){
                  $data["biodata"][$key]["KET_ANOMALI"] = $value["KET_ANOMALI"];
                  $data["biodata"][$key]["NIK"] = $value["NIK"];
                $data["biodata"][$key]["NAMA_LGKP"] = $value["NAMA_LGKP"];
              $data["biodata"][$key]["TMPT_LHR"] = $value["TMPT_LHR"];
              $data["biodata"][$key]["TGL_LHR"] = $value["TGL_LHR"];
            }
          $data["show"] = 1;
                }
           $data['periode_pertama'] = $this->Periode_model->get_periode_pertama()->result_array();
           $data['periode_kedua'] = $this->Periode_model->get_periode_kedua()->result_array();
           $data['periode_ketiga'] = $this->Periode_model->get_periode_ketiga()->result_array();
          $data['title'] = 'STATUS PEREKAMAN KTP-EL';
          $data['main'] = 'home_v';
         $this->load->view('main_v', $data); 
      }
      public function empatbelaskosongdua()
                     {
                    $this->load->helper('form');
                  if($this->session->userdata('isLogin') == FALSE)
               {
                redirect('login/login_form');
            }
              else
            {    
              $data = array();
                  $this->load->model('m_login');
                     $user = $this->session->userdata('USERNAME');
                      $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
                         $data['pengguna'] = $this->m_login->dataPengguna($user);
                         }
                          $data["show"] = 0;
                        $data["NO_PROP"] = $data["NO_KAB"] =  0;
                          $data["biodata"] = null;
                            $data["kategori"] = 0;
                            $data["kword"] = "*";
                          if(isset($_POST["tabel"])){
                        $criteria = array();
                      $like = array();
                    $data["NO_PROP"] = $_POST["tabel"]["NO_PROP"];
                  $data["NO_KAB"] = $_POST["tabel"]["NO_KAB"];
            if($_POST["tabel"]["NO_PROP"] != 0) $criteria["DATA_ANOMALI_2014012.NO_PROP"] = $_POST["tabel"]["NO_PROP"];
          unset($_POST["tabel"]["NO_PROP"]);
        if($_POST["tabel"]["NO_KAB"] != 0) $criteria["DATA_ANOMALI_2014012.NO_KAB"] = $_POST["tabel"]["NO_KAB"];
      unset($_POST["tabel"]["NO_KAB"]);
              $jumlah = $this->db->select("*");
                  $this->db->from('DATA_ANOMALI_2014012');
             $jumlah = $this->db->count_all_results("");
             $this->load->library('widget_paging',array('jumlah'=>$jumlah));     
              $offset=$this->widget_paging->awal_data(array('halaman'=>isset($_POST['page'])?$_POST['page']:1,'input'=>array('name'=>'page','id'=>'page')));
                   $this->db->select("*")->from("DATA_ANOMALI_2014012");
                  $biodata = $this->db->get("",$this->widget_paging->batas_halaman,$offset)->result_array();
                    $data["offset"] = $offset;
                  foreach($biodata as $key=>$value){
                  $data["biodata"][$key]["KET_ANOMALI"] = $value["KET_ANOMALI"];
                  $data["biodata"][$key]["NIK"] = $value["NIK"];
                $data["biodata"][$key]["NAMA_LGKP"] = $value["NAMA_LGKP"];
              $data["biodata"][$key]["TMPT_LHR"] = $value["TMPT_LHR"];
              $data["biodata"][$key]["TGL_LHR"] = $value["TGL_LHR"];
            }
          $data["show"] = 1;
                }
           $data['periode_pertama'] = $this->Periode_model->get_periode_pertama()->result_array();
           $data['periode_kedua'] = $this->Periode_model->get_periode_kedua()->result_array();
           $data['periode_ketiga'] = $this->Periode_model->get_periode_ketiga()->result_array();
          $data['title'] = 'STATUS PEREKAMAN KTP-EL';
          $data['main'] = 'empatbelaskosongdua';
         $this->load->view('main_v', $data); 
     }public function limabelaskosongsatu()
                    {
                    $this->load->helper('form');
                  if($this->session->userdata('isLogin') == FALSE)
               {
                redirect('login/login_form');
            }
              else
            {    
              $data = array();
                  $this->load->model('m_login');
                     $user = $this->session->userdata('USERNAME');
                      $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
                         $data['pengguna'] = $this->m_login->dataPengguna($user);
                         }
                         $data["show"] = 0;
      $data["NO_PROP"] = $data["NO_KAB"] =0;
      $data["biodata"] = null;
      if(isset($_POST["tabel"])){
      $criteria = array();
      $like = array();
      $data["NO_PROP"] = $_POST["tabel"]["NO_PROP"];
      $data["NO_KAB"] = $_POST["tabel"]["NO_KAB"];
      if($_POST["tabel"]["NO_PROP"] != 0) $criteria["DATA_ANOMALI_201501.NO_PROP"] = $_POST["tabel"]["NO_PROP"];
      unset($_POST["tabel"]["NO_PROP"]);
      if($_POST["tabel"]["NO_KAB"] != 0) $criteria["DATA_ANOMALI_201501.NO_KAB"] = $_POST["tabel"]["NO_KAB"];
      unset($_POST["tabel"]["NO_KAB"]);      
      $this->db->where($criteria);
      $jumlah = $this->db->count_all_results("DATA_ANOMALI_201501");
      $this->load->library('widget_paging',array('jumlah'=>$jumlah));     
      $offset=$this->widget_paging->awal_data(array('halaman'=>isset($_POST['page'])?$_POST['page']:1,'input'=>array('name'=>'page','id'=>'page')));
      $this->db->where($criteria);
      $this->db->select('*');
      $this->db->from('DATA_ANOMALI_201501')->order_by("NO_KK",'ASC');     
      $biodata = $this->db->get("" ,$this->widget_paging->batas_halaman,$offset)->result_array();
      $data["offset"] = $offset;
                  foreach($biodata as $key=>$value){
                  $data["biodata"][$key]["KET_ANOMALI"] = $value["KET_ANOMALI"];
                  $data["biodata"][$key]["NIK"] = $value["NIK"];
                $data["biodata"][$key]["NAMA_LGKP"] = $value["NAMA_LGKP"];
              $data["biodata"][$key]["TMPT_LHR"] = $value["TMPT_LHR"];
              $data["biodata"][$key]["TGL_LHR"] = $value["TGL_LHR"];
               $data["biodata"][$key]["NIK_U"] = $value["NIK_U"];
                $data["biodata"][$key]["NAMA_LGKP_U"] = $value["NAMA_LGKP_U"];
              $data["biodata"][$key]["TMPT_LHR_U"] = $value["TMPT_LHR_U"];
              $data["biodata"][$key]["TGL_LHR_U"] = $value["TGL_LHR_U"];
              $data["biodata"][$key]["QUERY_U"] = $value["QUERY_U"];
              $data["biodata"][$key]["REFERENSI"] = $value["REFERENSI"];
              $data["biodata"][$key]["FILE_REFERENSI"] = $value["FILE_REFERENSI"];

            }
          $data["show"] = 1;
                }
           $data['periode'] = $this->Periode_model->get_periode()->result_array();
           $data['periode_pertama'] = $this->Periode_model->get_periode_pertama()->result_array();
           $data['periode_kedua'] = $this->Periode_model->get_periode_kedua()->result_array();
           $data['periode_ketiga'] = $this->Periode_model->get_periode_ketiga()->result_array();
          $data['title'] = 'STATUS PEREKAMAN KTP-EL';
          $data['main'] = 'limabelaskosongsatu';
         $this->load->view('main_v', $data); 
     }
     public function get_limabelaskosongsatu()
                    {
                    $this->load->helper('form');
                  if($this->session->userdata('isLogin') == FALSE)
               {
                redirect('login/login_form');
            }
              else
            {    
              $data = array();
                  $this->load->model('m_login');
                     $user = $this->session->userdata('USERNAME');
                      $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
                         $data['pengguna'] = $this->m_login->dataPengguna($user);
                         }
                         $data["show"] = 0;
      $data["NO_PROP"] = $data["NO_KAB"] =0;
      $data["biodata"] = null;
      if(isset($_POST["tabel"])){
      $criteria = array();
      $like = array();
      $data["NO_PROP"] = $_POST["tabel"]["NO_PROP"];
      $data["NO_KAB"] = $_POST["tabel"]["NO_KAB"];
      if($_POST["tabel"]["NO_PROP"] != 0) $criteria["DATA_ANOMALI_201501.NO_PROP"] = $_POST["tabel"]["NO_PROP"];
      unset($_POST["tabel"]["NO_PROP"]);
      if($_POST["tabel"]["NO_KAB"] != 0) $criteria["DATA_ANOMALI_201501.NO_KAB"] = $_POST["tabel"]["NO_KAB"];
      unset($_POST["tabel"]["NO_KAB"]);      
      $this->db->where($criteria);
      $jumlah = $this->db->count_all_results("DATA_ANOMALI_201501");
      $this->load->library('widget_paging',array('jumlah'=>$jumlah));     
      $offset=$this->widget_paging->awal_data(array('halaman'=>isset($_POST['page'])?$_POST['page']:1,'input'=>array('name'=>'page','id'=>'page')));
      $this->db->where($criteria);
      $this->db->select('*');
      $this->db->from('DATA_ANOMALI_201501')->order_by("NO_KK",'ASC');     
      $biodata = $this->db->get("" ,$this->widget_paging->batas_halaman,$offset)->result_array();
      $data["offset"] = $offset;
                  foreach($biodata as $key=>$value){
                  $data["biodata"][$key]["KET_ANOMALI"] = $value["KET_ANOMALI"];
                  $data["biodata"][$key]["NIK"] = $value["NIK"];
                $data["biodata"][$key]["NAMA_LGKP"] = $value["NAMA_LGKP"];
              $data["biodata"][$key]["TMPT_LHR"] = $value["TMPT_LHR"];
              $data["biodata"][$key]["TGL_LHR"] = $value["TGL_LHR"];
              $data["biodata"][$key]["QUERY_U"] = $value["QUERY_U"];

            }
          $data["show"] = 1;
                }
           $data['periode'] = $this->Periode_model->get_periode()->result_array();
           $data['periode_pertama'] = $this->Periode_model->get_periode_pertama()->result_array();
           $data['periode_kedua'] = $this->Periode_model->get_periode_kedua()->result_array();
           $data['periode_ketiga'] = $this->Periode_model->get_periode_ketiga()->result_array();
          $data['title'] = 'STATUS PEREKAMAN KTP-EL';
         $this->load->view('view_limabelaskosongsatu', $data); 
     }

     public function proses_update($NIK)
          {
                    $this->load->helper('form');
                  if($this->session->userdata('isLogin') == FALSE)
               {
                redirect('login/login_form');
            }
              else
            {    
              $data = array();
                  $this->load->model('m_login');
                     $user = $this->session->userdata('USERNAME');
                      $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
                         $data['pengguna'] = $this->m_login->dataPengguna($user);
                         }
        $NIK = $this->input->post("NIK");
        $NAMA_LGKP = $this->input->post("NAMA_LGKP");
        $TMPT_LHR = $this->input->post("TMPT_LHR");
     $VARIABLE = ("UPDATE DATA_ANOMALI_201501 SET NAMA_LGKP=$NAMA_LGKP ,TMPT_LHR=$TMPT_LHR,NIK=$NIK WHERE NIK=".$NIK);
      $create = $this->db->query("UPDATE DATA_ANOMALI_201501 SET QUERY_U='$VARIABLE' WHERE NIK=".$NIK);
      $create = $this->db->trans_complete();
     if ($create) $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process is successful, data successfully edited .</button></p></strong></div>");
        else $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Oh snap ! Something wrong ,Please check before using any database !');</button></p></strong></div>");
   
           $data["show"] = 0;
                        $data["NO_PROP"] = $data["NO_KAB"] =  0;
                          $data["biodata"] = null;
                            $data["kategori"] = 0;
                            $data["kword"] = "*";
                          if(isset($_POST["tabel"])){
                        $criteria = array();
                      $like = array();
                    $data["NO_PROP"] = $_POST["tabel"]["NO_PROP"];
                  $data["NO_KAB"] = $_POST["tabel"]["NO_KAB"];
            if($_POST["tabel"]["NO_PROP"] != 0) $criteria["DATA_ANOMALI_201501.NO_PROP"] = $_POST["tabel"]["NO_PROP"];
          unset($_POST["tabel"]["NO_PROP"]);
        if($_POST["tabel"]["NO_KAB"] != 0) $criteria["DATA_ANOMALI_201501.NO_KAB"] = $_POST["tabel"]["NO_KAB"];
      unset($_POST["tabel"]["NO_KAB"]);
              $jumlah = $this->db->select("*");
                  $this->db->from('DATA_ANOMALI_201501');
             $jumlah = $this->db->count_all_results("");
             $this->load->library('widget_paging',array('jumlah'=>$jumlah));     
              $offset=$this->widget_paging->awal_data(array('halaman'=>isset($_POST['page'])?$_POST['page']:1,'input'=>array('name'=>'page','id'=>'page')));
                   $this->db->select("*")->from("DATA_ANOMALI_201501");
                  $biodata = $this->db->get("",$this->widget_paging->batas_halaman,$offset)->result_array();
                    $data["offset"] = $offset;
                  foreach($biodata as $key=>$value){
                  $data["biodata"][$key]["KET_ANOMALI"] = $value["KET_ANOMALI"];
                  $data["biodata"][$key]["NIK"] = $value["NIK"];
                $data["biodata"][$key]["NAMA_LGKP"] = $value["NAMA_LGKP"];
              $data["biodata"][$key]["TMPT_LHR"] = $value["TMPT_LHR"];
              $data["biodata"][$key]["TGL_LHR"] = $value["TGL_LHR"];
              $data["biodata"][$key]["QUERY_U"] = $value["QUERY_U"];
            }
          $data["show"] = 1;
                }
          $data['title'] = 'STATUS PEREKAMAN KTP-EL';
          $data['main'] = 'limabelaskosongsatu';
         $this->load->view('main_v', $data); 
     }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_person_adb extends CI_Controller { 
    function __construct()
  {
    parent::__construct();    
    header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); // Date in the past
    header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); // always modified
    header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
    header("Cache-Control: post-check=0, pre-check=0", FALSE);
    header("Pragma: no-cache");
    $this->load->library(array('form_validation','upload','session','encrypt'));
        $this->load->helper(array('url','text'));
        $this->load->model(array('m_login','Kontak_adb_model'));   
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
  public function ajax_save()
  {
    $this->_validate();
        $data = array(
        'ID' => $this->input->post('ID'),
        'KODE' => $this->input->post('KODE'),
        'WILAYAH' => $this->input->post('WILAYAH'),
        'NAMA_ADB' => $this->input->post('NAMA_ADB'),
        'NOMOR_KONTAK' => $this->input->post('NOMOR_KONTAK'),
        'EMAIL' => $this->input->post('EMAIL'),
        'PASSWORD_DKB_GANDA_ANOMALI' => $this->input->post('PASSWORD_DKB_GANDA_ANOMALI'),
        'PASSWORD_DEM' => $this->input->post('PASSWORD_DEM'),
        'PASSWORD_DUPLICATE_RECORD' => $this->input->post('PASSWORD_DUPLICATE_RECORD'),
        'PASSWORD_WKTP_NON_REKAM' => $this->input->post('PASSWORD_WKTP_NON_REKAM'),
        'PASSWORD_CAPIL' => $this->input->post('PASSWORD_CAPIL'),
        'PASSWORD_EKTP_MISSING' => $this->input->post('PASSWORD_EKTP_MISSING'),
        'PASSWORD_EKTP_CETAK' => $this->input->post('PASSWORD_EKTP_CETAK'),
        'OPERATOR' => $this->input->post('OPERATOR'),
        'CREATED' => date("Y-m-d H:i:s")
      );
       $this->Kontak_adb_model->save($data);
    echo json_encode(array("status" => TRUE));
  } 
  public function ajax_update()
  {
    $this->_validate();
        $data = array(
        'ID' => $this->input->post('ID'),
        'KODE' => $this->input->post('KODE'),
        'WILAYAH' => $this->input->post('WILAYAH'),
        'NAMA_ADB' => $this->input->post('NAMA_ADB'),
        'NOMOR_KONTAK' => $this->input->post('NOMOR_KONTAK'),
        'EMAIL' => $this->input->post('EMAIL'),
        'PASSWORD_DKB_GANDA_ANOMALI' => $this->input->post('PASSWORD_DKB_GANDA_ANOMALI'),
        'PASSWORD_DEM' => $this->input->post('PASSWORD_DEM'),
        'PASSWORD_DUPLICATE_RECORD' => $this->input->post('PASSWORD_DUPLICATE_RECORD'),
        'PASSWORD_WKTP_NON_REKAM' => $this->input->post('PASSWORD_WKTP_NON_REKAM'),
        'PASSWORD_CAPIL' => $this->input->post('PASSWORD_CAPIL'),
        'PASSWORD_EKTP_MISSING' => $this->input->post('PASSWORD_EKTP_MISSING'),
        'PASSWORD_EKTP_CETAK' => $this->input->post('PASSWORD_EKTP_CETAK'),
        'OPERATOR' => $this->input->post('OPERATOR'),
        'UPDATED' => date("Y-m-d H:i:s")
      );
       $this->Kontak_adb_model->update(array('ID' => $this->input->post('ID')), $data);
    echo json_encode(array("status" => TRUE));

        }
      public function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

      if($this->input->post('WILAYAH') == '')
    {
      $data['inputerror'][] = 'WILAYAH';
      $data['error_string'][] = 'Wilayah Harus Diisi';
      $data['status'] = FALSE;
    } if($this->input->post('NAMA_ADB') == '')
    {
      $data['inputerror'][] = 'NAMA_ADB';
      $data['error_string'][] = 'Nama Adb Harus Diisi';
      $data['status'] = FALSE;
    } if($this->input->post('NOMOR_KONTAK') == '')
    {
      $data['inputerror'][] = 'NOMOR_KONTAK';
      $data['error_string'][] = 'Nomor Kontak Harus Diisi';
      $data['status'] = FALSE;
    } if($this->input->post('PASSWORD_DKB_GANDA_ANOMALI') == '')
    {
      $data['inputerror'][] = 'PASSWORD_DKB_GANDA_ANOMALI';
      $data['error_string'][] = 'Password Dkb,Ganda & Anomali Harus Diisi';
      $data['status'] = FALSE;
    } if($this->input->post('PASSWORD_DEM') == '')
    {
      $data['inputerror'][] = 'PASSWORD_DEM';
      $data['error_string'][] = 'Password Dem Harus Diisi';
      $data['status'] = FALSE;
    } if($this->input->post('PASSWORD_DUPLICATE_RECORD') == '')
    {
      $data['inputerror'][] = 'PASSWORD_DUPLICATE_RECORD';
      $data['error_string'][] = 'Password Duplicate Record Harus Diisi Harus Diisi';
      $data['status'] = FALSE;
    } if($this->input->post('PASSWORD_WKTP_NON_REKAM') == '')
    {
      $data['inputerror'][] = 'PASSWORD_WKTP_NON_REKAM';
      $data['error_string'][] = 'Password Wktp Non Rekam Harus Diisi Harus Diisi';
      $data['status'] = FALSE;
    } if($this->input->post('PASSWORD_CAPIL') == '')
    {
      $data['inputerror'][] = 'PASSWORD_CAPIL';
      $data['error_string'][] = 'Password Capil Harus Diisi';
      $data['status'] = FALSE;
    } if($this->input->post('PASSWORD_EKTP_MISSING') == '')
    {
      $data['inputerror'][] = 'PASSWORD_EKTP_MISSING';
      $data['error_string'][] = 'Password Ektp Missing Harus Diisi';
      $data['status'] = FALSE;
    }if($this->input->post('PASSWORD_EKTP_CETAK') == '')
    {
      $data['inputerror'][] = 'PASSWORD_EKTP_CETAK';
      $data['error_string'][] = 'Password Ektp Cetak Harus Diisi';
      $data['status'] = FALSE;
    }


    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }
          public function cari($KODE='')
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
         } $WILAYAH = $this->input->post("WILAYAH");
             $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
              $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
              $data['inbox'] = $this->gammu->inbox()->result_array();
              $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
              $data["count_table"]= $this->db->select("*")->from("kontak_adb")->where('WILAYAH',$WILAYAH)->count_all_results('');
              $config['base_url'] = base_url().'contact_person_adb/cari/';
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
              $segment = $this->uri->segment('4');
              $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
              $data['biodata'] = $this->Kontak_adb_model->search_kontak_list($WILAYAH,$config['per_page'],$segment);
              $this->pagination->initialize($config); 
              $data['table']=$this->generateForm($KODE);
        $data['title'] = 'CONTACT PERSON ADB';
        $data["main"] = "Contact_person_adb";
        $this->load->view('main_v', $data);
    } 
public function edit($ID)
  {
    $data = $this->Kontak_adb_model->get_param($ID);
    echo json_encode($data);
  } 
    public function index($KODE='')
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
              $data["count_table"]= $this->Kontak_adb_model->count_table();
              $config['base_url'] = base_url().'contact_person_adb/index/';
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
              $data['biodata'] = $this->Kontak_adb_model->list_table($config['per_page'],$segment);
              $this->pagination->initialize($config); 
              $data['table']=$this->generateForm($KODE);
        $data['title'] = 'CONTACT PERSON ADB';
        $data["main"] = "Contact_person_adb";
        $this->load->view('main_v', $data);
    }  function detail_passwordnya(){
    $this->load->model("retrieve_model"); 
    $this->retrieve_model->detail_passwordnya();
  }
  
  function generateListform(){
    $this->load->model("retrieve_model"); 
    return $this->retrieve_model->generateListform();
  }
  function generateForm($KODE=''){
    $table='';
    $this->load->model("retrieve_model"); 
    $listform=$this->generateListform();
    $KODE='<input type="hidden" KODE="KODE" name="KODE" value="'.$KODE.'">';
    $table.=$KODE;
    $table.='<table border="0" style="width:100%">
          <tbody>
           '.$listform.'
          </table>
         ';
    return $table; 
  } 
      public function ajax_delete($ajax_delete)
  {
             $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
             $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
             $data['inbox'] = $this->gammu->inbox()->result_array();
             $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
    $query =$this->db->query("select * from phones;");
    $this->db->where('ID', $ajax_delete);
    $this->db->delete('kontak_adb');
    echo json_encode(array("status" => TRUE));
  }public function all_to_excel()
  {
    $query = $this->db->query("SELECT * FROM kontak_adb");
            $this->excel_generator->set_query($query);
            $this->excel_generator->set_header(array('KODE WILAYAH','WILAYAH','NAMA ADB','KONTAK','EMAIL','PAS.DKB,GANDA,ANOMALI','PAS.DEM','PAS.DUPLICATE RECORD','PAS.WKTP NON REKAM','PAS.CAPIL','PAS.EKTP MISSING','PAS.EKTP CETAK','OPERATOR'));
            $this->excel_generator->set_column(array('KODE','WILAYAH','NAMA_ADB','NOMOR_KONTAK','EMAIL','PASSWORD_DKB_GANDA_ANOMALI','PASSWORD_DEM','PASSWORD_DUPLICATE_RECORD','PASSWORD_WKTP_NON_REKAM','PASSWORD_CAPIL','PASSWORD_EKTP_MISSING','PASSWORD_EKTP_CETAK','OPERATOR'));
            $this->excel_generator->set_width(array(25, 25, 25,25, 25, 25,25, 25, 25,25, 25, 25,25,25));
            $this->excel_generator->exportTo2007('DAFTAR KONTAK ADB');
  }public function all_to_csv()
  {
    $this->load->dbutil();
          $query = $this->db->query("SELECT * FROM kontak_adb");
          header('Content-type: text/csv');
          header('Content-disposition: attachment;filename=DAFTAR KONTAK ADB.csv');
          echo $this->dbutil->csv_from_result($query);
          die();
        } 
        public function hapus_semua()
     {
   $hapus = $this->db->query("delete from kontak_adb");
   if($hapus){
    echo "<script>
        alert('Semua Data Berhasil Dihapus')
        </script>";
        redirect("contact_person_adb");
   }else{
    echo "<script>
        alert('Data Gagal Dihapus')
        </script>";
           redirect("contact_person_adb");
        } 
      }
        public function all_to_pdf()
  {
    $this->db->trans_start(TRUE);
            $this->load->library('fpdf');
    $this->fpdf->FPDF('P','cm','A4');
    $this->fpdf->AddPage();
    $this->fpdf->Ln();
    $this->fpdf->setFont('Arial','B',9);
    $this->fpdf->Text(9,1,'Daftar Kontak ADB Nasional');
    $this->fpdf->Image(base_url() . "assets/foto/icon-kemendagri.png", 7);
    $this->fpdf->setFont('Arial','B',9);
    $this->fpdf->Text(8.6,1.6,'KEMENTERIAN DALAM NEGERI');
    $this->fpdf->setFont('Arial','B',5);
    $this->fpdf->Text(10,1.9,'SUBDIT PDAK');
    $this->fpdf->Line(14.6,2.1,5,2.1);            
    $this->fpdf->ln(0.3);
    $this->fpdf->Cell(1,0.5,'NO',1,0,'C');
    $this->fpdf->Cell(2,0.5,'KODE WILAYAH',1,0,'C');
    $this->fpdf->Cell(4,0.5,'WILAYAH',1,0,'C');
    $this->fpdf->Cell(4,0.5,'NAMA ADB',1,0,'C');
    $this->fpdf->Cell(4,0.5,'KONTAK',1,0,'C');
    $this->fpdf->Cell(3,0.5,'EMAIL',1,0,'C');
    $this->fpdf->Ln();
    $query = $this->db->query("SELECT * FROM kontak_adb");
    $NO=1;
    foreach ($query->result() as $row)
    {
    $this->fpdf->Cell(1,0.5,$NO++,1,0,'C');
    $this->fpdf->Cell(2,0.5,$row->KODE,1,0,'L');
    $this->fpdf->Cell(4,0.5,$row->WILAYAH,1,0,'L');
    $this->fpdf->Cell(4,0.5,$row->NAMA_ADB,1,0,'L');
    $this->fpdf->Cell(4,0.5,$row->NOMOR_KONTAK,1,0,'L');
    $this->fpdf->Cell(3,0.5,$row->EMAIL,1,0,'L');
    $this->fpdf->Ln();
    }
    $this->fpdf->Cell(9.5, 0.5, 'Printed on : '.date('d/m/Y H:i').' | Created by : Tim Teknis Pengelolaan Database Administrasi Kependudukan Kementerian Dalam Negeri',0,'LR','L');
    $this->fpdf->Cell(9.5, 0.5, 'Page '.$this->fpdf->PageNo().'',0,0,'R');
    $this->fpdf->output('LAPORAN', 'I');
           
        } 
      function multiple_proses()
          {
          $ID = $this->input->post('ID');
          if($this->input->post('action') == 'excel' && $ID != NULL){
           $ID = implode(',',$ID); 
            $this->db->trans_start(TRUE);
            $query = $this->db->query("SELECT * FROM kontak_adb WHERE ID IN ($ID)");
            $this->excel_generator->set_query($query);
            $this->excel_generator->set_header(array('KODE WILAYAH','WILAYAH','NAMA ADB','KONTAK','EMAIL','PAS.DKB,GANDA,ANOMALI','PAS.DEM','PAS.DUPLICATE RECORD','PAS.WKTP NON REKAM','PAS.CAPIL','PAS.EKTP MISSING','PAS.EKTP CETAK','OPERATOR'));
            $this->excel_generator->set_column(array('KODE','WILAYAH','NAMA_ADB','NOMOR_KONTAK','EMAIL','PASSWORD_DKB_GANDA_ANOMALI','PASSWORD_DEM','PASSWORD_DUPLICATE_RECORD','PASSWORD_WKTP_NON_REKAM','PASSWORD_CAPIL','PASSWORD_EKTP_MISSING','PASSWORD_EKTP_CETAK','OPERATOR'));
            $this->excel_generator->set_width(array(25, 25, 25,25, 25, 25,25, 25, 25,25, 25, 25,25,25));
            $this->excel_generator->exportTo2007('DAFTAR KONTAK ADB');
            }
          elseif($this->input->post('action') == 'csv' && $ID != NULL){
          $this->load->dbutil();
          $ID = $this->input->post('ID');
          $ID = implode(',',$ID); 
          $query = $this->db->query("SELECT * FROM kontak_adb WHERE ID IN ($ID)");
          header('Content-type: text/csv');
          header('Content-disposition: attachment;filename=DAFTAR KONTAK ADB.csv');
          echo $this->dbutil->csv_from_result($query);
          die();
        }elseif($this->input->post('action') == 'hapus' && $ID != NULL){
          $ID = implode(',',$ID); 
          $query = $this->db->query("delete FROM kontak_adb WHERE ID IN ($ID)");
    if ($query) $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process is successful, data successfully deleted.</button></p></strong></div>");
        else $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Oh snap ! Something wrong ,Please check before using any database !</button></p></strong></div>");
            redirect('contact_person_adb');
        } 
        elseif($this->input->post('action') == 'pdf' && $ID != NULL){
          $ID = implode(',',$ID); 
            $this->db->trans_start(TRUE);
            $this->load->library('fpdf');
    $this->fpdf->FPDF('P','cm','A4');
    $this->fpdf->AddPage();
    $this->fpdf->Ln();
    $this->fpdf->setFont('Arial','B',9);
    $this->fpdf->Text(9,1,'Daftar Kontak ADB Nasional');
    $this->fpdf->Image(base_url() . "assets/foto/icon-kemendagri.png", 7);
    $this->fpdf->setFont('Arial','B',9);
    $this->fpdf->Text(8.6,1.6,'KEMENTERIAN DALAM NEGERI');
    $this->fpdf->setFont('Arial','B',5);
    $this->fpdf->Text(10,1.9,'SUBDIT PDAK');
    $this->fpdf->Line(14.6,2.1,5,2.1);            
    $this->fpdf->ln(0.3);
    $this->fpdf->Cell(1,0.5,'NO',1,0,'C');
    $this->fpdf->Cell(2,0.5,'KODE WILAYAH',1,0,'C');
    $this->fpdf->Cell(4,0.5,'WILAYAH',1,0,'C');
    $this->fpdf->Cell(4,0.5,'NAMA ADB',1,0,'C');
    $this->fpdf->Cell(4,0.5,'KONTAK',1,0,'C');
    $this->fpdf->Cell(3,0.5,'EMAIL',1,0,'C');
    $this->fpdf->Ln();
    $query = $this->db->query("SELECT * FROM kontak_adb WHERE ID IN ($ID)");
    $NO=1;
    foreach ($query->result() as $row)
    {
    $this->fpdf->Cell(1,0.5,$NO++,1,0,'C');
    $this->fpdf->Cell(2,0.5,$row->KODE,1,0,'L');
    $this->fpdf->Cell(4,0.5,$row->WILAYAH,1,0,'L');
    $this->fpdf->Cell(4,0.5,$row->NAMA_ADB,1,0,'L');
    $this->fpdf->Cell(4,0.5,$row->NOMOR_KONTAK,1,0,'L');
    $this->fpdf->Cell(3,0.5,$row->EMAIL,1,0,'L');
    $this->fpdf->Ln();
    }
    $this->fpdf->Cell(9.5, 0.5, 'Printed on : '.date('d/m/Y H:i').' | Created by : Tim Teknis Pengelolaan Database Administrasi Kependudukan Kementerian Dalam Negeri',0,'LR','L');
    $this->fpdf->Cell(9.5, 0.5, 'Page '.$this->fpdf->PageNo().'',0,0,'R');
    $this->fpdf->output('LAPORAN', 'I');
           
        }
        else{
               echo "<script>
             alert('Silahkan pilih data yang akan diexport.');
             </script>";
              redirect('contact_person_adb','refresh');    
            }
    }
  
}
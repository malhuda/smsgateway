<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
*  @author/Developer : Andre Marbun S.Kom
*  @project    : APLIKASI SMS GATEWAY REQUEST PASSWORD DMP KTP-EL NASIONAL
*  @Copyright    : TIM PDAK DITJEN DUKCAPIL KEMENDAGRI
*/
class Inbox extends CI_Controller
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
        $this->load->model(array('m_login','inbox_model'));   
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
       public function replay()
  {
    $this->_validate();
        $ID = $this->uri->segment(3);
        $SenderNumber = $this->input->post("SenderNumber");
        $data = array(
        'DestinationNumber' => $this->input->post('SenderNumber'),
        'TextDecoded' => $this->input->post('TextDecoded')
      );
        $this->db->where('ID', $ID);
      $this->db->insert('outbox',$data);
     echo json_encode(array("status" => TRUE)); 

              }
              public function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('SenderNumber') == '')
    {
      $data['inputerror'][] = 'SenderNumber';
      $data['error_string'][] = 'Nomor HP Harus Diisi';
      $data['status'] = FALSE;
    }

    if($this->input->post('TextDecoded') == '')
    {
      $data['inputerror'][] = 'TextDecoded';
      $data['error_string'][] = 'Pesan Harus Diisi';
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
              $data["count_table"]= $this->inbox_model->count_table();
              $config['base_url'] = base_url().'inbox/index/';
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
              $data['biodata'] = $this->inbox_model->list_table($config['per_page'],$segment);
              $this->pagination->initialize($config); 
              $data['title'] = 'INBOX MESSAGE';
              $data["main"] = "inbox";
              $this->load->view('main_v', $data);
         }  
    public function ajax_delete($ID)
  {
    $this->db->where('ID', $ID);
    $this->db->delete('inbox');
    echo json_encode(array("status" => TRUE));
  }public function detail($ID)
  {
    $data = $this->inbox_model->get_param($ID);
    echo json_encode($data);
  }  public function all_to_excel()
  {
    $query = $this->db->query("SELECT * FROM inbox");
            $this->excel_generator->set_query($query);
            $this->excel_generator->set_header(array('UpdatedInDB','ReceivingDateTime','Text','Coding','SMSCNumber','Class','TextDecoded','Processed'));
            $this->excel_generator->set_column(array('UpdatedInDB','ReceivingDateTime','Text','Coding','SMSCNumber','Class','TextDecoded','Processed'));
            $this->excel_generator->set_width(array(25, 25, 100, 25, 20,5, 100, 10));
            $this->excel_generator->exportTo2007('GENERATE QUERY');
           
  }public function all_to_csv()
  {
    $this->load->dbutil();
          $query = $this->db->query("SELECT * FROM inbox");
          header('Content-type: text/csv');
          header('Content-disposition: attachment;filename=DAFTAR KONTAK ADB.csv');
          echo $this->dbutil->csv_from_result($query);
          die();
        } 
        public function hapus_semua()
     {
   $hapus = $this->db->query("delete from inbox");
   if($hapus){
    echo "<script>
        alert('Semua Data Berhasil Dihapus')
        </script>";
        redirect("inbox");
   }else{
    echo "<script>
        alert('Data Gagal Dihapus')
        </script>";
           redirect("inbox");
        } 
      }
        public function all_to_pdf()
  {
    $this->load->library('fpdf');
    $this->fpdf->FPDF('P','cm','A4');
    $this->fpdf->AddPage();
    $this->fpdf->Ln();
    $this->fpdf->setFont('Arial','B',9);
    $this->fpdf->Text(7,1,'Rekapitulasi Daftar Pesan Masuk ADB Se Indonesia');
    $this->fpdf->Image(base_url() . "assets/foto/icon-kemendagri.png", 7);
    $this->fpdf->setFont('Arial','B',9);
    $this->fpdf->Text(8.4,1.5,'KEMENTERIAN DALAM NEGERI');
    $this->fpdf->setFont('Arial','B',5);
    $this->fpdf->Text(10,1.9,'SUBDIT PDAK');
    $this->fpdf->Line(14.6,2.1,5,2.1);            
    $this->fpdf->ln(0.3);
    $this->fpdf->Cell(1,0.5,'NO',1,0,'C');
    $this->fpdf->Cell(2,0.5,'UpdatedInDB',1,0,'C');
    $this->fpdf->Cell(11,0.5,'TextDecoded',1,0,'C');
    $this->fpdf->Cell(2,0.5,'ReceivingDateTime',1,0,'C');
    $this->fpdf->Cell(2,0.5,'SenderNumber',1,0,'C');
    $this->fpdf->Cell(1,0.5,'Processed',1,0,'C');
    $this->fpdf->Ln();
    $query = $this->db->query("SELECT * FROM inbox");
    $NO=1;
    foreach ($query->result() as $row)
    {
    $this->fpdf->Cell(1,0.5,$NO++,1,0,'C');
    $this->fpdf->Cell(2,0.5,$row->UpdatedInDB,1,0,'C');
    $this->fpdf->Cell(11,0.5,word_limiter($row->TextDecoded,'12'),1,0,'L');
    $this->fpdf->Cell(2,0.5,$row->ReceivingDateTime,1,0,'L');
    $this->fpdf->Cell(2,0.5,$row->SenderNumber,1,0,'L');
    $this->fpdf->Cell(1,0.5,$row->Processed,1,0,'L');
    $this->fpdf->Ln();
    }
    $this->fpdf->Cell(9.5, 0.5, 'Printed on : '.date('d/m/Y H:i').' | Created by : Tim Teknis Pengelolaan Database Administrasi Kependudukan Kementerian Dalam Negeri',0,'LR','L');
    $this->fpdf->Cell(9.5, 0.5, 'Page '.$this->fpdf->PageNo().'',0,0,'R');
    $this->fpdf->output('LAPORAN', 'I');
        
           
        } function multiple_proses()
          {
          $ID = $this->input->post('ID');
          if($this->input->post('action') == 'excel' && $ID != NULL){
           $ID = implode(',',$ID); 
            $this->db->trans_start(TRUE);
            $query = $this->db->query("SELECT * FROM inbox WHERE ID IN ($ID)");
            $this->excel_generator->set_query($query);
            $this->excel_generator->set_header(array('UpdatedInDB','ReceivingDateTime','Text','Coding','SMSCNumber','Class','TextDecoded','Processed'));
            $this->excel_generator->set_column(array('UpdatedInDB','ReceivingDateTime','Text','Coding','SMSCNumber','Class','TextDecoded','Processed'));
            $this->excel_generator->set_width(array(25, 25, 100, 25, 20,5, 100, 10));
            $this->excel_generator->exportTo2007('GENERATE QUERY');
            }
          elseif($this->input->post('action') == 'csv' && $ID != NULL){
          $this->load->dbutil();
          $ID = $this->input->post('ID');
          $ID = implode(',',$ID); 
          $query = $this->db->query("SELECT * FROM inbox WHERE ID IN ($ID)");
          header('Content-type: text/csv');
          header('Content-disposition: attachment;filename=GENERATE QUERY.csv');
          echo $this->dbutil->csv_from_result($query);
          die();
        }
        elseif($this->input->post('action') == 'hapus' && $ID != NULL){
          $ID = implode(',',$ID); 
          $this->db->trans_start(TRUE);
          $query = $this->db->query("delete FROM inbox WHERE ID IN ($ID)");
        $this->db->trans_complete();
      if ($query) $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process is successful, data successfully deleted.</button></p></strong></div>");
        else $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Oh snap ! Something wrong ,Please check before using any database !</button></p></strong></div>");
            redirect('inbox');
        } 
        elseif($this->input->post('action') == 'pdf' && $ID != NULL){
    $ID = implode(',',$ID); 
    $this->db->trans_start(TRUE);
    $this->load->library('fpdf');
    $this->fpdf->FPDF('P','cm','A4');
    $this->fpdf->AddPage();
    $this->fpdf->Ln();
    $this->fpdf->setFont('Arial','B',9);
    $this->fpdf->Text(7,1,'Rekapitulasi Daftar Pesan Masuk ADB Se Indonesia');
    $this->fpdf->Image(base_url() . "assets/foto/icon-kemendagri.png", 7);
    $this->fpdf->setFont('Arial','B',9);
    $this->fpdf->Text(8.4,1.5,'KEMENTERIAN DALAM NEGERI');
    $this->fpdf->setFont('Arial','B',5);
    $this->fpdf->Text(10,1.9,'SUBDIT PDAK');
    $this->fpdf->Line(14.6,2.1,5,2.1);            
    $this->fpdf->ln(0.3);
    $this->fpdf->Cell(1,0.5,'NO',1,0,'C');
    $this->fpdf->Cell(2,0.5,'UpdatedInDB',1,0,'C');
    $this->fpdf->Cell(11,0.5,'TextDecoded',1,0,'C');
    $this->fpdf->Cell(2,0.5,'ReceivingDateTime',1,0,'C');
    $this->fpdf->Cell(2,0.5,'SenderNumber',1,0,'C');
    $this->fpdf->Cell(1,0.5,'Processed',1,0,'C');
    $this->fpdf->Ln();
    $query = $this->db->query("SELECT * FROM inbox WHERE ID IN ($ID)");
    $NO=1;
    foreach ($query->result() as $row)
    {
    $this->fpdf->Cell(1,0.5,$NO++,1,0,'C');
    $this->fpdf->Cell(2,0.5,$row->UpdatedInDB,1,0,'C');
    $this->fpdf->Cell(11,0.5,word_limiter($row->TextDecoded,'12'),1,0,'L');
    $this->fpdf->Cell(2,0.5,$row->ReceivingDateTime,1,0,'L');
    $this->fpdf->Cell(2,0.5,$row->SenderNumber,1,0,'L');
    $this->fpdf->Cell(1,0.5,$row->Processed,1,0,'L');
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
              redirect('inbox','refresh');    
            }
    }
  }
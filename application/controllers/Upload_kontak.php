<?php
class Upload_kontak extends CI_Controller {
 function __construct()
 {
   parent::__construct();
   $this->load->model('Querypage');
   $this->load->helper(array('form', 'url', 'inflector'));
   $this->load->library('form_validation');
 }
 public function index()
  {
              if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('Login/login_form');
    }else
    {    
    $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
             $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
             $data['inbox'] = $this->gammu->inbox()->result_array();
             $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
         $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('USERNAME');
         $data['level'] = $this->session->userdata('LEVEL_LOGIN');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
         }
       if ($this->input->post('submit'))
       {   
$this->do_upload();
       // $this->load->view('chapter', $data);
}
  else
  {
    $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
             $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
             $data['inbox'] = $this->gammu->inbox()->result_array();
             $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
    $data["title"]="UPLOAD KONTAK ADB";
    $data["main"] = "upload_kontak_adb";
   $this->load->view('main_v',$data);
  }
 }
function saving_data()
{
     $data['cek_inbox'] = $this->gammu->cek_inbox()->result_array();
             $data['cek_inbox_adb'] = $this->gammu->cek_inbox_adb()->result_array();
             $data['inbox'] = $this->gammu->inbox()->result_array();
             $data['inbox_baru'] = $this->gammu->inbox_baru()->result_array();
    $config['upload_path'] = './upload_kontak_adb/';
    $config['allowed_types'] = '*';
                
    $this->load->library('upload', $config);

     if ( ! $this->upload->do_upload())
     {
            $data = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg_excel', 'Insert failed. Please check your file, only .xls file allowed.');
     }
     else
     {
            $data = array('error' => false);
            $upload_data = $this->upload->data();

            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');

            $file =  $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);

            // Sheet 1
            $data = $this->excel_reader->sheets[0] ;
            $dataexcel = Array();
            for ($i = 1; $i <= $data['numRows']; $i++) {
            if($data['cells'][$i][1] == '') break;
             $dataexcel[$i-1]['KODE'] = $data['cells'][$i][1];
             $dataexcel[$i-1]['WILAYAH'] = $data['cells'][$i][2];
             $dataexcel[$i-1]['NAMA_ADB'] = $data['cells'][$i][3];
             $dataexcel[$i-1]['NOMOR_KONTAK'] = $data['cells'][$i][4];
             $dataexcel[$i-1]['EMAIL'] = $data['cells'][$i][5];
             $dataexcel[$i-1]['PASSWORD_DKB_GANDA_ANOMALI'] = $data['cells'][$i][6];
             $dataexcel[$i-1]['PASSWORD_DEM'] = $data['cells'][$i][7];
             $dataexcel[$i-1]['PASSWORD_DUPLICATE_RECORD'] = $data['cells'][$i][8];
             $dataexcel[$i-1]['PASSWORD_WKTP_NON_REKAM'] = $data['cells'][$i][9];
             $dataexcel[$i-1]['PASSWORD_CAPIL'] = $data['cells'][$i][10];
             $dataexcel[$i-1]['PASSWORD_EKTP_MISSING'] = $data['cells'][$i][11];
             $dataexcel[$i-1]['PASSWORD_EKTP_CETAK'] = $data['cells'][$i][12];
             $dataexcel[$i-1]['OPERATOR'] = $data['cells'][$i][13];
            }
      $check= $this->Querypage->search_adb($dataexcel);
      $this->Querypage->insert_adb($dataexcel);
      $this->session->set_flashdata('msg_excel', 'File berhasil diupload ke server ,dan data ADB berhasil disimpan ke database.');
  }
  redirect('upload_kontak');
  }
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class webmaster extends CI_Controller { 
		function __construct()
	{
		parent::__construct();		
		header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); // Date in the past
		header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); // always modified
		header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
		header("Cache-Control: post-check=0, pre-check=0", FALSE);
		header("Pragma: no-cache");
		$this->load->helper('text');
		$this->load->library('Excel_generator');
        $this->load->database();
		$autoload['helper'] = array('form');
        $this->load->library('pagination'); 
		$this->load->helper('csv_helper');
		$this->load->library(array('form_validation','upload'));
		$this->load->library('encrypt');
		$this->load->helper('addon');
		$this->load->library('widget_wilayah');
		$this->load->database() ;
        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model(array('m_login','update_model'));   
        $this->load->database();

	} public function ajax_delete($ID)
  {
    $this->db->where('ID', $ID);
    $this->db->delete('ASSET_USER');
    echo json_encode(array("status" => TRUE));
  }function multiple_proses(){
  	$ID = $this->input->post('ID');
          $ID = implode(',',$ID); 
          $query = $this->db->query("delete FROM ASSET_USER WHERE ID IN ($ID)");
        $this->db->trans_complete();
    if ($query) $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process is successful, data successfully deleted.</button></p></strong></div>");
        else $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Oh snap ! Something wrong ,Please check before using any database !</button></p></strong></div>");
            redirect('webmaster/cek');
  }public function hapus_semua()
     {
   $hapus = $this->db->query("delete from ASSET_USER");
   if($hapus){
    echo "<script>
        alert('Semua Data Berhasil Dihapus')
        </script>";
        redirect("webmaster/cek");
   }else{
    echo "<script>
        alert('Data Gagal Dihapus')
        </script>";
           redirect("webmaster/cek");
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
		$data["show"] = 0;
		$data["NO_PROP"] = $data["NO_KAB"] =0;
		$data["biodata"] = null;
			$this->db->select('*');
			$this->db->from('ASSET_USER');			
			$biodata = $this->db->get("")->result_array();
			foreach($biodata as $key=>$value){
				$data["biodata"][$key]["NO_PROP"] = $value["NO_PROP"];
				$data["biodata"][$key]["NO_KAB"] = $value["NO_KAB"];

			
		$data["show"] = 1;
		}
		$data['title'] = ' INSERT USER';   
        $data['main'] = 'webmaster';
        $this->load->view('main_v', $data);

}
function proses()
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
        	 	     $this->form_validation->set_rules('USERNAME', 'USERNAME', 'trim|required|min_length[3]|max_length[15]|xss_clean');
  	     $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'trim|required|min_length[3]|max_length[15]|xss_clean');
  	     $this->form_validation->set_rules('NAMA', 'NAMA', 'trim|required|min_length[3]|max_length[50]|xss_clean');
  	      if($this->input->post('LEVEL_LOGIN') == NULL) 
  	     	 {
    $this->form_validation->set_rules('LEVEL_LOGIN', 'LEVEL LOGIN', 'required');
		}
		  $this->form_validation->set_error_delimiters("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                                        x
                                                   </button>", "</button></div>");
       if ($this->form_validation->run() == FALSE)
        {
		
		$data['title'] = ' INSERT USER';   
        $data['main'] = 'webmaster';
        $this->load->view('main_v', $data);
}else{
		$config['upload_path'] = './assets/foto/';
	    $config['allowed_types'] = '*';
	  /*  $config['max_size'] = '100000';
	    $config['max_width'] = '10024';
	    $config['max_height'] = '10768';*/
	    $this->upload->initialize($config);
	    $this->upload->do_upload('FOTO');
	    $upload = $this->upload->data();
    	$FOTO = $upload['file_name'];
		$data = array(
				'USERNAME' => $this->input->post('USERNAME'),
/*				'PASSWORD' => md5($this->input->post('PASSWORD', TRUE)),
*/				'PASSWORD' => $this->input->post('PASSWORD'),
				'STATUS' => $this->input->post('STATUS'),
				'LEVEL_LOGIN' => $this->input->post('LEVEL_LOGIN'),
				'NAMA' => $this->input->post('NAMA'),
				'FOTO' => $FOTO		
			);
		$create = $this->db->insert('ASSET_USER',$data);
       if ($create) $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process is successful, data successfully saved.</button></p></strong></div>");
        else $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Oh snap! Something wrong ,Please check before using any database !');</button></p></strong></div>");
		redirect('webmaster/cek'); 	
}
}
public function cek()
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
              $data["count_table"]= $this->update_model->count_table();
              $config['base_url'] = base_url().'webmaster/cek/';
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
              $data['biodata'] = $this->update_model->list_table($config['per_page'],$segment);
              $this->pagination->initialize($config); 
        $data['title'] = 'LIST USER';
        $data["main"] = "user";
        $this->load->view('main_v', $data);
    }  
function delete($USERNAME){
      					$this->db->trans_start(TRUE);

					$this->db->where('USERNAME',$USERNAME);
					     $query = $this->db->get('ASSET_USER');
					     $row = $query->row();
       				$this->db->where('USERNAME', $USERNAME);
       				 unlink("./assets/foto/$row->FOTO");
       			$this->db->delete('ASSET_USER', array('FOTO' => $USERNAME));

				$this->db->where('USERNAME', $USERNAME);
       			$this->db->delete('ASSET_USER');


       		$create = $this->db->trans_complete();
          if ($create) $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process is successful, data successfully deleted.</button></p></strong></div>");
        else $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Oh snap! Something wrong ,Please check before using any database !');</button></p></strong></div>");
		redirect('webmaster/cek'); 	
 }
}

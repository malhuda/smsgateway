<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webmaster_control extends CI_Controller { 
		function __construct()
	{
		parent::__construct();		
		header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); // Date in the past
		header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); // always modified
		header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
		header("Cache-Control: post-check=0, pre-check=0", FALSE);
		header("Pragma: no-cache");
		$this->load->library('Excel_generator');
        $this->load->database();
        $this->load->library('pagination'); 
		$this->load->helper('csv_helper');
		$this->load->library(array('form_validation','upload'));
		$this->load->library('encrypt');
		$this->load->helper('addon');
		$this->load->library('widget_wilayah');
		$this->load->database() ;
        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model('m_login');   
              $this->load->model('update_model');
	}

function edit()
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
         $ID = $this->uri->segment(3);
		$data['user'] = $this->update_model->show_user();
		$data['single_user'] = $this->update_model->show_user_username($ID);
		$data['title'] = ' EDIT USER';   
        $data['main'] = 'edit_user';
        $this->load->view('main_v', $data);

}
function update_user_username($ID) {
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
         $ID = $this->uri->segment(3);
			$data = array(
				'USERNAME' => $this->input->post('USERNAME'),
				'PASSWORD' => $this->input->post('PASSWORD'),
				'STATUS' => $this->input->post('STATUS'),
				'LEVEL_LOGIN' => $this->input->post('LEVEL_LOGIN'),
				'NAMA' => $this->input->post('NAMA')
			);
			
if(empty($_FILES['FOTO']['name']))
				{
					$this->db->where('ID', $ID);
		$create = $this->db->update('ASSET_USER',$data);
					if ($create) $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process is successful, data successfully edited .</button></p></strong></div>");
        else $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Oh snap ! Something wrong ,Please check before using any database !');</button></p></strong></div>");
		redirect('webmaster/cek'); 	
				}
			else
				{
		$config['upload_path'] = './assets/foto/';
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	   /* $config['max_size'] = '100000';
	    $config['max_width'] = '6024';
	    $config['max_height'] = '6768';*/
	    $this->upload->initialize($config);
	    $this->upload->do_upload('FOTO');
	    $upload = $this->upload->data();
    	$FOTO = $upload['file_name'];
		
		$data = array(
				'USERNAME' => $this->input->post('USERNAME'),
				'PASSWORD' => $this->input->post('PASSWORD'),
/*				'PASSWORD' => md5($this->input->post('PASSWORD', TRUE)),
*/				'STATUS' => $this->input->post('STATUS'),
				'LEVEL_LOGIN' => $this->input->post('LEVEL_LOGIN'),
				'NAMA' => $this->input->post('NAMA'),
				'FOTO' => $FOTO		
			);
			$this->db->where('ID', $ID);
		$create = $this->db->update('ASSET_USER',$data);
		
if ($create) $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process is successful, data successfully edited .</button></p></strong></div>");
        else $this->session->set_flashdata('message', "<div class='alert alert-info alert-dismissable'><button class='close' aria-hidden='true' data-dismiss='alert' type='button'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Oh snap ! Something wrong ,Please check before using any database !');</button></p></strong></div>");
		redirect('webmaster/cek'); 	
}
}
}
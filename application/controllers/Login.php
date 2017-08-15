<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); 
       header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT");
          header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", FALSE);
      header("Pragma: no-cache");
    $this->load->model('m_login');
    $this->load->library(array('form_validation','session'));
    $this->load->database();
    $this->load->helper('url');
    
  }
  
  
  public function index()
  {
    $session = $this->session->userdata('isLogin');
    
      if($session == FALSE)
      {
        redirect('login/login_form','refresh');
      }else
      {
        redirect('program');
      }
  }
  
  
   public function login_form()
  {
    $this->form_validation->set_rules('USERNAME', 'Username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('PASSWORD', 'Password', 'required|trim|xss_clean');
    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    
      if($this->form_validation->run()==FALSE)
      {
        $this->load->view('form_login');
      }else
      {
       $username = $this->db->escape_str($this->input->post("USERNAME"));
       $password = $this->input->post('PASSWORD');
       $level = $this->input->post('LEVEL_LOGIN');
       $no_prop = $this->session->set_userdata('NO_PROP');
       $no_kab = $this->session->set_userdata('NO_KAB');

       
       $cek = $this->m_login->ambilPengguna($username, $password, 1, 1);
        
        if($cek <> 0)
        {
          $this->session->set_userdata('isLogin', TRUE);
          $this->session->set_userdata('USERNAME',$username);
          $this->session->set_userdata('LEVEL_LOGIN',$level);
         
         redirect('program');
        }else
        $cek = $this->m_login->ambilPengguna($username, $password, 1, 2);
        
        if($cek <> 0)
        {
          $this->session->set_userdata('isLogin', TRUE);
          $this->session->set_userdata('USERNAME',$username);
          $this->session->set_userdata('LEVEL_LOGIN',$level);
         
         redirect('operatorkabupaten/program');

        }else
        {
         echo " <script>
                alert('Terjadi Kesalahan ,Maaf Mungkin Anda Tidak Berwewenang Dengan Program Ini.');
                history.go(-1);
              </script>";        
        }
      }  
  
  }
  
  public function logout()
  {
   $this->session->sess_destroy();
   
   redirect('login/login_form','refresh');
  

}
 } 
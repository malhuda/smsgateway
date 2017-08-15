<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller {
	
	function __construct(){ 
		
		parent::__construct();
		$this->load->model("mcountry");
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
        $data['title'] = ' FORM PENYUSUNAN TPS BERDASARKAN DATA PEMILIH BERDASARKAN HASIL SINGKRONISASI';   
		$data['main'] = 'tambah_view';
		$this->load->view("main_v",$data);
		
	}
	
	function simpan_tambah(){
		
 $data = array(
                'NO_PERTANYAAN'=>$this->input->post('NO_PERTANYAAN'),
                'ISI_PERTANYAAN'=>$this->input->post('ISI_PERTANYAAN'));
           $query= $this->db->insert('PERTANYAAN', $data);

			 echo "<script type='text/javascript' src='http://code.jquery.com/jquery-latest.js'></script>
 
    <script type='text/javascript'> 
      $('div').ready( function() {
        $('#body').delay(3000).fadeOut();
      });
    </script>";
               echo "<div id=body class='span4 alert alert-dark alert-dismissable source'><div class='form-group'><p align ='center'><strong>Data Sukses Disimpan.</strong>&nbsp;<img src=".base_url('assets/opensource/source/loading.gif').">
               </p></div></div>";
		
echo var_dump($query);
			
		
	}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/crud.php */
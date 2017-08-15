<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Wilayah{
	function __construct(){
		$this->CI=& get_instance();
		$this->CI->load->model('Propinsi_model');
		$this->CI->load->model('Kabupaten_model');
		$this->CI->load->model('Kecamatan_model');
		$this->CI->load->model('Kelurahan_model');
		$this->CI->load->model('Wilayah_model');
		$this->CI->load->model('Wilayah_session_model');
		$this->CI->load->model('Wilayahkab_model');

	}
	function begin_wiget($opsi,$url){
		foreach($opsi as $variabel=>$wilayah)
			$this->{$variabel}=$wilayah;
		return $this->CI->load->view('pdak_global/awal_wilayah',array('opsi'=>$opsi,'url'=>$url),true);	
	}	
		function get_propinsi($opsi){
		$hasil=array();
		$data=array();
		$data_awal=$opsi['data_awal']['NO_PROP'];
		$hasil['0']='-Pilih Provinsi-';
		$data=$this->CI->Propinsi_model->get();				
		for($i=0;$i<count($data);$i++){		
			$hasil[$data[$i]['NO_PROP']]=$data[$i]['NAMA_PROP'].' ('.$data[$i]['NO_PROP'].')';
		}
		$param='id="'.$this->prop.'"';
		$param.=' class="wilayah"';
		$param.=isset($opsi['param'])?$opsi['param']:'';			
		return form_dropdown($opsi['name'],$hasil,$data_awal,$param);
	}
	function get_kabupaten($opsi){
		$hasil=array();
		$data=array();
			$data_awal=$opsi['data_awal']['NO_KAB'];
			$data=$this->CI->Kabupaten_model->get(array('SETUP_KAB.NO_PROP'=>$opsi['data_awal']['NO_PROP']));				
		$hasil['0']='-Pilih Kabupaten-';	
		for($i=0;$i<count($data);$i++){
			$hasil[$data[$i]['NO_KAB']]=$data[$i]['NAMA_KAB'].' ('.$data[$i]['NO_KAB'].')';
		}
		$param='id="'.$this->kab.'"';
		$param.=' class="wilayah"'; 
		$param.=isset($opsi['param'])?$opsi['param']:'';			
		return form_dropdown($opsi['name'],$hasil,$data_awal,$param);
	}
	function get_kecamatan($opsi){
		$hasil=array();
		$data=array();
		$data_awal=$opsi['data_awal']['NO_KEC'];
		$data=$this->CI->Kecamatan_model->get(array('SETUP_KEC.NO_PROP'=>$opsi['data_awal']['NO_PROP'],'SETUP_KEC.NO_KAB'=>$opsi['data_awal']['NO_KAB']));
		$hasil['0']='-Pilih Kecamatan-';			
		for($i=0;$i<count($data);$i++){
			$hasil[$data[$i]['NO_KEC']]=$data[$i]['NAMA_KEC'].' ('.$data[$i]['NO_KEC'].')';
		}
		$param='id="'.$this->kec.'"';
		$param.=' class="wilayah"';
		$param.=isset($opsi['param'])?$opsi['param']:'';	
		return form_dropdown($opsi['name'],$hasil,$data_awal,$param);
	}
	function get_kelurahan($opsi){
		$hasil=array();
		$data=array();
		$data_awal=$opsi['data_awal']['NO_KEL'];
		$data=$this->CI->Kelurahan_model->get(array('SETUP_KEL.NO_PROP'=>$opsi['data_awal']['NO_PROP'],'SETUP_KEL.NO_KAB'=>$opsi['data_awal']['NO_KAB'],'SETUP_KEL.NO_KEC'=>$opsi['data_awal']['NO_KEC']));				
		$hasil['0']='-Pilih Kelurahan-';			
		for($i=0;$i<count($data);$i++){
			$hasil[$data[$i]['NO_KEL']]=$data[$i]['NAMA_KEL'].' ('.$data[$i]['NO_KEL'].')';
		}
		$param='id="'.$this->kel.'"';
		$param.=' class="wilayah"';
		$param.=isset($opsi['param'])?$opsi['param']:'';	
		return form_dropdown($opsi['name'],$hasil,$data_awal,$param);
	}	
}
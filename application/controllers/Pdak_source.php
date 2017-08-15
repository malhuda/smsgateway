<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pdak_source extends CI_Controller {
	function __construct(){
		parent::__construct();
		 $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
    $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}
	function get_prop(){
		$this->load->model('Propinsi_model');
		$hasil=array();
		$data=array();
			$hasil[]=array('0'=>'-Pilih Provinsi-');
			$data=$this->Propinsi_model->get();						
		foreach($data as $baris){
			$hasil[]=array($baris['NO_PROP']=>$baris['NAMA_PROP'].' ('.$baris['NO_PROP'].')');
		}			
		echo json_encode($hasil);		
	}	
	function get_kab(){
		$this->load->model('Kabupaten_model');
		$hasil=array();
		$data=array();
			$hasil[]=array('0'=>'-Pilih Kabupaten-');
			$_GET['NO_PROP']=isset($_GET['NO_PROP'])?$_GET['NO_PROP']:0;		
			if($_GET['NO_PROP']!=0){				
				foreach($_GET as $nama_kolom => $nilai)
					$kriteria['SETUP_KAB.'.$nama_kolom]=$nilai;
				$data=$this->Kabupaten_model->get($kriteria);
			}			
		foreach($data as $baris){
				$hasil[]=array($baris['NO_KAB']=>$baris['NAMA_KAB'].' ('.$baris['NO_KAB'].')');
		}			
		echo json_encode($hasil);		
	}function get_periode(){
		$this->load->model('Periode_model');
		$hasil=array();
		$data=array();
			$hasil[]=array('0'=>'-Pilih Periode-');
			$_GET['PERIODE']=isset($_GET['PERIODE'])?$_GET['PERIODE']:0;		
			if($_GET['PERIODE']!=0){				
				foreach($_GET as $nama_kolom => $nilai)
					$kriteria['PERIODE.'.$nama_kolom]=$nilai;
				$data=$this->Kabupaten_model->get($kriteria);
			}			
		foreach($data as $baris){
				$hasil[]=array($baris['PERIODE']=>$baris['PERIODE'].' ('.$baris['PERIODE'].')');
		}			
		echo json_encode($hasil);		
	}
}
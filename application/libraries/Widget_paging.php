<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Widget_paging{
	var $input=array();
	function __construct($param){
		$this->CI=& get_instance();
		$this->jumlah=$param['jumlah'];
		if(isset($param['batas_halaman'])){
			$this->batas_halaman=$param['batas_halaman'];
		}else{	
			$this->batas_halaman=10;
		}
		$this->jumlah_halaman=ceil($this->jumlah/$this->batas_halaman);		
	}
	function awal_data($param){
		if($param['halaman'] < 1)
			$this->halaman=1;
		elseif($param['halaman'] > $this->jumlah_halaman)
			$this->halaman=$this->jumlah_halaman;
		else		
			$this->halaman=$param['halaman'];
		$this->input=$param['input'];
		$this->offset=$this->batas_halaman*($this->halaman-1)+1;
		return $this->offset;
	}
	function masukkan_halaman($param){
		//$this->input['style']="width : 20px";
		$this->input['onkeypress']="return numbersonly(event,false)";
		$this->input['onkeyup']="return numbersonly(event,false)";
		$masukkan="";
		if($this->halaman > 1)
			$masukkan='<img align="absmiddle" id="paging_prev" src="'.$param['prev'].'" />';		
		$masukkan.=form_input($this->input,$this->halaman,"size='3' style='text-align:center;'");
		if($this->halaman < $this->jumlah_halaman)
			$masukkan.='<img align="absmiddle" id="paging_next" src="'.$param['next'].'" />';
		$masukkan.='<script>
		$(function(){
			$("#paging_prev").click(function(){
				$("#'.$this->input['id'].'").val('.($this->halaman-1).');
				$("#'.$param['id_form'].'").submit();
			});
			$("#paging_next").click(function(){
				$("#'.$this->input['id'].'").val('.($this->halaman+1).');
				$("#'.$param['id_form'].'").submit();
			});			
		});		
		function valid_paging(){
			var valid=true;			
			if($("#'.$this->input['id'].'").val()>'.$this->jumlah_halaman.')
				valid=false;
			if($("#'.$this->input['id'].'").val()<1)
				valid=false;
			return valid;
		}
		</script>';
		return $masukkan;		
	}	
}
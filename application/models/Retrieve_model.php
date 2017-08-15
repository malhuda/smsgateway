<?php
	class retrieve_model extends CI_Model{ 
		
		function retrieve_model()
		{
			parent::__construct();
		}
		
		function generateListform(){
			$KODE=1;
			$table='';
			$i=0;
			$table.='';
			for($i=0;$i<$KODE;$i++){
				$table.=' <div class="form-group">
                                    <label class="control-label col-sm-4">KODE</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="KODE"  onChange="return detail_passwordnya()" name="KODE" value=""  placeholder="KODE">
                                      </div>
                                </div>';
				}
			$table.='';
			return $table;
		}
		function detail_passwordnya(){
			$KODE=$this->input->post('KODE');
			$query=$this->db->query("SELECT KODE,
				WILAYAH,
				PASSWORD_DKB_GANDA_ANOMALI,
				PASSWORD_DEM,
				PASSWORD_DUPLICATE_RECORD,
				PASSWORD_WKTP_NON_REKAM,
				PASSWORD_CAPIL,
				PASSWORD_EKTP_MISSING,
				PASSWORD_EKTP_CETAK 
				FROM  PASSWORD_DKB
				WHERE KODE='$KODE'");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					echo $data->WILAYAH.'|'. ($data->PASSWORD_DKB_GANDA_ANOMALI).'|'. ($data->PASSWORD_DEM).'|'. ($data->PASSWORD_DUPLICATE_RECORD).'|'. 
					 ($data->PASSWORD_WKTP_NON_REKAM).'|'. ($data->PASSWORD_CAPIL).'|'. ($data->PASSWORD_EKTP_MISSING).'|'. ($data->PASSWORD_EKTP_CETAK);
				}
			}
			else{
				 echo 'KODE WILAYAH TIDAK DITEMUKAN.';
			}
		}		
} 


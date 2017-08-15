<script language="javascript">
	<?
		$js_opsi="";
		foreach($opsi as $variabel=>$wilayah){
			$js_opsi.=$variabel.":'#".$wilayah."',";
		}
	?>
	var opsi_wilayah={<?=$js_opsi?>};	
	$(function(){		
		SettingWilayah(opsi_wilayah,'<?=$url?>');		
	});
</script>
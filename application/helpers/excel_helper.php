<?php
if ( ! function_exists('xls_to_array'))
{
	function xls_to_array($filename)
	{
		$ci =& get_instance();		
		
		$ci->load->library('Excel_reader');
		
		$ci->excel_reader->setOutputEncoding('CP1251');

		$ci->excel_reader->read($filename);
				
		$data = $ci->excel_reader->sheets[0];
		$kolom = $data['numCols'];
		$baris = $data['numRows'];
		$nilai = "";
		for($i=1;$i<=$baris;$i++)
		{
			for($j=1;$j<=$kolom;$j++)
			{
				if($j == $kolom)
				{
					$sepa = "*";
				}
				else
				{
					$sepa = ",";
				}
				$nilai .= $data['cells'][$i][$j].$sepa;
			}
		}
		return $nilai;
	}
}
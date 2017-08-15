<form id="postdata">
<table width="100%" border="0">
	<tr>
		<td colspan="6" ><?php echo $notif; ?></td>
	</tr>
	<tr>
		<td width="20px">#</td>
		<td width="20x"><input type="checkbox" id="ceksemua" onclick="cekall();" /></td>
		<td width="100px">Id</td>
		<td width="300px">Nama</td>
		<td>Aksi</td>
	</tr>
	<?php
		$seq = 1;
		foreach($country as $row){
		
			echo "<tr>";
			echo "<td>".$seq."</td>";
			echo "<td><input type='checkbox' class='cek' name='f_".$row['COUNTRYID']."' onclick='cek();' /></td>";
			echo "<td>".$row['COUNTRYID']."</td>";
			echo "<td>".$row['NAME']."</td>";
			echo "<td><a href='javascript:edit(\"".$row['COUNTRYID']."\")'>ubah</a>|<a href='javascript:hapus(\"".$row['COUNTRYID']."\")'>hapus</a></td>";
			
			$seq++;
		}
	?>
	<tr>
		<td colspan="6">&nbsp;</td>
	</tr>
	
	<tr>
		<td colspan="6"><a href="javascript:hapussemua();">hapus semua</a></td>
	</tr>
</table>
</form>
<br/>
<div class="pagination"><?php echo $pagination; ?></div>
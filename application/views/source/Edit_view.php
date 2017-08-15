<form id="postedit">
	<table>
		<tr>
			<td>ID</td>
			<td>:</td>
			<td><input type="text" name="f_ID"  value="<?php echo $country['COUNTRYID']; ?>" /></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="f_NAME" value="<?php echo $country['NAME']; ?>" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="button" value="Simpan" onclick="simpan_edit();" /></td>
		</tr>
	</table>
</form>
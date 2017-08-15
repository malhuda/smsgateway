<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CodeIgniter CRUD</title>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/ajax/js/jquery.js"></script>
	<script type="text/javascript">
	function simpan_tambah(){
			var target="<?php echo site_url() ?>/crud/simpan_tambah/";
			var xdata=$("#posttambah").serialize();
			
			$.post(target,xdata,function(data){
				$("#body").html(data);
			});
		}
	</script>
</head>
<body>

<div id="container">
	<div class="header">
		<div class="command">
			<a href="javascript:browse();">browse</a>|<a href="javascript:tambah();">tambah</a>|<a href="javascript:toggle();">search</a>
		</div>
		<h1>Data Negara</h1>
	</div>
	<div id="search" style="display:none;">
		<form id="cari">
		<table>
			<tr>
				<td width="50px">
					<select name="key">
						<option value="COUNTRYID">Id</option>
						<option value="NAME">Nama</option>
					</select>
				</td>
				<td width="200px"><input type="text" name="value" /></td>
				<td width="100px"><input type="button" value="Cari" onclick="cari();" /></td>
			</tr>
		</table>
		</form>
	</div>

	<div id="body">
<form id="posttambah">
	<table>
		<tr>
			<td>ID</td>
			<td>:</td>
			<td><input type="text" name="NO_PERTANYAAN" /></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="ISI_PERTANYAAN" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="button" value="Simpan" onclick="simpan_tambah();" /></td>
		</tr>
	</table>
</form>	</div>

	<div class="footer"><p>Page rendered in <strong>{elapsed_time}</strong> seconds</p></div>
</div>

</body>
</html>
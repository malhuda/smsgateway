<html>
<head>
<title>Checking for empty fields</title>
<script language="JavaScript">
function validate_form( frm ) {
  if( frm.KETERANGAN.value.length < 1 ) {
    alert( "Bidang Kolom Keterangan Ini Harus Diisi" );
    frm.KETERANGAN.focus();
    return false;
  }
  
  if( frm.SOLUSI.value.length < 1 ) {
    alert( "Bidang Kolom Solusi Ini Harus Diisi" );
    frm.SOLUSI.focus();
    return false;
  }
  
  return true;
}
</script>
</head>
<body onload="document.form1.KETERANGAN.focus();">
<h2> Checking for Empty fields </h2>
<form name="form1" method="post" onsubmit="return validate_form(this);">
Please enter your name: <br>
  <input type="text" size=50 name="KETERANGAN">
<p>
Please enter your address number: <BR>
<input type="text" size=30 name="SOLUSI">
<p>
  <button type="submit">SIMPAN</button>
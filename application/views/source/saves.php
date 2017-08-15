<html>
<head>
<title></title>
<META NAME="DESCRIPTION" CONTENT="">
<META NAME="KEYWORDS" CONTENT="">
<?php foreach($checkbox as $checkbox){ ?>
<?php $checkbox['NO_PERTANYAAN'] =$checkbox['NO_PERTANYAAN']+1;
echo "<script type='text/javascript'>
function chkcontrol(j) {
var total= 0;
for(var i='$checkbox[NO_PERTANYAAN]'; i < document.form1.NO_PERTANYAAN.length; i++){
if(document.form1.NO_PERTANYAAN[i].checked){
total = '$checkbox[NO_PERTANYAAN]'+1;}
if(total >='$checkbox[NO_PERTANYAAN]+1'){
alert('Anda tidak boleh mundur') 
document.form1.NO_PERTANYAAN[j].checked = false ;
return false;
}
}
} </script>"; ?>
<?php } ?>
</head>

<body topmargin=''0''; >

<form name=form1 method=post action=check.php>
<table border=''0'' width=''250'' cellspacing=''0'' cellpadding=''0'' align=center>



<tr bgcolor=''#ffffcc''><td > </td><td ><b>Choice</b></td></tr>
<tr bgcolor=''#f1f1f1'' ><td ><input type=checkbox name=NO_PERTANYAAN value=1 onclick='chkcontrol(0)';></td><td >PHP</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=2 onclick='chkcontrol(1)';></td><td >Perl</td></tr>
<tr bgcolor=''#f1f1f1'' ><td ><input type=checkbox name=NO_PERTANYAAN value=3 onclick='chkcontrol(2)';></td><td >MySQL</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=4 onclick='chkcontrol(3)';></td><td >ASP</td></tr>
<tr bgcolor=''#f1f1f1'' ><td ><input type=checkbox name=NO_PERTANYAAN value=5 onclick='chkcontrol(4)';></td><td >JavaScript</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=6 onclick='chkcontrol(5)';></td><td >CSS</td></tr>
<tr bgcolor=''#f1f1f1'' ><td ><input type=checkbox name=NO_PERTANYAAN value=7 onclick='chkcontrol(6)';></td><td >HTML</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=8 onclick='chkcontrol(7)';></td><td >ABJ</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=9 onclick='chkcontrol(8)';></td><td >SSS</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=10 onclick='chkcontrol(9)';></td><td >DDD</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=11 onclick='chkcontrol(10)';></td><td >CCC</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=12 onclick='chkcontrol(11)';></td><td >VVV</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=13 onclick='chkcontrol(12)';></td><td >FF</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=14 onclick='chkcontrol(13)';></td><td >GG</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=15 onclick='chkcontrol(14)';></td><td >AHHHBJ</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=16 onclick='chkcontrol(15)';></td><td >JJ</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=17 onclick='chkcontrol(16)';></td><td >JJJ</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=NO_PERTANYAAN value=18 onclick='chkcontrol(17)';></td><td >KKKK</td></tr>
</table></form>
</body>
</html>












<html>
<head>
<title></title>
<META NAME="DESCRIPTION" CONTENT="">
<META NAME="KEYWORDS" CONTENT="">

<script type="text/javascript">
function chkcontrol(j) {
var total=0;
for(var i=0; i < document.form1.ckb.length; i++){
if(document.form1.ckb[i].checked){
total =total +1;}
if(total > 3){
alert("Please Select only three") 
document.form1.ckb[j].checked = false ;
return false;
}
}
} </script>
</head>

<body topmargin=''0''; >

<form name=form1 method=post action=check.php>
<table border=''0'' width=''250'' cellspacing=''0'' cellpadding=''0'' align=center>



<tr bgcolor=''#ffffcc''><td > </td><td ><b>Choice</b></td></tr>
<tr bgcolor=''#f1f1f1'' ><td ><input type=checkbox name=ckb value=1 onclick='chkcontrol(0)';></td><td >PHP</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=ckb value=2 onclick='chkcontrol(1)';></td><td >Perl</td></tr>
<tr bgcolor=''#f1f1f1'' ><td ><input type=checkbox name=ckb value=3 onclick='chkcontrol(2)';></td><td >MySQL</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=ckb value=4 onclick='chkcontrol(3)';></td><td >ASP</td></tr>
<tr bgcolor=''#f1f1f1'' ><td ><input type=checkbox name=ckb value=5 onclick='chkcontrol(4)';></td><td >JavaScript</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=ckb value=6 onclick='chkcontrol(5)';></td><td >CSS</td></tr>
<tr bgcolor=''#f1f1f1'' ><td ><input type=checkbox name=ckb value=7 onclick='chkcontrol(6)';></td><td >HTML</td></tr>
<tr bgcolor=''#ffffff'' ><td ><input type=checkbox name=ckb value=8 onclick='chkcontrol(7)';></td><td >Photo Shop</td></tr>
</table></form>
</body>
</html>
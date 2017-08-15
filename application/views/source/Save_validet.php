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
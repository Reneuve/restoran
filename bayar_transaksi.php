<?php
error_reporting(0);
include("koneksi.php");
$id=$_GET['id'];
$bayar=$_COOKIE["bayar"];
echo "<script>console.log('cookie:$bayar')</script>";
if($_POST["save"]){
	$total=$_COOKIE["total"];
	if($total<0){echo "<script>alert('Uang Tidak Cukup')</script>";}
	else{
	if($_COOKIE["bayar"]!=null){
$b="UPDATE transaksi set status='1',bayar='".$_COOKIE["bayar"]."' where id='".$_GET['id']."'";
mysqli_query($con,$b);
echo "<script>console.log('cookie:$bayar')</script>";
echo "<script>alert('Kembali Rp $total')</script>";
echo "<script>window.location.href='list_transaksi.php'</script>";
//header("Location:list_transaksi.php");
setcookie('bayar','');
	}}
setcookie('bayar','');
}
$q="SELECT T.id,P.`nama` AS pelanggan,M.`nama` AS menu,T.`total`,T.`bayar` FROM transaksi T,pesanan PE,pelanggan P,menu M,USER U WHERE T.`id_pesanan`=PE.`id` AND M.`id`=PE.`id_menu` AND U.`id`=PE.`id_user` AND P.id=PE.`id_pelanggan` AND T.id='".$_GET["id"]."' order by T.id desc";
$a=mysqli_query($con,$q);
$d=mysqli_fetch_array($a);
?>
<style>
.table{
margin-left:10%;
font-family:Arial Black;
color:black;
font-size:17px;
}
.p{
float:right;
margin:0px;
padding:0px;
}
.judul{
color:black;
font-family:Arial Black;
}
.body{
width:80%;
}
</style>
<body class='body'>
<link rel='stylesheet' href='style/css/bootstrap.min.css'>
<h2><center><h3 class='judul'>Struk Bayar</h3></font></center></h2>
<form method="POST" action="">
<table border='0' width=10px; class='table' cellpadding=2px>
<tr><input type='text' hidden id='idpes' value='<?php echo $d["id"];?>'>
<td>Nama Pelanggan <p class='p'>:</p></td>
<td><?php echo $d["pelanggan"];?></td>
</tr>
<tr>
<td>Menu<p class='p'>:</p></td>
<td><?php echo $d["menu"];?></td>
</tr>
<tr>
<td>Total<p class='p'>:</p></td>
<td><input type='text'  name='total' disabled value='<?php echo number_format($d["total"],2);?>' style='border:0px;background-color:white;color:black';></td>
</tr><input type='text' id='totalid'  disabled value='<?php echo $d["total"];?>' hidden>
<tr>
<td colspan='2' align=center><input type='submit' name='save' class='btn btn-success' onclick='bayar()' value="Bayar"></td>
</tr>
</table>
</form>
<script type='text/javascript' src='js/jquery-3.3.1.min.js'></script>
<script>
function bayar(){
var bayar=prompt("Bayar:","");
if(bayar==""){
alert("Bayar Harus Diisi");
}
else{
	var total=$("#totalid").val();
	var hatot=bayar-total;
	var idpes=$("#idpes").val();
document.cookie="bayar="+bayar;
document.cookie="total="+hatot;
console.log(hatot);
if(hatot>=0){
alert('Kembali Rp'+hatot);
window.open('nota_bayar.php?id='+idpes);}
}
}

</script>
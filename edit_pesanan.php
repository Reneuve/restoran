<?php
session_start();
error_reporting(0);
include("koneksi.php");
$j="SELECT PS.id,M.`nama` AS menu,PE.nama AS pelanggan,PS.jumlah,U.`nama` AS USER FROM pesanan PS,pelanggan PE,USER U,menu M WHERE PS.`id_menu`=M.`id` AND PS.`id_pelanggan`=PE.`id` AND PS.`id_user`=U.`id` and PS.id='".$_GET["id"]."'";
$ka=mysqli_query($con,$j);
$p=mysqli_fetch_array($ka);
$h1="SELECT * FROM menu where nama='".$p["menu"]."'";
$h2=mysqli_query($con,$h1);
$hh=mysqli_fetch_array($h2);

if($_POST["simpan"]){
$ap="SELECT P.id AS pelanggan,M.id menu,U.id AS USER FROM pelanggan P,USER U,menu M WHERE P.nama='".$_POST["pelanggan"]."' AND M.nama='".$_POST["menu"]."' AND U.nama='".$_SESSION["user"]."'";
$q=mysqli_query($con,$ap);
$a=mysqli_fetch_array($q);
try{
$insert="UPDATE pesanan set id_menu='".$a["menu"]."',id_pelanggan='".$a["pelanggan"]."',jumlah='".$_POST["jumlah"]."',id_user='".$a["USER"]."' where id='".$_GET["id"]."'";
mysqli_query($con,$insert);
$upd="UPDATE transaksi set total='".$_COOKIE['harga1']."' where id_pesanan='".$_GET["id"]."'";
mysqli_query($con,$upd); 
}catch(Exception $e){
echo "<script>alert('$e')</script>";
}
echo "<script>alert('Sukses!')</script>";
header("Location:list_pesanan.php");
echo $upd;
}
?>
<style>

</style>
<link rel="stylesheet" href="style/css/bootstrap.min.css" />
<h3>Edit Pesanan</h3>
<form method="POST" action="">
<table border=0 cellpadding=5px>
<tr>
<td>Menu</td>
<td><input type='text' name='menu' value="<?php echo $p['menu'];?>" id='menu' onchange='getHarga(this.value)' required class='form-control form-control-sm' style='width:500px'></td>
</tr>
<tr>
<td>Jumlah</td>
<td><input type='number' id='jumlah' onchange='ttl(this.value)' value="<?php echo $p['jumlah'];?>" min=1 name='jumlah' required class='form-control form-control-sm'></td>
</tr>
<td>Harga</td>
<td><input type='text' disabled name='harga' value="<?php echo $hh['harga'];?>" id='harga' required class='form-control form-control-sm'>
</tr>
<tr>
<td>Total</td>
<td><input type='text' disabled name='total' value="<?php echo ($hh['harga']*$p["jumlah"]);?>" id='total1' required class='form-control form-control-sm'>
</tr>
<tr>
<td>Pelanggan</td>
<td><input type='text' name='pelanggan' id='pelanggan' value="<?php echo $p['pelanggan'];?>" required class='form-control form-control-sm'>
</tr>
<tr>
<td>User</td>
<td><input type='text' name='user' disabled value="<?php echo $_SESSION["user"];?>" value="<?php echo $p['user'];?>" required class='form-control form-control-sm'></td>
</tr>
</tr>
<tr>
<td colspan=2><input type='submit' name='simpan' value='Edit' style='width:100px' class='btn btn-primary'></td>
</tr>
</form>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
<script type="text/javascript">
$(document).ready(function(){
$("#menu").autocomplete({ 
source:'menu_json.php',
minLength:2,              
});
});
$(document).ready(function(){
	$("#pelanggan").autocomplete({
		source:'pelanggan_json.php',
		minLength:2,
	});
});
function getHarga(data){
	var xhr=new XMLHttpRequest();
	var url="harga_menu.php";
	url=url+"?q="+data;
	xhr.open("GET",url);
	xhr.onreadystatechange = function(){
		var data=xhr.responseText;
		var jml=$("#jumlah").val();
		$("#harga").val(data);
		$("#total1").val(data*jml);
		document.cookie="harga1="+(data*jml);
	}
	xhr.send();
}	
function ttl(harga){
	var jml=$("#jumlah").val();
	var hg=$("#harga").val();
	var data=jml*hg;
	$("#total1").val(data);
	document.cookie="harga1="+data;
}
</script>
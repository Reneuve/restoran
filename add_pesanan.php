<?php
session_start();
error_reporting(0);
include("koneksi.php");
if($_POST["simpan"]){
$ap="SELECT P.id AS pelanggan,M.id menu,U.id AS USER FROM pelanggan P,USER U,menu M WHERE P.nama='".$_POST["pelanggan"]."' AND M.nama='".$_POST["menu"]."' AND U.nama='".$_SESSION["user"]."'";
$q=mysqli_query($con,$ap);
$a=mysqli_fetch_array($q);
$idp="SELECT id FROM pesanan ORDER BY id DESC LIMIT 1";
$id1=mysqli_fetch_array(mysqli_query($con,$idp));
$ids=$id1["id"]+1;
try{
$insert="INSERT INTO pesanan(id,id_menu,id_pelanggan,jumlah,id_user)VALUES('".$ids."','".$a["menu"]."','".$a["pelanggan"]."','".$_POST["jumlah"]."','".$a["USER"]."')";
mysqli_query($con,$insert);

$insert1="INSERT INTO transaksi(id_pesanan,total,status)VALUES('".$ids."','".$_COOKIE['harga']."','0')";
mysqli_query($con,$insert1);
}catch(Exception $e){
echo "<script>alert('$e')</script>";
}
echo "<script>alert('Sukses!')</script>";
echo header("Location:list_pesanan.php");
}
?>
<style>

</style>
<link rel="stylesheet" href="style/css/bootstrap.min.css" />
<h3>Pesanan Baru</h3>
<form method="POST" action="">
<table border=0 cellpadding=5px>
<tr>
<td>Menu</td>
<td><input type='text' name='menu' id='menu' onchange='getHarga(this.value)' required class='form-control form-control-sm' style='width:500px'></td>
</tr>

<tr>
<td>Jumlah</td>
<td><input type='number' id='jumlah' onchange='ttl(this.value)' min=1 name='jumlah' required class='form-control form-control-sm'></td>
</tr>
<td>Harga</td>
<td><input type='text' disabled name='harga' id='harga' required class='form-control form-control-sm'>
</tr>
<tr>
<td>Total</td>
<td><input type='text' disabled name='total' id='total1' required class='form-control form-control-sm'>
</tr>
<tr>
<td>Pelanggan</td>
<td><input type='text' name='pelanggan' id='pelanggan' required class='form-control form-control-sm'>
</tr>
<tr>
<td>User</td>
<td><input type='text' name='user' disabled value="<?php echo $_SESSION["user"];?>" required class='form-control form-control-sm'></td>
</tr>
</tr>
<tr>
<td colspan=2><input type='submit' name='simpan' value='Simpan' class='btn btn-primary'></td>
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
		document.cookie="harga="+data;
	}
	xhr.send();
}	
function ttl(harga){
	var jml=$("#jumlah").val();
	var hg=$("#harga").val();
	var data=jml*hg;
	$("#total1").val(data);
	document.cookie="harga="+data;
}
</script>
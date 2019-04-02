<?php
error_reporting(0);
include("koneksi.php");
if($_POST["simpan"]){
$insert="INSERT INTO menu(nama,harga)VALUES('".$_POST["nama"]."','".$_POST["harga"]."')";
mysqli_query($con,$insert);
echo "<script>alert('Sukses!')</script>";
}
?>
<link rel="stylesheet" href="style/css/bootstrap.min.css" />
<h3>Input Menu</h3>
<form method="POST" action="">
<table border=0 cellpadding=5px>
<tr>
<td>Nama Menu</td>
<td><input type='text' name='nama'></td>
</tr>
<tr>
<td>Harga</td>
<td><input type=number name="harga"></td>
</tr>
<tr>
<td colspan=2><input type='submit' name='simpan' value='Simpan' class='btn btn-primary'></td>
</tr>
</form>
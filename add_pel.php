<?php
error_reporting(0);
include("koneksi.php");
if($_POST["simpan"]){
$insert="INSERT INTO pelanggan(nama,jenis_kel,no_hp,alamat)VALUES('".$_POST["nama"]."','".$_POST["jenis"]."','".$_POST["no"]."','".$_POST["alamat"]."')";
mysqli_query($con,$insert);
echo "<script>alert('Sukses!')</script>";
}
?>
<link rel="stylesheet" href="style/css/bootstrap.min.css" />
<h3>Register Pelanggan</h3>
<form method="POST" action="">
<table border=0 cellpadding=5px>
<tr>
<td>Nama</td>
<td><input type='text' name='nama' required class='form-control form-control-sm' style='width:500px'></td>
</tr>
<tr>
<td>Jenis Kelamin</td>
<td><select name='jenis' class='form-control form-control-sm'><option value='l'>Laki-Laki</option><option value='p'>Perempuan</p></td>
</tr>
<tr>
<td>No Hp</td>
<td><input type='text' name='no' required class='form-control form-control-sm'></td>
</tr>
<tr>
<td>Alamat</td>
<td><input type='text' name='alamat' required class='form-control form-control-sm'></td>
</tr>
</tr>
<tr>
<td colspan=2><input type='submit' name='simpan' value='Simpan' class='btn btn-primary'></td>
</tr>
</form>
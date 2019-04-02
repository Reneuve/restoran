<?php
error_reporting(0);
include("koneksi.php");
if($_POST["simpan"]){
$insert="INSERT INTO user(nama,role)VALUES('".$_POST["nama"]."','".$_POST["role"]."')";
mysqli_query($con,$insert);
echo "<script>alert('Sukses!')</script>";
}
?>
<link rel="stylesheet" href="style/css/bootstrap.min.css" />
<h3>Input User</h3>
<form method="POST" action="">
<table border=0 cellpadding=5px>
<tr>
<td>Username</td>
<td><input type='text' name='nama' class='form-control form-control-sg'></td>
</tr>
<tr>
<td>Role</td>
<td><select name='role' class='form-control form-control-sg'>
<option value='admin'>Admin</option>
<option value='waiter'>Waiter</option>
<option value='kasir'>Kasir</option>

</td>
</tr>
<tr>
<td colspan=2><input type='submit' name='simpan' value='Simpan' class='btn btn-primary'></td>
</tr>
</form>
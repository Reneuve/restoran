<?php
error_reporting(0);
include("koneksi.php");
$d="SELECT * FROM pelanggan where id='".$_GET["id"]."'";
$a=mysqli_fetch_array(mysqli_query($con,$d));
if($_POST["simpan"]){
$insert="UPDATE pelanggan SET nama='".$_POST["nama"]."',jenis_kel='".$_POST["jenis"]."',no_hp='".$_POST["no"]."',alamat='".$_POST["alamat"]."' where id='".$_GET["id"]."'";
mysqli_query($con,$insert);
echo "<script>alert('Edit Sukses!')</script>";
header("Location:list_pel.php");
}
?>
<link rel="stylesheet" href="style/css/bootstrap.min.css" />
<h3>Edit Pelanggan</h3>
<form method="POST" action="">
<table border=0 cellpadding=5px>
<tr>
<td>Nama</td>
<td><input type='text' name='nama' required class='form-control form-control-sm' style='width:500px' value="<?php echo $a["nama"];?>"></td>
</tr>
<tr>
<td>Jenis Kelamin</td>
<td>
<select name='jenis' class='form-control form-control-sm'>
	<option value='l' <?php if($a["jenis_kel"]=="l")echo "selected";?>>Laki-Laki</option>
	<option value='p' <?php if($a["jenis_kel"]=="p")echo "selected";?>>Perempuan</p></td>
</select>
</tr>
<tr>
<td>No Hp</td>
<td><input type='text' name='no' required class='form-control form-control-sm' value="<?php echo $a["no_hp"];?>"></td>
</tr>
<tr>
<td>Alamat</td>
<td><input type='text' name='alamat' required class='form-control form-control-sm' value="<?php echo $a["alamat"];?>"></td>
</tr>
</tr>
<tr>
<td colspan=2><input type='submit' name='simpan' value='Edit' class='btn btn-primary'></td>
</tr>
</form>
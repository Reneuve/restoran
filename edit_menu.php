<?php
error_reporting(0);
include("koneksi.php");
$id=$_GET["id"];
$q="SELECT * FROM menu where id='".$id."'";
$d=mysqli_fetch_array(mysqli_query($con,$q));
if($_POST["simpan"]){
$insert="UPDATE menu set nama='".$_POST["nama"]."',harga='".$_POST["harga"]."' where id='".$id."'";
mysqli_query($con,$insert);
echo "<script>alert('Edit Sukses!')</script>";
header("Location:list_menu.php");
}
?>
<link rel="stylesheet" href="style/css/bootstrap.min.css" />
<h3>Edit Menu</h3>
<form method="POST" action="">
<table border=0 cellpadding=5px>
<tr>
<td>Nama Menu</td>
<td><input type='text' name='nama' class='form-control form-control-sg' value="<?php echo $d["nama"];?>"></td>
</tr>
<tr>
<td>Harga</td>
<td><input type=number name="harga" class='form-control form-control-sg' value="<?php echo $d["harga"];?>"></td>
</tr>
<tr>
<td colspan=2><input type='submit' name='simpan' value='Edit' class='btn btn-primary' style='width:90px'></td>
</tr>
</form>
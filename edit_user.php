<?php
error_reporting(0);
include("koneksi.php");
$q="SELECT * FROM user where id='".$_GET["id"]."'";
$q1=mysqli_query($con,$q);
$d=mysqli_fetch_array($q1);
if($_POST["simpan"]){
$insert="UPDATE user SET nama='".$_POST["nama"]."',role='".$_POST["role"]."' where id='".$_GET["id"]."'";
mysqli_query($con,$insert);
header("Location:list_user.php");
}
?>
<style>
.body{
	font-color:black;
}
</style>
<body class='body'>
<link rel="stylesheet" href="style/css/bootstrap.min.css" />
<h3>Edit User</h3>
<form method="POST" action="">
<table border=0 cellpadding=5px>
<tr>
<td>Username</td>
<td><input type='text' name='nama' class='form-control form-control-sg' value="<?php echo $d["nama"];?>"></td>
</tr>
<tr>
<td>Role</td>
<td><select name='role' class='form-control form-control-sg'>
<option value='admin' <?php if($d["role"]=='admin')echo "selected";?>>Admin</option>
<option value='waiter' <?php if($d["role"]=='waiter')echo "selected";?>>Waiter</option>
<option value='kasir' <?php if($d["role"]=='kasir')echo "selected";?>>Kasir</option>

</td>
</tr>
<tr>
<td colspan=2><input type='submit' name='simpan' value='Simpan' class='btn btn-primary'></td>
</tr>
</form>
</body>
<?php
session_start();
error_reporting(0);
include("koneksi.php");
if($_POST["login"]){
$q=mysqli_query($con,"SELECT * FROM user where nama='".$_POST["nama"]."'");
$d=mysqli_fetch_array($q);
if(sizeof($d)>=1){
if($d["role"]=="admin"){header("Location:admin_index.php");}
else if($d["role"]=="kasir"){header("Location:kasir_index.php");}
else if($d["role"]=="waiter"){header("Location:waiter_index.php");}
else if($d["role"]=="owner"){header("Location:owner_index.php");}
$_SESSION["role"]=$d["role"];
$_SESSION["user"]=$_POST["nama"];
$_SESSION["id"]=$d["id"];
}
else echo "<script>alert('Tidak ada')</script>";
}
?>
<style>
.body{
margin:10% auto;
background-image:url('gambar/tribal.png');
width:50%;
}
.content{
	margin:auto;
	height:50%;
	border-radius:10px;
	background-color
}
</style>
<title>Login RestoranKu</title>
<link rel="stylesheet" href="style/css/bootstrap.min.css" />
<script src="style/js/bootstrap.min.js"></script>
<body class='body'>
<div style="border:1px solid black;border-radius:10px;width:50%;margin:auto;background-color:white">
<div class='content'><center>
<table border=0 cellpadding='10' style='background-color:white;border-radius:10px;'>
<tr>
<td colspan=2><center><h2>Login</h2></td>
</tr>
<form method="POST" action="">
<tr>
<td><b>USER</b></td>
<td><input type='text' name='nama' style='width:90%' class='form-control form-control-sm'></td>
</tr>
<tr>
<td></td>
<td align=left><input type='submit' class='btn btn-primary' name="login" value="Login" style='margin-left:25px'></td>
</tr>
</table>
</form>

<br>
<div style='float:top;margin-left:5px'><h6><u><i style='color:#3333ff'>Dibuat Oleh: Rafael XII-RPL 1</u></i></h6>
</div>
<script></center>
function addMenu(){
document.getElementById("myhtml").src="entri_menu.php";
}
function listPel(){
	document.getElementById("myhtml").src="list_pel.php";
}
function addPel(){
	document.getElementById("myhtml").src="add_pel.php";
}
</script>
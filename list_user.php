<?php
include("koneksi.php");
session_start();
?>
<style>
.table{
	border-collapse:collapse;
	width:100%;
}
</style>
<link rel='stylesheet' href='style/css/bootstrap.min.css'>
<table border=1 class='table' cellpadding=5>
<tr>
<th>No</th>
<th>Username</th>
<th>Role</th>
<th>Action</th>
</tr>
<?php
$no=1;
$user=$_SESSION['user'];
$q="SELECT * FROM user where nama<>'$user'";
$a=mysqli_query($con,$q);
while($d=mysqli_fetch_array($a)){
	?>
	<tr>
	<td><center><?php echo $no++; ?></center></td>
	<td><?php echo $d["nama"];?></td>
	<td><?php echo $d["role"];?></td>
	<td align=center><a href='delete_user.php?id=<?php echo $d["id"];?>'>Delete|</a><a href='edit_user.php?id=<?php echo $d["id"];?>'>Edit</td>
	</tr>
<?php
}
?>
	</table>
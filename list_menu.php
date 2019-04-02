<?php
error_reporting(0);
include("koneksi.php");
if($_POST["cari"]){$query="SELECT * FROM menu where nama like '%".$_POST["caritxt"]."%'";}else{
$query="SELECT * FROM menu order by nama desc";}
$p=mysqli_query($con,$query);
?>
<style>
.table{
	border-collapse:collapse;
	width:100%;
}
.form-control-sg{
height:30px;
margin-top:0px;

margin-bottom:5px;
}
.col-3{
width:1050px;
border:1px solid black;
}
.btn-primary{

	margin-bottom:5px;
}
.cari{
border-radius:4px;
margin-right:5px;
width:500px;
height:38px;
}
</style>
<link rel='stylesheet' href='style/css/bootstrap.min.css'>
<form method="POST" action="">
<input type='text' class='cari' name='caritxt' placeholder='Cari menu'><input type='submit' name='cari' value='Cari' class='btn btn-primary'>
</form>
<table border=1 class='table' cellpadding=5>
<tr>
<th>No</th>
<th>Nama</th>
<th>Harga</th>
<th>Action</th>
</tr>
<?php
$no=1;
while($d=mysqli_fetch_array($p)){
	?>
	<tr>
	<td><center><?php echo $no++; ?></center></td>
	<td><?php echo $d["nama"];?></td>
	<td><?php echo $d["harga"];?></td>
	<td align=center><a href='delete_menu.php?id=<?php echo $d["id"];?>'>Delete|</a><a href='edit_menu.php?id=<?php echo $d["id"];?>'>Edit</td>
	</tr>
<?php
}
?>
	</table>
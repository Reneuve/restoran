<?php
include("koneksi.php");
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
<th>Nama</th>
<th>Jenis Kelamin</th>
<th>No Hp</th>
<th>Alamat</th>
<th>Action</th>
</tr>
<?php
$no=1;
$query="SELECT * FROM pelanggan";
$p=mysqli_query($con,$query);
while($d=mysqli_fetch_array($p)){
	?>
	<tr>
	<td><center><?php echo $no++; ?></center></td>
	<td><?php echo $d["nama"];?></td>
	<td><?php if($d["jenis_kel"]=="l")echo "Laki-laki";else echo "Perempuan"?></td>
	<td><?php echo $d["no_hp"];?></td>
	<td><?php echo $d["alamat"];?></td>
	<td align=center><a href='delete_pel.php?id=<?php echo $d["id"];?>'>Delete|</a><a href='edit_pel.php?id=<?php echo $d["id"];?>'>Edit</td>
	</tr>
<?php
}
?>
	</table>
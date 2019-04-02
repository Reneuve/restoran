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
<head>
<meta http-equiv="refresh" content="10">
</head>
<table border=1 class='table' cellpadding=5>
<tr>
<th>No</th>
<th>Menu</th>
<th>Nama</th>
<th>Jumlah</th>
<th>Pelayan</th>
<th>Action</th>
</tr>
<?php
$no=1;
$query="SELECT P.id,M.`nama` AS menu,PE.`nama` AS nama,P.`jumlah`,U.`nama` AS user FROM pesanan P,pelanggan PE,USER U,menu M WHERE P.`id_pelanggan`=PE.`id` AND P.`id_menu`=M.`id` AND P.`id_user`=U.`id` order by P.id desc";
$p=mysqli_query($con,$query);
while($d=mysqli_fetch_array($p)){
	?>
	<tr>
	<td><center><?php echo $no++; ?></center></td>
	<td><?php echo $d["menu"];?></td>
	<td><?php echo $d["nama"];?></td>
	<td><center><?php echo $d["jumlah"];?></center></td>
	<td><?php echo $d["user"];?></td>
	<td align=center><a href='delete_pesanan.php?id=<?php echo $d["id"];?>'>Delete|</a><a href='edit_pesanan.php?id=<?php echo $d["id"];?>'>Edit</td>
	</tr>
<?php
}
?>
	</table>
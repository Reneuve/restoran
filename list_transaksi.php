<?php
include("koneksi.php");
?>
<style>
.table{
	border-collapse:collapse;
	width:100%;
}
.rounded{
background-color:#00ced1;
color:white;
border-radius:10px;
margin:0px;
padding:0px;
float:right;
width:25;
text-align:center;
}
.jdl{
	margin-bottom:5px;
	width:33%;
	font-family:Arial Black;
}
</style>
<link rel='stylesheet' href='style/css/bootstrap.min.css'>
<?php
$q="SELECT COUNT(id) as id FROM transaksi WHERE STATUS<>1";
$a=mysqli_query($con,$q);
$d=mysqli_fetch_array($a);
?>
<div class='jdl'>Antrian Transaksi <b>:</b><b class='rounded'><?php echo $d["id"];?></b></div>
<table border=1 class='table' cellpadding=5>
<tr>
<th>No</th>
<th>Pelanggan</th>
<th>Menu</th>
<th>Total</th>
<th>Action</th>
</tr>
<?php
$no=1;
$q="SELECT T.id,P.`nama` AS pelanggan,M.`nama` AS menu,T.`total`,T.`bayar` FROM transaksi T,pesanan PE,pelanggan P,menu M,USER U WHERE T.`id_pesanan`=PE.`id` AND M.`id`=PE.`id_menu` AND U.`id`=PE.`id_user` AND P.id=PE.`id_pelanggan` AND T.status<>'1'order by T.id desc";
$a=mysqli_query($con,$q);
while($d=mysqli_fetch_array($a)){
	?>
	<tr>
	<td><center><?php echo $no++; ?></center></td>
	<td><?php echo $d["pelanggan"];?></td>
	<td><?php echo $d["menu"];?></td>
	<td>Rp.<?php echo number_format($d["total"]);?></td>
	<td align=center><a href='bayar_transaksi.php?id=<?php echo $d["id"];?>'>Bayar</a></td>
	</tr>
<?php
}
?>
	</table>
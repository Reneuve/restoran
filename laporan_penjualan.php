<?php
include("koneksi.php");
session_start();
?>
<style>
.table{
	border-collapse:collapse;
	width:70%;
	border:1px solid black;
}
.btn-danger{
	margin-bottom:5px;
}
.footer{
width:70%;
position:relative;
top:500px;
height:0%;
}
.paraf{
float:left;
width:40%;
margin-top:10px;
text-align:center;
height:10%;
border-collapse:collapse;
}
.ttd{
float:right;
border-collapse:collapse;
width:40%;
margin-top:10px;
text-align:center;
height:10%;	
}
.jml{
font-family:Arial Black;

margin:0px;
padding:0px;
text-align:center;
}
</style>
<body>
<center>
<div class='header'>
<h1>RestoranKu</h1>
<p>Laporan Penjualan</p>
</div>
<table border=1 class='table' cellpadding=5>
<tr>
<th>No</th>
<th>Nama Menu</th>
<th>Jumlah Penjualan</th>
</tr>
<?php
$no=1;
$jml=0;
$user=$_SESSION['user'];
$q="SELECT M.nama,SUM(P.jumlah) as jumlah FROM pesanan P,transaksi T,menu M WHERE P.`id_menu`=M.`id` AND T.`id_pesanan`=P.`id` GROUP BY M.nama";
$a=mysqli_query($con,$q);
while($d=mysqli_fetch_array($a)){
	$jml+=$d["jumlah"];
	?>
	<tr>
	<td><center><?php echo $no++; ?></center></td>
	<td><?php echo $d["nama"];?></td>
	<td><center><?php echo $d["jumlah"];?></center></td>
	</tr>
<?php
}
?>
	<tr>
	<td></td>
	<td><p class='jml'>Total:</p></td>
	<td><p class='jml'><?php echo $jml;?></p></td>
	</tr>
	</table>
	<div class='footer'>
	<table border='1' class='paraf'>
	<tr>
	<td>PARAF PEGAWAI</td>
	</tr>
	<tr>
	<td height=100px></td>
	</tr>
	</table>
	<table border='1' class='ttd'>
	<tr>
	<td>TTD Manajemen</td>
	</tr>
	<tr>
	<td height=100px></td>
	</tr>
	</table>
	</div>
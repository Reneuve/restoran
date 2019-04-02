<?php
include("koneksi.php");
$q="SELECT SUM(total) as total FROM `transaksi` where status='1'";
$a=mysqli_query($con,$q);
$d=mysqli_fetch_array($a);
?>
<style>
.rounded{
background-color:#000000;
color:white;
border-radius:10px;
margin:0px;
padding:0px;
float:left;
width:auto;
text-align:center;
}
.body{
width:100%;
}
</style>
<div class='body'>
<h2><div style='float:left'>Total Pendapatan:&nbsp </div>
<div class='rounded'>Rp.<?php echo number_format($d["total"],2);?> </h2></div>
</div>
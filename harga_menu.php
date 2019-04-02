<?php
include("koneksi.php");
$data=$_GET["q"];
$q="SELECT * FROM menu where nama='".$data."'";
$a=mysqli_query($con,$q);
while($d=mysqli_fetch_array($a)){
echo $d["harga"];}
?>
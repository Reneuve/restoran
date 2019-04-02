<?php
include("koneksi.php");
$q="DELETE FROM pesanan where id='".$_GET["id"]."'";
mysqli_query($con,$q);
header("Location:list_pesanan.php");
?>
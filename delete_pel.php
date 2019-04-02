<?php
include("koneksi.php");
$d="DELETE FROM pelanggan where id='".$_GET["id"]."'";
mysqli_query($con,$d);
header("Location:list_pel.php");
?>
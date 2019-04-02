<?php
include("koneksi.php");
$del="delete from menu where id='".$_GET["id"]."'";
mysqli_query($con,$del);
header("Location:list_menu.php");
?>
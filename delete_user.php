<?php
include("koneksi.php");
$del="delete from user where id='".$_GET["id"]."'";
mysqli_query($con,$del);
header("Location:list_user.php");
?>
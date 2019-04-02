<?php
include("koneksi.php");
$term=$_GET["term"];
$string="SELECT * FROM menu WHERE nama like '%".$term."%'";
$result=mysqli_query($con,$string);
while($row=mysqli_fetch_array($result)){
	$json[]=array('value'=>$row["nama"]);
}
echo json_encode($json);
?>

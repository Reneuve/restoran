<?php
include("koneksi.php");
$term=$_GET["term"];
$query="SELECT * FROM pelanggan where nama like '%".$term."%'";
$q=mysqli_query($con,$query);
while($d=mysqli_fetch_array($q)){
	$json[]=array('value'=>$d["nama"]);
}
echo json_encode($json);
<?php
session_start();
include("koneksi.php");
if($_SESSION["role"]!='kasir'){header("Location:home.php");}
?>
<style>
.body{
margin:50px auto;
background-image:url('gambar/tribal.png');
}
.menu ul{
	overflow:hidden;
}
.menu ul li{
	float:left;
	padding:10px;
	list-style-type:none;
}
.content{
	margin:0;
	height:50%;
}
.frame{
	width:90%;
	height:100%;
	border:0px;
	margin-left:5px;
}


.dropdown {
  position: relative;
  display: inline-block;
  margin-left:15px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown:hover .dropdown-content {
display: block;
}
.txtj{
margin:0px;
margin-top:-15px;
margin-left:15px;
}
</style>
<head>
 <title>Kasir</title>
</head>
<link rel="stylesheet" href="style/css/bootstrap.min.css" />
<script src="style/js/bootstrap.min.js"></script>
<body class='body'>
<div style="border:1px solid black;border-radius:10px;width:50%;margin:auto;background-color:white">
<div style='height:50px'><center><h1 style='margin-top:5px'>RestoranKu</h1><br><p style='margin-top:-25px;'>Restoran SMK </p></center></div>
<p align=right style='margin-right:15px'><?php echo $_SESSION["user"];?><br><a href='home.php'>Log Out</a></p>
<hr size=1px color=black>
<marquee><?php echo date("l, d-m-Y");?></marquee>
<hr size=1px color='black'>

<div class='content'>
<iframe id="myhtml" src="list_transaksi.php" class='frame'></iframe>
</div>
<hr size=1px color='black'>
<div style='float:top;margin-left:5px'><h6><i style='color:#3333ff'>Dibuat Oleh: Rafael XII-RPL 1</i></h6>
</div>
<script>
function addTran(){
document.getElementById("myhtml").src="entri_transaksi.php";
}
</script>
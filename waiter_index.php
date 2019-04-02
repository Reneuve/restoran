<?php
session_start();
if($_SESSION["role"]!='waiter'){header("Location:home.php");}
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
.btn-info{
margin-left:15px;
position:relative;
}
</style>

<link rel="stylesheet" href="style/css/bootstrap.min.css" />
<script src="style/js/bootstrap.min.js"></script>
<body class='body'>
<div style="border:1px solid black;border-radius:10px;width:50%;margin:auto;background-color:white">
<div style='height:50px'><center><h1 style='margin-top:5px'>RestoranKu</h1><br><p style='margin-top:-25px;'>Restoran SMK </p></center></div>
<p align=right style='margin-right:15px'><?php echo $_SESSION["user"];?><br><a href='home.php'>Log Out</a></p>
<hr size=1px color=black>

    <!-- Dropdown -->
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle">Pesanan</button>
  <div class="dropdown-content">
    <a class="dropdown-item" href="waiter_index.php">List Pesanan</a>
	<a class="dropdown-item" href="#addPes" onclick="addPes()">Add Pesanan</a>
  </div>
</div>
	<div class="dropdown">
  <button class="btn btn-success dropdown-toggle">Menu</button>
  <div class="dropdown-content">
    <a class="dropdown-item" href="#Listmenu" onclick="listMenu()">List Menu</a>
	<a class="dropdown-item" href="#addPel" onclick="addMenu()">Add Menu</a>
  </div>
</div>
<a href='laporan_penjualan.php' target="_blank"><button class='btn btn-info'>Laporan Penjualan</button></a>
	<!---------------->
<hr size=1px color='black'>
<div class='content'>
<iframe id="myhtml" src="list_pesanan.php" class='frame'></iframe>
</div>
<hr size=1px color='black'>
<div style='float:top;margin-left:5px'><h6><i style='color:#3333ff'>Dibuat Oleh: Rafael XII-RPL 1</i></h6>
</div>
<script>
function addMenu(){
document.getElementById("myhtml").src="entri_menu.php";
}
function listMenu(){
	document.getElementById("myhtml").src="list_menu.php";
}
function addPes(){
	document.getElementById("myhtml").src="add_pesanan.php";
}
</script>
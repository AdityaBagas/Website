<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Kelola Data Pengadaan</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="../assets/css/main.css" />
    </head>
    <body class="is-preload">
<header id="header">
				<a class="logo" href="../index.php">AtmaAuto</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
            </header>
            <nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="logout.php">Logout</a></li>
					<li><a href="sparepart.php">ketersediaan sparepart</a></li>
					<li><a href="informasi.php">informasi bengkel</a></li>
				</ul>
            </nav>
            <section id="cta" class="wrapper">
				<div class="inner">
                <p><font size="+2">Kelola Data Pengadaan</font></p>
				</div>
            </section>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: ../login.php');
}
?>
 
<?php
//including the database connection file
include_once("../conn.php");


 
//fetching data in descending order (lastest entry first)

?>

 
<html>
<head>
    <title>Pengadaan Sparepart</title>
</head>
 
<body>
<a href="../index.php">Home</a> |  <a href="../logout.php">Logout </a>|  <a href="../pengadaan/viewpengadaan.php">lihat data pengadaan sparepart |  <a href="../pengadaan/batal.php">batalkan pengadaan </a>
<br/><br/>
   
</table> 
<form action="" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
 
<?php 
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    
	echo "<b>Hasil pencarian : ".$cari."</b>";
}


?>
 
<table border="1">
	<tr>
		<th>id_sparepart</th>
		<th>nama sparepart</th>
        <th>merk sparepart</th>
        <th>tipe sparepart</th>
        <th>harga jual</th>
        <th>harga beli</th>
        <th>stock</th> 
        <th>action</th>      
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($conn,"SELECT * from sparepart

         where CONCAT(nama_sparepart,tipe_sparepart,merk_sparepart) like '%".$cari."%' 
         ");				
	}else{
		$data = mysqli_query($conn,"SELECT * from sparepart");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_sparepart']; ?></td>
        <td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['merk_sparepart']; ?></td>
        <td><?php echo $d['tipe_sparepart']; ?></td>
        <td><?php echo $d['harga_jual']; ?></td>
        <td><?php echo $d['harga_beli']; ?></td>
        <td><?php echo $d['stock']; ?></td>
        <td><?php echo "<a href=\"pengadaan.php?id_sparepart=$d[id_sparepart]\">Pilih Sparepart</a> | "?></td>;
        
        
	</tr>
	<?php } ?>
</table> 
<footer id="footer">
				<div class="inner">
					<div class="content">
												
						<section>
							<h4>Temui Kami di</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
								<li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
								<li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
							</ul>
						</section>
					</div>
					<div class="copyright">
						&copy; Atmaauto Series Service <a href="https://unsplash.co"></a> <a href="https://coverr.co"></a>.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>  
</body>
</html>
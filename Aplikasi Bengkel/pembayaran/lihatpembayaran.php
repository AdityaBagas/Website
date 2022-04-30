<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Kelola Data Pembayaran</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="../assets/css/main.css" />
    </head>
    <body class="is-preload">
<header id="header">
				<a class="logo" href="../index_cs.php">AtmaAuto</a>
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
                <p><font size="+2">Kelola Data Pembayaran</font></p>
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
$result = mysqli_query($conn, "SELECT * FROM transaksi");
?>
<?php
    include("../conn.php");
 
?>
 
<html>
<head>
    <title>Kelola Pembayaran</title>
</head>
 
<body>
<a href="../index_cs.php">Home</a> | <a href="../logout.php">Logout | <a href="../pembayaran/histori.php">Histori </a>
<br/><br/>
 <h3><b>Transaksi Sparepart</b></h3>  
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
		<th>id_transaksi</th>
		<th>sparepart</th>
        <th>cabang</th>
        <th>CS</th>
        <th>Costumer</th>
        <th>Jumlah</th>
        <th>total</th>
        <th>tanggal</th>
        <th> action</th>
        
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        transaksi.id_transaksi,
        cabang.nama_cabang,
        users.name,
        costumer.nama,
        transaksi.jumlah,
        transaksi.total_transaksi,
        transaksi.status,
        transaksi.tanggal_transaksi
        from transaksi
        INNER JOIN sparepart ON sparepart.id_sparepart = transaksi.id_sparepart
        INNER JOIN cabang ON cabang.id_cabang = transaksi.id_cabang
        INNER JOIN users ON users.id_pegawai = transaksi.id_pegawai
        INNER JOIN costumer ON costumer.id_costumer = transaksi.id_kostumer

         where CONCAT(id_transaksi, name, nama_sparepart, nama_cabang,nama) like '%".$cari."%' and 
        transaksi.status = 'belum selesai'
         ");				
	}else{
		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        transaksi.id_transaksi,
        cabang.nama_cabang,
        users.name,
        costumer.nama,
        transaksi.jumlah,
        transaksi.total_transaksi,
        transaksi.status,
        transaksi.tanggal_transaksi
        from transaksi
        INNER JOIN sparepart ON sparepart.id_sparepart = transaksi.id_sparepart
        INNER JOIN cabang ON cabang.id_cabang = transaksi.id_cabang
        INNER JOIN users ON users.id_pegawai = transaksi.id_pegawai
        INNER JOIN costumer ON costumer.id_costumer = transaksi.id_kostumer
        where transaksi.status = 'belum selesai'");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_transaksi']; ?></td>
        <td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['nama_cabang']; ?></td>
        <td><?php echo $d['name']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['jumlah']; ?></td>
        <td><?php echo $d['total_transaksi']; ?></td>
        <td><?php echo $d['tanggal_transaksi']; ?></td>
        <td><?php echo "<a href=\"bayar.php?id_transaksi=$d[id_transaksi]\">bayar</a> | "?></td>;
        
        
	</tr>
	<?php } ?>
</table> 
<h3><b>Transaksi Servis</b></h3>  
<form action="" method="get">
	<label>Cari :</label>
	<input type="text" name="cari2">
	<input type="submit" value="Cari">
</form>
 
<?php 
if(isset($_GET['cari2'])){
	$cari = $_GET['cari2'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>

<table border="1">
	<tr>
		<th>id_transaksi</th>
		<th>servis</th>
		<th>sparepart</th>
        <th>cabang</th>
        <th>CS</th>
        <th>Costumer</th>
        <th>Jumlah</th>
        <th>total</th>
        <th>tanggal</th>
        <th> action</th>
        
	</tr>
	<?php 
	if(isset($_GET['cari2'])){
		$cari = $_GET['cari2'];
		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
		servis.nama_servis,
        transaksi2.id_transaksi,
        cabang.nama_cabang,
        users.name,
        costumer.nama,
        transaksi2.jumlah_servis,
        transaksi2.total,
        transaksi2.status,
        transaksi2.tanggal
        from transaksi2
		INNER JOIN servis ON servis.id_servis = transaksi2.id_servis
        INNER JOIN sparepart ON sparepart.id_sparepart = transaksi2.id_sparepart
        INNER JOIN cabang ON cabang.id_cabang = transaksi2.id_cabang
        INNER JOIN users ON users.id_pegawai = transaksi2.id_cs
        INNER JOIN costumer ON costumer.id_costumer = transaksi2.id_costumer
         where CONCAT(id_transaksi, name, nama_sparepart, nama_cabang,nama,nama_servis) like '%".$cari."%' and 
        transaksi2.status = 'belum selesai'
         ");				
	}else{
		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
		servis.nama_servis,
        transaksi2.id_transaksi,
        cabang.nama_cabang,
        users.name,
        costumer.nama,
        transaksi2.jumlah_servis,
        transaksi2.total,
        transaksi2.status,
        transaksi2.tanggal
        from transaksi2
		INNER JOIN servis ON servis.id_servis = transaksi2.id_servis
        INNER JOIN sparepart ON sparepart.id_sparepart = transaksi2.id_sparepart
        INNER JOIN cabang ON cabang.id_cabang = transaksi2.id_cabang
        INNER JOIN users ON users.id_pegawai = transaksi2.id_cs
        INNER JOIN costumer ON costumer.id_costumer = transaksi2.id_costumer
        where transaksi2.status = 'belum selesai'");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_transaksi']; ?></td>
		<td><?php echo $d['nama_servis']; ?></td>
        <td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['nama_cabang']; ?></td>
        <td><?php echo $d['name']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['jumlah_servis']; ?></td>
        <td><?php echo $d['total']; ?></td>
        <td><?php echo $d['tanggal']; ?></td>
        <td><?php echo "<a href=\"bayar1.php?id_transaksi=$d[id_transaksi]\">bayar</a> | "?></td>;
        
        
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
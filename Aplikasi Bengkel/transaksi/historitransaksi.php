<?php //setelah mengupdate status selesai pada cetak pemesanan, maka data akan dimasukan kedalam histori barang masuk ?>


<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Histori Barang Masuk</title>
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
                <p><font size="+2">Histori</font></p>
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
$result = mysqli_query($conn, "SELECT transaksi.id_transaksi,
transaksi.jumlah,
transaksi.status,
transaksi.tanggal_transaksi,
sparepart.nama_sparepart,
sparepart.merk_sparepart,
sparepart.harga_beli,
cabang.nama_cabang,
costumer.nama,
users.name
FROM transaksi
INNER JOIN sparepart ON sparepart.id_sparepart = transaksi.id_sparepart 
INNER JOIN cabang ON cabang.id_cabang = transaksi.id_cabang
INNER JOIN costumer ON costumer.id_costumer = transaksi.id_costumer 
INNER JOIN users ON users.id_pegawai = transaksi.id_pegawai
where transaksi.status='selesai'");

?>

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
 
 <a href="../index_cs.php">Home</a> | <a href="../logout.php">Logout | <a href="../transaksi/laporanterlaris.php">cetak laporan sparepart terlaris </a>

<table border="1">
	<tr>
		<th>id_transaksi</th>
		<th>nama sparepart</th>
        <th>merk sparepart</th>
        <th>jumlah</th>
        <th>total</th>
<th>cabang</th>
<th>nama pembeli</th>
<th>nama CS</th>
<th>status</th>
        <th>tanggal</th>
        
	</tr>
    <?php 
    if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
						
	
	
		
		$data = mysqli_query($conn,"SELECT transaksi.id_transaksi,
        transaksi.jumlah,
        transaksi.status,
        transaksi.tanggal_transaksi,
        sparepart.nama_sparepart,
        sparepart.merk_sparepart,
        sparepart.harga_beli,
        cabang.nama_cabang,
        costumer.nama,
        users.name
        FROM transaksi
        INNER JOIN sparepart ON sparepart.id_sparepart = transaksi.id_sparepart 
        INNER JOIN cabang ON cabang.id_cabang = transaksi.id_cabang
        INNER JOIN costumer ON costumer.id_costumer = transaksi.id_costumer 
        INNER JOIN users ON users.id_pegawai = transaksi.id_pegawai
        
        where CONCAT(id_transaksi, nama_sparepart,merk_sparepart,nama,name,nama_cabang) 
        like '%".$cari."%' and where transaksi.status='selesai'");				
	}else{ 
        $data = mysqli_query($conn, "SELECT transaksi.id_transaksi,
        transaksi.jumlah,
        transaksi.status,
        transaksi.tanggal_transaksi,
        sparepart.nama_sparepart,
        sparepart.merk_sparepart,
        sparepart.harga_beli,
        cabang.nama_cabang,
        costumer.nama,
        users.name
        FROM transaksi
        INNER JOIN sparepart ON sparepart.id_sparepart = transaksi.id_sparepart 
        INNER JOIN cabang ON cabang.id_cabang = transaksi.id_cabang
        INNER JOIN costumer ON costumer.id_costumer = transaksi.id_kostumer 
        INNER JOIN users ON users.id_pegawai = transaksi.id_pegawai
        where transaksi.status='selesai'");		
    }
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
        <td><?php echo $d['id_transaksi']; ?></td>
        <td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['merk_sparepart']; ?></td>
        <td><?php echo $d['jumlah']; ?></td>
        <td><?php echo $d['harga_beli']*$d['jumlah']; ?></td>
        <td><?php echo $d['nama_cabang']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['name']; ?></td>
        <td><?php echo $d['status']; ?></td>
        <td><?php echo $d['tanggal_transaksi']; ?></td>
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
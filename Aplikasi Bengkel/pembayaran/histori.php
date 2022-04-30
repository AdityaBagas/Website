<?php //setelah mengupdate status selesai pada cetak pemesanan, maka data akan dimasukan kedalam histori barang masuk ?>


<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Histori </title>
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
$result = mysqli_query($conn, "SELECT pembayaran_sparepart.id_pembayaran,
pembayaran_sparepart.id_transaksi,
pembayaran_sparepart.total,
pembayaran_sparepart.diskon,
pembayaran_sparepart.bayar,
pembayaran_sparepart.kembalian,
pembayaran_sparepart.tanggal_pembayaran,
costumer.nama,
users.name
from pembayaran_sparepart
INNER JOIN costumer ON costumer.id_costumer = pembayaran_sparepart.id_costumer
INNER JOIN users ON users.id_pegawai = pembayaran_sparepart.id_pegawai");

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
 
 <a href="../index_cs.php">Home</a> | <a href="../logout.php">Logout </a>

<table border="1">
	<tr>
		<<th>id_pembayaran</th>
		<th>id_transaksi</th>
        <th>nama kasir<th>

        <th>total</th>
        <th>diskon</th>
        <th>bayar</th>
        <th>kembalian</th>
        <th>Tanggal Pembayaran</th>
        
	</tr>
    <?php 
    if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
						
	
	
		
		$data = mysqli_query($conn,"SSELECT pembayaran_sparepart.id_pembayaran,
        pembayaran_sparepart.id_transaksi,
        pembayaran_sparepart.total,
        pembayaran_sparepart.diskon,
        pembayaran_sparepart.bayar,
        pembayaran_sparepart.kembalian,
        pembayaran_sparepart.tanggal_pembayaran,
 
        users.name
        from pembayaran_sparepart

        INNER JOIN users ON users.id_pegawai = pembayaran_sparepart.id_pegawai
        where CONCAT(nama,name,id_pembayaran) like '%".$cari."%'");				
	}else{ 
        $data = mysqli_query($conn, "SELECT pembayaran_sparepart.id_pembayaran,
        pembayaran_sparepart.id_transaksi,
        pembayaran_sparepart.total,
        pembayaran_sparepart.diskon,
        pembayaran_sparepart.bayar,
        pembayaran_sparepart.kembalian,
        pembayaran_sparepart.tanggal_pembayaran,
 
        users.name
        from pembayaran_sparepart

        INNER JOIN users ON users.id_pegawai = pembayaran_sparepart.id_pegawai");		
    }
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
    <td><?php echo $d['id_pembayaran']; ?></td>
        <td><?php echo $d['id_transaksi']; ?></td>
        <td><?php echo $d['name']; ?></td>
        <td><?php echo "|" ?></td>

        <td><?php echo $d['total']; ?></td>
        <td><?php echo $d['diskon']; ?></td>
        <td><?php echo $d['bayar']; ?></td>
        <td><?php echo $d['kembalian']; ?></td>
        <td><?php echo $d['tanggal_pembayaran']; ?></td>
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
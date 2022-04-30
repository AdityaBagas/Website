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
                <p><font size="+2">Histori Barang Masuk</font></p>
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
$result = mysqli_query($conn, "SELECT histori_sparepart.id_histori, 
histori_sparepart.tanggal, 
pengadaan.jumlah, 
pengadaan.total, 
pengadaan.status, 
sparepart.nama_sparepart,
 sparepart.merk_sparepart, 
 sparepart.tipe_sparepart, 
 sparepart.kode_sparepart, 
 sparepart.harga_beli, 
 supplier.nama_supplier, 
 sales.nama_sales,
sales.telp_sales 
FROM pengadaan 
INNER JOIN histori_sparepart ON histori_sparepart.id_pengadaan = pengadaan.id_pengadaan 
INNER JOIN sales ON sales.id_sales = pengadaan.id_sales 
INNER JOIN sparepart ON sparepart.id_sparepart = pengadaan.id_sparepart 
INNER JOIN supplier ON supplier.id_supplier = pengadaan.id_supplier 
where pengadaan.status='lunas'");

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
 


<table border="1">
	<tr>
		<th>nama sparepart</th>
        <th>merk sparepart</th>
        <th>harga beli</th>
        <th>jumlah</th>
        <th>total</th>
        <th>nama supplier</th>
        <th>nama sales</th>
        <th>tanggal</th>
        
	</tr>
    <?php 
    if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
						
	
	
		
		$data = mysqli_query($conn,"SELECT  
        pengadaan.jumlah, 
        pengadaan.total_pengadaan, 
        pengadaan.status, 
        pengadaan.tanggal_pengadaan, 
        sparepart.nama_sparepart,
         sparepart.merk_sparepart, 
         sparepart.tipe_sparepart, 
         sparepart.kode_sparepart, 
         sparepart.harga_beli, 
         supplier.nama_supplier, 
         sales.nama_sales,
        sales.telp_sales 
        FROM pengadaan 
        INNER JOIN sales ON sales.id_sales = pengadaan.id_sales 
        INNER JOIN sparepart ON sparepart.id_sparepart = pengadaan.id_sparepart 
        INNER JOIN supplier ON supplier.id_supplier = pengadaan.id_supplier 
        where CONCAT( nama_sparepart,nama_supplier,nama_sales) 
        like '%".$cari."%'");				
	}else{ 
        $data = mysqli_query($conn, "SELECT  
        pengadaan.jumlah, 
        pengadaan.total_pengadaan, 
        pengadaan.status, 
        pengadaan.tanggal_pengadaan,
        sparepart.nama_sparepart,
         sparepart.merk_sparepart, 
         sparepart.tipe_sparepart, 
         sparepart.kode_sparepart, 
         sparepart.harga_beli, 
         supplier.nama_supplier, 
         sales.nama_sales,
        sales.telp_sales 
        FROM pengadaan 
        INNER JOIN sales ON sales.id_sales = pengadaan.id_sales 
        INNER JOIN sparepart ON sparepart.id_sparepart = pengadaan.id_sparepart 
        INNER JOIN supplier ON supplier.id_supplier = pengadaan.id_supplier 
        ");		
    }
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
        <td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['merk_sparepart']; ?></td>
        <td><?php echo $d['harga_beli']; ?></td>
        <td><?php echo $d['jumlah']; ?></td>
        <td><?php echo $d['harga_beli']*$d['jumlah']; ?></td>
        <td><?php echo $d['nama_supplier']; ?></td>
        <td><?php echo $d['nama_sales']; ?></td>
        <td><?php echo $d['tanggal_pengadaan']; ?></td>
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
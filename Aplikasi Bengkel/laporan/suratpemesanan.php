<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Surat Pemesanan Barang</title>
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
                <p><font size="+2">Surat Pemesanan barang</font></p>
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
$result = mysqli_query($conn, "SELECT pengadaan.id_pengadaan,
pengadaan.jumlah,
pengadaan.total,
pengadaan.status,
pengadaan.tanggal_pengadaan,
sparepart.nama_sparepart,
sparepart.merk_sparepart,
sparepart.tipe_sparepart,
sparepart.kode_sparepart,
sparepart.harga_beli,
supplier.nama_supplier,
supplier.alamat_supplier,
supplier.telp_supplier
 FROM pengadaan
 INNER JOIN sparepart ON sparepart.id_sparepart = pengadaan.id_sparepart
 INNER JOIN supplier ON supplier.id_supplier = pengadaan.id_supplier
 ORDER BY pengadaan.tanggal_pengadaan");

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
<?php
if(isset($_POST['update'])){
// including the database connection file
include_once("conn.php");
$id_pengadaan=$_GET['id_pengadaan'];
$result = mysqli_query($conn, "UPDATE pengadaan,sparepart
SET , 
pengadaan.status_barang='Selesai', 
sparepart.stock=pengadaan.jumlah+sparepart.stock 
WHERE pengadaan.status_barang='belum selesai'");

//redirectig to the display page. In our case, it is view.php

   header('Location: suratpemesanan.php');
}
?>


 


<table border="1">
	<tr>
		<th>id pengadaan</th>
		<th>nama sparepart</th>
        <th>merk sparepart</th>
        <th>tipe sparepart</th>
        <th>kode sparepart</th>
        <th>harga beli</th>
        <th>jumlah</th>
        <th>total</th>
        <th>status</th>
		<th>status_barang</th>
        <th>nama supplier</th>
        <th>alamat supplier</th>
        <th>telp supplier</th>
        <th>tanggal pengadaan</th>
        
	</tr>
    <?php 
    if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
						
	
	
		
		$data = mysqli_query($conn,"select pengadaan.id_pengadaan,
        pengadaan.jumlah,
        pengadaan.total,
		pengadaan.status,
		pengadaan.status_barang,
        pengadaan.tanggal_pengadaan,
        sparepart.nama_sparepart,
        sparepart.merk_sparepart,
        sparepart.tipe_sparepart,
        sparepart.kode_sparepart,
        sparepart.harga_beli,
        supplier.nama_supplier,
        supplier.alamat_supplier,
        supplier.telp_supplier 
        from pengadaan 
        INNER JOIN sparepart ON sparepart.id_sparepart = pengadaan.id_sparepart
 INNER JOIN supplier ON supplier.id_supplier = pengadaan.id_supplier
        where CONCAT(id_pengadaan, nama_sparepart,nama_supplier,merk_sparepart,tipe_sparepart,kode_sparepart,status,tanggal_pengadaan) 
        like '%".$cari."%' and pengadaan.status_barang='belum selesai'");				
	}else{
        $data = mysqli_query($conn, "SELECT pengadaan.id_pengadaan,
pengadaan.jumlah,
pengadaan.total,
pengadaan.status,
pengadaan.status_barang,
pengadaan.tanggal_pengadaan,
sparepart.nama_sparepart,
sparepart.merk_sparepart,
sparepart.tipe_sparepart,
sparepart.kode_sparepart,
sparepart.harga_beli,
supplier.nama_supplier,
supplier.alamat_supplier,
supplier.telp_supplier
 FROM pengadaan
 INNER JOIN sparepart ON sparepart.id_sparepart = pengadaan.id_sparepart
 INNER JOIN supplier ON supplier.id_supplier = pengadaan.id_supplier
 where pengadaan.status_barang='belum selesai'");		
    }
	while($d = mysqli_fetch_array($data)){
	?>
	<form name="form1" method="post" action="">
	<tr>
        <td><?php echo $d['id_pengadaan']; ?></td>
        <td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['merk_sparepart']; ?></td>
        <td><?php echo $d['tipe_sparepart']; ?></td>
        <td><?php echo $d['kode_sparepart']; ?></td>
        <td><?php echo $d['harga_beli']; ?></td>
        <td><?php echo $d['jumlah']; ?></td>
        <td><?php echo $d['harga_beli']*$d['jumlah']; ?></td>
        <td><?php echo $d['status']; ?></td>
		<td><?php echo $d['status_barang']; ?></td>
        <td><?php echo $d['nama_supplier']; ?></td>
        <td><?php echo $d['alamat_supplier']; ?></td>
        <td><?php echo $d['telp_supplier']; ?></td>
        <td><?php echo $d['tanggal_pengadaan']; ?></td>
        
		
		<td> <input type='submit' name='update' value='update' ></td>;
		
	</tr>
	</form>
	<?php } ?>
    
</table>


<input  type="button" value="Cetak Data" onclick="window.location.href='pdfpengadaan.php'">

            
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
			<script>
		function print_d(){
			window.open("print.php","_blank");
		}
	</script>
</body>
</html>
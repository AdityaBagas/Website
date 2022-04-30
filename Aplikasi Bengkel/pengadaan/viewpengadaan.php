<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Kelola Data Transaksi Sparepart</title>
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
                <p><font size="+2">Kelola Data pengadaan Sparepart</font></p>
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
		<th>id_pengadaan</th>
		<th>supplier</th>
        <th>cabang</th>
        <th>sparepart</th>
        <th>sales</th>
        <th>jumlah</th>
        
        <th>total</th>
        <th>tanggal</th>
        <th>action</th>
        
        
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        cabang.nama_cabang,
        sales.nama_sales,
        supplier.nama_supplier,
        pengadaan.id_pengadaan,
        pengadaan.jumlah,
        pengadaan.total_pengadaan,
        pengadaan.tanggal_pengadaan
       
        from pengadaan
        INNER JOIN sparepart ON sparepart.id_sparepart = pengadaan.id_sparepart
        INNER JOIN cabang ON cabang.id_cabang = pengadaan.id_cabang
        INNER JOIN sales ON sales.id_sales = pengadaan.id_sales
        INNER JOIN supplier ON supplier.id_supplier = pengadaan.id_supplier

         where CONCAT(id_pengadaan, nama_sales,nama_supplier, nama_cabang) like '%".$cari."%' 
         ");				
	}else{
		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        cabang.nama_cabang,
        sales.nama_sales,
        supplier.nama_supplier,
        pengadaan.id_pengadaan,
        pengadaan.jumlah,
        pengadaan.total_pengadaan,
        pengadaan.tanggal_pengadaan
       
        from pengadaan
        INNER JOIN sparepart ON sparepart.id_sparepart = pengadaan.id_sparepart
        INNER JOIN cabang ON cabang.id_cabang = pengadaan.id_cabang
        INNER JOIN sales ON sales.id_sales = pengadaan.id_sales
        INNER JOIN supplier ON supplier.id_supplier = pengadaan.id_supplier
        ");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_pengadaan']; ?></td>
   
        <td><?php echo $d['nama_supplier']; ?></td>
        <td><?php echo $d['nama_cabang']; ?></td>
        <td><?php echo $d['nama_sparepart']; ?></td>

        <td><?php echo $d['nama_sales']; ?></td>
        <td><?php echo $d['jumlah']; ?></td>
        <td><?php echo $d['total_pengadaan']; ?></td>
        <td><?php echo $d['tanggal_pengadaan']; ?></td>
        <td><?php echo "<a href=\"editpengadaan.php?id_pengadaan=$d[id_pengadaan]\">Edit</a> | 
        <a href=\"deletepengadaan.php?id_pengadaan=$d[id_pengadaan]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"?></td>;
        
        
        
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
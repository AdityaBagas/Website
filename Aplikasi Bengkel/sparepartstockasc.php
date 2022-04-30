<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
<head>
    <title>Ketersediaan spareparts</title>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="is-preload">
<header id="header">
				<a class="logo" href="index.php">AtmaAuto</a>
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
            <section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Spareparts</h2>
					</header>
                <?php include("conn.php"); 
                $data = mysqli_query($conn, "SELECT * FROM sparepart order by stock asc");?>
                <form action="" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
<a href="sparepartstockasc.php">descending</a>
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];?><br><?php
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysqli_query($conn,"select * from sparepart where CONCAT(id_sparepart, nama_sparepart, merk_sparepart, tipe_sparepart,kode_sparepart) like '%".$cari."%' 
    order by stock asc");	?>
    <?php			
}while($d = mysqli_fetch_array($data)){?>
<section class="wrapper">
				<div class="inner">
					
                        <div class="highlights">
 
                        <section>
							<div class="content">
								<header>
								<h4 align="center">Nama sparepart   : <?php echo $d['nama_sparepart'];?></h4>		
								</header>
                                <h4 align="center">stock sparepart   : <?php echo $d['stock'];?></h4>
                                
                                <h4 align="center">merk sparepart   : <?php echo $d['merk_sparepart'];?></h4>
                                <h4 align="center">tipe sparepart   : <?php echo $d['tipe_sparepart'];?></h4>
                                <h4 align="center">kode sparepart   : <?php echo $d['kode_sparepart'];?></h4>
                                <h4 align="center">Harga sparepart   : <?php echo $d['harga_jual'];?></h4>
							</div>
						</section>
                        </div>
				</div>
			</section> 
            </div>
				</div>
                </div>
                        <?php } ?>
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
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
                <p><font size="+2">Kelola Data Transaksi Sparepart</font></p>
				</div>
            </section>

            <table border="1">
	<tr>
		<th>id_transaksi</th>
		<th> servis</th>
        <th>cs</th>
        <th>costumer</th> 
        <th>kendaraan</th>  
        <th>tanggal</th> 
        <th>status</th>  
        <th>action</th>      
	</tr>
	<?php include("../conn.php"); 
	if(isset($_GET['cari'])){
        
		$cari = $_GET['cari'];
		$data = mysqli_query($conn,"SELECT transaksi2.id_transaksi,
        transaksi2.tanggal,
        transaksi2.status,
        servis.nama_servis,
        users.name,
        costumer.nama,
        kendaraan.nama_kendaraan
         from transaksi2
         INNER JOIN servis ON servis.id_servis = transaksi2.id_servis
         INNER JOIN users ON users.id_pegawai = transaksi2.id_cs
         INNER JOIN costumer ON costumer.id_costumer = transaksi2.id_costumer
         INNER JOIN kendaraan ON kendaraan.id_kendaraan = transaksi2.id_kendaraan

         where CONCAT(nama_servis,status,id_transaksi,name,nama,nama_kendaraan) like '%".$cari."%' 
         and status='belum_selesai'
         ");				
	}else{
		$data = mysqli_query($conn,"SELECT transaksi2.id_transaksi,
        transaksi2.tanggal,
        transaksi2.status,
        servis.nama_servis,
        users.name,
        costumer.nama,
        kendaraan.nama_kendaraan
         from transaksi2
         INNER JOIN servis ON servis.id_servis = transaksi2.id_servis
         INNER JOIN users ON users.id_pegawai = transaksi2.id_cs
         INNER JOIN costumer ON costumer.id_costumer = transaksi2.id_costumer
         INNER JOIN kendaraan ON kendaraan.id_kendaraan = transaksi2.id_kendaraan
         where status='belum selesai'");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_transaksi']; ?></td>
        <td><?php echo $d['nama_servis']; ?></td>
        <td><?php echo $d['name']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['nama_kendaraan']; ?></td>
        <td><?php echo $d['tanggal']; ?></td>
        <td><?php echo $d['status']; ?></td>
        
        <td><?php echo "<a href=\"ubahstatus.php?id_transaksi=$d[id_transaksi]\">ubah status</a> | "?></td>;
        
        
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
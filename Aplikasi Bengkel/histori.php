<!DOCTYPE HTML>
<html>
	<head>
    <title>Histori servis</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
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
                <p><font size="+2">Histori Servis Kostumer</font></p>
				</div>
            </section>
<?php

?>
 
<?php
//including the database connection file
include_once("conn.php");



//fetching data in descending order (lastest entry first)


?>

<form action="" method="get">
	<label>Masukan Plat nomor kendaraan :</label>
	<input type="text" name="cari">
    <label>telp :</label>
	<input type="text" name="telp">
	<input type="submit" value="Cari">
</form>
 
<?php 
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $telp = $_GET['telp'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
 


    <?php 
    if(isset($_GET['cari'])){
      
        
        if(empty($cari)||empty($telp)){
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='histori.php'>Go back</a>";
        }else {
            $result = mysqli_query($conn, "SELECT * FROM costumer WHERE telp='$telp'")
            or die("Could not execute the select query.");
            
            $row = mysqli_fetch_assoc($result);
            
            if(is_array($row) && !empty($row)) {
                $cari = $_GET['cari'];
			?>			
        <table border="1">
        <tr>
            <th>id_transaksi</th>
            <th>nama sparepart</th>
            <th>servis</th>
            <th>cabang</th>
            <th>nama costumer</th>
    <th>nama cs</th>
    <th>plat kendaraan</th>
    <th>merk kendaraan</th>
    <th>nama kendaraan</th>
            <th>total</th>
            <th>status</th>
            <th>tanggal</th>
            
        </tr>
	<?php
		
		$data = mysqli_query($conn,"SELECT transaksi2.id_transaksi,
        transaksi2.total,
        transaksi2.status,
        transaksi2.tanggal,
        sparepart.nama_sparepart,
        servis.nama_servis,
        cabang.nama_cabang,
        costumer.nama,
        users.name,
        kendaraan.plat,
        kendaraan.merk,
        kendaraan.nama_kendaraan
        FROM transaksi2
        INNER JOIN sparepart ON sparepart.id_sparepart = transaksi2.id_sparepart 
        INNER JOIN cabang ON cabang.id_cabang = transaksi2.id_cabang
        INNER JOIN costumer ON costumer.id_costumer = transaksi2.id_costumer 
        INNER JOIN users ON users.id_pegawai = transaksi2.id_cs
        INNER JOIN kendaraan ON kendaraan.id_kendaraan = transaksi2.id_kendaraan
        INNER JOIN servis ON servis.id_servis = transaksi2.id_servis
        where CONCAT(plat) 
        like '%".$cari."%'");		
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $d['id_transaksi']; ?></td>
                <td><?php echo $d['nama_sparepart']; ?></td>
                <td><?php echo $d['nama_servis']; ?></td>
                <td><?php echo $d['nama_cabang']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['name']; ?></td>
                <td><?php echo $d['plat']; ?></td>
                <td><?php echo $d['merk']; ?></td>
                <td><?php echo $d['nama_kendaraan']; ?></td>
                <td><?php echo $d['total']; ?></td>
                <td><?php echo $d['status']; ?></td>
                <td><?php echo $d['tanggal']; ?></td>
            </tr>
            <?php } ?>
            
        </table> 
        <?php } else {
                ?>
                <center><font size="30" align="center"> no telp tidak ada</font></center>;
                
                <br/>;
                <center><a href='login.php'><font size="20">Go back</font></a></center>;?> 
        <?php } 
             
                
    
	


?>
<?php } ?>
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
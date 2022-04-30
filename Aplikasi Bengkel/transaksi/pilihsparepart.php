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
<?php
//getting id from url
$id_costumer = $_GET['id_costumer'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM detil_servis WHERE id_costumer='$id_costumer'");
while($res = mysqli_fetch_array($result))
{
    
	$id_costumer = $_GET['id_costumer'];
	$id_kendaraan = $res['id_kendaraan'];
	$id_servis = $res['id_servis'];
    $harga_servis = $res['harga_servis'];
    $jumlah=$res['jumlah'];
   
}

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
}?>
<h3>data servis</h3>
    <table border="1">
	<tr>
        <th>kendaraan</th>
		<th>costumer</th>
        <th>nama servis<th>
        <th>harga<th>
		<th>jumlah<th>
		<th>sub total<th>
       
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
        $data = mysqli_query($conn,"SELECT kendaraan.nama_kendaraan,
        costumer.nama,
        servis.nama_servis,
		detil_servis.harga_servis,
		detil_servis.id_costumer,
		detil_servis.jumlah
        from detil_servis
        INNER JOIN kendaraan ON kendaraan.id_kendaraan = detil_servis.id_kendaraan
		INNER JOIN costumer ON costumer.id_costumer = detil_servis.id_costumer
		INNER JOIN servis ON servis.id_servis = detil_servis.id_servis
        where CONCAT(nama_servis,nama_kendaraan,nama) like '%".$cari."%' and detil_servis.id_costumer=$id_costumer and status='belum selesai'");				
	}else{
		$data = mysqli_query($conn,"SELECT kendaraan.nama_kendaraan,
        costumer.nama,
        servis.nama_servis,
		detil_servis.harga_servis,
		detil_servis.id_costumer,
		detil_servis.jumlah
        from detil_servis
        INNER JOIN kendaraan ON kendaraan.id_kendaraan = detil_servis.id_kendaraan
		INNER JOIN costumer ON costumer.id_costumer = detil_servis.id_costumer
		INNER JOIN servis ON servis.id_servis = detil_servis.id_servis
        where detil_servis.id_costumer=$id_costumer and status='belum selesai' ");		
    }
    $sub_total=null;
    $total_transaksi=null;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
    <?php $sub_total= $d['jumlah']*$d['harga_servis'];?>
		<td><?php echo $d['nama_kendaraan']; ?></td>
        <td><?php echo $d['nama']; ?></td>
		<td><?php echo $d['nama_servis']; ?></td>
		<td><?php echo '|'; ?></td>
        <td><?php echo $d['harga_servis']; ?></td>
        <td><?php echo '|'; ?></td>
		<td><?php echo $d['jumlah']; ?></td>
		<td><?php echo '|'; ?></td>
        <td><?php echo $sub_total ?></td>
        <?php $total_transaksi=$total_transaksi+$sub_total?>

        
	</tr>
	<?php } ?>
</table>   

 <h4>total servis Rp <?php echo $total_transaksi ?></h4>
<html>
<head>
    <title>Transaksi Sparepart</title>
</head>
 
<body>
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
        <td><?php echo "<a href=\"sparepart.php?id_sparepart=$d[id_sparepart]\">Pilih Sparepart</a> | "?></td>;
        
        
	</tr>
	<?php } ?>
</table> 
<?php echo "<a href=\"lanjutservis.php?id_costumer=$id_costumer\">Skip Pemilihan Sparepart</a> | "?>;
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
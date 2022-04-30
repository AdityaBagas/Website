<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Kelola Data Sparepart</title>
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
                <p><font size="+2">Kelola Data Sparepart</font></p>
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
$result = mysqli_query($conn, "SELECT * FROM sparepart");
?>
<?php
    include("../conn.php");
 
    if(isset($_POST['submit'])) {
       // $id_sparepart = $_POST['id_sparepart'];
        $nama_sparepart = $_POST['nama_sparepart'];
        $merk_sparepart = $_POST['merk_sparepart'];
        $tipe_sparepart = $_POST['tipe_sparepart'];
        $kode_sparepart = $_POST['kode_sparepart'];
        $harga_jual = $_POST['harga_jual'];
        $harga_beli = $_POST['harga_beli'];
        $stock_minim = $_POST['stock_minim'];
        $stock = $_POST['stock'];
 
        if( $nama_sparepart == "" || $merk_sparepart == ""|| $tipe_sparepart == "" || $kode_sparepart == ""|| $harga_jual == ""|| $harga_beli == ""|| $stock_minim == ""|| $stock == "") {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='lihatsparepart.php'>Go back</a>";
        } else if(!$harga_jual=="((-|\\+)?[0-9]+(\\.[0-9]+)?)+" || !$harga_beli=="((-|\\+)?[0-9]+(\\.[0-9]+)?)+"|| !$stock_minim=="((-|\\+)?[0-9]+(\\.[0-9]+)?)+" || !$stock=="((-|\\+)?[0-9]+(\\.[0-9]+)?)+"){
            echo "Harga dan stock harus berupa angka";
            echo "<br/>";
            echo "<a href='lihatsparepart.php'>Go back</a>";
        }
        else {
            mysqli_query($conn, "INSERT INTO sparepart(nama_sparepart,merk_sparepart,tipe_sparepart, kode_sparepart,harga_jual, harga_beli, stock_minim,stock) 
            VALUES('$nama_sparepart','$merk_sparepart','$tipe_sparepart', '$kode_sparepart','$harga_jual', '$harga_beli', '$stock_minim', '$stock')")
            or die(mysqli_error($conn));
            
            echo "Regist sparepart success";
            echo "<br/>";
            echo "<a href='lihatsparepart.php'>tambahkan lagi</a>";
        }
    } 
     
    else {
?>
        <p><font size="+2">Kelola Data Sparepart</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
              
                <tr> 
                    <td width="20%">nama sparepart</td>
                    <td><input type="text" name="nama_sparepart"></td>
                </tr>
                <tr> 
                    <td>merk sparepart</td>
                    <td><input type="text" name="merk_sparepart"></td>
                </tr>
                <tr> 
                    <td>tipe sparepart</td>
                    <td><input type="text" name="tipe_sparepart"></td>
                </tr> 
                <tr> 
                    <td>kode sparepart</td>
                    <td><input type="text" name="kode_sparepart"></td>
                </tr>   
                <tr> 
                    <td>harga jual</td>
                    <td><input type="number" name="harga_jual"></td>
                </tr>       
                <tr> 
                    <td>harga beli</td>
                    <td><input type="number" name="harga_beli"></td>
                </tr>
                <tr> 
                    <td>stock minim</td>
                    <td><input type="number" name="stock_minim"></td>
                </tr>
                <tr> 
                    <td>stock</td>
                    <td><input type="number" name="stock"></td>
                </tr>
                <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Tambahkan Sparepart"></td>
                </tr>
            </table>
        </form>
        
    <?php
    }
    ?>
 
<html>
<head>
    <title>Kelola Sparepart</title>
</head>
 
<body>
<a href="../index.php">Home</a> | <a href="cekstock.php">Cek Stock</a> | <a href="../logout.php">Logout</a>
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
		<th>nama_sparepart</th>
        <th>merk_sparepart</th>
        <th>tipe_sparepart</th>
        <th>kode_sparepart</th>
        <th>harga_jual</th>
        <th>harga_beli</th>
        <th>stock_minim</th>
        <th>stock</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($conn,"select * from sparepart where CONCAT(id_sparepart, nama_sparepart, merk_sparepart, tipe_sparepart,kode_sparepart) like '%".$cari."%'");				
	}else{
		$data = mysqli_query($conn,"select * from sparepart");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_sparepart']; ?></td>
        <td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['merk_sparepart']; ?></td>
        <td><?php echo $d['tipe_sparepart']; ?></td>
        <td><?php echo $d['kode_sparepart']; ?></td>
        <td><?php echo $d['harga_jual']; ?></td>
        <td><?php echo $d['harga_beli']; ?></td>
        <td><?php echo $d['stock_minim']; ?></td>
        <td><?php echo $d['stock']; ?></td>
        <td><?php echo "<a href=\"editsparepart.php?id_sparepart=$d[id_sparepart]\">Edit</a> | 
        <a href=\"deletesparepart.php?id_sparepart=$d[id_sparepart]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"?></td>;
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
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
                <p><font size="+2">Kelola Data Cabang</font></p>
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
$result = mysqli_query($conn, "SELECT * FROM cabang");
?>
<?php
    include("../conn.php");
 
    if(isset($_POST['submit'])) {
       // $id_sparepart = $_POST['id_sparepart'];
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
 
        if( $nama == "" || $telp == ""|| $alamat == "" ) {
            ?>
            <center><font size="30">field is empty</font></center>
            <br/>";
            <center><font size="20"><a href='lihatcabang.php'>Go back</a></font></center>;
            <?php
        } 
        else {
            mysqli_query($conn, "INSERT INTO cabang(nama_cabang,telp_cabang,alamat_cabang) 
            VALUES('$nama','$telp','$alamat')")
            or die(mysqli_error($conn));
            
            ?>
            <center><font size="30">regist cabang succes</font></center>
            <br/>";
            <center><font size="20"><a href='lihatcabang.php'>Go back</a></font></center>;
            <?php
        }
    } 
     
    else {
?>
        <p><font size="+2">Kelola Data Costumer</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
              
                <tr> 
                    <td width="20%">nama Cabang</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr> 
                    <td>telp cabang</td>
                    <td><input type="number" name="telp"></td>
                </tr>
                <tr> 
                    <td>alamat cabang</td>
                    <td><input type="text" name="alamat"></td>
                </tr> 
                
                <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Tambahkan Cabang"></td>
                </tr>
            </table>
        </form>
        
    <?php
    }
    ?>
 
<html>
<head>
    <title>Kelola Costumer</title>
</head>
 
<body>
<a href="../index_cs.php">Home</a> | <a href="../logout.php">Logout</a>
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
		<th>id_cabang</th>
		<th>nama cabang</th>
        <th>telp</th>
        <th>alamat</th>
        <th>action</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($conn,"select * from cabang where CONCAT(nama_cabang,alamat_cabang) like '%".$cari."%'");				
	}else{
		$data = mysqli_query($conn,"select * from cabang");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_cabang']; ?></td>
        <td><?php echo $d['nama_cabang']; ?></td>
        <td><?php echo $d['telp_cabang']; ?></td>
        <td><?php echo $d['alamat_cabang']; ?></td>
        <td><?php echo "<a href=\"editcabang.php?id_cabang=$d[id_cabang]\">Edit</a> | 
        <a href=\"deletecabang.php?id_cabang=$d[id_cabang]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"?></td>;
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
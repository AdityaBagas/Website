<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Kelola Data Kendaraan</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="../assets/css/main.css" />
    </head>
    <body class="is-preload">
<header id="header">
				<a class="logo" href="../index_cs.php">AtmaAuto</a>
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
                <p><font size="+2">Kelola Data Kendaraan</font></p>
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
$result = mysqli_query($conn, "SELECT * FROM kendaraan");
?>
<?php
    include("../conn.php");
 
    if(isset($_POST['submit'])) {
       // $id_sparepart = $_POST['id_sparepart'];
        $nama_kendaraan = $_POST['nama_kendaraan'];
        $merk = $_POST['merk'];
        $plat = $_POST['plat'];
        $id_costumer = $_POST['id_costumer'];
 
        if( $id_costumer == "" || $nama_kendaraan == "" || $merk == ""|| $plat == "" ) {
            ?>
            <center><font size="30">field is empty</font></center>
            <br/>";
            <center><font size="20"><a href='lihatkendaraan.php'>Go back</a></font></center>;
            <?php
        } 
        else {
            mysqli_query($conn, "INSERT INTO kendaraan(id_costumer,nama_kendaraan,merk,plat) 
            VALUES('$id_costumer','$nama_kendaraan','$merk','$plat')")
            or die(mysqli_error($conn));
            
            ?>
            <center><font size="30">regist kendaraan succes</font></center>
            <br/>";
            <center><font size="20"><a href='lihatkendaraan.php'>Go back</a></font></center>;
            <?php
        }
    } 
     
    else {
?>
        <p><font size="+2">Kelola Data Costumer</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
            <tr>
            <td width="10%">Costumer</td>	
			
            <td>
            <select name="id_costumer">
            <option value="" selected="selected">-</option>
                <?php
                include "../conn.php";
                $combobox = "SELECT * FROM costumer";
                $hasil = mysqli_query($conn,$combobox);
                while ($data = mysqli_fetch_assoc($hasil))
                {
                    echo "<option value='".$data['id_costumer']."'>".$data['nama']."</option>";				
                }
                ?>
            </select>
            </td>
            <tr>
                <tr> 
                    <td width="20%">nama kendaraan</td>
                    <td><input type="text" name="nama_kendaraan"></td>
                </tr>
                <tr> 
                    <td>merk</td>
                    <td><input type="text" name="merk"></td>
                </tr>
                <tr> 
                    <td>plat</td>
                    <td><input type="text" name="plat"></td>
                </tr> 
                
                <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Tambahkan Costumer"></td>
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
		<th>id_kendaraan</th>
        <th>nama costumer</th>
		<th>nama kendaraan</th>
        <th>merk</th>
        <th>plat</th>
        <th>action</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
        $data = mysqli_query($conn,"SELECT kendaraan.id_kendaraan,
        kendaraan.nama_kendaraan,
        kendaraan.merk,
        kendaraan.plat,
        costumer.nama from kendaraan 
        INNER JOIN costumer ON costumer.id_costumer = kendaraan.id_costumer
        where CONCAT(nama,nama_kendaraan,merk,plat) like '%".$cari."%'");				
	}else{
		$data = mysqli_query($conn,"SELECT kendaraan.id_kendaraan,
        kendaraan.nama_kendaraan,
        kendaraan.merk,
        kendaraan.plat,
        costumer.nama from kendaraan 
        INNER JOIN costumer ON costumer.id_costumer = kendaraan.id_costumer");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_kendaraan']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['nama_kendaraan']; ?></td>
        <td><?php echo $d['merk']; ?></td>
        <td><?php echo $d['plat']; ?></td>
        <td><?php echo "<a href=\"editkendaraan.php?id_kendaraan=$d[id_kendaraan]\">Edit</a> | 
        <a href=\"deletekendaraan.php?id_kendaraan=$d[id_kendaraan]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"?></td>;
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
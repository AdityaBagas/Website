<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Kelola Data Servis</title>
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
                <p><font size="+2">Kelola Data Servis</font></p>
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
$result = mysqli_query($conn, "SELECT * FROM servis");

?>
<?php
    include("../conn.php");
 
    if(isset($_POST['submit'])) {
           

        //$id_servis = $_POST['id_servis'];
        $nama_servis = $_POST['nama_servis'];
        $harga_servis = $_POST['harga_servis'];
        $deskripsi = $_POST['deskripsi'];        
 
        if($nama_servis == "" || $harga_servis == ""|| $deskripsi == "" ) {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='lihatservis.php'>Go back||</a>";
        } else if(!$harga_servis=="((-|\\+)?[0-9]+(\\.[0-9]+)?)+" ){
            echo "Harga harus berupa angka";
            echo "<br/>";
            echo "<a href='lihatservis.php'>Go back||</a>";
        }
        else {
            mysqli_query($conn, "INSERT INTO servis(nama_servis,harga_servis,deskripsi) 
            VALUES('$nama_servis','$harga_servis','$deskripsi')")
            or die(mysqli_error($conn));
            
            echo "Regist sparepart success";
            echo "<br/>";
            echo "<a href='lihatservis.php'>tambahkan lagi||</a>";
        }
    } 
    
     
    else {
?>

        
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
                
                <tr> 
                    <td>nama servis</td>
                    <td><input type="text" name="nama_servis"></td>
                </tr>
                <tr> 
                    <td>harga servis</td>
                    <td><input type="number" name="harga_servis"></td>
                </tr>
                <tr> 
                    <td>deskripsi</td>
                    <td><input type="text" name="deskripsi"></td>
                </tr> 
                <tr> 
                    <td>&nbsp;</td>
                    
                
                <td><input type="submit" name="submit" value="tambahkan servis"></td>
            </tr>
            </table>
        </form>
        
    <?php
    }
    ?>
 
<html>

 
<body>

   
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
		<th>id_servis</th>
		<th>nama_servis</th>
        <th>harga_servis</th>
        <th>deskripsi</th>
        <th>action</th>
        
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($conn,"select * from servis where CONCAT(id_servis, nama_servis) like '%".$cari."%'");				
	}else{
		$data = mysqli_query($conn,"select * from servis");		
    }
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_servis']; ?></td>
        <td><?php echo $d['nama_servis']; ?></td>
        <td><?php echo $d['harga_servis']; ?></td>
        <td><?php echo $d['deskripsi']; ?></td>
       
        <td><?php echo "<a href=\"editservis.php?id_servis=$d[id_servis]\">Edit</a> | <a href=\"deleteservis.php?id_servis=$d[id_servis]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"?></td>;
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
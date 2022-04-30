<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Ubah Password</title>
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
                <p><font size="+2">Ubah Password</font></p>
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
$result = mysqli_query($conn, "SELECT * FROM users");

?>
<?php
    include("../conn.php");
  
    
     
    
?>
        <p><font size="+2">ubah Password</font></p>
        
        
    
 
<html>
<head>
    <title>Data Pegawai</title>
</head>
 
<body>
<a href="../index.php">Home</a> |  <a href="../logout.php">Logout</a>
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
		<th>id_pegawai</th>
		<th>cabang</th>
        <th>role</th>
        <th>nama</th>
        <th>alamat</th>
        <th>telp</th>
        <th>username</th>
		<th>password</th>
        
        
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($conn,"SELECT users.id_pegawai,
        users.name,
        users.alamat,
        users.telp,
        users.username,
		users.password,
        cabang.nama_cabang,
        role.nama_role from users
        INNER JOIN cabang ON cabang.id_cabang = users.id_cabang
        INNER JOIN role ON role.id_role = users.id_role
         where CONCAT(id_pegawai, name, nama_cabang, username,nama_role) like '%".$cari."%'");				
	}else{
		$data = mysqli_query($conn,"SELECT users.id_pegawai,
        users.name,
        users.alamat,
        users.telp,
        users.username,
		users.password,
        cabang.nama_cabang,
        role.nama_role 
        from users
        INNER JOIN cabang ON cabang.id_cabang = users.id_cabang
        INNER JOIN role ON role.id_role = users.id_role");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_pegawai']; ?></td>
        <td><?php echo $d['nama_cabang']; ?></td>
        <td><?php echo $d['nama_role']; ?></td>
        <td><?php echo $d['name']; ?></td>
        <td><?php echo $d['alamat']; ?></td>
        <td><?php echo $d['telp']; ?></td>
        <td><?php echo $d['username']; ?></td>
		<td><?php echo $d['password']; ?></td>

        
        
	</tr>
	<?php } ?>
</table> 
<a href="ubahpassword.php">Ubah Password</a>
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
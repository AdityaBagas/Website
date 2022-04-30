<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Kelola Data Supplier</title>
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
                <p><font size="+2">Kelola Data Supplier</font></p>
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
$result = mysqli_query($conn, "SELECT * FROM supplier");

?>
<?php
    include("../conn.php");
 
    if(isset($_POST['submit'])) {
           

        //$id_supplier = $_POST['id_supplier'];
        $nama_supplier = $_POST['nama_supplier'];
        $alamat_supplier = $_POST['alamat_supplier'];
        $telp_supplier = $_POST['telp_supplier'];        
 
        if($nama_supplier == "" || $alamat_supplier == ""|| $telp_supplier == "" ) {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='lihatsupplier.php'>Go back||</a>";
        } 
        else {
            mysqli_query($conn, "INSERT INTO supplier(nama_supplier,alamat_supplier,telp_supplier) 
            VALUES('$nama_supplier','$alamat_supplier','$telp_supplier')")
            or die(mysqli_error($conn));
            
            echo "Regist supplier success";
            echo "<br/>";
            echo "<a href='lihatsupplier.php'>tambahkan lagi||</a>";
        }
    } 
    
     
    else {
?>
        <p><font size="+2">Kelola Data Supplier</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">               
                <tr> 
                    <td>nama supplier</td>
                    <td><input type="text" name="nama_supplier"></td>
                </tr>
                <tr> 
                    <td>alamat supplier</td>
                    <td><input type="text" name="alamat_supplier"></td>
                </tr>
                <tr> 
                    <td>telp supplier</td>
                    <td><input type="text" name="telp_supplier"></td>
                </tr> 
                <tr> 
                    <td>&nbsp;</td>
                    
                
                <td><input type="submit" name="submit" value="tambahkan supplier"></td>
            </tr>
            </table>
        </form>
        
    <?php
    }
    ?>
 
<html>
<head>
    <title>Kelola Supplier</title>
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
		<th>id_supplier</th>
		<th>nama_supplier</th>
        <th>alamat_supplier</th>
        <th>telp_supplier</th>
        
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($conn,"select * from supplier where CONCAT(id_supplier, nama_supplier) like '%".$cari."%'");				
	}else{
		$data = mysqli_query($conn,"select * from supplier");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_supplier']; ?></td>
        <td><?php echo $d['nama_supplier']; ?></td>
        <td><?php echo $d['alamat_supplier']; ?></td>
        <td><?php echo $d['telp_supplier']; ?></td>
       
        <td><?php echo "<a href=\"editsupplier.php?id_supplier=$d[id_supplier]\">Edit</a> | <a href=\"deletesupplier.php?id_supplier=$d[id_supplier]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"?></td>;
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
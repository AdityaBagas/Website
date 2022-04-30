<!DOCTYPE HTML>
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
<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: ../login.php');
}
?>
 
<?php
// including the database connection file
include_once("../conn.php");
 
if(isset($_POST['update']))
{    
    $id_sparepart = $_POST['id_sparepart'];
        $nama_sparepart = $_POST['nama_sparepart'];
        $merk_sparepart = $_POST['merk_sparepart'];
        $tipe_sparepart = $_POST['tipe_sparepart'];
        $kode_sparepart = $_POST['kode_sparepart'];
        $harga_jual = $_POST['harga_jual'];
        $harga_beli = $_POST['harga_beli'];
        $stock_minim = $_POST['stock_minim'];
        $stock = $_POST['stock'];
    
    // checking empty fields
    if(empty($id_sparepart) || empty($nama_sparepart) || empty($merk_sparepart)) {                
        if(empty($name)) {
            echo "<font color='red'> field is empty.</font><br/>";
        }
        
        if(empty($qty)) {
            echo "<font color='red'> field is empty.</font><br/>";
        }
        
        if(empty($price)) {
            echo "<font color='red'> field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE sparepart SET id_sparepart='$id_sparepart', nama_sparepart='$nama_sparepart',merk_sparepart='$merk_sparepart', tipe_sparepart='$tipe_sparepart', kode_sparepart='$kode_sparepart', harga_jual='$harga_jual', harga_beli='$harga_beli' , stock_minim='$stock_minim', stock='$stock' WHERE id_sparepart=$id_sparepart");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: lihatsparepart.php");
    }
}
?>
<?php
//getting id from url
$id_sparepart = $_GET['id_sparepart'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM sparepart WHERE id_sparepart=$id_sparepart");
while($res = mysqli_fetch_array($result))
{
    $id_sparepart = $_GET['id_sparepart'];
    
    $name_sparepart = $res['nama_sparepart'];
    $merk_sparepart = $res['merk_sparepart'];
    $tipe_sparepart = $res['tipe_sparepart'];
    $kode_sparepart = $res['kode_sparepart'];
    $harga_jual = $res['harga_jual'];
    $harga_beli = $res['harga_beli'];
    $stock_minim = $res['stock_minim'];
    $stock = $res['stock'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a> | <a href="lihatsparepart.php">View Sparepart</a> | <a href="logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editsparepart.php">
        <table border="0">           
                <tr> 
                    <td>nama sparepart</td>
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
                    <td><input type="text" name="harga_jual"></td>
                </tr>       
                <tr> 
                    <td>harga beli</td>
                    <td><input type="text" name="harga_beli"></td>
                </tr>
                <tr> 
                    <td>stock minim</td>
                    <td><input type="text" name="stock_minim"></td>
                </tr>
                <tr> 
                    <td>stock</td>
                    <td><input type="text" name="stock"></td>
                </tr>
            <tr>
                <td><input type="hidden" name="id_sparepart" value=<?php echo $_GET['id_sparepart'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
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
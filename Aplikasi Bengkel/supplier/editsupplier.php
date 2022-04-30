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
// including the database connection file
include_once("../conn.php");
 
if(isset($_POST['update']))
{    
    $id_supplier = $_POST['id_supplier'];
        $nama_supplier = $_POST['nama_supplier'];
        $alamat_supplier = $_POST['alamat_supplier'];
        $telp_supplier = $_POST['telp_supplier'];
        
    
    // checking empty fields
    if(empty($id_supplier) || empty($nama_supplier)|| empty($alamat_supplier)|| empty($telp_supplier)) {                
        
            echo "<font color='red'>field is empty.</font><br/>";
                 
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE supplier SET id_supplier='$id_supplier', nama_supplier='$nama_supplier',alamat_supplier='$alamat_supplier', telp_supplier='$telp_supplier' WHERE id_supplier=$id_supplier");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: lihatsupplier.php");
    }
}
?>
<?php
//getting id from url
$id_supplier = $_GET['id_supplier'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM supplier WHERE id_supplier=$id_supplier");
while($res = mysqli_fetch_array($result))
{
    $id_supplier = $_GET['id_supplier'];
    
   
        $nama_supplier = $res['nama_supplier'];
        $alamat_supplier = $res['alamat_supplier'];
        $telp_supplier = $res['telp_supplier'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="../index.php">Home</a> | <a href="lihatsupplier.php">View Supplier</a> | <a href="../logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editsupplier.php">
        <table border="0">           
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
                <td><input type="hidden" name="id_supplier" value=<?php echo $_GET['id_supplier'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
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
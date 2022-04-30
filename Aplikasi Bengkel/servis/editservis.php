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
    $id_servis = $_POST['id_servis'];
        $nama_servis = $_POST['nama_servis'];
        $harga_servis = $_POST['harga_servis'];
        $deskripsi = $_POST['deskripsi'];
    
    // checking empty fields
    if(empty($nama_servis) || empty($harga_servis)|| empty($deskripsi)) {                

            echo "<font color='red'> field is empty.</font><br/>";
                
    }else if(!$harga_servis=="((-|\\+)?[0-9]+(\\.[0-9]+)?)+" ){
        echo "Harga harus berupa angka";
        echo "<br/>";
        echo "<a href='editservis.php'>Go back||</a>";
    }
    else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE servis SET id_servis='$id_servis', nama_servis='$nama_servis',harga_servis='$harga_servis', deskripsi='$deskripsi' WHERE id_servis=$id_servis");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: lihatservis.php");
    }
}
?>
<?php
//getting id from url
$id_servis = $_GET['id_servis'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM servis WHERE id_servis=$id_servis");
while($res = mysqli_fetch_array($result))
{
    $id_servis = $_GET['id_servis'];
    
    $nama_servis = $res['nama_servis'];
    $harga_servis = $res['harga_servis'];
    $deskripsi = $res['deskripsi'];

}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="../index.php">Home</a> | <a href="lihatservis.php">View Servis</a> | <a href="../logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editservis.php">
        <table border="0">           
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
                <td><input type="hidden" name="id_servis" value=<?php echo $_GET['id_servis'];?>></td>
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
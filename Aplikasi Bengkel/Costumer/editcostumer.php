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
                <p><font size="+2">Kelola Data Costumer</font></p>
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
    $id_costumer = $_POST['id_costumer'];
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        
    
    // checking empty fields
    if(empty($id_costumer) || empty($nama) || empty($telp) || empty($alamat) ) {                
        
        ?>
        <center><font size="30">field is empty</font></center>
        <br/>";
        <center><font size="20"><a href='editcostumer.php'>Go back</a></font></center>;
        <?php
               
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE costumer SET id_costumer='$id_costumer', nama='$nama',alamat='$alamat', telp='$telp' WHERE id_costumer=$id_costumer");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: lihatcostumer.php");
    }
}
?>
<?php
//getting id from url
$id_costumer = $_GET['id_costumer'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM costumer WHERE id_costumer=$id_costumer");
while($res = mysqli_fetch_array($result))
{
    $id_costumer = $_GET['id_costumer'];
    
    $name = $res['nama'];
    $alamat = $res['alamat'];
    $telp = $res['telp'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="../index_cs.php">Home</a> | <a href="lihatcostumer.php">View Costumer</a> | <a href="../logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editcostumer.php">
        <table border="0">           
                <tr> 
                    <td>nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr> 
                    <td>telp</td>
                    <td><input type="number" name="telp"></td>
                </tr>
                <tr> 
                    <td>alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr> 
                
            <tr>
                <td><input type="hidden" name="id_costumer" value=<?php echo $_GET['id_costumer'];?>></td>
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
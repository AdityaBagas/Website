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
    $id_sales = $_POST['id_sales'];
        $nama = $_POST['nama_sales'];
        $telp = $_POST['telp_sales'];
        $id_supplier = $_POST['id_supplier'];
        
    
    // checking empty fields
    if(empty($id_sales) || empty($nama) || empty($telp) || empty($id_supplier) ) {                
        
        ?>
        <center><font size="30">field is empty</font></center>
        <br/>";
        <center><font size="20"><a href='editsales.php'>Go back</a></font></center>;
        <?php
               
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE sales SET id_sales='$id_sales', nama_sales='$nama', telp_sales='$telp' , id_supplier='$id_supplier' WHERE id_sales=$id_sales");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: lihatsales.php");
    }
}
?>
<?php
//getting id from url
$id_sales = $_GET['id_sales'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM sales WHERE id_sales=$id_sales");
while($res = mysqli_fetch_array($result))
{
    $id_sales= $_GET['id_sales'];
    
   
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="../index_cs.php">Home</a> | <a href="lihatsales.php">View sales</a> | <a href="../logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editsales.php">
        <table border="0">           
                <tr> 
                    <td>nama</td>
                    <td><input type="text" name="nama_sales"></td>
                </tr>
                <tr> 
                    <td>telp</td>
                    <td><input type="number" name="telp_sales"></td>
                </tr>
                <tr>
                <td width="10%">Supplier</td>	
			
            <td>
            <select name="id_supplier">
            <option value="" selected="selected">-</option>
                <?php
                include "../conn.php";
                $combobox = "SELECT * FROM supplier";
                $hasil = mysqli_query($conn,$combobox);
                while ($data = mysqli_fetch_assoc($hasil))
                {
                    echo "<option value='".$data['id_supplier']."'>".$data['nama_supplier']."</option>";				
                }
                ?>
            </select>
            </td>
            </tr>
                
            <tr>
                <td><input type="hidden" name="id_sales" value=<?php echo $_GET['id_sales'];?>></td>
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
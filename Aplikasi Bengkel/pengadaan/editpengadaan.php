<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Kelola Data Pengadaan</title>
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
                <p><font size="+2">Edit Data Pengadaan</font></p>
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
    $id_pengadaan = $_POST['id_pengadaan'];
    $id_supplier = $_POST['id_supplier'];
    $id_sparepart = $_POST['id_sparepart'];
    $jumlah = $_POST['jumlah'];
    
    $tanggal_pengadaan = $_POST['tanggal_pengadaan'];
    
    // checking empty fields
    if(empty($id_pengadaan) ||empty($id_supplier) ||empty($id_sparepart) ||empty($jumlah)  || empty($tanggal_pengadaan)) {                
       
            echo "<font color='red'> field is empty.</font><br/>";
                
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE pengadaan SET id_pengadaan='$id_pengadaan', id_supplier='$id_supplier',id_sparepart='$id_sparepart', jumlah='$jumlah', tanggal_pengadaan='$tanggal_pengadaan'  WHERE id_pengadaan=$id_pengadaan");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: viewpengadaan.php");
    }
}
?>
<?php
//getting id from url
$id_pengadaan = $_GET['id_pengadaan'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM pengadaan WHERE id_pengadaan=$id_pengadaan");
while($res = mysqli_fetch_array($result))
{
    $id_pengadaan = $_GET['id_pengadaan'];
    
    $id_supplier = $res['id_supplier'];
    $id_sparepart = $res['id_sparepart'];
    $jumlah = $res['jumlah'];
    $total = $res['total_pengadaan'];
    $status = $res['status'];
    $tanggal_pengadaan = $res['tanggal_pengadaan'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="../index.php">Home</a> | <a href="lihatpengadaan.php">View Pengadaan</a> | <a href="../logout.php">Logout</a>
    <br/><br/>
    <?php echo $id_pengadaan ?>
    
    <form name="form1" method="post" action="editpengadaan.php">
        <table border="0">
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
                <td width="10%">Sparepart</td>	
			
            <td>
            <select name="id_sparepart">
            <option value="" selected="selected">-</option>
                <?php
                include "../conn.php";
                $combobox = "SELECT * FROM sparepart";
                $hasil = mysqli_query($conn,$combobox);
                while ($data = mysqli_fetch_assoc($hasil))
                {
                    echo "<option value='".$data['id_sparepart']."'>".$data['nama_sparepart']."</option>";				
                }
                ?>
            </select>
            </td>
			
	</tr>
                <tr> 
                    <td>jumlah</td>
                    <td><input type="number" name="jumlah"></td>
                </tr> 
                      
                <tr> 
                    <td>Tanggal Pengadaan</td>
                    <td><input type="date" name="tanggal_pengadaan"></td>
                </tr>
                
            <tr>
                <td><input type="hidden" name="id_pengadaan" value=<?php echo $_GET['id_pengadaan'];?>></td>
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
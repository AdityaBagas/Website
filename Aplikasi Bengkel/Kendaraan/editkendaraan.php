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
					<li><a href="index_cs.php">Home</a></li>
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
// including the database connection file
include_once("../conn.php");
 
if(isset($_POST['update']))
{    
    $id_kendaraan = $_POST['id_kendaraan'];
    $id_costumer = $_POST['id_costumer'];
    $nama_kendaraan = $_POST['nama_kendaraan'];
    $merk = $_POST['merk'];
    $plat = $_POST['plat'];
    
    
    // checking empty fields
    if(empty($id_costumer) || empty($id_kendaraan) ||empty($nama_kendaraan)|| empty($plat) || empty($merk))   {                
        
            echo "<font color='red'>field is empty.</font><br/>"; 
                
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE kendaraan SET id_kendaraan='$id_kendaraan', id_costumer='$id_costumer', nama_kendaraan='$nama_kendaraan', merk='$merk', plat='$plat' WHERE id_kendaraan=$id_kendaraan");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: lihatkendaraan.php");
    }
}
?>
<?php
//getting id from url
$id_kendaraan = $_GET['id_kendaraan'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM kendaraan WHERE id_kendaraan=$id_kendaraan");
while($res = mysqli_fetch_array($result))
{
    $id_kendaraan = $_GET['id_kendaraan'];
    
    $nama_kendaraan = $res['nama_kendaraan'];
    $merk = $res['merk'];
    $plat = $res['plat'];
    $id_costumer = $res['id_costumer'];

   
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="../index_cs.php">Home</a> | <a href="lihatkendaraan.php">View Pegawai</a> | <a href="../logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editkendaraan.php">
        <table border="0">
        <tr>
		<td width="10%">costumer</td>	
			
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
			
	</tr>

                <tr> 
                    <td>nama kendaraan</td>
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
                <td><input type="hidden" name="id_kendaraan" value=<?php echo $_GET['id_kendaraan'];?>></td>
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
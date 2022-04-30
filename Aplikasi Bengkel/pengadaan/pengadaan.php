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
                <p><font size="+2">Kelola Data Pengadaan</font></p>
				</div>
            </section>
            <?php
if(!isset($_SESSION['valid'])) {
    header('Location: ../login.php');
}
?>
 
<?php
include_once("../conn.php");
 

?>
    <?php
//getting id from url
$id_sparepart = $_GET['id_sparepart'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM sparepart WHERE id_sparepart='$id_sparepart'");
while($res = mysqli_fetch_array($result))
{
    $id_sparepart = $_GET['id_sparepart'];
    $nama_sparepart = $res['nama_sparepart'];
    $merk_sparepart = $res['merk_sparepart'];
    $harga_beli = $res['harga_beli'];
    $stock=$res['stock'];
   
}
?>
<?php
    include("../conn.php");
 
    if(isset($_POST['submit'])) {
       // $id_sparepart = $_POST['id_sparepart'];
        
        
        
        $id_supplier= $_POST['id_supplier'];
        $jumlah= $_POST['jumlah'];
 
        
        
 
        if( $jumlah == ""  ) {
            ?>
            <center><font size="30">field is empty</font></center>
            <br/>";
            <center><font size="20"><a href='pengadaan.php'>Go back</a></font></center>;
            <?php
        } 
        
        else {
            mysqli_query($conn, "insert into detil_pengadaan (id_sparepart,harga_beli,jumlah,status,id_supplier) 
            values ('$id_sparepart','$harga_beli','$jumlah','belum selesai','$id_supplier')")
            or die(mysqli_error($conn));
            
          
            ?>
            <center><font size="30">tambahkan barang lagi ?</font></center>
            <br/>";
            <center><font size="20"><a href='lihatpengadaan.php'>ya</a></font></center>;
            <br/>
            <center><font size="20"><?php echo "<a href=\"lanjutpengadaan.php?id_supplier=$id_supplier\">tidak</a>  "?></font></center>;
            <?php
        }
    } else {
?>
<p><font size="+2">Kelola Data Pembayaran</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
<tr> 
                    <td>Nama Sparepart </td>
                    <td><?php echo $nama_sparepart ?></td>
                   
                </tr>
                <tr> 
                
                </tr>
                </tr>
               
		
                <tr>
		<td>Supplier</td>	
			
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
                    <td>jumlah</td>
                    <td><input type="number" name="jumlah"></td>
                </tr>
                
                 
                <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Tambahkan Barang"></td>
                </tr>
            </table>
        </form>
        <?php
    }
    ?>
    
 


 
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
  
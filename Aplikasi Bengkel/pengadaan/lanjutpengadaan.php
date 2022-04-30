<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Kelola Data Pembayaran</title>
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
$id_supplier = $_GET['id_supplier'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM detil_pengadaan WHERE id_supplier='$id_supplier'");
while($res = mysqli_fetch_array($result))
{
    $id_supplier = $_GET['id_supplier'];
    $harga_beli = $res['harga_beli'];
    $id_sparepart= $res['id_sparepart'];
    $jumlah = $res['jumlah'];
    $status = $res['status'];
   
}
?>
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
<td>barang belanjaan</td>
    <table border="1">
	<tr>
        <th>sparepart</th>
		<th>harga beli</th>
        <th>jumlah<th>
        <th>sub total<th>
       
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
        $data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        detil_pengadaan.harga_beli,
        detil_pengadaan.jumlah
        from detil_pengadaan
        INNER JOIN sparepart ON sparepart.id_sparepart = detil_pengadaan.id_sparepart
        where CONCAT(nama_sparepart) like '%".$cari."%' and id_supplier=$id_supplier and status='belum selesai'");				
	}else{
		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        detil_pengadaan.harga_beli,
        detil_pengadaan.jumlah
        from detil_pengadaan
        INNER JOIN sparepart ON sparepart.id_sparepart = detil_pengadaan.id_sparepart
        where id_supplier=$id_supplier and status='belum selesai'");		
    }
    $sub_total=null;
    $total_pengadaan=null;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
    <?php $sub_total= $d['jumlah']*$d['harga_beli'];?>
		<td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['harga_beli']; ?></td>
        <td><?php echo $d['jumlah']; ?></td>
        <td><?php echo '|'; ?></td>
        <td><?php echo $sub_total ?></td>
        <?php $total_pengadaan=$total_pengadaan+$sub_total?>

        
	</tr>
	<?php } ?>
</table>   
<?php
    include("../conn.php");
    if(isset($_POST['update'])) {
        mysqli_query($conn, "UPDATE detil_transaksi SET status='selesai' WHERE 'id_costumer'=$id_costumer");
    }
    if(isset($_POST['submit'])) {
       // $id_sparepart = $_POST['id_sparepart'];
        
        $tanggal_pengadaan = $_POST['tanggal_pengadaan'];
        $id_cabang = $_POST['id_cabang'];

        $id_sales = $_POST['id_sales'];

 
        
        
 
        if( $id_cabang == "" ||  $id_sales == "" ) {
            ?>
            <center><font size="30">field is empty</font></center>
            <br/>";
            <center><font size="20"><a href='lanjutpengadaan.php'>Go back</a></font></center>;
            <?php
        } 
        
        else {
            mysqli_query($conn, "insert into pengadaan(id_sparepart,id_cabang,id_sales,id_supplier,jumlah,total_pengadaan,status_barang,tanggal_pengadaan) 
            values ('$id_sparepart','$id_cabang','$id_sales','$id_supplier','$jumlah','$total_pengadaan','belum selesai','$tanggal_pengadaan')")
            or die(mysqli_error($conn));
            
            
            ?>
            <center><font size="30">regist pengadaan succes</font></center>
            <center><font size="20"><a href='lihatpengadaan.php'>Go back</a></font></center>;
            <center><font size="20"><?php echo "<a href=\"../laporan/pdfpengadaan.php?id_supplier=$id_supplier\">cetak surat pemesanan</a>  "?></font></center>;
            <br/>";
            
            <?php
        }
    } else {
?>
<p><font size="+0">total pengadaan Rp <?php echo $total_pengadaan?></font></p>
<p><font size="+2">Kelola Data Pengadaan</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
<tr> 
                    <td>id supplier </td>
                    <td><?php echo $id_supplier ?></td>
                   
                </tr>
                
                <tr>
                <td width="10%">Cabang</td>	
			
            <td>
            <select name="id_cabang">
            <option value="" selected="selected">-</option>
                <?php
                include "../conn.php";
                $combobox = "SELECT * FROM cabang";
                $hasil = mysqli_query($conn,$combobox);
                while ($data = mysqli_fetch_assoc($hasil))
                {
                    echo "<option value='".$data['id_cabang']."'>".$data['nama_cabang']."</option>";				
                }
                ?>
            </select>
            </td>
			
	</tr>
    
    <tr>
		<td>Sales</td>	
			
		<td>
		<select name="id_sales">
        <option value="" selected="selected">-</option>
			<?php
            include "../conn.php";
			$combobox = "SELECT * FROM sales";
			$hasil = mysqli_query($conn,$combobox);
			while ($data = mysqli_fetch_assoc($hasil))
			{
				echo "<option value='".$data['id_sales']."'>".$data['nama_sales']."</option>";				
			}
			?>
		</select>
        </td>
			
    </tr>
    <tr> 
                    <input type="hidden" id="status" name="status1" value="belum selesai">
                </tr> 
                <tr> 
                    <td>tanggal</td>
                    <td><input type="date" name="tanggal_pengadaan"></td>
                </tr> 
                 
                <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Tambahkan pengadaan"></td>
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
  
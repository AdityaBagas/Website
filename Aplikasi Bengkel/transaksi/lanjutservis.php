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
                <p><font size="+2">Kelola Data transaksi servis</font></p>
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
$id_costumer = $_GET['id_costumer'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM detil_sparepart WHERE id_costumer='$id_costumer'");
while($res = mysqli_fetch_array($result))
{
    $id_costumer = $_GET['id_costumer'];
    $harga_sparepart = $res['harga_sparepart'];
    $id_sparepart= $res['id_sparepart'];
    $jumlahsparepart = $res['jumlah'];
    $statussparepart = $res['status'];
   
}

$result1 = mysqli_query($conn, "SELECT * FROM detil_servis WHERE id_costumer='$id_costumer'");
while($res1 = mysqli_fetch_array($result1))
{
    $id_kendaraan = $res1['id_kendaraan'];
	$id_servis = $res1['id_servis'];
    $harga_servis = $res1['harga_servis'];
    $jumlahservis=$res1['jumlah'];
    $statusservis = $res1['status'];
   
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
<h4>servis yang dipilih</h4>
<table border="1">
	<tr>
        <th>kendaraan</th>
		<th>costumer</th>
        <th>nama servis<th>
        <th>harga<th>
		<th>jumlah<th>
		<th>sub total<th>
       
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
        $data = mysqli_query($conn,"SELECT kendaraan.nama_kendaraan,
        costumer.nama,
        servis.nama_servis,
		detil_servis.harga_servis,
		detil_servis.id_costumer,
		detil_servis.jumlah
        from detil_servis
        INNER JOIN kendaraan ON kendaraan.id_kendaraan = detil_servis.id_kendaraan
		INNER JOIN costumer ON costumer.id_costumer = detil_servis.id_costumer
		INNER JOIN servis ON servis.id_servis = detil_servis.id_servis
        where CONCAT(nama_servis,nama_kendaraan,nama) like '%".$cari."%' and detil_servis.id_costumer=$id_costumer and status='belum selesai'");				
	}else{
		$data = mysqli_query($conn,"SELECT kendaraan.nama_kendaraan,
        costumer.nama,
        servis.nama_servis,
		detil_servis.harga_servis,
		detil_servis.id_costumer,
		detil_servis.jumlah
        from detil_servis
        INNER JOIN kendaraan ON kendaraan.id_kendaraan = detil_servis.id_kendaraan
		INNER JOIN costumer ON costumer.id_costumer = detil_servis.id_costumer
		INNER JOIN servis ON servis.id_servis = detil_servis.id_servis
        where detil_servis.id_costumer=$id_costumer and status='belum selesai' ");		
    }
    $sub_total1=null;
    $total_transaksi1=null;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
    <?php $sub_total1= $d['jumlah']*$d['harga_servis'];?>
		<td><?php echo $d['nama_kendaraan']; ?></td>
        <td><?php echo $d['nama']; ?></td>
		<td><?php echo $d['nama_servis']; ?></td>
		<td><?php echo '|'; ?></td>
        <td><?php echo $d['harga_servis']; ?></td>
        <td><?php echo '|'; ?></td>
		<td><?php echo $d['jumlah']; ?></td>
		<td><?php echo '|'; ?></td>
        <td><?php echo $sub_total1 ?></td>
        <?php $total_transaksi1=$total_transaksi1+$sub_total1?>

        
	</tr>
	<?php } ?>
</table>   

 <h4>total servis Rp <?php echo $total_transaksi1 ?></h4>
 <hr>
<h4>Sparepart Yang akan digunakan</h4>
    <table border="1">
	<tr>
        <th>sparepart</th>
		<th>harga jual</th>
        <th>jumlah<th>
        <th>sub total<th>
       
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
        $data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        detil_sparepart.harga_sparepart,
        detil_sparepart.jumlah
        from detil_sparepart
        INNER JOIN sparepart ON sparepart.id_sparepart = detil_sparepart.id_sparepart
        where CONCAT(nama_sparepart) like '%".$cari."%' and id_costumer=$id_costumer and status='belum selesai'");				
	}else{
		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        detil_sparepart.harga_sparepart,
        detil_sparepart.jumlah
        from detil_sparepart
        INNER JOIN sparepart ON sparepart.id_sparepart = detil_sparepart.id_sparepart
        where id_costumer=$id_costumer and status='belum selesai'");		
    }
    $sub_total=null;
    $total_transaksi=null;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
    <?php $sub_total= $d['jumlah']*$d['harga_sparepart'];?>
		<td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['harga_sparepart']; ?></td>
        <td><?php echo $d['jumlah']; ?></td>
        <td><?php echo '|'; ?></td>
        <td><?php echo $sub_total ?></td>
        <?php $total_transaksi=$total_transaksi+$sub_total?>

        
	</tr>
	<?php } ?>
</table>   
<h4>total sparepart Rp <?php echo $total_transaksi ?></h4>
<?php
$total_transaksi3=$total_transaksi+$total_transaksi1;
    include("../conn.php");
    if(isset($_POST['update'])) {
        mysqli_query($conn, "UPDATE detil_transaksi SET status='selesai' WHERE 'id_costumer'=$id_costumer");
    }
    if(isset($_POST['submit'])) {
       // $id_sparepart = $_POST['id_sparepart'];
        
        $tanggal_transaksi = $_POST['tanggal_transaksi'];
        $id_cabang = $_POST['id_cabang'];
        $id_pegawai= $_POST['id_pegawai'];
        $id_pegawai1= $_POST['id_pegawai1'];
        $tanggal_transaksi = $_POST['tanggal_transaksi'];
        
 
        
        
 
        if( $id_cabang == "" ||  $id_pegawai == "" ) {
            ?>
            <center><font size="30">field is empty</font></center>
            <br/>";
            <center><font size="20"><a href='lanjuttransaksi.php'>Go back</a></font></center>;
            <?php
        } 
        
        else {
            mysqli_query($conn, "insert into transaksi2 (id_sparepart,id_servis,id_cabang,id_cs,id_montir,id_costumer,id_kendaraan,total,status,tanggal,jumlah_sparepart,jumlah_servis) 
            values ('$id_sparepart','$id_servis','$id_cabang','$id_pegawai','$id_pegawai1','$id_costumer','$id_kendaraan','$total_transaksi3','belum selesai','$tanggal_transaksi','$jumlahsparepart','$jumlahservis')")
            or die(mysqli_error($conn));
            
            
            ?>
            <center><font size="30">regist transaksi succes</font></center>
            <center><font size="20"><a href='kelolaservis.php'>Go back</a></font></center>;
            <center><font size="20"><?php echo "<a href=\"../laporan/SPK.php?id_costumer=$id_costumer\">cetak SPK</a>  "?></font></center>;
            <br/>";
            
            <?php
        }
    } else {
?>
<hr>
<p><font size="+0">total transaksi Rp <?php echo $total_transaksi3?></font></p>
<hr>
<p><font size="+2">Kelola Data Pembayaran</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
<tr> 
                    <td>id costumer </td>
                    <td><?php echo $id_costumer ?></td>
                   
                </tr>
                
                
                <tr>
		<td width="10%">Cabang</td>	
			
		<td>
		<select name="id_cabang">
        <option value="" selected="selected">-</option>
			<?php
            include "conn.php";
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
		<td>Costumer Service</td>	
			
		<td>
		<select name="id_pegawai">
        <option value="" selected="selected">-</option>
			<?php
            include "../conn.php";
			$combobox = "SELECT * FROM users where id_role=2";
			$hasil = mysqli_query($conn,$combobox);
			while ($data = mysqli_fetch_assoc($hasil))
			{
				echo "<option value='".$data['id_pegawai']."'>".$data['name']."</option>";				
			}
			?>
		</select>
        </td>
			
    </tr>
    <tr>
		<td>Montir</td>	
			
		<td>
		<select name="id_pegawai1">
        <option value="" selected="selected">-</option>
			<?php
            include "../conn.php";
			$combobox = "SELECT * FROM users where id_role=4";
			$hasil = mysqli_query($conn,$combobox);
			while ($data = mysqli_fetch_assoc($hasil))
			{
				echo "<option value='".$data['id_pegawai']."'>".$data['name']."</option>";				
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
                    <td><input type="date" name="tanggal_transaksi"></td>
                </tr> 
                 
                <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Tambahkan Pembayaran"></td>
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
  
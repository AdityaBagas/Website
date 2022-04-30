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
                <p><font size="+2">Kelola Data Pegawai</font></p>
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
$result = mysqli_query($conn, "SELECT * FROM detil_transaksi WHERE id_costumer='$id_costumer'");
while($res = mysqli_fetch_array($result))
{
    $id_costumer = $_GET['id_costumer'];
    $harga_jual = $res['harga_jual'];
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
		<th>harga jual</th>
        <th>jumlah<th>
        <th>sub total<th>
       
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
        $data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        detil_transaksi.harga_jual,
        detil_transaksi.jumlah
        from detil_transaksi
        INNER JOIN sparepart ON sparepart.id_sparepart = detil_transaksi.id_sparepart
        where CONCAT(nama_sparepart) like '%".$cari."%' and id_costumer=$id_costumer and status='belum selesai'");				
	}else{
		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        detil_transaksi.harga_jual,
        detil_transaksi.jumlah
        from detil_transaksi
        INNER JOIN sparepart ON sparepart.id_sparepart = detil_transaksi.id_sparepart
        where id_costumer=$id_costumer and status='belum selesai'");		
    }
    $sub_total=null;
    $total_transaksi=null;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
    <?php $sub_total= $d['jumlah']*$d['harga_jual'];?>
		<td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['harga_jual']; ?></td>
        <td><?php echo $d['jumlah']; ?></td>
        <td><?php echo '|'; ?></td>
        <td><?php echo $sub_total ?></td>
        <?php $total_transaksi=$total_transaksi+$sub_total?>

        
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
        
        $tanggal_transaksi = $_POST['tanggal_transaksi'];
        $id_cabang = $_POST['id_cabang'];
        $id_pegawai= $_POST['id_pegawai'];
        $tanggal_transaksi = $_POST['tanggal_transaksi'];
        
 
        
        
 
        if( $id_cabang == "" ||  $id_pegawai == "" ) {
            ?>
            <center><font size="30">field is empty</font></center>
            <br/>";
            <center><font size="20"><a href='lanjuttransaksi.php'>Go back</a></font></center>;
            <?php
        } 
        
        else {
            mysqli_query($conn, "insert into transaksi (id_sparepart,id_cabang,id_pegawai,id_kostumer,jumlah,total_transaksi,status,tanggal_transaksi) 
            values ('$id_sparepart','$id_cabang','$id_pegawai','$id_costumer','$jumlah','$total_transaksi','belum selesai','$tanggal_transaksi')")
            or die(mysqli_error($conn));
            mysqli_query($conn, "UPDATE detil_transaksi SET status='semi selesai' WHERE id_costumer=$id_costumer");
            
            ?>
            <center><font size="30">regist transaksi succes</font></center>
            <center><font size="20"><a href='kelolasparepart.php'>Go back</a></font></center>;
            <br/>";
            
            <?php
        }
    } else {
?>
<p><font size="+0">total transaksi Rp <?php echo $total_transaksi?></font></p>
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
  
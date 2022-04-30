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
$id_transaksi = $_GET['id_transaksi'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM transaksi2 WHERE id_transaksi='$id_transaksi'");
while($res = mysqli_fetch_array($result))
{
    $id_transaksi = $_GET['id_transaksi'];
    $id_cs = $res['id_cs'];
    $id_montir = $res['id_montir'];
    $total_transaksi = $res['total'];
    $status = $res['status'];
    $id_costumer = $res['id_costumer'];
}
?>
<?php
    include("../conn.php");
 
    if(isset($_POST['submit'])) {
       // $id_sparepart = $_POST['id_sparepart'];
        
        $tanggal_pembayaran = $_POST['tanggal_pembayaran'];
        $diskon = $_POST['diskon'];
        $bayar= $_POST['bayar'];
 
        
        
 
        if( $diskon == "" ||  $bayar == "" ) {
            ?>
            <center><font size="30">field is empty</font></center>
            <br/>";
            <center><font size="20"><a href='lihatpembayaran.php'>Go back</a></font></center>;
            <?php
        } 
        if( $bayar < $total_transaksi ) {
            ?>
            <center><font size="30">Uang Kurang !!!</font></center>
            <br/>";
            <center><font size="20"><a href='lihatpembayaran.php'>Go back</a></font></center>;
            <?php
        }
        else {
            mysqli_query($conn, "insert into pembayaran_sparepart (id_transaksi,id_pegawai,tanggal_pembayaran,diskon,total,bayar,kembalian) 
            values ('$id_transaksi','$id_cs','$tanggal_pembayaran','$diskon','$total_transaksi','$bayar','$bayar-$total_transaksi')")
            or die(mysqli_error($conn));
            
           
            ?>
            <center><font size="30">regist pembayaran succes</font></center>
            <br/>";
            <center><font size="20"><a href='lihatpembayaran.php'>Go back</a></font></center>;
            <center><font size="20"><?php echo "<a href=\"../transaksi/cetaknota.php?id_costumer=$id_costumer\">cetak nota</a> | "?></font></center>;
            <?php
        }
    } else {
?>
<p><font size="+2">Kelola Data Pembayaran</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
<tr> 
                    <td>total </td>
                    <td> Rp. <?php echo $total_transaksi ?></td>
                   
                </tr>
                <tr> 
                <td>tanggal</td>
                <td><input type="date" name="tanggal_pembayaran"  /></td>
                </tr>
                </tr>
                <tr> 
                    <td>diskon</td>
                    <td><input type="number" name="diskon"></td>
                </tr> 
                <tr> 
                    <td>bayar</td>
                    <td><input type="number" name="bayar"></td>
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
    <table border="1">
	<tr>
        <th>id_pembayaran</th>
		<th>id_transaksi</th>
        <th>nama kasir<th>
        <th>total</th>
        <th>diskon</th>
        <th>bayar</th>
        <th>kembalian</th>
        <th>Tanggal Pembayaran</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
        $data = mysqli_query($conn,"SELECT pembayaran_sparepart.id_pembayaran,
        pembayaran_sparepart.id_transaksi,
        pembayaran_sparepart.total,
        pembayaran_sparepart.diskon,
        pembayaran_sparepart.bayar,
        pembayaran_sparepart.kembalian,
        pembayaran_sparepart.tanggal_pembayaran,
        users.name
        from pembayaran_sparepart
        INNER JOIN users ON users.id_pegawai = pembayaran_sparepart.id_pegawai
        where CONCAT(id_transaksi,name,id_pembayaran) like '%".$cari."%'");				
	}else{
		$data = mysqli_query($conn,"SELECT pembayaran_sparepart.id_pembayaran,
        pembayaran_sparepart.id_transaksi,
        pembayaran_sparepart.total,
        pembayaran_sparepart.diskon,
        pembayaran_sparepart.bayar,
        pembayaran_sparepart.kembalian,
        pembayaran_sparepart.tanggal_pembayaran,
        users.name
        from pembayaran_sparepart
        INNER JOIN users ON users.id_pegawai = pembayaran_sparepart.id_pegawai");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_pembayaran']; ?></td>
        <td><?php echo $d['id_transaksi']; ?></td>
        <td><?php echo $d['name']; ?></td>
        <td><?php echo "|" ?></td>
        <td><?php echo $d['total']; ?></td>
        <td><?php echo $d['diskon']; ?></td>
        <td><?php echo $d['bayar']; ?></td>
        <td><?php echo $d['kembalian']; ?></td>
        <td><?php echo $d['tanggal_pembayaran']; ?></td>
        
	</tr>
	<?php } ?>
</table>   
 
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
  
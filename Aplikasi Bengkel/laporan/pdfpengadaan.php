<!DOCTYPE HTML>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: ../login.php');
}

?>
<?php
include_once("../conn.php");
$id_supplier = $_GET['id_supplier'];
$result = mysqli_query($conn, "SELECT * FROM detil_pengadaan WHERE id_supplier='$id_supplier'");
while($res = mysqli_fetch_array($result))
{
    $id_supplier = $_GET['id_supplier'];
    $harga_beli = $res['harga_beli'];
    $id_sparepart= $res['id_sparepart'];
    $jumlah = $res['jumlah'];
    $status = $res['status'];
   
}

//including the database connection file
include_once("../conn.php");

 ?>
<html>
<head>

    <h1 align="center"> AtmaAuto Series</h1>
    <h4 align="center">MOTORCYCLE SPAREPARTS AND SERVICES</h4>
    <h4 align="center">Jl. Babarsari No. 43 Yogyakarta 552181</h4>
    <h4 align="center">Telp.(0274) 487711</h4>
    <h4 align="center">https://www.SIASS.com</h4></div>
    <hr />
    
    
</head>
<body>
<h2 align="center"> SURAT PEMESANAN</h2>
<p align="right">no:</p><br>
<p align="right"><?php echo "Tanggal " . date("Y/m/d") ."<br>";  ?>   </p>

<p>Kepada YTH : </p>

<p align="center"> mohon untuk disediakan barang-barang berikut:</p>



<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
        <th>sparepart</th>
        <th>merk</th>
        <th>tipe</th>
		<th>harga</th>
        <th>jumlah<th>
        <th>sub total<th>
       
	</tr>
	<?php 
	
		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        sparepart.merk_sparepart,
        sparepart.tipe_sparepart,
        detil_pengadaan.harga_beli,
        detil_pengadaan.jumlah
        from detil_pengadaan
        INNER JOIN sparepart ON sparepart.id_sparepart = detil_pengadaan.id_sparepart
        where id_supplier=$id_supplier and status='belum selesai'");		
    
    $sub_total=null;
    $total_pengadaan=null;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
    <?php $sub_total= $d['jumlah']*$d['harga_beli'];?>
		<td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['merk_sparepart']; ?></td>
        <td><?php echo $d['tipe_sparepart']; ?></td>
        <td><?php echo $d['harga_beli']; ?></td>
        <td><?php echo $d['jumlah']; ?></td>
        <td><?php echo '|'; ?></td>
        <td><?php echo $sub_total ?></td>
        <?php $total_pengadaan=$total_pengadaan+$sub_total?>

        
	</tr>
	<?php } ?>
</table>
<h3>total pengadaan<?php echo $total_pengadaan ?></h3>
<br>   
    <br>
    <p align="right">Hormat kami,</p><br>
    <p align="right">(Philips Tampan)</p>

    <?php mysqli_query($conn, "UPDATE detil_pengadaan SET status='selesai' WHERE id_supplier=$id_supplier"); ?>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>
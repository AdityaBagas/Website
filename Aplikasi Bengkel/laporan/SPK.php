<!DOCTYPE HTML>
<?php
//including the database connection file
include_once("../conn.php");
$data = mysqli_query($conn, "SELECT MONTHNAME(transaksi.tanggal_transaksi) AS month,
transaksi.total_transaksi
 FROM transaksi
 where status='belum selesai' group by month order by month");
 ?>
<html>
<head>

    <h1 align="center"> AtmaAuto Series</h1>
    <h4 align="center">MOTORCYCLE SPAREPARTS AND SERVICES</h4>
    <h4 align="center">Jl. Babarsari No. 43 Yogyakarta 552181</h4>
    <h4 align="center">Telp.(0274) 487711</h4>
    <h4 align="center">https://www.SIASS.com</h4></div>
   
    
    
</head>
<body>
<hr />
<h2 align="center">SURAT PERINTAH KERJA</h2>
<hr />
<?php
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
   
} ?>


<hr />
<h3>SPAREPARTS</h3>
<hr />

<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
        <th>sparepart</th>
        <th>kode</th>
        <th>merk</th>
        <th>jumlah</th>
       
	</tr>
	<?php 

		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        sparepart.kode_sparepart,
        sparepart.merk_sparepart,
        detil_sparepart.harga_sparepart,
        detil_sparepart.jumlah
        from detil_sparepart
        INNER JOIN sparepart ON sparepart.id_sparepart = detil_sparepart.id_sparepart
        where id_costumer=$id_costumer and status='belum selesai'");		
  
 
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>

		<td><?php echo $d['nama_sparepart']; ?></td>
        <td><?php echo $d['kode_sparepart']; ?></td>
        <td><?php echo $d['merk_sparepart']; ?></td>
        <td><?php echo $d['jumlah']; ?></td>

        
	</tr>
	<?php } ?>
</table>   
    <br>
    <hr>
    <h3>Service</h3>

    <hr />
    <table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
        <th>kode</th>
		<th>nama</th>
		<th>jumlah<th>

       
	</tr>
	<?php 
	
		$data = mysqli_query($conn,"SELECT 
        servis.nama_servis,
        servis.id_servis,
		detil_servis.id_costumer,
		detil_servis.jumlah
        from detil_servis
        INNER JOIN kendaraan ON kendaraan.id_kendaraan = detil_servis.id_kendaraan
		INNER JOIN costumer ON costumer.id_costumer = detil_servis.id_costumer
		INNER JOIN servis ON servis.id_servis = detil_servis.id_servis
        where detil_servis.id_costumer=$id_costumer and status='belum selesai' ");		
    

	while($d = mysqli_fetch_array($data)){
	?>
	<tr>

		<td><?php echo $d['id_servis']; ?></td>

		<td><?php echo $d['nama_servis']; ?></td>


		<td><?php echo $d['jumlah']; ?></td>


        
	</tr>
	<?php } ?>
</table>   
    <?php mysqli_query($conn, "UPDATE detil_servis SET status='semi selesai' WHERE id_costumer=$id_costumer");
            mysqli_query($conn, "UPDATE detil_sparepart SET status='semi selesai' WHERE id_costumer=$id_costumer"); ?>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>
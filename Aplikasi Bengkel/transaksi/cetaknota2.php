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
<h2 align="center">NOTA LUNAS</h2>
<hr />
<?php
$id_costumer = $_GET['id_costumer'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM detil_transaksi WHERE id_costumer='$id_costumer'");
while($res = mysqli_fetch_array($result))
{
    $id_costumer = $_GET['id_costumer'];
    $harga_sparepart = $res['harga_jual'];
    $id_sparepart= $res['id_sparepart'];
    $jumlahsparepart = $res['jumlah'];
    $statussparepart = $res['status'];
   
}

?>


<hr />
<h3>SPAREPARTS</h3>
<hr />

<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
	
        <th>sparepart</th>
        <th>kode</th>
        <th>merk</th>
        <th>harga</th>
        <th>jumlah</th>
        <th>sub total</th>
       
	</tr>
	<?php 

		$data = mysqli_query($conn,"SELECT sparepart.nama_sparepart,
        sparepart.harga_jual,
        sparepart.kode_sparepart,
        sparepart.merk_sparepart,
        detil_transaksi.harga_jual,
        detil_transaksi.jumlah
        from detil_transaksi
        INNER JOIN sparepart ON sparepart.id_sparepart = detil_transaksi.id_sparepart
        where id_costumer=$id_costumer and status='semi selesai'");		
        $total=null;
        $subtotal=null;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
        <?php $subtotal= $d['jumlah']*$d['harga_jual'];?>
		<td align="center"><?php echo $d['nama_sparepart']; ?></td>
        <td id="column_padding"><?php echo $d['kode_sparepart']; ?></td>
        <td id="column_padding"><?php echo $d['merk_sparepart']; ?></td>
        <td id="column_padding"><?php echo $d['harga_jual']; ?></td>
        <td id="column_padding"><?php echo $d['jumlah']; ?></td>
        <td id="column_padding"><?php echo $subtotal ?></td>
        <?php $total=$total+$subtotal; ?>

        
	</tr>
	<?php } ?>
</table> 
<h3>total Sparepart: Rp</h3><?php echo $total ?>  
    <br>
    <hr>
    <h3>Service</h3>

    <hr />
    

       

    <table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
        <th>kode</th>
		<th>nama</th>
        <th>harga</th>
		<th>jumlah<th>
        <th>subtotal<th>

       
	</tr>
	<?php 
	
		
    
    $subtotal2=null;
    $total2=null;

	?>
</table> 
<h3>total Servis: Rp</h3><?php echo $total2 ?> 
<hr>
<hr>
<?php $total3=$total+$total2 ?>
<h3>total Transaksi: Rp</h3><?php echo $total3 ?> 
    <?php mysqli_query($conn, "UPDATE detil_transaksi SET status='selesai' WHERE id_costumer=$id_costumer");
            ; ?>

    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>
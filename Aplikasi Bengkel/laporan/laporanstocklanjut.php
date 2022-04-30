<!DOCTYPE HTML>
<?php
//including the database connection file
include_once("../conn.php");

//getting id from url
$id_sparepart = $_GET['id_sparepart'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM sparepart WHERE id_sparepart='$id_sparepart'");
while($res = mysqli_fetch_array($result))
{
    $id_sparepart = $_GET['id_sparepart'];
    $nama_sparepart = $res['nama_sparepart'];
    $merk_sparepart = $res['merk_sparepart'];
    $harga_jual = $res['harga_jual'];
    $stock=$res['stock'];
   
}



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
<h2 align="center"> Laporan sisa stock</h2>
<p align="LEFT"> tipe barang: <?php echo $nama_sparepart?><p>
<hr />



<hr />

	<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
        	<th rowspan="1">No</th>
            <th>bulan</th>
            <th>sisa stock</th>
        </tr><?php
        $data = mysqli_query($conn, "SELECT kendaraan.nama_kendaraan,
kendaraan.merk,
servis.nama_servis,
transaksi2.jumlah
 FROM transaksi2
 INNER JOIN kendaraan ON kendaraan.id_kendaraan = transaksi2.id_kendaraan
 INNER JOIN servis ON servis.id_servis = transaksi2.id_servis
 where jumlah=9999
");?>
        <?php $no=1;?>
       
    </table>
    <br>

    <hr />
<hr />
<hr />


 
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>
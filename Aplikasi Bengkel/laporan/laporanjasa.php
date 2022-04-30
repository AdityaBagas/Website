<!DOCTYPE HTML>
<?php
//including the database connection file
include_once("../conn.php");
$data = mysqli_query($conn, "SELECT kendaraan.nama_kendaraan,
kendaraan.merk,
servis.nama_servis,
transaksi2.jumlah_servis
 FROM transaksi2
 INNER JOIN kendaraan ON kendaraan.id_kendaraan = transaksi2.id_kendaraan
 INNER JOIN servis ON servis.id_servis = transaksi2.id_servis
");
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
<h2 align="center"> Laporan Penjualan Jasa</h2>
<hr />

<?php echo date("Y/m/d"); ?>

<hr />

	<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
        	<th rowspan="1">No</th>
            <th>Merk</th>
            <th>Tipe motor</th>
            <th>nama service</th>
            <th>jumlah</th>
        </tr>
        <?php $no=1;?>
        <?php while($hasil = mysqli_fetch_array($data)){ ?>
        <tr id="rowHover">
            
        	<td width="10%" align="center"><?php echo $no ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['nama_kendaraan']; ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['merk']; ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['nama_servis']; ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['jumlah_servis']; ?></td>
            <?php $no++; ?>
           
            
            
            
        </tr>
        <?php } ?>
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
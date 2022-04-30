<!DOCTYPE HTML>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: ../login.php');
}

?>
<?php
//including the database connection file
include_once("../conn.php");
$data = mysqli_query($conn, "select MONTHNAME(transaksi.tanggal_transaksi) AS MONTH,
transaksi.jumlah,
sparepart.nama_sparepart,
sparepart.tipe_sparepart 
from transaksi 
inner join sparepart on sparepart.id_sparepart = transaksi.id_sparepart
group by MONTH order by jumlah desc");
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
<h2 align="center"> Laporan sparepart terlaris</h2>
<p align="right"><?php echo "Tahun " . date("Y") ."<br>";  ?>   </p>

	<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
        	<th rowspan="1">tanggal</th>
            <th>nama sparepart</th>
            <th>tipe sparepart</th>
            <th>jumlah</th>
        </tr>
        <?php while($hasil = mysqli_fetch_array($data)){ ?>
        <tr id="rowHover">
        	<td width="10%" align="center"><?php echo $hasil['MONTH']; ?></td>
            <td width="25%" id="column_padding"><?php echo $hasil['nama_sparepart']; ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['tipe_sparepart']; ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['jumlah']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>
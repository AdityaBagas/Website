<!DOCTYPE HTML>
<?php
//including the database connection file
include_once("../conn.php");
$data = mysqli_query($conn, "SELECT YEAR(transaksi.tanggal_transaksi) AS year,
transaksi.total_transaksi,
cabang.nama_cabang
 FROM transaksi
INNER JOIN cabang ON cabang.id_cabang = transaksi.id_cabang
 where status='selesai' group by nama_cabang ");
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
<h2 align="center"> Laporan Pendapatan Tahunan</h2>
<hr />



<hr />

	<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
        	<th rowspan="1">tahun</th>
            <th>cabang</th>
            <th>total</th>
        </tr>
        
        <?php while($hasil = mysqli_fetch_array($data)){ ?>
        <tr id="rowHover">
            
        	<td width="10%" align="center"><?php echo $hasil['year']; ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['nama_cabang']; ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['total_transaksi']; ?></td>
            
           
            
            
            
        </tr>
        <?php } ?>
    </table>
    <br>

    <hr />
    <?php
$rows = array();
$table = array();
$table['cols'] = array(
	//membuat label untuk nama nya, tipe string
    array('label' => 'Tahun', 'type' => 'string'),
   //   array('label' => 'Cabang', 'type' => 'string'),
	//membuat label untuk jumlah siswa, tipe harus number untuk kalkulasi persentasenya
	array('label' => 'Total', 'type' => 'number')
);
 
//melakukan query ke database select
$sql = $conn->query("SELECT YEAR(transaksi.tanggal_transaksi) AS year,
transaksi.total_transaksi,
cabang.nama_cabang
 FROM transaksi
INNER JOIN cabang ON cabang.id_cabang = transaksi.id_cabang
where status='selesai' group by nama_cabang");
//perulangan untuk menampilkan data dari database
while($data = $sql->fetch_assoc()){
	//membuat array
	$temp = array();
	//memasukkan data pertama yaitu nama kelasnya
    $temp[] = array('v' => (string)$data['year']);
    //$temp[] = array('v' => (string)$data['nama_cabang']);
	//memasukkan data kedua yaitu jumlah siswanya
	$temp[] = array('v' => (int)$data['total_transaksi']);
	//memasukkan data diatas ke dalam array $rows
	$rows[] = array('c' => $temp);
}
 
//memasukkan array $rows dalam variabel $table
$table['rows'] = $rows;
//mengeluarkan data dengan json_encode. silahkan di echo kalau ingin menampilkan data nya
$jsonTable = json_encode($table);
 
?>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
 
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
 
	function drawChart() {
 
		// membuat data chart dari json yang sudah ada di atas
		var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);
 
		// Set options, bisa anda rubah
		var options = {'title':'Grafik',
					   'width':500,
					   'height':400};
 
		var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	}
    </script>
</head>
<body>
    
	<!--Div yang akan menampilkan chart-->
    <div id="chart_div"></div>
	
</body>
 
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>
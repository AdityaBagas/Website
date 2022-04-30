<?php
$host="localhost";
$user="root";
$password="";	
$koneksi=mysql_connect($host,$user,$password) or die("Gagal Koneksi Database");
mysql_select_db("testing");
// write your SQL query here (you may use parameters from $_GET or $_POST if you need them)
$query = mysql_query("SELECT YEAR(transaksi.tanggal_transaksi) AS year,
transaksi.total_transaksi,
cabang.nama_cabang
 FROM transaksi
INNER JOIN cabang ON cabang.id_cabang = transaksi.id_cabang
 where status='belum selesai' group by nama_cabang");
$table = array();
$table['cols'] = array(
	/* Disini kita mendefinisikan fata pada tabel database
	 * masing-masing kolom akan kita ubah menjadi array
	 * Kolom tersebut adalah parameter (string) dan nilai (integer/number)
	 * Pada bagian ini kita juga memberi penamaan pada hasil chart nanti
	 */
    array('label' => 'tahun', 'type' => 'string'),
    array('label' => 'cabang', 'type' => 'string'),
    array('label' => 'total', 'type' => 'number')
	
);
// melakukan query yang akan menampilkan array data
$rows = array();
while($r = mysql_fetch_assoc($query)) {
    $temp = array();
	// masing-masing kolom kita masukkan sebagai array sementara
    $temp[] = array('v' => $r['year']);
    $temp[] = array('v' => $r['nama_cabang']);
	$temp[] = array('v' => $r['total_transaksi']);
    $rows[] = array('c' => $temp);
}
// mempopulasi row tabel
$table['rows'] = $rows;
// encode tabel ke bentuk json
$jsonTable = json_encode($table);
// set up header untuk JSON, wajib.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
// menampilkan data hasil query ke bentuk json
echo $jsonTable;
?>
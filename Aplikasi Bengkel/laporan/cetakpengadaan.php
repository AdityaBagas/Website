<?php session_start(); ?>
<?php
// memanggil library FPDF
require('../phpfpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',30);
// mencetak string 
$pdf->Cell(280,7,'Atmaauto Service Series',0,1,'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(280,7,'Motorcycle Spareparts And Services',0,1,'C');
$pdf->Cell(280,7,'Jl.babarsari No.43 yogyakarta 552181',0,1,'C');
$pdf->Cell(280,7,'Telp.(0274) 487711',0,1,'C');
$pdf->Cell(280,7,'http://www.SIASS.COM',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);

$pdf->Cell(280,7,'Laporan Pengadaan Spareparts',0,1,'C');


$pdf->SetFont('Arial','B',12);
 
// Memberikan space kebawah agar tidak terlalu rapat



 
$pdf->SetFont('Arial','',10);
 
include '../conn.php';
$id_pengadaan = $_GET['id_pengadaan'];
$query = mysqli_query($conn, "SELECT pengadaan.id_pengadaan,
pengadaan.jumlah,
pengadaan.total,
pengadaan.status,
pengadaan.tanggal_pengadaan,
sparepart.nama_sparepart,
sparepart.merk_sparepart,
sparepart.tipe_sparepart,
sparepart.kode_sparepart,
sparepart.harga_beli,
supplier.nama_supplier,
supplier.alamat_supplier,
supplier.telp_supplier
 from pengadaan
 INNER JOIN sparepart ON sparepart.id_sparepart = pengadaan.id_sparepart
 INNER JOIN supplier ON supplier.id_supplier = pengadaan.id_supplier
 WHERE id_pengadaan=$id_pengadaan");
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Text(45,80,'Tanggal Pengadaan :');
$pdf->SetFont('Arial','',20);
$pdf->Cell(10,7,'',0,1);
$pdf->Text(45,100,'Nama Supplier        :');
$pdf->Text(45,120,'Nama Sparepart      :');
$pdf->Text(45,140,'Merk Sparepart       :');
$pdf->Text(45,160,'Tipe Sparepart        :');
$pdf->Text(180,100,'Harga Beli      :');
$pdf->Text(180,120,'Jumlah           :');
$pdf->Text(180,140,'Total              :');
$pdf->Text(180,160,'Status            :');

while ($row = mysqli_fetch_array($query)){
    $pdf->SetFont('Arial','',10);
    $pdf->Text(80,80,$row['tanggal_pengadaan']);
    $pdf->SetFont('Arial','',20);
    $pdf->Text(120,100,$row['nama_supplier']);
    $pdf->Text(120,120,$row['nama_sparepart']);
    $pdf->Text(120,140,$row['merk_sparepart']);
    $pdf->Text(120,160,$row['tipe_sparepart']);
    $pdf->Text(240,100,$row['harga_beli']);
    $pdf->Text(240,120,$row['jumlah']);
    $pdf->Text(240,140,$row['jumlah']*$row['harga_beli']);
    $pdf->Text(240,160,$row['status']);
}

    

 
$pdf->Output();
?>
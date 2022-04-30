<?php
// memanggil library FPDF
require('../phpfpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->cell(190,7,"Atmaauto Service Series",0,1,'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,7,'Motorcycle Spareparts And Services',0,1,'C');
$pdf->Cell(190,7,'Jl.babarsari No.43 yogyakarta 552181',0,1,'C');
$pdf->Cell(190,7,'Telp.(0274) 487711',0,1,'C');
$pdf->Cell(190,7,'http://www.SIASS.COM',0,1,'C');
$pdf->Ln( 16 );
$pdf->Cell(190,7,'NOTA LUNAS',0,1,'C');
$pdf->Ln( 16 );
$pdf->Cell(190,7,'spareparts',0,1,'C');

$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(37,6,'kode spareparts',1,0);
$pdf->Cell(37,6,'Nama spareparts',1,0);
$pdf->Cell(37,6,'merk spareparts',1,0);
$pdf->Cell(25,6,'harga',1,0);
$pdf->Cell(25,6,'jumlah',1,0);
$pdf->Cell(25,6,'sub total',1,1);

include '../conn.php';
$data = mysqli_query($conn, "SELECT transaksi.id_transaksi,
transaksi.jumlah,
transaksi.total_transaksi,
sparepart.nama_sparepart,
sparepart.merk_sparepart,
sparepart.tipe_sparepart,
sparepart.kode_sparepart,
sparepart.harga_jual
 FROM transaksi
 INNER JOIN sparepart ON sparepart.id_sparepart = transaksi.id_sparepart
 where status='selesai'");

 while($row= mysqli_fetch_array($data)){
    $pdf->SetFont('Arial','',10);
    $pdf->cell(37,6,$row['kode_sparepart'],1,0);
    $pdf->cell(37,6,$row['nama_sparepart'],1,0);
    $pdf->cell(37,6,$row['merk_sparepart'],1,0);
    $pdf->cell(25,6,$row['harga_jual'],1,0);
    $pdf->cell(25,6,$row['jumlah'],1,0);
    $pdf->cell(25,6,$row['jumlah']*$row['harga_jual'],1,1);
    
 }

 $pdf->Ln( 16 );
 $pdf->SetFont('Arial','B',14);
$pdf->Cell(190,7,'Service',0,1,'C');
$pdf->Output();
?>
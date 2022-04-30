<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: ../login.php');
}
?>
 
 <?php
// including the database connection file
include_once("../conn.php");
if(isset($_GET['update']))
$id_pengadaan = $_GET['id_pengadaan'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT pengadaan.id_pengadaan,
pengadaan.jumlah,
pengadaan.total,
pengadaan.status,
pengadaan.status_barang,
pengadaan.tanggal_pengadaan,
sparepart.id_sparepart,
sparepart.stock
sparepart.tipe_sparepart,
sparepart.kode_sparepart,
sparepart.harga_beli,
supplier.nama_supplier,
supplier.alamat_supplier,
supplier.telp_supplier
 FROM pengadaan
 INNER JOIN sparepart ON sparepart.id_sparepart = pengadaan.id_sparepart
  WHERE id_pengadaan=$id_pengadaan");
while($res = mysqli_fetch_array($result))
{
    $id_pengadaan = $_GET['id_pengadaan'];
    $jumlah = $_GET['jumlah'];
    $stock= $_GET['stock'];
    $id_sparepart = $_GET['id_sparepart'];

    
}
?>
<?php   

    
		$id_pengadaan = $_GET['id_pengadaan'];
        $result = mysqli_query($conn, "UPDATE pengadaan,sparepart
		 SET pengadaan.id_pengadaan=pengadaan.'$id_pengadaan', 
		 pengadaan.status_barang='Selesai', 
		 sparepart.stock=pengadaan.jumlah+sparepart.stock 
		 WHERE sparepart.id_sparepart=pengadaan.id_sparepart
		 and pengadaan.id_pengadaan=pengadaan.$id_pengadaan");
        
		//redirectig to the display page. In our case, it is view.php
		echo "update successfully";
            echo "<br/>";
			echo "<a href='suratpemesanan.php'>back</a>";
	
 


    

?>
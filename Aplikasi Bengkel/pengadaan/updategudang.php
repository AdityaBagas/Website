<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: ../login.php');
}
?>
 
<?php
//including the database connection file
include("../conn.php");
 
//getting id of the data from url
$id_pengadaan = $_GET['id_pengadaan'];

$result = mysqli_query($conn, "SELECT * FROM pengadaan WHERE id_pengadaan='$id_pengadaan'");
while($res = mysqli_fetch_array($result))
{
    $id_pengadaan = $_GET['id_pengadaan'];
    $id_sparepart= $res['id_sparepart'];
    $jumlah = $res['jumlah'];
    $status_barang = $res['status_barang'];
   
}
//deleting the row from table
mysqli_query($conn, "UPDATE pengadaan SET status_barang='selesai' WHERE id_pengadaan='$id_pengadaan'");
mysqli_query($conn, "UPDATE sparepart SET stock=stock+$jumlah WHERE id_sparepart='$id_sparepart'");

 
//redirecting to the display page (view.php in our case)
header("Location:lihatpengadaan.php");
?>
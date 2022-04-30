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
$id_transaksi = $_GET['id_transaksi'];

$result = mysqli_query($conn, "SELECT * FROM transaksi2 WHERE id_transaksi='$id_transaksi'");
while($res = mysqli_fetch_array($result))
{
    $id_transaksi = $_GET['id_transaksi'];
   
   
}
//deleting the row from table
mysqli_query($conn, "UPDATE transaksi2 SET status='selesai' WHERE id_transaksi='$id_transaksi'");


 
//redirecting to the display page (view.php in our case)
header("Location:display.php");
?>
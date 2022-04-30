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
 
//deleting the row from table
$result=mysqli_query($conn, "DELETE FROM pengadaan WHERE id_pengadaan='$id_pengadaan'");

 
//redirecting to the display page (view.php in our case)
header("Location:lihatpengadaan.php");
?>
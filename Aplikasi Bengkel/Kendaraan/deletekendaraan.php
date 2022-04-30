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
$id_kendaraan = $_GET['id_kendaraan'];
 
//deleting the row from table
$result=mysqli_query($conn, "DELETE FROM kendaraan WHERE id_kendaraan='$id_kendaraan'");

 
//redirecting to the display page (view.php in our case)
header("Location:lihatkendaraan.php");
?>
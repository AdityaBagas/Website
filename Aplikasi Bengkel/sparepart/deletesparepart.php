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
$id_sparepart = $_GET['id_sparepart'];
 
//deleting the row from table
$result=mysqli_query($conn, "DELETE FROM sparepart WHERE id_sparepart='$id_sparepart'");

 
//redirecting to the display page (view.php in our case)
header("Location:lihatsparepart.php");
?>
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
$id_supplier= $_GET['id_supplier'];
 
//deleting the row from table
$result=mysqli_query($conn, "DELETE FROM supplier WHERE id_supplier='$id_supplier'");

 
//redirecting to the display page (view.php in our case)
header("Location:lihatsupplier.php");
?>
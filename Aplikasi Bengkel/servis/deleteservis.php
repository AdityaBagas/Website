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
$id_servis = $_GET['id_servis'];
 
//deleting the row from table
$result=mysqli_query($conn, "DELETE FROM servis WHERE id_servis='$id_servis'");

 
//redirecting to the display page (view.php in our case)
header("Location:lihatservis.php");
?>
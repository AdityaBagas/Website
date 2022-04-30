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
$id_cabang = $_GET['id_cabang'];
 
//deleting the row from table
$result=mysqli_query($conn, "DELETE FROM cabang WHERE id_cabang='$id_cabang'");

 
//redirecting to the display page (view.php in our case)
header("Location:lihatcabang.php");
?>
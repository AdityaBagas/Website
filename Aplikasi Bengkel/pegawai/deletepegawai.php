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
$id_pegawai = $_GET['id_pegawai'];
 
//deleting the row from table
$result=mysqli_query($conn, "DELETE FROM users WHERE id_pegawai='$id_pegawai'");

 
//redirecting to the display page (view.php in our case)
header("Location:lihatpegawai.php");
?>
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
$id_costumer = $_GET['id_costumer'];
 
//deleting the row from table
$result=mysqli_query($conn, "DELETE FROM costumer WHERE id_costumer='$id_costumer'");

 
//redirecting to the display page (view.php in our case)
header("Location:lihatcostumer.php");
?>
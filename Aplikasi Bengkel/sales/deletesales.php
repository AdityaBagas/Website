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
$id_sales = $_GET['id_sales'];
 
//deleting the row from table
$result=mysqli_query($conn, "DELETE FROM sales WHERE id_sales='$id_sales'");

 
//redirecting to the display page (view.php in our case)
header("Location:lihatsales.php");
?>
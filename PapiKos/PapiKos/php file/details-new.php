<?php
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	session_start();
	include('koneksi.php');
?>

<?php 
$idKos = $_GET["id"];

//query ambil data

$ambil = mysqli_query($connect,"SELECT * FROM tambahdatakos WHERE idKos='$idKos'") or
						die(mysqli_error($connect));  
						$detail=$ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>PapiKos-Detail</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="content.css">

</head>


<body background="bg.png">

<nav class="navbar navbar-expand-sm navbar-primary bg-light navbar-fixed-top">
  <!-- Brand/logo -->
  <!-- Links -->
  <ul class="nav navbar-nav">
	<a class="navbar-brand" href="indexuser.php">
		<img src="papikos.png" alt="logo" style="left;width:115px;height:29px;">
	</a>

	  <li class="nav-item">
      <a  href="index.php">Search</a>
    </li>
    <li class="nav-item">
      <a  href="termsuser.php">Terms and Conditions</a>
	</li>
	<li class="nav-item">
      <a  href="aboutuser.php">About Us</a>
	</li>
		<li class="nav-item">
      <a  href="profile.php">Profile</a>
	</li>
  </ul>
  <ul class="nav navbar-nav ml-auto">
	<li class="nav-item"><a  class="nav-link" href="indexkos.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	</ul>
</nav>

<section class="kontent">
	<div class="container">
		<br><br><br><br><br>
		<div class="row">
			<div class="col-md-6"><img src ="images/<?php echo $detail["foto"] ?>" width="500" height="300"s alt="" class="img-responsive"></div>

			<div class="col-md-6"> 
			 <h2>Nama Kost    			  : <?php echo $detail["namaKos"]; ?></h2>
		 	 <h3>Alamat Kost  			  : <?php echo $detail["alamatKos"]; ?></h3>
			 <h3>Luas Kost    			  : <?php echo $detail["luasKos"]; ?></h3>
			 <h3>Pemilik Kost 			  : <?php echo $detail["pemilik"]; ?></h3>
			 <h3>Telpon Kost  			  : <?php echo $detail["telp"]; ?></h3>
			 <h3>Keterangan Tambahan Kost : <?php echo $detail["ket_tambahan"]; ?></h3>
			 <br>
			 <a href = "form_ubah.php?id=<?php echo $detail['idKos'];?>" class = "btn btn-primary">Ubah</a>


		</div>


		</div>

		

		
	</div>
</section>
<br>
<section>
	<footer class="container-fluid bg-4 text-center">
		<a href="indexkos.php">
			<img src="papikos.png" alt="logo" style="left;width:180px;height:60px;">
		</a>
		<p><h3>Dapatkan "info kost murah" hanya di Papikos</h3></p>
		<p>Created By <a href="indexkos.php">www.Papikos.com</a></p> 
		<a href="https://www.facebook.com/" class="fa fa-facebook"></a>
		<a href="https://www.twitter.com/" class="fa fa-twitter"></a>
		<a href="https://www.instagram.com/" class="fa fa-instagram"></a>
	</footer>
</section>
	
</body>




</html>

<?php
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	session_start();
	include('koneksi.php');
?>

<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        
		<title>PapiKos-Home</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        
		<!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" >
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/OwlCarousel/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/OwlCarousel/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="assets/dist/css/main.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="content.css">

		
    </head>

	
 
<body background="bg.png">

	<!-- Navbar -->
<!-- <nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">
  <div class="container">
    <ul class="nav navbar-nav bg-dark">
		<li><a class="navbar-brand" href="index.php">
		<img src="papikos.png" alt="logo" style="width:100px;float:left;width:150px;height:50px"></a></li>
		<li><a href="#">Home</a></li>
		<li><a href="#">Home</a></li>
		<li><a href="#">Home</a></li>
		<li><a href="#">Home</a></li>
	</ul>
  </div>
</nav> -->
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
      <a  href="termuser.php">Terms and Conditions</a>
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

<!-- konten -->

<section class="konten">
	<div class = "container">
		<h1>Data Kos</h1>
		<br>
		<div class="row">
			<div class="col-md-12">
			<div class="row">
			<?php $ambil = mysqli_query($connect,"SELECT * FROM tambahdatakos") or
						die(mysqli_error($connect));  ?>
			<?php while($data=$ambil->fetch_assoc()){?>
				<div class="col-md-4 mx-0.5 p-3">
				<div class="img-thumbnail">

				<img src="images/<?php echo $data['foto'] ?>" width="350" height="250">
				<h4 align="center">Nama Kos   : <?php echo $data['namaKos']?></h4>
				
				<h4 align="center">Alamat Kos : <?php echo $data['alamatKos'] ?></h4>

				<h4 align="center"><a href = "details-new.php?id=<?php echo $data["idKos"] ?>"  class ="btn btn-primary">Details</a></h4>
				</div>
				</div>  
			<?php } ?>
			 </div>
			</div>
		</div>
	</div>
</section>
		<section class="konten">
        <footer class="container-fluid bg-4 text-center">
            <a href="indexuser.php">
		        <img src="papikos.png" alt="logo" style="left;width:300px;height:100px;">
            </a>
            <p><h3>Dapatkan "info kost murah" hanya di Papikos</h3></p>
            <p>Created By <a href="indexuser.php">www.Papikos.com</a></p> 
            <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
            <a href="https://www.twitter.com/" class="fa fa-twitter"></a>
            <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
        </footer>
    </section>


<script src="assets/dist//js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootsrtrap.min.js"></script>
<script src="assets/OwlCarousel/owl.carousel.min.js"></script>
</body>
</html>
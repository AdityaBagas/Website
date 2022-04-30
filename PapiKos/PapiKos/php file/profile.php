<html>
<head>
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
<!-- <div id="page" class="container" > -->
	<!-- <div id="header">
		<div id="logo">
			<img src="papikos.png" alt="" width="341" height="179" />
			
		</div>
		<div id="menu">
			<ul>
				<li> <a href="#" accesskey="1" title="">Homepage</a></li>
				<li class="current_page_item"><a href="profile.php" accesskey="2" title="">Profile</a></li>
				<li><a href="index.php" accesskey="3" title="">Logout</a></li>				
				<li><a href="#" accesskey="4" title="">Tentang Kami</a></li>
				<li><a href="#" accesskey="5" title="">Syarat Dan Ketentuan</a></li>
				<li><a href="#" accesskey="6" title="">Kebijakan Privasi</a></li>
			</ul>
		</div>
		
		
	</div> -->


<section class="konten">
    <br><br><br><br>
	<div class = "container">
		<div class="row row-centered">
            <!-- <div class="col-md-3">
                
            </div> -->
            <div class="card col-md-6 col-md-offset-3 text-center">
                    <div class="card-body">
                    <h1 class="card-title">Profile</h1>
                    <?php
			
include('koneksi.php');	
session_start();


$sql = "SELECT * FROM data_user WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_array($result);
$s=$row['upload'];?>


							<img src="uploads/<?php echo $row['upload'];?>" height="300" width="300"/><br><?php
							echo "Username :" . $row['username'].".<br>";
							echo "Name     :" . $row['name'].".<br>"; 
							echo "Alamat   :" . $row['alamat'].".<br>"; 	
							echo "Email    :" . $row['email'].".<br>";	
														
							
						
							
							
					
				
				?>
				<button type="button" class="btn btn-success btn-sm" onclick="window.location.href='editprofil.php'">Edit Profile</button>
				<button type="button" class="btn btn-success btn-sm" onclick="window.location.href='form_simpan.php'">Tambah Kos</button>
					</div>
					
            <!-- <div class="col-md-3">
                
            </div> -->
		</div>
    </div>
    <br>
</section>

<section class="konten">

<br>
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

	</body>
</html>
<!DOCTYPE html>
<html>
<head>
		<title>PapiKos-Login Admin</title>
		<link href="default.css" rel="stylesheet" type="text/css" media="all" />
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
	<!-- <div id="page" class="container1"> -->
		<!-- <div id="body"> -->
			<!-- <div id="logo"> -->
				<a href="indexkos.php">
					<img class="center" src="papikos.png" alt="" width="400" height="150" />
				</a>
				<!-- <div id="login"> -->
				<h2 class="text-center">Log in Admin</h2>
				<form action="Login-proses-Admin.php" method="post">
				<div class="container1 bg-light">
					<label for="username"><b>Username</b></label>	
					<input id="UsernameAdmin" class="input" type="text" name="UsernameAdmin" placeholder="Enter Username"/>
					<label for="password"><b>Password</b></label>
					<input id="PasswordAdmin" class="input" type="password" name="PasswordAdmin" placeholder="Enter Password"/>
					<br><input id="submitloginAdmin" type="submit" name="submitloginAdmin" value="login" />
				</div>
				<div class="container1" style="background-color:#f1f1f1">
					<a href="indexkos.php">
					<button type="button" class="cancelbtn"onclick="window.location.href='login.php'">Cancel</button>
						
				</div>
				</form>
			<!-- </div>	 -->
			<!-- </div> -->
		<!-- </div>
	</div> -->
	<section>
		<br>
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
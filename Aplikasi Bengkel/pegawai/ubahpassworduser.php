<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Kelola Data Pegawai</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="../assets/css/main.css" />
    </head>
    <body class="is-preload">
<header id="header">
				<a class="logo" href="../index.php">AtmaAuto</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
            </header>
            <nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="logout.php">Logout</a></li>
					<li><a href="sparepart.php">ketersediaan sparepart</a></li>
					<li><a href="informasi.php">informasi bengkel</a></li>
				</ul>
            </nav>
            <section id="cta" class="wrapper">
				<div class="inner">
                <p><font size="+2">Kelola Data Pegawai</font></p>
				</div>
            </section>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: ../login.php');
}
?>
 
<?php
// including the database connection file
include_once("../conn.php");
 
if(isset($_POST['update']))
{    

    $username = $_POST['username'];
    $passwordbaru = $_POST['passwordbaru'];
    $passwordlama = $_POST['passwordlama'];
    $passwordconfirm = $_POST['passwordconfirm'];
    $cekuser = "select password from users where username = '$username' and password = '$passwordlama'";
    $querycekuser = mysqli_query($conn,$cekuser);
    $count = mysqli_num_rows($querycekuser);
    
    // checking empty fields
    if(empty($passwordlama) || empty($passwordbaru) ||empty($passwordconfirm))   {                
        
            echo "<font color='red'>field is empty.</font><br/>"; 
                
    } 
    else if ($count < 1){
        echo "password lama atau username tidak cocok";
    }
    else if ($passwordbaru!=$passwordconfirm){
        echo "password baru dan password confirm tidak cocok";
    }
    else if ($count >= 1){

        $updatepassword = "update users set password = '$passwordbaru' where username= '$username'";
        
        $updatequery = mysqli_query($conn,$updatepassword);
        
        if($updatequery)
        
        {
        
        echo "Password telah diganti menjadi $passwordbaru";
        
        }
}
}
?>


<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
<br/><br/>
    <a href="../index_cs.php">Home</a>  | <a href="../logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="ubahpassword.php">
        <table border="0">
                  <tr> 
                    <td>username</td>
                    <td><input type="text" name="username"></td>
                </tr> 
                <tr> 
                    <td>password lama</td>
                    <td><input type="password" name="passwordlama"></td>
                </tr> 
                <tr> 
                    <td>password baru</td>
                    <td><input type="password" name="passwordbaru"></td>
                </tr>   
                <tr> 
                    <td>confirm password</td>
                    <td><input type="password" name="passwordconfirm"></td>
                </tr>       
                
            <tr>
               
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <footer id="footer">
				<div class="inner">
					<div class="content">
												
						<section>
							<h4>Temui Kami di</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
								<li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
								<li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
							</ul>
						</section>
					</div>
					<div class="copyright">
						&copy; Atmaauto Series Service <a href="https://unsplash.co"></a> <a href="https://coverr.co"></a>.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>
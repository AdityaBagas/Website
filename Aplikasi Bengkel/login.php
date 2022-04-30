<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
</head>
 
<body class="is-preload">
    <header id="header">
        <a class="logo" href="home.php">AtmaAuto</a>
        <nav>
                <a href="#menu">Menu</a>
        </nav>
    </header>
    <nav id="menu">
				<ul class="links">
					<li><a href="home.php">Home</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="sparepart.php">ketersediaan sparepart</a></li>
					<li><a href="informasi.php">informasi bengkel</a></li>
				</ul>
            </nav>
            <section id="banner">
				<div class="inner">
					<h1>Atmaauto Service Series</h1>
					<p>Tempat yang cocok untuk motor anda<br />					
				</div>
            </section>
<?php
include("conn.php");
 
if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
 
    if($username == "" || $password == "") {
		?>
        <center><font size="30">Either username or password field is empty</font></center>
        <br/>";
        <center><font size="20"><a href='login.php'>Go back</a></font></center>;
		<?php
    } else {
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'")
        or die("Could not execute the select query.");
        
        $row = mysqli_fetch_assoc($result);
        
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id_pegawai'] = $row['id_pegawai'];
            $_SESSION['id_role'] = $row['id_role'];
        } else {
			?>
            <center><font size="30" align="center"> Invalid username or password</font></center>;
			
            <br/>;
            <center><a href='login.php'><font size="20">Go back</font></a></center>;
			<?php
        }
 
        if(isset($_SESSION['valid'])) {
            if($row['id_role']=="1")
        {
            $_SESSION['username'] = $username;
            $_SESSION['id_role'] = "1";
            header('Location: index.php');    
        } 
            else if($row['id_role']=="2")   
        {
                $_SESSION['username'] = $username;
                $_SESSION['id_role'] = "2";
                header('Location: index_cs.php');    
		} 
			else if($row['id_role']=="3") 
			{
				$_SESSION['username'] = $username;
                $_SESSION['id_role'] = "3";
                header('Location: index_kasir.php');
			}
        }
    }
} else {
?>
    <p><font size="+2">Login</font></p>
    <form name="form1" method="post" action="">
        <table width="75%" border="0">
            <tr> 
                <td width="10%">Username</td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr> 
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Submit" id="submit"></td>
            </tr>
        </table>
    </form>
<?php
}
?>
<section id="cta" class="wrapper">
				<div class="inner">
					<h2>Berdiri sejak 19xx</h2>
					<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing sed feugiat eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
				</div>
            </section>

            <section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Testimoni Dari mereka</h2>
						<p>Selain dalam negeri, ASS (atmaauto series service) juga terkenal sampe ke luar negeri</p>
					</header>
					<div class="testimonials">
						<section>
							<div class="content">
								<blockquote>
									<p>pas malem, ni bengkel lampu nya ajeb ajeb gan</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/1.jpg" alt="" />
									</div>
									<p class="credit">- <strong>thomas alfa edison</strong> <span>Penemu Lampu Disko</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>e=mc2</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/3.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Einstein</strong> <span>Mad Scientist</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>WC nya manteb gan.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/2.jpg" alt="" />
									</div>
									<p class="credit">- <strong>herman williem</strong> <span>Mantan Pendjajah</span></p>
								</div>
							</div>
						</section>
					</div>
				</div>
            </section>
            
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
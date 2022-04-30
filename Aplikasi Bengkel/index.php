<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
<head>
    <title>Homepage Admin</title>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>
 
<body class="is-preload">
<header id="header">
				<a class="logo" href="index.php">AtmaAuto</a>
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
                <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai Admin </b>.</p>
				</div>
            </section>
            
    
    
    
    <?php
    if(isset($_SESSION['valid'])) {            
        include("conn.php");                    
        $result = mysqli_query($conn, "SELECT * FROM users");
    ?>                
        <section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Fungsi Admin</h2>
					</header>
					<div class="highlights">
						<section>
							<div class="content">
								<header>
									<a href="pegawai/lihatdata.php"><img src="images/user.png" height="256" width="256" span class="label"></span></a>
									<h3>Ubah Password</h3>
								</header>
								<p>Ubah password pegawai/admin</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="pegawai/lihatpegawai.php"><img src="images/user.png" height="256" width="256" span class="label" id="pegawai"></span></a>
									<h3>Pengelolaan Data Pegawai</h3>
								</header>
								<p>Insert Data,View Data,Delete Data,Update Data, dan Search data pegawai</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="sparepart/lihatsparepart.php"><img src="images/sparepart.png" height="256" width="256" span class="label"></span></a>
									<h3>Pengelolaan Data Sparepart</h3>
								</header>
								<p>Insert Data,View Data,Delete Data,Update Data, dan Search data Sparepart</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="servis/lihatservis.php" ><img src="images/servis.png" span class="label" ></span></a>
									<h3>Pengelolaan Data Servis</h3>
								</header>
								<p>Insert Data,View Data,Delete Data,Update Data, dan Search data servis</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="supplier/lihatsupplier.php" ><img src="images/supplier.png" height="256" width="256" span class="label"></span></a>
									<h3>Pengelolaan Data Supplier</h3>
								</header>
								<p>Insert Data,View Data,Delete Data,Update Data, dan Search data supplier</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="pengadaan/lihatpengadaan.php" ><img src="images/pengadaan.png" height="256" width="256"span class="label"></span></a>
									<h3>Pengelolaan Data Pengadaan</h3>
								</header>
								<p>Insert Data,View Data,Delete Data,Update Data, dan Search data pengadaan</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="cabang/lihatcabang.php" ><img src="images/supplier.png" height="256" width="256"span class="label"></span></a>
									<h3>Pengelolaan Data Cabang</h3>
								</header>
								<p>Insert Data,View Data,Delete Data,Update Data, dan Search data Cabang</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="sales/lihatsales.php" ><img src="images/user.png" height="256" width="256"span class="label"></span></a>
									<h3>Pengelolaan Data sales</h3>
								</header>
								<p>Insert Data,View Data,Delete Data,Update Data, dan Search data sales</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="laporan/indexlaporan.php" class="icon fa-qrcode"><span class="label">Icon</span></a>
									<h3>Laporan Dan Histori</h3> 
								</header>
								<p>Melihat berbagai macam laporan</p>
							</div>
						</section>
					</div>
				</div>
			</section>   
    <?php    
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='login.php'>Login</a> ";
    }
    ?>
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
<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
<head>
    <title>Laporan</title>
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
					<li><a href="../index.php">Home</a></li>
					<li><a href="../logout.php">Logout</a></li>
					<li><a href="sparepart.php">ketersediaan sparepart</a></li>
					<li><a href="informasi.php">informasi bengkel</a></li>
				</ul>
            </nav>
            <section id="cta" class="wrapper">
				<div class="inner">
                <p><font size="+2">Laporan Bengkel</font></p>
				</div>
            </section>
            
    
    
    
    <?php
    if(isset($_SESSION['valid'])) {            
        include("../conn.php");                    
        $result = mysqli_query($conn, "SELECT * FROM pengadaan");
    ?>                
        <section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Laporan</h2>
					</header>
					<div class="highlights">
						
						<section>
							<div class="content">
								<header>
									<a href="historibarang.php" class="icon fa-qrcode" height="256" width="256" span class="label"></span></a>
									<h3>Lihat Histori Barang</h3>
								</header>
								<p>Menampilkan dan mendownload histori dari barang</p>
							</div>
						</section>

						<section>
							<div class="content">
								<header>
									<a href="../transaksi/laporanterlaris.php" class="icon fa-qrcode" height="256" width="256" span class="label"></span></a>
									<h3>Laporan Spareparts Terlaris</h3>
								</header>
								<p>Menampilkan Spareparts terlaris</p>
							</div>
						</section>

						<section>
							<div class="content">
								<header>
									<a href="../laporan/pendapatanbulanan.php" class="icon fa-qrcode" height="256" width="256" span class="label"></span></a>
									<h3>Laporan Pendapatan Bulanan</h3>
								</header>
								<p>Melihat pendapatan tahunan</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="../laporan/pendapatantahunan.php" class="icon fa-qrcode" height="256" width="256"span class="label"></span></a>
									<h3>Laporan Pendapatan  Tahunan</h3>
								</header>
								<p>Melihat pendapatan tahunan</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="../laporan/laporanpengeluaran.php" class="icon fa-qrcode"><span class="label">Icon</span></a>
									<h3>Laporan Pengeluaran</h3>
								</header>
								<p>Melihat laporan pengeluaran</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="../laporan/laporanjasa.php" class="icon fa-qrcode"><span class="label">Icon</span></a>
									<h3>Laporan penjualan jasa</h3>
								</header>
								<p>Melihat laporan Penjualan jasa</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="../laporan/laporanstock.php" class="icon fa-qrcode"><span class="label">Icon</span></a>
									<h3>Laporan sisa stock</h3>
								</header>
								<p>Melihat sisa stock</p>
							</div>
						</section>
					</div>
				</div>
			</section>   
    <?php    
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='../login.php'>Login</a> ";
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
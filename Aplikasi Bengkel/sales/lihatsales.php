<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
    <title>Kelola Data Sparepart</title>
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
                <p><font size="+2">Kelola Data Sales</font></p>
				</div>
            </section>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: ../login.php');
}
?>
 
<?php
//including the database connection file
include_once("../conn.php");


 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($conn, "SELECT * FROM sales");
?>
<?php
    include("../conn.php");
 
    if(isset($_POST['submit'])) {
       // $id_sparepart = $_POST['id_sparepart'];
        $nama = $_POST['nama_sales'];
        $telp = $_POST['telp_sales'];
        $id_supplier = $_POST['id_supplier'];
 
        if( $nama == "" || $telp == ""|| $id_supplier == "" ) {
            ?>
            <center><font size="30">field is empty</font></center>
            <br/>";
            <center><font size="20"><a href='lihatsales.php'>Go back</a></font></center>;
            <?php
        } 
        else {
            mysqli_query($conn, "INSERT INTO sales(nama_sales,telp_sales,id_supplier) 
            VALUES('$nama','$telp','$id_supplier')")
            or die(mysqli_error($conn));
            
            ?>
            <center><font size="30">regist sales succes</font></center>
            <br/>";
            <center><font size="20"><a href='lihatsales.php'>Go back</a></font></center>;
            <?php
        }
    } 
     
    else {
?>
        <p><font size="+2">Kelola Data Sales</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
              
                <tr> 
                    <td width="20%">nama Sales</td>
                    <td><input type="text" name="nama_sales"></td>
                </tr>
                <tr> 
                    <td>telp sales</td>
                    <td><input type="number" name="telp_sales"></td>
                </tr>
                <tr>
                <td width="10%">Supplier</td>	
			
            <td>
            <select name="id_supplier">
            <option value="" selected="selected">-</option>
                <?php
                include "../conn.php";
                $combobox = "SELECT * FROM supplier";
                $hasil = mysqli_query($conn,$combobox);
                while ($data = mysqli_fetch_assoc($hasil))
                {
                    echo "<option value='".$data['id_supplier']."'>".$data['nama_supplier']."</option>";				
                }
                ?>
            </select>
            </td>
                <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Tambahkan supplier"></td>
                </tr>
            </table>
        </form>
        
    <?php
    }
    ?>
 
<html>
<head>
    <title>Kelola Costumer</title>
</head>
 
<body>
<a href="../index.php">Home</a> | <a href="../logout.php">Logout</a>
<br/><br/>
   
</table> 
<form action="" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
 
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
 
<table border="1">
	<tr>
		<th>id_sales</th>
		<th>nama</th>
        <th>telp</th>
        <th>supplier</th>
        <th>action</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
        $data = mysqli_query($conn,"select sales.nama_sales,
        supplier.nama_supplier,
        sales.id_sales,
        sales.telp_sales
         from sales 
         INNER JOIN supplier ON supplier.id_supplier = sales.id_supplier
         where CONCAT(nama_sales,id_sales,nama_supplier) like '%".$cari."%'");				
	}else{
		$data = mysqli_query($conn,"select sales.nama_sales,
        supplier.nama_supplier,
        sales.id_sales,
        sales.telp_sales
         from sales 
         INNER JOIN supplier ON supplier.id_supplier = sales.id_supplier");		
	}
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_sales']; ?></td>
        <td><?php echo $d['nama_sales']; ?></td>
        <td><?php echo $d['telp_sales']; ?></td>
        <td><?php echo $d['nama_supplier']; ?></td>
        <td><?php echo "<a href=\"editsales.php?id_sales=$d[id_sales]\">Edit</a> | 
        <a href=\"deletesales.php?id_sales=$d[id_sales]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"?></td>;
	</tr>
	<?php } ?>
</table>   
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
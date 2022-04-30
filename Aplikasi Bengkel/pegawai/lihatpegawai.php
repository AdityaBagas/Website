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
//including the database connection file
include_once("../conn.php");


 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($conn, "SELECT * FROM users");

?>
<?php
    include("../conn.php");
  
    if(isset($_POST['submit'])) {
        //$id_pegawai = $_POST['id_pegawai'];
        $id_cabang = $_POST['id_cabang'];
        $id_role = $_POST['id_role'];
        $name = $_POST['name'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
 
        if($id_role == "" ||$id_cabang == "" ||$username == "" || $password == "" || $name == ""|| $alamat == ""|| $telp == "") {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='lihatpegawai.php'>Go back</a>";
        } 
        else {
            mysqli_query($conn, "INSERT INTO users(id_cabang,id_role,name, alamat,telp, username, password) 
            VALUES('$id_cabang','$id_role','$name', '$alamat','$telp', '$username', '$password')")
            or die(mysqli_error($conn));
            
            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='lihatpegawai.php'>tambahkan lagi||</a>";
        }
    } 
     
    else {
?>
        <p><font size="+2">Kelola Data Pegawai</font></p>
        <form name="form1" method="post" action="">
            <table width="75%" border="0">
                
                <tr>
                <td width="10%">Cabang</td>	
			
            <td>
            <select name="id_cabang">
            <option value="" selected="selected">-</option>
                <?php
                include "../conn.php";
                $combobox = "SELECT * FROM cabang";
                $hasil = mysqli_query($conn,$combobox);
                while ($data = mysqli_fetch_assoc($hasil))
                {
                    echo "<option value='".$data['id_cabang']."'>".$data['nama_cabang']."</option>";				
                }
                ?>
            </select>
            </td>
			
	</tr>
    <tr>
    <td width="10%">Role</td>	
			
            <td>
            <select name="id_role">
            <option value="" selected="selected">-</option>
                <?php
                include "../conn.php";
                $combobox = "SELECT * FROM role ";
                $hasil = mysqli_query($conn,$combobox);
                while ($data = mysqli_fetch_assoc($hasil))
                {
                    echo "<option value='".$data['id_role']."'>".$data['nama_role']."</option>";				
                }
                ?>
            </select>
            </td>
			
	</tr>
                <tr> 
                    <td>name</td>
                    <td><input type="text" name="name"></td>
                </tr> 
                <tr> 
                    <td>alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>   
                <tr> 
                    <td>telp</td>
                    <td><input type="text" name="telp"></td>
                </tr>       
                <tr> 
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr> 
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Tambahkan Pegawai"></td>
                </tr>
            </table>
        </form>
        
    <?php
    }
    ?>
 
<html>
<head>
    <title>Kelola Pegawai</title>
</head>
 
<body>
<a href="../index.php">Home</a> |  <a href="../logout.php">Logout</a>
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
		<th>id_pegawai</th>
		<th>cabang</th>
        <th>role</th>
        <th>nama</th>
        <th>alamat</th>
        <th>telp</th>
        <th>username</th>
        <th>action</th>
        
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($conn,"SELECT users.id_pegawai,
        users.name,
        users.alamat,
        users.telp,
        users.username,
        cabang.nama_cabang,
        role.nama_role from users
        INNER JOIN cabang ON cabang.id_cabang = users.id_cabang
        INNER JOIN role ON role.id_role = users.id_role
         where CONCAT(id_pegawai, name, nama_cabang, username,nama_role) like '%".$cari."%'");				
	}else{
		$data = mysqli_query($conn,"SELECT users.id_pegawai,
        users.name,
        users.alamat,
        users.telp,
        users.username,
        cabang.nama_cabang,
        role.nama_role 
        from users
        INNER JOIN cabang ON cabang.id_cabang = users.id_cabang
        INNER JOIN role ON role.id_role = users.id_role");		
    }
    
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $d['id_pegawai']; ?></td>
        <td><?php echo $d['nama_cabang']; ?></td>
        <td><?php echo $d['nama_role']; ?></td>
        <td><?php echo $d['name']; ?></td>
        <td><?php echo $d['alamat']; ?></td>
        <td><?php echo $d['telp']; ?></td>
        <td><?php echo $d['username']; ?></td>
        
        <td><?php echo "<a href=\"editpegawai.php?id_pegawai=$d[id_pegawai]\">Edit</a> | 
        <a href=\"deletepegawai.php?id_pegawai=$d[id_pegawai]\">Delete</a>"?></td>;
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
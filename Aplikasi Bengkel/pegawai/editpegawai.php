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
    $id_pegawai = $_POST['id_pegawai'];
    $id_cabang = $_POST['id_cabang'];
    $id_role = $_POST['id_role'];
    $name = $_POST['name'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // checking empty fields
    if(empty($id_cabang) || empty($id_role) ||empty($name)|| empty($alamat) || empty($telp))   {                
        
            echo "<font color='red'>field is empty.</font><br/>"; 
                
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE users SET id_pegawai='$id_pegawai', id_cabang='$id_cabang',id_role='$id_role', name='$name', alamat='$alamat', telp='$telp' WHERE id_pegawai=$id_pegawai");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: lihatpegawai.php");
    }
}
?>
<?php
//getting id from url
$id_pegawai = $_GET['id_pegawai'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM users WHERE id_pegawai=$id_pegawai");
while($res = mysqli_fetch_array($result))
{
    $id_pegawai = $_GET['id_pegawai'];
    
    $name = $res['name'];
    $alamat = $res['alamat'];
    $telp = $res['telp'];
    $id_role = $res['id_role'];
    $id_cabang = $res['id_cabang'];
   
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="../index.php">Home</a> | <a href="lihatpegawai.php">View Pegawai</a> | <a href="../logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editpegawai.php">
        <table border="0">
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
                <td><input type="hidden" name="id_pegawai" value=<?php echo $_GET['id_pegawai'];?>></td>
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
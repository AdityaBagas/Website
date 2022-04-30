
<?php
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	session_start();
	include('koneksi.php');
?>

<?php 
$idKos = $_GET["id"];


$ambil = mysqli_query($connect,"SELECT * FROM tambahdatakos WHERE idKos='$idKos'") or
						die(mysqli_error($connect));  
						$detail=$ambil->fetch_assoc();

?>

<!DOCTYPE html>
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
      <a  href="terms.php">Terms and Conditions</a>
	</li>
	<li class="nav-item">
      <a  href="about.php">About Us</a>
	</li>
		<li class="nav-item">
      <a  href="profile.php">Profile</a>
	</li>
  </ul>
  <ul class="nav navbar-nav ml-auto">
	<li class="nav-item"><a  class="nav-link" href="indexkos.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	</ul>
</nav>
  <br><br>
  <h2 class="text-center"> Edit Data Kost </h2>
  
  <form method="post" enctype="multipart/form-data">
  <div class="container1 bg-light">
    <div class="form-group">
      <label>Nama Kost : </label>
      <input type="text" name="namaKos" class="form-control" value="<?php echo $detail['namaKos']; ?>">
    </div>

    <div class="form-group">
      <label>Alamat Kost : </label>
      <input type="text" name="alamatKos" class="form-control" value="<?php echo $detail['alamatKos']; ?>">
    </div>

    <div class="form-group">
      <label>Luas Kost : </label>
      <input type="text" name="luasKos" class="form-control" value="<?php echo $detail['luasKos']; ?>">
    </div>

    <div class="form-group">
      <label>Pemilik Kost : </label>
      <input type="text" name="pemilik" class="form-control" value="<?php echo $detail['pemilik']; ?>">
    </div>

    <div class="form-group">
      <label>Telepon Kost : </label>
      <input type="text" name="telp" class="form-control" value="<?php echo $detail['telp']; ?>">
    </div>

    <div class="form-group">
      <label>Keterangan tambahan Kost : </label>
      <textarea name="ket_tambahan" class="form-control" rows="10"><?php echo $detail['ket_tambahan']; ?></textarea>
    </div>

    <div class="form-group">
      <img src="images/<?php echo $detail['foto']; ?>" width="200" alt="">
    </div>

    <div class="form-group">
      <label>Ganti Foto</label>
      <input type="file" name="foto" class="form-control">
    </div>
    

    <button class="btn btn-primary" name="submit">Simpan</button>
    </div>
  </form>
  <section class="konten">
      <footer class="container-fluid bg-4 text-center">
          <a href="indexkos.php">
          <img src="papikos.png" alt="logo" style="left;width:300px;height:100px;">
          </a>
          <p><h3>Dapatkan "info kost murah" hanya di Papikos</h3></p>
          <p>Created By <a href="https://mamikos.com/">www.Mamikos.com</a></p> 
          <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
          <a href="https://www.twitter.com/" class="fa fa-twitter"></a>
          <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
      </footer>
    </section>




</body>

</html>

<?php
if(isset($_POST['submit']))
{	
	$foto=$_POST['foto'];


	$file_name = $_FILES['foto']['name'];
		
	
    $file_type = $_FILES['foto']['type'];
    $file_tmp_name = $_FILES['foto']['tmp_name'];
    $file_size = $_FILES['foto']['size'];
	$target_dir = "images/";
    if(!empty($file_tmp_name))
    {
      move_uploaded_file($file_tmp_name,$target_dir.$file_name);
	  session_start();
	  $update = mysqli_query($connect,"UPDATE tambahdatakos SET namaKos='$_POST[namaKos]',alamatKos='$_POST[alamatKos]', luasKos='$_POST[luasKos]', pemilik='$_POST[pemilik]', telp='$_POST[telp]', ket_tambahan='$_POST[ket_tambahan]', foto='$file_name' WHERE idKos='$_GET[id]'")
	or die(mysqli_error($connect));
      //$koneksi->query("UPDATE tambahdatakos SET namaKos='$_POST[namaKos]', alamatKos='$_POST[alamatKos]', luasKos='$_POST[luasKos]', pemilik='$_POST[pemilik]', telp='$_POST[telp]', ket_tambahan='$_POST[ket_tambahan]', foto='$file_name' WHERE idKos='$_GET[id]'");
    }
    else
    {
      $connect->query("UPDATE tambahdatakos SET namaKos='$_POST[namaKos]', alamatKos='$_POST[alamatKos]', luasKos='$_POST[luasKos]', pemilik='$_POST[pemilik]', telp='$_POST[telp]', ket_tambahan='$_POST[ket_tambahan]' WHERE idKos='$_GET[id]'");
    }
    echo "<script> alert('data kost berhasil diubah');</script>";
    echo "<script> location='indexuser.php';</script>";


}
?>
<html>
<head>
  <title>Papikos-Add</title>
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
  <h1>Tambah Data Kos</h1>
  <h2 class="text-center">Tambah Kos</h2>
  <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
  <div class="container1 bg-light">
    <label for="namaKos"><b>Nama Kos</b></label>
    <input type="text" placeholder="Enter Nama Kos" name="namaKos" required>
    <label for="idKos"><b>ID Kos</b></label>
    <input type="text" placeholder="Enter Id Kos" name="idKos" required>
    <label for="alamatKos"><b>Alamat Kos</b></label>
    <input type="text" placeholder="Enter Alamat Kos" name="alamatKos" required>
    <label for="luasKos"><b>Luas Kos</b></label>
    <input type="text" placeholder="Enter Luas Kos" name="luasKos" required>
    <label for="pemilik"><b>Pemilik Kos</b></label>
    <input type="text" placeholder="Enter Pemilik Kos" name="pemilik" required>
    <label for="telp"><b>Telephone</b></label>
    <input type="text" placeholder="Enter Nomor Telephone" name="telp" required>
    <label for="foto"><b>Foto</b></label>
    <input type="file"  name="foto" required>  
    <label for="ket_tambahan"><b>Keterangan Tambahan</b></label>
    <textarea  class="form-control" name="ket_tambahan" required cols=50></textarea>
</div>


  <!-- <table cellpadding="8">
  <tr>
    <td>Nama Kos</td>
    <td><input type="text" name="namaKos"></td>
  </tr> -->
  <!-- <tr>
    <td>ID Kos</td>
    <td><input type="text" name="idKos"></td>
  </tr> -->
  <!-- <tr>
    <td>Alamat Kos</td>
    <td><input type="text" name="alamatKos"></td>
  </tr> -->
  <!-- <tr>
    <td>Luas Kos</td>
    <td><input type="text" name="luasKos"></td>
  </tr> -->
  <!-- <tr>
    <td>Pemilik</td>
    <td><input type="text" name="pemilik"></td>
  </tr>
  <tr>
    <td>Telepon</td>
    <td><input type="text" name="telp"></td>
  </tr> -->
  <!-- <tr>
    <td>Keterangan Tambahan</td>
    <td><textarea name="ket_tambahan"></textarea></td>
  </tr>
  <tr>
    <td>Foto</td>
    <td><input type="file" name="foto"></td>
  </tr>
  </table> -->
  
  <hr>
  <a href="indexuser.php"><input class="btn btn-primary" type="submit" value="Simpan"></a>
  <a href="indexuser.php"><input class="btn btn-primary" type="button" value="Batal"></a>
  </form>
  </section>
  <br>
    <section>
        <footer class="container-fluid bg-4 text-center">
            <a href="indexuser.php">
		        <img src="papikos.png" alt="logo" style="left;width:180px;height:60px;">
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
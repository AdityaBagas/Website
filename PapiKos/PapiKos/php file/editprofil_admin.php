<!DOCTYPE html>
<html lang="en"> 



 <head>
		<title>Edit User</title>
		<link href="default.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="content.css">	
		<script type="text/javascript">
		function fn_ValReserve()
			{
                var re = /^[a-z0-9][a-z0-9_\.]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
                var reg = /^\d+$/;
				var sMsg = "";
				if(document.getElementById("name").value == ""){
					sMsg += ("\n* Anda belum mengisikan nama");
				}
				if(document.getElementById("username").value == ""){
					sMsg += ("\n* Anda belum mengisikan username");
				}
				
				if(document.getElementById("alamat").value == ""){
					sMsg += ("\n* Anda belum mengisikan alamat");
				}
				if(document.getElementById("email").value == ""){
					sMsg += ("\n* Anda belum mengisikan email");
				}
				if(document.getElementById("email").value != ""){
					if(!re.test(document.getElementById("Email").value))
					sMsg += ("\n* Email Invalid");
				}
                if(document.getElementById("telp").value == ""){
					sMsg += ("\n* Anda belum mengisikan nomor telepon anda");
				}
                if(document.getElementById("telp").value != ""){
                    if(!reg.test(document.getElementById("telp").value))
					sMsg += ("\n* Nomor Telepon Hanya boleh diisi angka");
				}
                
				
				if(sMsg != ""){
					alert("Peringatan:\n" + sMsg);
          return false;
				}
        else {
          return true;
        }
      }
	  
	  
	  
	  </script>
	</head>
	<body background="bg.png">
	
	<a href="indexAdmin.php">
        <img class="center" src="papikos.png" alt="" width="400" height="150" />
    </a>
    <section class="contact-area section-padding-100">
<!-- <div class="container">
<div class="row justify-content-center">
<div class="col-12 col-md-10 col-lg-8"> -->
				  <form method="POST" enctype="multipart/form-data">
                      <!-- <fieldset class="fieldset"> <br> -->
                      <div class="container1 bg-light">
                          <legend class="legend text-center">Edit Profile</legend>
                          <!-- <div class="field">
                              <div class="col-12 col-md-6"> -->
                                    <!-- <div class="group"> -->
                                    <div>
                                        <label for="name">Masukan Nama</label>
                                        <input id="name" class="input" type="text" name="name" size="30" placeholder="Name"/> <br>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                        
                                    <!-- </div>
                                </div> -->
								<!-- <div class="col-12 col-md-6">
                                    <div class="group"> -->
                                    <div>
                                        <label for="username">Masukan Username</label>    
                                        <input id="username" class="input" type="text" name="username" size="30" placeholder="Username"/> <br>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                    <!-- </div>
                                </div> -->
                              <!-- <div class="col-12 col-md-6">
                                    <div class="group"> -->
                                   
                                    <!-- </div>
                                </div> -->
								<!-- <div class="col-12 col-md-6">
                                    <div class="group"> -->
                                    <div>
                                        <label>Masukan Alamat </label>
                                        <input id="alamat" class="input" type="text" name="alamat" size="30" placeholder="Alamat"/> <br>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                <!-- </div>								 -->
								
								<!-- <div class="col-12 col-md-6">
                                    <div class="group">
                                        <br>  -->
                                    <div>
                                        <label for="upload">Masukan Foto Anda</label>
										<input type="file" name="upload" id="upload" class="upload" size="30"><br>										
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                <!-- </div> -->
								
                          </div>
                      <br> </fieldset>
					  <input id="submitadmin" class="btn world-btn" type="submit" name="submitadmin" value="submit" onclick="fn_ValReserve()"/>
					  </form>
					
                  </section>


                  <section>
                      <br>
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

<?php
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	session_start();
	include('koneksi.php');
?>

<?php
if(isset($_POST['submitadmin']))
{	
	$upload=$_POST['upload'];


	$file_name = $_FILES['upload']['name'];
		
	
    $file_type = $_FILES['upload']['type'];
    $file_tmp_name = $_FILES['upload']['tmp_name'];
    $file_size = $_FILES['upload']['size'];
	$target_dir = "uploads/";
    if(!empty($file_tmp_name))
    {
      move_uploaded_file($file_tmp_name,$target_dir.$file_name);
	  session_start();
	  $update = mysqli_query($connect,"UPDATE data_user SET name='$_POST[name]',username='$_POST[username]', alamat='$_POST[alamat]',upload='$file_name' WHERE id='$_GET[id]'")
	or die(mysqli_error($connect));
      //$koneksi->query("UPDATE tambahdatakos SET namaKos='$_POST[namaKos]', alamatKos='$_POST[alamatKos]', luasKos='$_POST[luasKos]', pemilik='$_POST[pemilik]', telp='$_POST[telp]', ket_tambahan='$_POST[ket_tambahan]', foto='$file_name' WHERE idKos='$_GET[id]'");
    }
    else
    {
      $connect->query("UPDATE data_user SET name='$_POST[name]',username='$_POST[username]', alamat='$_POST[alamat]',upload='$file_name' WHERE id='$_GET[id]'");
    }
    echo "<script> alert('data User berhasil diubah');</script>";
    echo "<script> location='listUser.php';</script>";


}
?>
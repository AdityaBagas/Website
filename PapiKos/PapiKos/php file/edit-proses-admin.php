<?php
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	session_start();
	include('koneksi.php');
?>
<?php

    if(isset($_POST['submitadmin'])){
		include('koneksi.php');
		
        $id=$_GET['id'];
		$name    = $_POST['name'];
		$username  = $_POST['username'];
		$alamat  = $_POST['alamat'];

		


		$upload=$_POST['upload'];
		$file_name = $_FILES['upload']['name'];
		
		
    $file_type = $_FILES['upload']['type'];
    $file_tmp_name = $_FILES['upload']['tmp_name'];
    $file_size = $_FILES['upload']['size'];

 
	$target_dir = "uploads/";
	
	if(move_uploaded_file($file_tmp_name,$target_dir.$file_name))
{
	// connect to database
    session_start();
	$update = mysqli_query($connect,"UPDATE data_user SET name='$name',username='$username' ,alamat='$alamat',upload='$file_name' WHERE id='$id'")
	or die(mysqli_error($connect));
	

	
	
}


else
{
	echo "File can not be uploaded";
}
         if($update){
            echo 'Data berhasil di simpan!'; 
             echo '<a href="listUser.php">Kembali</a>';
        }else{
            echo 'Gagal menyimpan data!';
            echo '<a href="editprofil_admin.php">Kembali</a>';
        }

	}    
    
?>
<?php

    if(isset($_POST['submit'])){
		include('koneksi.php');
		mysqli_select_db($connect,"papikoss_store") or die(mysqli_error($connect));
        
		$name    = $_POST['name'];
		$username  = $_POST['username'];
		$alamat  = $_POST['alamat'];
		$password=$_POST['password'];
		


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
	$update = mysqli_query($connect,"UPDATE data_user SET name='$name',username='$username' ,alamat='$alamat',password='$password',upload='$file_name' 
	WHERE username='".$_SESSION['username']."'")
	or die(mysqli_error($connect));
	
	$_SESSION['username'] = $username;
	
	
}


else
{
	echo "File can not be uploaded";
}
         if($update){
            echo 'Data berhasil di simpan!'; 
            header("location: profile.php");
        }else{
            echo 'Gagal menyimpan data!';
            echo '<a href="editprofil.php">Kembali</a>';
        }

	}    
    
?>
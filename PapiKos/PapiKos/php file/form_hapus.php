<?php
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	include ('koneksi.php');

	$idKos=$_GET['id'];
	


	$cek= mysqli_query($connect," SELECT *  FROM tambahdatakos where idKos ='$idKos'") or die (mysqli_error($connect));
	
	if(mysqli_num_rows($cek)==0 ){
			
		echo '<script> windows.history.back()</script>';
	}else {
		
		
		$del= mysqli_query($connect, "DELETE FROM tambahdatakos where idKos='$idKos'");

		if($del){
		echo 'Data berhasil di hapus ';
		echo'<a href = "indexAdmin.php">Kembali </a>';

		}
		else{

		echo 'Gagal menghapus data ';
		echo'<a href = "details-admin.php">Kembali </a>';
		}
	}

	

?>
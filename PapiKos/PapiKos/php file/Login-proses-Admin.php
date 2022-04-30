<?php
if(isset($_POST['submitloginAdmin']))
{
	include('koneksi.php');
	mysqli_select_db($connect,"papikoss_store") or die(mysqli_error($connect));
	
	
	
	if(isset($_POST['UsernameAdmin']) && !empty($_POST['UsernameAdmin']) AND isset($_POST['PasswordAdmin']) && !empty($_POST['PasswordAdmin'])){
    $UsernameAdmin = $_POST['UsernameAdmin'];
    $PasswordAdmin = $_POST['PasswordAdmin'];
                 
    $search = mysqli_query($connect,"SELECT UsernameAdmin, PasswordAdmin FROM Admin WHERE UsernameAdmin='".$UsernameAdmin."' AND PasswordAdmin='".$PasswordAdmin."'") or die(mysqli_error($connect)); 
    $match  = mysqli_num_rows($search);
	if($match > 0){
    echo "Login Complete! Thanks";
		session_start();
		$_SESSION['UsernameAdmin'] = $UsernameAdmin;

	
         
         header("location: indexAdmin.php");

}else{
   echo "Login Failed! Please make sure that you enter the correct details and that you have activated your account.";
   header("location: loginAdmin.php");
}
}

}
?>
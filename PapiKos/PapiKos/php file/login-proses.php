<?php
if(isset($_POST['submitlogin']))
{
	include('koneksi.php');
	mysqli_select_db($connect,"papikoss_store") or die(mysqli_error($connect));
	
	
	
	if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
                 
    $search = mysqli_query($connect,"SELECT username, password, active FROM data_user WHERE username='".$username."' AND password='".$password."' AND active='1'") or die(mysqli_error($connect)); 
    $match  = mysqli_num_rows($search);
	if($match > 0){
    echo "Login Complete! Thanks";
		session_start();
		$_SESSION['username'] = $username;

	
         
         header("location: indexuser.php");

}else{
   echo "Login Failed! Please make sure that you enter the correct details and that you have activated your account.";
   header("location: login.php");
}
}

}
?>
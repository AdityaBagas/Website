<?php

include('registrasi.php');
include('registrasi-proses.php');
	$email  = $_POST['email'];
	
	$username=$_POST['username'];
	$password =rand(1000,5000);
	$alamat  = $_POST['alamat'];
	$hash = md5(rand(0,1000));
	$active=0;
    $input = mysqli_query($link,"INSERT INTO data_user VALUES(NULL,'$name','$username' ,'$password','$email','$alamat','$hash','$active')") 
	or die(mysqli_error($link));
$email=$_POST['email']; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$username.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://www.yourwebsite.com/verify.php?email='.$email.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
mail($email, $subject, $message, $headers); // Send our email

?>
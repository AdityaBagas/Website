<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
if(isset($_POST['submit'])){
    include('koneksi.php');
	
	
	$name    = $_POST['name'];
	$email  = $_POST['email'];
	
	$username=$_POST['username'];
	$password =rand(1000,5000);
	$alamat  = $_POST['alamat'];
	$hash = md5(rand(0,1000));
	$active=0;
	
	$file_name = $_FILES['upload']['name'];
    $file_type = $_FILES['upload']['type'];
    $file_tmp_name = $_FILES['upload']['tmp_name'];
    $file_size = $_FILES['upload']['size'];
 
	$target_dir = "uploads/";
	
	
	
	$mail = new PHPmailer();
	$mail->CharSet = 'UTF-8';
    $mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->Host = "mail.paw-kel-11.site";
	$mail->Mailer   = "smtp";
    $mail->From = "no-reply@paw-kel-11.site";
    $mail->FromName = 'Admin';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "no-reply@paw-kel-11.site";
	$mail->Password = "sC(vY9?TvDb*";
	$mail->addAddress($email);
	$message = '
 
Thanks for signing up! <br>
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br>
 
<br>------------------------<br>
Username: '.$username.'<br>
Password: '.$password.'<br>
<br>------------------------<br>
 
Please click this link to activate your account:<br>
http://papikos.site/verify.php?email='.$email.'&hash='.$hash.'<br>
 
';
$mail->IsHTML(true);
$mail->Subject = "Verifikasi Akun";
$mail->msgHTML($message);






if(move_uploaded_file($file_tmp_name,$target_dir.$file_name))
{
	// connect to database

	$input = mysqli_query($connect,"INSERT INTO data_user VALUES(NULL,'$name','$username' ,'$password','$email','$alamat','$hash','$active','$file_name')") 
	or die(mysqli_error($connect));
}
else
{
	echo "File can not be uploaded";
}
     
	   
	if(!$mail->Send()) {
echo "Problem sending email."; echo 'Mailer Error: ' . $mail->ErrorInfo; }
else 
echo "Segera verifikasi akun anda pada email yang telah didaftarkan. jika sudah silahkan klik <a href=login.php>Login</a> ";

  
}




?>
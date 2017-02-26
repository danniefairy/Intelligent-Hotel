<?php
	require_once('PHPMailer-master/PHPMailerAutoload.php');;
	$mail = new PHPMailer(true);

	//Send mail using gmail
	if(true){
	    $mail->IsSMTP(); // telling the class to use SMTP
	    $mail->SMTPAuth = true; // enable SMTP authentication
	    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	    $mail->Port = 465; // set the SMTP port for the GMAIL server
	    $mail->Username = "dannienctu@gmail.com"; // GMAIL username
	    $mail->Password = "a81121407"; // GMAIL password
	}
	$email="dannienctu@gmail.com";
	$name="dannie";




	//從誰寄來的
	$email_from=$_GET['email'];
	$name_from=$_GET['name'];
	//Typical mail data
	$mail->AddAddress($email, $name);
	$mail->SetFrom($email_from, $name_from);
	$mail->Subject = $_GET['subject'];
	$mail->Body = $_GET['message'];

	try{
	    $mail->Send();
	    echo "Success!";
	    header("location:.././about.php?send_email=1");
	} catch(Exception $e){
	    //Something went bad
	    echo "Fail - " . $mail->ErrorInfo;
	    //also at class.phpmailer.php 1023
	    header("location:../about.php?err=1");
	}

?>
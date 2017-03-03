<?php
	session_start();
	echo $_SESSION['db_id'];
	$db_id=$_SESSION['db_id'];
	$name=$_GET['name'];
	$email=$_GET['email'];
	$country=$_GET['country'];
	$phone=$_GET['phone'];
	$check_in=$_GET['check_in'];
	$check_out=$_GET['check_out'];
	$button=$_GET['button'];
	$person=$_GET['person'];
	$room=$_GET['room'];
	$style=$_GET['style'];
	$message=$_GET['message'];

	$payment=$_GET['payment'];
	$breakfast=$_GET['breakfast'];

	//echo $name."<br>".$email."<br>".$country."<br>".$phone."<br>".$check_in."<br>".$check_out."<br>".$button."<br>".$person."<br>".$room."<br>".$message."<br>";

	include 'connect_db.php';
	$insert="INSERT INTO `book` (`db_id`,`name`,`email`,`country`,`phone`,`check_in`,`check_out`,`comfort`,`person`,`room`,`style`,`breakfast`,`message`) VALUES (\"$db_id\",\"$name\",\"$email\",\"$country\",\"$phone\",\"$check_in\",\"$check_out\",\"$button\",\"$person\",\"$room\",\"$style\",\"$breakfast\",\"$message\")";
	mysqli_query($connect,$insert);
	echo "<br>".mysqli_error($connect);
	
	if($payment=="credit card")
		header("location:../../credit_card/index.php");
	elseif ($payment=="paypal") {
		header("location:https://www.paypal.com/tw/home");
	}
	else{
		header("location:../index.php?book=1");
	}
?>
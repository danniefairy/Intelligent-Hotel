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
	$message=$_GET['message'];

	echo $name."<br>".$email."<br>".$country."<br>".$phone."<br>".$check_in."<br>".$check_out."<br>".$button."<br>".$person."<br>".$room."<br>".$message."<br>";

	include 'connect_db.php';
	$insert="INSERT INTO `book` (`db_id`,`name`,`email`,`country`,`phone`,`check_in`,`check_out`,`comfort`,`person`,`room`,`message`) VALUES (\"$db_id\",\"$name\",\"$email\",\"$country\",\"$phone\",\"$check_in\",\"$check_out\",\"$comfort\",\"$person\",\"$room\",\"$message\")";
	mysqli_query($connect,$insert);
	echo "<br>".mysqli_error($connect);
?>
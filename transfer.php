<?php
    include 'db_connect.php';
	if(isset($_GET['name'])){
		echo $_GET['name'].$_GET['gender'].$_GET['email'];
		$name=$_GET['name'];
		$gender=$_GET['gender'];
		$email=$_GET['email'];
		$insert="INSERT INTO `hotel` (`name`,`gender`,'email') VALUES (\"$name\",\"$gender\",\"email\")";
		mysqli_query($connect,$insert);
		echo "send";
	}
?>

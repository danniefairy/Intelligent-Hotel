<?php
	include "../connect_db.php";
	$friend_name=$_GET['give_to'];
	$store_manager_id=$_GET['store_id'];
	$num=$_GET['num'];
	echo $friend_name;

	$search="SELECT `id` FROM `hotel` WHERE `name`=\"$friend_name\"";
	$result=mysqli_query($connect,$search);
	$row=mysqli_fetch_array($result);
	$friend_id=$row[0];
	echo $friend_id;
	$insert="INSERT INTO `coupon` (`customer_id`,`store_manager_id`,`serial_number`) VALUES (\"$friend_id\",\"$store_manager_id\",\"$num\")";
	mysqli_query($connect,$insert);
	echo"<script type=\"text/javascript\">
		alert(\"Sending coupon successfully!\")
		</script>";
	//header("location:http://danniehotel.azurewebsites.net/Home/index-2.php#/coupon");
?>

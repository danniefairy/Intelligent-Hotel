<?php
	include "../connect_db.php";
	session_start();
	$customer_id=$_SESSION['db_id'];
	if(isset($_GET['store_manager_id'])){
		$store_manager_id=$_GET['store_manager_id'];
		$find_exit="SELECT * FROM coupon WHERE `customer_id`=\"$customer_id\" AND `store_manager_id`=\"$store_manager_id\"";
		$result=mysqli_query($connect,$find_exit);

		if(mysqli_num_rows($result)==0){
			
			$serial_number=(string)rand(1000,9999);
			$insert="INSERT INTO `coupon` (`customer_id`,`store_manager_id`,`serial_number`) VALUES (\"$customer_id\",\"$store_manager_id\",\"$serial_number\")";
			mysqli_query($connect,$insert);

		}
	}
?>
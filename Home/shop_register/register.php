<?php
	if(isset($_POST['name']))
	{
		session_start();
		$db_id=$_SESSION['db_id'];
		$name=$_POST['name'];
		$ein=$_POST['ein'];
		$lat=$_POST['lat'];
		$long=$_POST['long'];
		

		$insert="INSERT INTO `shop` (`db_id`,`company_name`,`ein`,`latitude`,`longitude`) VALUES (\"$db_id\",\"$name\",\"$ein\",\"$lat\",\"$long\")";
		mysqli_query($connect,$insert);

		echo "success";
	}
?>
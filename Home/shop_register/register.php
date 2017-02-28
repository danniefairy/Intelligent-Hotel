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
		echo mysqli_query($connect,$insert)->error;

		echo $db_id."<br>".$name."<br>".$ein."<br>".$lat."<br>".$long.$insert;
		
	}
?>
<?php
	if(isset($_POST['name']))
	{
		session_start();
		$db_id=$_SESSION['db_id'];
		$name=$_POST['name'];
		$ein=$_POST['ein'];
		$lat=$_POST['lat'];
		$long=$_POST['long'];
		
		include 'connect_db.php';

		$search="SELECT * FROM shop WHERE `db_id`=$db_id";
		$result=mysqli_query($connect,$search);
		if(mysqli_fetch_array($result))
		{
			echo "yes";
		}
		else{
			$insert="INSERT INTO `shop` (`db_id`,`company_name`,`ein`,`latitude`,`longitude`) VALUES (\"$db_id\",\"$name\",\"$ein\",\"$lat\",\"$long\")";
			mysqli_query($connect,$insert);
		}

		
		

		//echo $db_id."<br>".$name."<br>".$ein."<br>".$lat."<br>".$long."<br>".$insert;	
	}
?>
<?php
	session_start();
	if(isset($_SESSION['db_id'])){
		if(isset($_GET['Name'])){
			$id=$_SESSION['db_id'];
			$name=$_GET['Name'];
			$number=$_GET['Number'];
			$cvv=$_GET['CVV'];
			$month=$_GET['month'];
			$year=$_GET['year'];
			$exp=$month."/".$year;
			if($name==""||$number==""||$cvv==""||$month==""||$year=="")
			{
				header("location:index.php?wrong=1");
			}
			$update="UPDATE `hotel` SET `card_name`=\"$name\",`card_no`=\"$number\",`cvv`=\"$cvv\" WHERE `id`=$id";
			mysqli_query($connect,$update) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR);
		}
		else{
			echo "no session id";
		}
	}
?>
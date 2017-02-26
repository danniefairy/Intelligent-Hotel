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
			$update="UPDATE `hotel` SET `card_name`=\"$name\",`card_no`=\"$number\",`cvv`=\"$cvv\",`card_exp`=\"$exp\" WHERE `id`=$id";
			mysqli_query($connect,$update) or die(mysqli_error($connect));
		}
		else{
			echo "no session id";
		}
	}
?>
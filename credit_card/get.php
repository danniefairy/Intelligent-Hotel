<?php
	if(isset($_GET['Name'])){
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
		$insert="INSERT INTO `hotel` (`card_name`,`card_no`,`card_cvv`,`card_exp`) VALUES (\"$name\",\"$number\",\"$cvv\".\"$exp\")";
		mysqli_query($connect,$insert);
	}
?>
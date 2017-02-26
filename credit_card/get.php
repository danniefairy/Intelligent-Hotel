<?php
	if(isset($_GET['Name'])){
		$name=$_GET['Name'];
		$number=$_GET['Number'];
		$cvv=$_GET['CVV'];
		$month=$_GET['month'];
		$year=$_GET['year'];

		if($name==""||$number==""||$cvv==""||$month==""||$year=="")
		{
			header("location:index.php?wrong=1");
		}
		
	}
?>
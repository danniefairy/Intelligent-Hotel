<?php
	if(isset($_POST['quantity'])){
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];
		echo $quantity*$price;
	}


?>
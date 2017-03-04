<?php
	if(isset($_POST['quantity'])){
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];
		$shop=$_POST['shop'];
		$commodity_id=$_POST['commodity_id'];

		include "../connect_db.php";
		//找到原本庫存量
		$sql="SELECT `quantity` FROM commodity WHERE `id`=\"$commodity_id\"";
		$result=mysqli_query($connect,$sql);
		$origin_quantity=mysqli_fetch_array($result)[0];
		//找到原本營收
		$sql="SELECT `revenue` FROM shop WHERE `company_name`=\"$shop\"";
		$result=mysqli_query($connect,$sql);
		$origin_revenue=mysqli_fetch_array($result)[0];

		$new_quantity=$origin_quantity-$quantity;
		$new_revenue=$origin_revenue+$quantity*$price;

		$update="UPDATE `commodity` SET `quantity`=\"$new_quantity\" WHERE `id`=\"$commodity_id\"";
		mysqli_query($connect,$update);
		$update="UPDATE `shop` SET `revenue`=\"$new_revenue\" WHERE `company_name`=\"$shop\"";
		mysqli_query($connect,$update);

		header("location:../delicacy.php?buy=1");
	}


?>
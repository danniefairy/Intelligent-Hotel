<?php
//coupon
	include "../connect_db.php";
	$db_id=$_GET['db_id'];
	$search_coupon="SELECT `serial_number` FROM `coupon` WHERE `store_manager_id`=\"$db_id\"";
	$result_coupon=mysqli_query($connect,$search_coupon);
	$count=0;
	$list_coupon=array();
	while($row=mysqli_fetch_array($result_coupon)){
		$list_coupon[$count]=$row[0];
		$count=$count+1;
	}
	echo json_encode($list_coupon); 
?>
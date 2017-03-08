<?php
include "../connect_db.php";
	$commodity_id=$_GET['commodity_id'];
	$search="SELECT * FROM `commodity` WHERE `id`=\"$commodity_id\"";
	$result=mysqli_query($connect,$search);
	$row=mysqli_fetch_array($result);
	
	$db_id=$row[1];
	$commodity_name=$row[2];
	$picture_url=$row[3];
	$description=$row[4];
	$quantity=$row[5];
	$price=$row[7];
	
	echo json_encode($row);
?>
<?php
	include "../connect_db.php";
	$search="SELECT `db_id`,`company_name`,`latitude`,`longitude` FROM `shop`";
	$result=mysqli_query($connect,$search);
	$count=0;
	while($row=mysqli_fetch_array($result))
	{
		$store[$count]= array('db_id' =>$row[0],'store_name'=>$row[1],'lat'=>$row[2],'lng'=>$row[3] );
		$count=$count+1;	
	}
	echo json_encode($store);
?>
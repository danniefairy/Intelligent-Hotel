<?php
	//連接到MYSQL
	$dbserver='localhost';
	$dbuser='Mifriend';
	$dbpassowrd='Mifriend';

	$connect=mysqli_connect($dbserver,$dbuser,$dbpassowrd);
	if(mysqli_connect_errno($connect))
		die("fail to connect the db");
	else
		//echo 'connect successfully';

	echo "<br>";

	//選擇資料庫
	if(!mysqli_select_db($connect,'Mifriend'))
		die('can not use db');
	else
		//echo 'test db can be used';

	echo "<br>";

	//設定中文傳輸
	$set_chinese='SET NAMES utf8';
	mysqli_query($connect,$set_chinese);				
?>


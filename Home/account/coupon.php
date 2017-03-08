<?php
	if(isset($_GET['db_id'])){
		$db_id=$_GET['db_id'];
		session_start();
		$friendlist=$_SESSION['friends'];
	}
	//給予
	if(isset($_GET['give_to'])){
		echo 12123131321531;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.dropbtn {
		    background-color: #4CAF50;
		    color: white;
		    padding: 16px;
		    font-size: 16px;
		    border: none;
		    cursor: pointer;
		    border-color: white;
		    border-style: solid;
		    border-width: 0.5px;
		}

		.dropdown {
		    position: relative;
		    display: inline-block;
		}

		.dropdown-content {
		    display: none;
		    position: absolute;
		    background-color: #f9f9f9;
		    min-width: 130px;
		    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		    z-index: 1;
		}

		.dropdown-content a {
		    color: black;
		    padding: 12px 16px;
		    text-decoration: none;
		    display: block;
		}

		.dropdown-content a:hover {background-color: #f1f1f1}

		.dropdown:hover .dropdown-content {
		    display: block;
		}

		.dropdown:hover .dropbtn {
		    background-color: #3e8e41;
		}
	</style>
</head>
<body>
<h3>Coupon Management</h3>
	<p style="font-size:15px;">You can click the number and go to the store and use those serial number for your discount!</p>
	<p style="font-size:20px;">Sorted by stores:</p>
	<?php
	include "../connect_db.php";

	//find store name
	$search_name="SELECT `db_id`,`company_name` FROM `shop`";
	$result_name=mysqli_query($connect,$search_name);
	while($row=mysqli_fetch_array($result_name)){
		$store_name[$row[0]]=$row[1];
	}

	$search="SELECT * FROM `coupon` WHERE `customer_id`=\"$db_id\"";
	$result=mysqli_query($connect,$search);
	while($row=mysqli_fetch_array($result)){
		echo "<div class=\"dropdown\">";
			$index=$row[2];
			echo "<button class=\"dropbtn\">$store_name[$index]</button>";
			echo "<div class=\"dropdown-content\">";
			echo "<a href=\"https://danniehotel.azurewebsites.net/Home/shop_register/shop_info.php?store=$store_name[$index]&db_id=$index\" style=\" font-size:20px;\">$row[3]</a>";
			$friend_count=count($friendlist);
			for($i=0;$i<$friend_count;$i++){
				$friend_name=$friendlist[$i]['name'];
				$friend_id=$friendlist[$i]['id'];
				echo "<a href=\"http://danniehotel.azurewebsites.net/Home/index-2.php?give_to=$friend_id&store_id=$index&num=$row[3]#/coupon\">$friend_name</a>";
			}
			echo "</div>";
		echo "</div>";
	}

?>




</body>
</html>
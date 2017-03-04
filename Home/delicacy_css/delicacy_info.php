<?php
	session_start();

	/*//是否寄送email
	if(isset($_GET['send_email']))
	{
		echo "<script type=\"text/javascript\">
			alert(\"Sending sucessfully!\")
			</script>";
	}

	//是否剛綁定成功信用卡
	if(isset($_GET['credit_card_binding']))
	{
		echo "<script type=\"text/javascript\">
			alert(\"Binding credit card sucessfully!\")
			</script>";
	}*/

	
	if(!isset($_SESSION['fb_id'])){
		echo "<a href=\"../index.php\">Please enter with facebook!</a>";
		die();
	}
	else{
		//確認是否有綁定信用卡
		include 'connect_db.php';
		$id=$_SESSION['db_id'];
		$sql="SELECT `card_name` FROM hotel Where `id`=\"$id\"";
		$result=mysqli_query($connect,$sql);
		if(mysqli_fetch_array($result)[0]==""){
			echo "<a href=\"../index.php\">The service is for people who have already booked the room!</a>";
			die();
	}

	/*//確認已經訂房
	if(isset($_GET['book'])){
		echo "<script type=\"text/javascript\">
			alert(\"Book the room sucessfully!\")
			</script>";
	}

	//沒綁定信用卡從book、room&tour來
	if(isset($_GET['no_bind'])){
		echo "<script type=\"text/javascript\">
		alert(\"You can see the content after binding your credit card!\")
		</script>";
	}*/
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Hot Tours</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="../images/favicon.ico">
		<link rel="shortcut icon" href="../images/favicon.ico" />
		<link rel="stylesheet" href="../css/style.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery-migrate-1.2.1.js"></script>
		<script src="../js/script.js"></script>
		<script src="../js/superfish.js"></script>
		<script src="../js/jquery.ui.totop.js"></script>
		<script src="../js/jquery.equalheights.js"></script>
		<script src="../js/jquery.mobilemenu.js"></script>
		<script src="../js/jquery.easing.1.3.js"></script>
		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
		</script>
		
		<!--新增的-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

		<link rel="stylesheet" type="text/css" href="hover.css">
		<script type="text/javascript" src="hover.js"></script>
		<style>
		table {
		    border-collapse: collapse;
		    width: 100%;
		}

		th, td {
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}


		/*新增的*/
		input[type=text], select {
			    width: 50%;
			    padding: 12px 20px;
			    margin: 8px 0;
			    display: inline-block;
			    border: 1px solid #ccc;
			    border-radius: 4px;
			    box-sizing: border-box;
				}

				input[type=number], select {
			    width: 50%;
			    padding: 12px 20px;
			    margin: 8px 0;
			    display: inline-block;
			    border: 1px solid #ccc;
			    border-radius: 4px;
			    box-sizing: border-box;
				}
				textarea{
					width: 50%;
				    padding: 30px 20px;
				    margin: 8px 0;
				    display: inline-block;
				    border: 1px solid #ccc;
				    border-radius: 4px;
				    box-sizing: border-box;
				}

				input[type=submit] {
				    width: 50%;
				    background-color: #4CAF50;
				    color: white;
				    padding: 14px 20px;
				    margin: 8px 0;
				    border: none;
				    border-radius: 4px;
				    cursor: pointer;
				}
		</style>
	</head>
	<body>
<!--==============================header=================================-->
		<header>
			<div class="container_12">
				<div class="grid_12">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
								<li class="current"><a href="../index.php">Home</a></li>
								<li><a href="../index-1.php">Room & Tour</a></li>
								<li><a href="../index-2.php">SPECIAL OFFERS</a></li>
								<li><a href="../shop_register/index.php">Store Management</a></li>
								<li><a href="../../credit_card/index.php">Credit Card</a></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12">
					<h1>
						<a href="index.php">
							<img src="../images/logo.png" alt="Your Happy Family">
						</a>
					</h1>
				</div>
			</div>
		</header>
<!--==============================Content=================================-->
	<!--之後可用大數據分析來推薦-->
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12">
				<div class="banners">
<!--=====================commodity=====================-->
<?php

	if(isset($_GET['commodity_id']))
	{
		$commodity_id=$_GET['commodity_id'];
	}

	include "../connect_db.php";
	$search="SELECT * FROM `commodity` WHERE `id`=\"$commodity_id\"";
	$result=mysqli_query($connect,$search);
	$row=mysqli_fetch_array($result);
	
	$db_id=$row[1];
	$commodity_name=$row[2];
	$picture_url=$row[3];
	$description=$row[4];
	$quantity=$row[5];
	$price=$row[7];

	$search_name="SELECT * FROM `shop` WHERE `db_id`=\"$db_id\"";
	$result_name=mysqli_query($connect,$search_name);
	$shop=mysqli_fetch_array($result_name)[2];
	
?>
<h1 style="font-size:27px;"><?php echo $shop; ?></h1>
<hr>

<div class="grid_7">
<img class="info" src=".<?php echo $picture_url; ?>" alt="sample87"/>
<br><br>
<table>
	<tr>
		<td>Name:</td>
		<td><?php echo explode(".", $commodity_name)[0]; ?></td>
	</tr>
	<tr>
		<td>Quantity:</td>
		<td><?php echo $quantity; ?></td>
	</tr>
	<tr>
		<td>Price:</td>
		<td><?php echo $price."$"; ?></td>
	</tr>
	<tr>
		<td>Description:</td>
		<td><?php echo $description; ?></td>
	</tr>
</table>
<br>

<!--新增的-->
<div ng-app="myApp" ng-controller="formCtrl">
<form>
	Quantity:<br>
	<input type="number" name="quantity" ng-model="quantity">
	<h4>Total cost: {{quantity*<?php echo $price; ?>}}</h3>
	<script>
	var app = angular.module('myApp', []);
	app.controller('formCtrl', function($scope) {
	    $scope.quantity = 0;
	});
	</script>
	<input type="submit" name="">
</form>


</div>




</div>




<div class="grid_3">

</div>





<!--=====================commodity=====================-->
				</div>
			</div>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="socials">
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy">
						Your Trip (c) 2014 | <a href="#">Privacy Policy</a> | Website Template Designed by <a href="http://www.templatemonster.com/" rel="nofollow">TemplateMonster.com</a>
					</div>
				</div>
			</div>
		</footer>
		<script>
		$(function (){
			$('#bookingForm').bookingForm({
				ownerEmail: '#'
			});
		})
		</script>
	</body>
</html>
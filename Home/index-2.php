<?php
	session_start();
	if(!isset($_SESSION['fb_id'])){
		echo "<a href=\"../index.php\">Please enter with facebook!</a>";
		die();
	}
	else{
		$fb_id=$_SESSION['fb_id'];
		$name=$_SESSION['name'];
		$db_id=$_SESSION['db_id'];
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Account Management</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
				<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
			</a>
		</div>
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<link rel="stylesheet" media="screen" href="css/ie.css">
		<![endif]-->
	</head>
	<body>
<!--==============================header=================================-->
		<header>
			<div class="container_12">
				<div class="grid_12">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
								<li><a href="index.php">Home</a></li>
								<li><a href="index-1.php">Room & Tour</a></li>
								<li class="current"><a href="index-2.php">Account Management</a></li>
								<li><a href="https://danniehotel.azurewebsites.net/Home/shop_register/index.php">Store Management</a></li>
								<li><a href="../credit_card/index.php">Credit Card</a></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12">
					<h1>
						<a href="index.php">
							<img src="images/logo.png" alt="Your Happy Family">
						</a>
					</h1>
				</div>
			</div>
		</header>
<!--==============================Content=================================-->
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12">

			<!--左邊-->
				<div class="grid_4 ">
					<h4><?php echo $name; ?></h4>
					<img src="https://graph.facebook.com/<?php echo $fb_id; ?>/picture?type=large"><br>
					<a href="#/">Personal Info</a><br>
					<a href="#transaction_history">Transaction History</a><br>
					<a href="#book_record">Book Record</a><br>
					<a href="#coupon">Coupon Management</a>
				</div>
				<script>
					var app = angular.module("myApp", ["ngRoute"]);
					app.config(function($routeProvider) {
					    $routeProvider
					    .when("/", {
					        templateUrl : "./account/personal_info.php?fb_id=<?php echo $fb_id;?>&db_id=<?php echo $db_id; ?>"
					    })
					    .when("/transaction_history", {
					        templateUrl : "./account/transaction_history.php?db_id=<?php echo $db_id; ?>"
					    })
					    .when("/book_record", {
					        templateUrl : "./account/book_record.php?db_id=<?php echo $db_id; ?>"
					    })
					    .when("/coupon", {
					        templateUrl : "./account/coupon.php?db_id=<?php echo $db_id; ?>"
					    });
					});
				</script>
			<!--左邊-->

			<!--右邊-->
				<div class="grid_8" ng-app="myApp">
					<div ng-view></div>
					
	
				</div>
			<!--右邊-->

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
						Intelligent Hotel System | by Dannie
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
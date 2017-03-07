
<?php
	session_start();

	//是否寄送email
	if(isset($_GET['send_email']))
	{
		echo "<script type=\"text/javascript\">
			alert(\"Sending sucessfully!\")
			</script>";
	}

	/*//是否剛綁定成功信用卡
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
		/*include 'connect_db.php';
		$id=$_SESSION['db_id'];
		$sql="SELECT `card_name` FROM hotel Where `id`=\"$id\"";
		$result=mysqli_query($connect,$sql);
		if(mysqli_fetch_array($result)[0]==""){
			
			header("location:index.php?no_bind=1");
			die();
		}*/

	}

	//確認已經訂房
	if(isset($_GET['book'])){
		echo "<script type=\"text/javascript\">
			alert(\"Book the room sucessfully!\")
			</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Hot Tours</title>
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
								<li><a href="index-2.php">SPECIAL OFFERS</a></li>
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
	<!--之後可用大數據分析來推薦-->
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12">
				<div class="banners">
					<div class="grid_4">
						<div class="banner">
							<img src="images/page2_img1.jpg" alt="">
							<div class="label">
								<div class="title">Phytoncid</div>
								<div class="price">from<span>$ 2000</span></div>
								<a href="index-1.php?style=Phytoncid&comfort=Standard">LEARN MORE</a>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="banner">
							<img src="images/page2_img2.jpg" alt="">
							<div class="label">
								<div class="title">Sunshine</div>
								<div class="price">from<span>$ 1800</span></div>
								<a href="index-1.php?style=Sunshine&comfort=Cheap">LEARN MORE</a>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="banner">
							<img src="images/page2_img3.jpg" alt="">
							<div class="label">
								<div class="title">Landmark</div>
								<div class="price">from<span>$ 2500</span></div>
								<a href="index-1.php?style=Landmark&comfort=Standard">LEARN MORE</a>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="grid_4">
						<div class="banner">
							<img src="images/page2_img4.jpg" alt="">
							<div class="label">
								<div class="title">Advanture</div>
								<div class="price">from<span>$ 2000</span></div>
								<a href="index-1.php?style=Advanture&comfort=Standard">LEARN MORE</a>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="banner">
							<img src="images/page2_img5.jpg" alt="">
							<div class="label">
								<div class="title">Water Park</div>
								<div class="price">from<span>$ 1800</span></div>
								<a href="index-1.php?style=Water_Park&comfort=Cheap">LEARN MORE</a>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="banner">
							<img src="images/page2_img6.jpg" alt="">
							<div class="label">
								<div class="title">Culture</div>
								<div class="price">from<span>$ 3000</span></div>
								<a href="index-1.php?style=Culture&comfort=Lux">LEARN MORE</a>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="grid_4">
						<div class="banner">
							<img src="images/page2_img7.jpg" alt="">
							<div class="label">
								<div class="title">Religion</div>
								<div class="price">from<span>$ 2600</span></div>
								<a href="index-1.php?style=Religion&comfort=Lux">LEARN MORE</a>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="banner">
							<img src="images/page2_img8.jpg" alt="">
							<div class="label">
								<div class="title">Islands</div>
								<div class="price">from<span>$ 2800</span></div>
								<a href="index-1.php?style=Islands&comfort=Lux">LEARN MORE</a>
							</div>
						</div>
					</div>
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
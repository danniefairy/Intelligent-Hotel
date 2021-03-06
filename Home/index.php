<?php
	session_start();

	//是否寄送email
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
	}

	
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
		if(mysqli_fetch_array($result)[0]!=""){
			$_SESSION['card_bind']=1;
		}
	}

	//確認已經訂房
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
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lobby</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="booking/css/booking.css">
		<link rel="stylesheet" href="css/camera.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/mycss.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/camera.js"></script>
		<!--[if (gt IE 9)|!(IE)]><!-->
		<script src="js/jquery.mobile.customized.min.js"></script>
		<!--<![endif]-->
		<script src="booking/js/booking.js"></script>

		<script>
			$(document).ready(function(){
			jQuery('#camera_wrap').camera({
				loader: false,
				pagination: false ,
				minHeight: '444',
				thumbnails: false,
				height: '48.375%',
				caption: true,
				navigation: true,
				fx: 'mosaic'
			});
			/*carousel*/
			var owl=$("#owl");
				owl.owlCarousel({
				items : 2, //10 items above 1000px browser width
				itemsDesktop : [995,2], //5 items between 1000px and 901px
				itemsDesktopSmall : [767, 2], // betweem 900px and 601px
				itemsTablet: [700, 2], //2 items between 600 and 0
				itemsMobile : [479, 1], // itemsMobile disabled - inherit from itemsTablet option
				navigation : true,
				pagination : false
				});
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
	<body class="page1" id="top">
<!--==============================header=================================-->
		<header>
			<div class="container_12">
				<div class="grid_12">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
								<li class="current"><a href="index.php">Home</a></li>
								<li><a href="index-1.php">Room & Tour</a></li>
								<li><a href="index-2.php">Account Management</a></li>
								<li><a href="https://danniehotel.azurewebsites.net/Home/shop_register/index.php">Store Management</a></li>
								<li><a href="../credit_card/index.php">Credit Card</a></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12">
					<h1>
						<a href="#">
							<img src="images/logo.png" alt="Your Happy Family">
						</a>
					</h1>
				</div>
			</div>
		</header>
		<div class="slider_wrapper">
			<div id="camera_wrap" class="">
				<div data-src="images/slide.jpg">
					<div class="caption fadeIn">
						<h2>I.H.S</h2>
						<div class="price">
							
							<span></span>
						</div>
						<a href="./about/about.php">About us</a>
					</div>
				</div>
				<div data-src="images/slide1.jpg">
					<div class="caption fadeIn">
						<h2>B.N.B</h2>
						<div class="price">
							
							<span></span>
						</div>
						<a href="book.php">LEARN MORE</a>
					</div>
				</div>
				<div data-src="images/slide2.jpg">
					<div class="caption fadeIn">
						<h2>Delicacy</h2>
						<div class="price">
							
							<span></span>
						</div>
						<a href="delicacy.php">LEARN MORE</a>
					</div>
				</div>
				<!--add here-->
				<div data-src="images/slide3.jpg">
					<div class="caption fadeIn">
						<p class="arrange">Arrangement</p>
						<div class="price">
							
							<span></span>
						</div>
						<a href="https://danniehotel.azurewebsites.net/Home/arrangement/">LEARN MORE</a>
					</div>
				</div>
			</div>
		</div>
<!--==============================Content=================================-->
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12">
				<div class="grid_4">
					<div class="banner">
						<img src="images/ban_img1.jpg" alt="">
						<div class="label">
							<div class="title">Souvenir</div>
							<div class="price"><span></span></div>
							<a href="souvenir.php">LEARN MORE</a>
						</div>
					</div>
				</div>
				
				<div class="grid_4">
					<div class="banner">
						<img src="images/ban_img3.jpg" alt="">
						<div class="label">
							<div class="title">Transportation</div>
							<div class="price"><span></span></div>
							<a href="transportation.php">LEARN MORE</a>
						</div>
					</div>
				</div>

				<div class="grid_4">
					<div class="banner">
						<img src="images/ban_img2.jpg" alt="">
						<div class="label">
							<div class="title">Apparel Laundry</div>
							<div class="price"><span></span></div>
							<a href="apparel_laundry.php">LEARN MORE</a>
						</div>
					</div>
				</div>

				<div class="clear"></div>
				<!--safe place connect db-->
				<?php
					include "connect_db.php";
					$search="SELECT * FROM `shop` ORDER BY `id` DESC";
					$result=mysqli_query($connect,$search);
					$count=0;
					while($row=mysqli_fetch_array($result))
					{
						$title[$count]=$row[2];
						$description[$count]=$row[8];
						$db_id[$count]=$row[1];
						$count=$count+1;
						if($count>2)
							break;
					}
				?>


				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
		

				<div class="grid_12">
					<h3 class="head1">New Store</h3>
				</div>
				<div class="grid_4">
					<div class="block1">
						<time datetime="2014-01-01"><a href="https://danniehotel.azurewebsites.net/Home/shop_register/shop_info.php?store=<?php echo $title[0]; ?>&db_id=<?php echo $db_id[0]; ?>"><i class="fa fa-hand-pointer-o" style="font-size:30px"></i></a></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><?php echo $title[0]; ?></div>
							<?php echo $description[0]; ?>
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="block1">
						<time datetime="2014-01-01"><a href="https://danniehotel.azurewebsites.net/Home/shop_register/shop_info.php?store=<?php echo $title[1]; ?>&db_id=<?php echo $db_id[1]; ?>"><i class="fa fa-hand-pointer-o" style="font-size:30px"></i></a></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><?php echo $title[1]; ?></div>
							<?php echo $description[1]; ?>
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="block1">
						<time datetime="2014-01-01"><a href="https://danniehotel.azurewebsites.net/Home/shop_register/shop_info.php?store=<?php echo $title[2]; ?>&db_id=<?php echo $db_id[2]; ?>"><i class="fa fa-hand-pointer-o" style="font-size:30px"></i></a></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><?php echo $title[2]; ?></div>
							<?php echo $description[2]; ?>
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
			$(function() {
				$('#bookingForm input, #bookingForm textarea').placeholder();
			});
		</script>
	</body>
</html>


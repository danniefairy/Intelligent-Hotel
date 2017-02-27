
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
		if(mysqli_fetch_array($result)[0]==""){
			header("location:index.php?no_bind=1");
			die();
		}


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
		<title>Book Room</title>
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
								<li><a href="index-2.php">SPECIAL OFFERS</a></li>
								<li><a href="index-3.php">BLOG</a></li>
								<li><a href="../../credit_card/index.php">Credit Card</a></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12">
					<h1>
						<a href="index.html">
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
						<a href="about/about.php">About us</a>
					</div>
				</div>
				<div data-src="images/slide1.jpg">
					<div class="caption fadeIn">
						<h2>B.N.B</h2>
						<div class="price">
							
							<span></span>
						</div>
						<a href="#">LEARN MORE</a>
					</div>
				</div>
				<div data-src="images/slide2.jpg">
					<div class="caption fadeIn">
						<h2>Delicacy</h2>
						<div class="price">
							
							<span></span>
						</div>
						<a href="#">LEARN MORE</a>
					</div>
				</div>
				<!--add here-->
				<div data-src="images/slide3.jpg">
					<div class="caption fadeIn">
						<p class="arrange">Arrangement</p>
						<div class="price">
							
							<span></span>
						</div>
						<a href="#">LEARN MORE</a>
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
							<div class="title">Souvenir<br><br></div>
							<div class="price"><span></span></div>
							<a href="#">LEARN MORE</a>
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
						<img src="images/ban_img2.jpg" alt="">
						<div class="label">
							<div class="title">Traffic Information</div>
							<div class="price"><span></span></div>
							<a href="#">LEARN MORE</a>
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
						<img src="images/ban_img3.jpg" alt="">
						<div class="label">
							<div class="title">Mobile Payment<br><br></div>
							<div class="price"><span></span></div>
							<a href="#">LEARN MORE</a>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<!--safe place connect db-->
				
				<!--right-->
				<div class="grid_5 prefix_1" style="background:	#E6E6FA;">
					<h3>Recommendation</h3>
					<img src="images/hotel_room_1.jpg" style="width:300px;" alt="" >
					<div class="extra_wrapper">
						<p>This room is the most popular room in our hotel.</p> 
						<p>It is suitable for a family with two adults and two child and its type is standard level so this room is affordable for every family.</p>
					</div>
					<h4>More Option</h4>
					<blockquote class="bq1">
						<img src="images/page1_img2.jpg" alt="" class="img_inner noresize fleft">
						<div class="extra_wrapper">
							<p>There are lots of room for various preference, please click "More" for further information! </p>
							<div class="alright">
								
								<a href="index-1.php" class="btn">More</a>
							</div>
						</div>
					</blockquote>
				</div>

				<!--right-->
				<!--booking-->
				<div class="grid_6" style="background:#E6E6FA;">
				<div style="padding:0px 0px; ">
					<h3>Booking Form</h3>
					<form id="bookingForm">
						<div class="fl1">
							<div class="tmInput">
								<input id="name" name="Name" placeHolder="Name:" type="text" data-constraints='@NotEmpty @Required @AlphaSpecial'>
							</div>
							<div class="tmInput">
								<input id="country" name="Country" placeHolder="Country:" type="text" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="fl1">
							<div class="tmInput">
								<input id="email" name="Email" placeHolder="Email:" type="text" data-constraints="@NotEmpty @Required @Email">
							</div>
							<div class="tmInput mr0">
								<input id="phone" name="Phone" placeHolder="Phone:" type="text" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="clear"></div>
						<strong>&nbsp Check-in</strong>
						<label class="tmDatepicker">
							<input id="in" type="text" name="Check-in" placeHolder='10/05/2014' data-constraints="@NotEmpty @Required @Date">
						</label>
						<div class="clear"></div>
						<strong>&nbsp Check-out</strong>
						<label class="tmDatepicker">
							<input id="out" type="text" name="Check-out" placeHolder='20/05/2014' data-constraints="@NotEmpty @Required @Date">
						</label>
						<div class="clear"></div>
						<div class="tmRadio">
							<br>
							<p>&nbsp Comfort</p>
							&nbsp&nbsp&nbsp
							<input name="Comfort" type="radio" id="Radio"  value="Cheap" />
							<span>Cheap</span>
							<input name="Comfort" type="radio" id="Radio"  value="Standard"/>
							<span>Standard</span>
							<input name="Comfort" type="radio" id="Radio"  value="Lux" />
							<span>Lux</span>
						</div>
						<div class="clear"></div>
						<br>
						<div class="fl1 fl2">
							<em>Adults</em>
							<select id="adult" name="Adults" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>1</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<div class="clear"></div>
							<em>Rooms</em>
							<select id="room" name="Rooms" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>1</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
						<div class="fl1 fl2">
							<em>Children</em>
							<select id="child" name="Children" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>0</option>
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<div class="clear"></div>
							<br>

							<?php
								//if(isset($_GET['style']))
								//{
									echo "<script type=\"text/javascript\">
									document.getElementById(\"Sunshine\").selected = true;
									</script>";
								//}
							?>

							<em>Style</em>
							<select id="style" name="Children" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option id="Phytoncid">Phytoncid</option>
								<option id="Sunshine">Sunshine</option>
								<option id="3">Landmark</option>
								<option id="4">Advanture</option>
								<option id="5">Water Park</option>
								<option id="6">Culture</option>
								<option id="7">Religion</option>
								<option id="8">Islands</option>
							</select>
						</div>						
						
						<div class="clear"></div>
						<div class="tmTextarea">
							<textarea id="message" name="Message" placeHolder="Message" data-constraints='@NotEmpty @Required @Length(min=20,max=999999)'></textarea>
						</div>
						<!--submit-->
						<script type="text/javascript">
							function submit(){

								var name=document.getElementById('name').value;
								var email=document.getElementById('email').value;
								var country=document.getElementById('country').value;
								var phone=document.getElementById('phone').value;
								var country=document.getElementById('country').value;
								var check_in=document.getElementById('in').value;
								var check_out=document.getElementById('out').value;
								var button=$('input[id="Radio"]:checked').val();;
								var adult=document.getElementById('adult').value;
								var child=document.getElementById('child').value;
								var room=document.getElementById('room').value;
								var style=document.getElementById('style').value;
								var message=document.getElementById('message').value;
								
								//alert(button);
								window.location = "./bnb/book_info.php?name="+name+"&email="+email+"&country="+country+"&phone="+phone+"&check_in="+check_in+"&check_out="+check_out+"&button="+button+"&person="+adult+"/"+child+"&room="+room+"&style="+style+"&message="+message;

							}
						</script>

						<a href="#" class="btn" data-type="submit" style="position:absolute;" onclick="submit()">Submit</a>
					</form>
					</div>
				</div>
				<!--booking-->
				
				
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


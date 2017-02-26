<?php
	if(isset($_GET['err']))
	{
		echo "<script type=\"text/javascript\">
			alert(\"Wrong email information!\")
			</script>";
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ABOUT</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="../images/favicon.ico">
		<link rel="shortcut icon" href="../images/favicon.ico" />
		<link rel="stylesheet" href="../css/form.css">
		<link rel="stylesheet" href="../css/style.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery-migrate-1.2.1.js"></script>
		<script src="../js/script.js"></script>
		<script src="../js/TMForm.js"></script>
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


		<!--google map-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6h46-lqQIkEoHqwEiV1ub4vmhe8s92Ws&callback=initMap"
        async defer></script>
    <script>
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('google_map'), {
        center: {lat: 25.0340, lng: 121.5645},
        zoom: 15
      });
    }
    </script>
    <!--google map-->
	</head>
	<body>
<!--==============================header=================================-->
		<header>
			<div class="container_12">
				<div class="grid_12">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
								<li><a href="../index.php">Home</a></li>
								<li><a href="../index-1.html">HOT TOURS</a></li>
								<li><a href="../index-2.html">SPECIAL OFFERS</a></li>
								<li><a href="../index-3.html">BLOG</a></li>
								<li><a href="../index-4.html">CONTACTS</a></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12">
					<h1>
						<a href="index.html">
							<img src="../images/logo.png" alt="Your Happy Family">
						</a>
					</h1>
				</div>
			</div>
		</header>
<!--==============================Content=================================-->
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12">
				<div class="grid_5">
					<h3>CONTACT INFO</h3>
					<div class="map">
						<p>Our main purpose is to give every customer a easy way to schedule a better itinerary. We help you to customize your suitable tour. On one hand , our system can give you lots of information about local culture and useful recommendations based on big data analysis, on the other hand we also cooperate with banks so you can use mobile payment to schedule your vacation unstressfully.</p>
						<div class="clear"></div>
						<!--google map-->
					<figure id="google_map" style="min-height:285px;"></figure>
						<!--google map-->
						<address>
							<dl>
								<dt>IHS Inc. <br>
									 No. 7, Section 5, Xinyi Rd,<br>
									Xinyi District, Taipei City, 110
								</dt>
								<dd><span>Freephone:</span>02 2900 0000</dd>
								<dd><span>Telephone:</span>02 8890 0000</dd>
								<dd><span>FAX:</span>02 8891 0000</dd>
								<dd>E-mail:ihs@gmail.com</dd>
							</dl>
						</address>
					</div>
				</div>
				<div class="grid_6 prefix_1">
					<h3>GET IN TOUCH</h3>
					<form id="form">
						<div class="success_wrapper">
							<div class="success-message">Contact form submitted</div>
						</div>
						<label class="name">
							<input id="nam" type="text" placeholder="Name:" data-constraints="@Required @JustLetters" />
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*This is not a valid name.</span>
						</label>
						<label class="email">
							<input id="ema" type="text" placeholder="Email:" data-constraints="@Required @Email" />
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*This is not a valid email.</span>
						</label>
						<label class="country">
							<input id="sub" type="text" placeholder="Subject:" data-constraints="@Required @JustLetters"/>
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*This is not a valid country.</span>
						</label>
						<label class="message">
							<textarea id="msg" placeholder="Message:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*The message is too short.</span>
						</label>
						<!--submit-->
						<script type="text/javascript">
							
							function submit(){
								var name=document.getElementById('nam').value;
								var email=document.getElementById('ema').value;
								var subject=document.getElementById('sub').value;
								var message=document.getElementById('msg').value;
								
								window.location = "./send_email/email_test.php?name="+name+"&email="+email+"&subject="+subject+"&message="+message;
							}
						</script>

						<div>
							<div class="clear"></div>
							<div class="btns">
								<a href="#" data-type="reset" class="btn">Clear</a>
								<a href="#" data-type="submit" class="btn" onclick="submit()">Submit</a>
							</div>
						</div>
					</form>
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
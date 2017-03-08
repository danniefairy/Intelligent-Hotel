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
		/*//確認是否有綁定信用卡
		include 'connect_db.php';
		$id=$_SESSION['db_id'];
		$sql="SELECT `card_name` FROM hotel Where `id`=\"$id\"";
		$result=mysqli_query($connect,$sql);
		if(mysqli_fetch_array($result)[0]!=""){
			$_SESSION['card_bind']=1;
		}*/
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

	if(isset($_GET['buy'])){
		echo "<script type=\"text/javascript\">
		alert(\"Successfule transaction !\")
		</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Arrangement</title>
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
		<script src="../../js/jquery.mobilemenu.js"></script>
		<script src="../js/jquery.easing.1.3.js"></script>
		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
		</script>



		<!--table-->
		<link rel="stylesheet" type="text/css" href="../delicacy_css/shop_table.css">
		<script type="text/javascript" src="../delicacy_css/shop_table.js"></script>

		<!--map-->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6h46-lqQIkEoHqwEiV1ub4vmhe8s92Ws&callback=initMap"
        async defer></script>
        <script type="text/javascript" src="geolocation.js"></script>
        <link rel="stylesheet" type="text/css" href="geolocation.css">
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
								<li><a href="../index-1.php">Room & Tour</a></li>
								<li><a href="../index-2.php">Account Management</a></li>
								<li><a href="https://danniehotel.azurewebsites.net/Home/shop_register/index.php">Store Management</a></li>
								<li><a href="../../credit_card/index.php">Credit Card</a></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12">
					<h1>
						<a href="../index.php">
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
	include "../connect_db.php";
	$search="SELECT * FROM `commodity` WHERE `commodity_type`=\"Food\" ORDER BY `id` DESC";
	$result=mysqli_query($connect,$search);
	$count=0;
	while($row=mysqli_fetch_array($result))
	{
		$commodity_id[$count]=$row[0];
		$commodity_name[$count]=$row[2];
		$picture_url[$count]=$row[3];
		$count=$count+1;
		if($count>8)
			break;
	}
?>

<div class="grid_8">

<h1 style="font-size:27px;">Stores Distribution</h1>
<hr>

<button id="nearby" type="button" onclick="loadDoc(false)"><span style="font-size:20px;">Nearby(Get Coupons) </span></button>

<button id="all" type="button" onclick="loadDoc(true)"><span style="font-size:20px;">All</span></button>
<figure style="text-align:center;" id="map"></figure>
</div>



<div class="grid_4">
<h1 style="font-size:27px;">Store</h1>
<hr>
<!--table-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
<script type="text/javascript">
	var myApplication = angular.module("myApplication", []);

	myApplication.factory("Avengers", function() {
  	var Avengers = {};
  
  	Avengers.cast = [
  	<?php
	  	$store_list="SELECT * FROM `shop` ORDER BY `revenue` DESC";
		$result=mysqli_query($connect,$store_list);


	  	while($row=mysqli_fetch_array($result)){
	  	echo "{";
	    echo "name: \"$row[2]\"".",";
	    echo "id: \"$row[1]\"";
	  	echo "},";
  		}
  	?>
  	];
  		return Avengers;
	});

	AvengersCtrl = function($scope, Avengers) {
  	$scope.avengers = Avengers;
	};
</script>

<div ng-app="myApplication">
  	<div ng-controller="AvengersCtrl">
	    <input type="text" ng-model="searchfrom" placeholder="Search" />
	    <table>
      		<tr ng-repeat="actor in avengers.cast | orderBy:'name' | filter:searchfrom">
        		<td ><a href="https://danniehotel.azurewebsites.net/Home/shop_register/shop_info.php?store={{actor.name}}&db_id={{actor.id}}">{{actor.name}}</a></td>
      		</tr>
    	</table>
  	</div>
</div>
<!--table-->

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
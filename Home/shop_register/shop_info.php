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
<div class="grid_8">

<h1 style="font-size:27px;"><?php echo $_GET['store']; ?></h1>
<hr>
<?php
		include "connect_db.php";
  		$store=$_GET['store'];
	  	$info="SELECT * FROM `shop` WHERE `company_name`=\"$store\" ";
	  	$info_list=mysqli_query($connect,$info);
	  	$information=mysqli_fetch_array($info_list);
	  	$picture=explode("/", $information[7])[3];
	  	//echo $information[8];
?>
<div>
<p style="font-size:25px;"><strong>Introduction</strong></p>
<hr>
<h1>&nbsp&nbsp&nbsp&nbsp<?php echo $information[8]; ?></h1>
</div>
<img src="./store_profile/<?php echo $picture;?>">




</div>


<div class="grid_4">
<h1 style="font-size:27px;">Commodity</h1>
<hr>

<!--table-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
<link rel="stylesheet" type="text/css" href="shop_info.css">
<script type="text/javascript">
	var myApplication = angular.module("myApplication", []);

	myApplication.factory("Avengers", function() {
  	var Avengers = {};
  
  	Avengers.cast = [
  	<?php
  		$id=$_GET['db_id'];
	  	$commodity_list="SELECT * FROM `commodity` WHERE `db_id`=\"$id\"  ORDER BY `id` DESC";
		$result=mysqli_query($connect,$commodity_list);


	  	while($row=mysqli_fetch_array($result)){
	  	$name=explode(".",$row[2])[0];
	  	echo "{";
	    echo "name: \"$name\"".",";
	    echo "id: \"$row[0]\"";
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
        		<td><a href="https://danniehotel.azurewebsites.net/Home/delicacy_css/delicacy_info.php?commodity_id={{actor.id}}">{{actor.name}}</a></td>
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
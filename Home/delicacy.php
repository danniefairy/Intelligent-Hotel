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
		alert(\"Successful transaction !\")
		</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Delicacy</title>
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
		
		<link rel="stylesheet" type="text/css" href="./delicacy_css/hover.css">
		<script type="text/javascript" src="./delicacy_css/hover.js"></script>


		<!--table-->
		<link rel="stylesheet" type="text/css" href="./delicacy_css/shop_table.css">
		<script type="text/javascript" src="./delicacy_css/shop_table.js"></script>

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
<!--==============================Content=================================-->
	<!--之後可用大數據分析來推薦-->
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12">
				<div class="banners">
<!--=====================commodity=====================-->
<?php
	include "connect_db.php";
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

<h1 style="font-size:27px;">Latest Delicacy</h1>
<hr>

<!--===============使用google map查看自己的位置時要用https===============-->
<!--===============Azure剛好只要輸入多個s就可以轉換所以直接打絕對網址路徑===============-->
<!--第一排-->
<figure class="snip1584"><img src="<?php echo $picture_url[0]; ?>" alt="sample87"/>
  <figcaption>
    <h3><?php echo explode(".", $commodity_name[0])[0]; ?></h3>
    <h5>More</h5>
  </figcaption><a href="https://danniehotel.azurewebsites.net/Home/delicacy_css/delicacy_info.php?commodity_id=<?php echo $commodity_id[0]; ?>"></a>
</figure>

<figure class="snip1584"><img src="<?php echo $picture_url[1]; ?>" alt="sample87"/>
  <figcaption>
    <h3><?php echo explode(".", $commodity_name[1])[0]; ?></h3>
    <h5>More</h5>
  </figcaption><a href="https://danniehotel.azurewebsites.net/Home/delicacy_css/delicacy_info.php?commodity_id=<?php echo $commodity_id[1]; ?>"></a>
</figure>

<figure class="snip1584"><img src="<?php echo $picture_url[2]; ?>" alt="sample87"/>
  <figcaption>
    <h3><?php echo explode(".", $commodity_name[2])[0]; ?></h3>
    <h5>More</h5>
  </figcaption><a href="https://danniehotel.azurewebsites.net/Home/delicacy_css/delicacy_info.php?commodity_id=<?php echo $commodity_id[2]; ?>"></a>
</figure>

<!--第二排-->
<figure class="snip1584"><img src="<?php echo $picture_url[3]; ?>" alt="sample87"/>
  <figcaption>
    <h3><?php echo explode(".", $commodity_name[3])[0]; ?></h3>
    <h5>More</h5>
  </figcaption><a href="https://danniehotel.azurewebsites.net/Home/delicacy_css/delicacy_info.php?commodity_id=<?php echo $commodity_id[3]; ?>"></a>
</figure>

<figure class="snip1584"><img src="<?php echo $picture_url[4]; ?>" alt="sample87"/>
  <figcaption>
    <h3><?php echo explode(".", $commodity_name[4])[0]; ?></h3>
    <h5>More</h5>
  </figcaption><a href="https://danniehotel.azurewebsites.net/Home/delicacy_css/delicacy_info.php?commodity_id=<?php echo $commodity_id[4]; ?>"></a>
</figure>

<figure class="snip1584"><img src="<?php echo $picture_url[5]; ?>" alt="sample87"/>
  <figcaption>
    <h3><?php echo explode(".", $commodity_name[5])[0]; ?></h3>
    <h5>More</h5>
  </figcaption><a href="https://danniehotel.azurewebsites.net/Home/delicacy_css/delicacy_info.php?commodity_id=<?php echo $commodity_id[5]; ?>"></a>
</figure>

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
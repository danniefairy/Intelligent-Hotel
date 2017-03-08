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
		include '../connect_db.php';
		$id=$_SESSION['db_id'];
		$sql="SELECT `card_name` FROM `hotel` WHERE `id`=$id";
		$result=mysqli_query($connect,$sql);
		if(mysqli_fetch_array($result)[0]==""){
			echo "<a href=\"../index.php\">The service is for people who have already booked the room!</a>";
			die();
		}
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
		<title>Information</title>
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
								<li><a href="../index.php">Home</a></li>
								<li><a href="../index-1.php">Room & Tour</a></li>
								<li><a href="../index-2.php">SPECIAL OFFERS</a></li>
								<li><a href="https://danniehotel.azurewebsites.net/Home/shop_register/index.php">Store Management</a></li>
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
	$picture_url=$row[3];
	$price=$row[7];

	$search_name="SELECT * FROM `shop` WHERE `db_id`=\"$db_id\"";
	$result_name=mysqli_query($connect,$search_name);
	$return=mysqli_fetch_array($result_name);
	$shop=$return[2];

	//google map
	$lat=$return[4];
	$long=$return[5];

	
?>
<!--commodity info-->
<script type="text/javascript">
	var xhttp_commodity = new XMLHttpRequest();
	  xhttp_commodity.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	$get=JSON.parse(this.responseText);
	    	//靜態表格
	         document.getElementById("name").innerHTML=$get[2].split(".")[0];
	         document.getElementById("quantity_list").innerHTML=$get[5];
	         document.getElementById("discount").innerHTML=$get[7];
	         document.getElementById("description").innerHTML=$get[4];
	         //輸出表格
	         document.getElementById("quantity").max=$get[5];
	         document.getElementById("quantity").min=1;
	         document.getElementById("price").value=$get[7];

	    }
	  };
	  xhttp_commodity.open("POST", "commodity.php?commodity_id="+<?php echo $commodity_id;?>, true);
	  xhttp_commodity.send();
</script>
<!--coupon ajax-->
<script type="text/javascript">

var flag=0;
	var interval=setInterval( function() {
		var xhttp = new XMLHttpRequest();
	  	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    		var list=new Array();
	          list=this.responseText;
	         if(flag==0){
	         	for(var i=0;i<JSON.parse(list).length;i++){
	         	if(document.getElementById("coupon").value==JSON.parse(list)[i]){
	         		document.getElementById("coupon").style.background="#90EE90";
	         		document.getElementById("price").value=document.getElementById("price").value*0.8;
	         		document.getElementById("discount").innerHTML=document.getElementById("price").value+"(20%OFF)";
	         		document.getElementById("discount_row").style.background="#F08080";
	         		flag=1;
	         		clearInterval(interval);
	         		break;
	         		}
	         	}
	         }
	         


	    }
	  };
	  xhttp.open("POST", "coupon.php?db_id="+<?php echo $db_id;?>, true);
	  xhttp.send();}
	
,1000);



</script>
<!--coupon ajax-->
<h1 style="font-size:27px;"><?php echo $shop; ?></h1>
<hr>

<div class="grid_7">

<img class="info" src=".<?php echo $picture_url; ?>" alt="sample87"/>
<br><br>
<table>
	<tr>
		<td>Name:</td>
		<td><span id="name"></span></td>
	</tr>
	<tr>
		<td>Quantity:</td>
		<td><span id="quantity_list"></span></td>
	</tr>
	<tr id="discount_row">
		<td>Price:</td>
		<td><span id="discount"></span></td>
	</tr>
	<tr>
		<td>Description:</td>
		<td><span id="description"></span></td>
	</tr>
</table>
<br>
<script type="text/javascript">

</script>
<!--新增的-->
<div ng-app="myApp" ng-controller="formCtrl">
<form  action="buy.php" method="post">
	Quantity:<br>
	<input type="number" name="quantity" id="quantity" ng-model="quantity"><br>


	Coupon:<br>
	<input type="number" id="coupon" name="coupon">


	<input type="text" name="price" ng-model="price" id="price" hidden>
	<input type="text" name="shop" value="<?php echo $shop; ?>" hidden>
	<input type="text" name="commodity_id" value="<?php echo $commodity_id; ?>" hidden>
	<h4>Total cost: {{quantity*price}}</h4>
	<script>
	
	var app = angular.module('myApp', []);
	app.controller('formCtrl', function($scope) {
	    $scope.quantity =0;
	    setInterval(function(){
	    	$scope.price=document.getElementById("price").value;
	    	$scope.$apply();
	    })
	    



	});

	</script>
	<input type="submit" name="Buy" value="Buy">
</form>


</div>




</div>




<div class="grid_5">
<!--google map-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6h46-lqQIkEoHqwEiV1ub4vmhe8s92Ws&callback=initMap"
        async defer></script>
    <script>
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('google_map'), {
        center: {lat: <?php echo $lat; ?>, lng: <?php echo $long; ?>},
        zoom: 15
      });

      var company_position = {lat: <?php echo $lat; ?>, lng: <?php echo $long; ?>};
      var marker = new google.maps.Marker({
          map: map,
          position: company_position,
          title: "<?php echo $shop; ?>"
        });
      var infoWindow = new google.maps.InfoWindow({map: map});
		infoWindow.setPosition(company_position);
        infoWindow.setContent("<?php echo $shop; ?>");
//-------current location-------

    if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(function(position) {
	    var pos = {
	    	lat: position.coords.latitude,
	        lng: position.coords.longitude
	    };

	    //image icon
		  var image = '../images/icon_marker.png';
		  var beachMarker = new google.maps.Marker({
		    position: pos,
		    map: map,
		    icon: image
		  });


	    }, function() {
	      //handleLocationError(true, infoWindow, map.getCenter());
	    });
	    //alert(pos);

	} 

  //-------current location-------
    }
    </script>
    <!--google map-->
<!--google map-->
<figure id="google_map" style="min-width:400px;  min-height:285px;"></figure>
<!--google map-->
<br>
<img src="../images/icon_marker.png">
<span style="font-size:27px; vertical-align:middle;"><strong>Current location</strong></span>

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
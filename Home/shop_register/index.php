<?php
	session_start();
	$db_id=$_SESSION['db_id'];
	
	include 'connect_db.php';
	$search="SELECT * FROM shop WHERE `db_id`=$db_id";
	$result=mysqli_query($connect,$search);
	if(mysqli_fetch_array($result))
	{
			echo "yes";
			header("location:../index-3.php?manager=1");
			die();
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="shop_register.css">

            <!--google map-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6h46-lqQIkEoHqwEiV1ub4vmhe8s92Ws&callback=initMap"
        async defer></script>
    <script>

    //-------current location-------

    if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(function(position) {
	    var pos = {
	    	lat: position.coords.latitude,
	        lng: position.coords.longitude
	    };

	  	document.getElementById('lat').value=pos['lat'];
	  	document.getElementById('lng').value=pos['lng'];
	    }, function() {
	      //handleLocationError(true, infoWindow, map.getCenter());
	    });
	    //alert(pos);

	} 

  //-------current location-------


    </script>
    <!--google map-->
</head>
<body>
<div class="login">
    <h1>Shop Register</h1>
    <form method="post" action="register.php">
        <input type="text" name="name" placeholder="Company Name" required="required" />
        <input type="text" name="ein" placeholder="Employer Identification Number" required="required" />
        <input id="lat" type="text" name="lat" placeholder="Latitude" required="required" />
        <input id="lng" type="text" name="long" placeholder="Longitude" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Register</button>
    </form>
</div>

</body>
</html>
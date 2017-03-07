
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6h46-lqQIkEoHqwEiV1ub4vmhe8s92Ws&callback=initMap"
        async defer></script>
    <style>

      #map {
        height: 50%;
        width: 500px;
      }
    </style>

       <script>
    var map;
    function initMap() {

    if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(function(position) {
	 var  pos = {
	    	lat: position.coords.latitude,
	        lng: position.coords.longitude
	    };
			alert(pos['lat']);

	    }, function() {
	      handleLocationError(true, infoWindow, map.getCenter());

	    });
		

	} 

      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 25.0340, lng: 121.5645},
        zoom: 20
      });
    }
    </script>
</head>
<body>

    <figure style="text-align:center;" id="map"></figure>

</body>
</html>
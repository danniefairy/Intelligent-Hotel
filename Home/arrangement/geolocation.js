
var num;
var db_id=new Array();
var store_name=new Array();
var lat=new Array();
var lng=new Array();
var option;
function loadDoc(all) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      for(var i=0;i<JSON.parse(this.responseText).length;i++){
        db_id[i]=JSON.parse(this.responseText)[i].db_id;
        store_name[i]= JSON.parse(this.responseText)[i].store_name;
        lat[i] = JSON.parse(this.responseText)[i].lat;
          lng[i] = JSON.parse(this.responseText)[i].lng;
      }

      num=JSON.parse(this.responseText).length;
    //重新整理地圖  
  setTimeout(initMap, 100)

    option=all;
    }
  };
  xhttp.open("POST", "map_search.php", true);
  xhttp.send();
}

//google map=====================================================================
    function initMap() {
      
     var zoom_size; 
    if(option)
      zoom_size=10;
    else
      zoom_size=15;


  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 25.035915, lng: 121.563619},
    zoom: zoom_size
  });


  //找目前位置
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

        var infoWindow = new google.maps.InfoWindow({map: map});
        var current_lat=parseFloat(pos['lat']);
        var current_lng=parseFloat(pos['lng']);
        if(lat[0]!="undefined"){
          for(var s=0;s<num;s++){
            var latitude=parseFloat(lat[s]);
            var longitude=parseFloat(lng[s]);

            if(((Math.abs(current_lat-latitude)<0.01)&&(Math.abs(current_lng-longitude)<0.01))||option)
            {
              //附近商家
              var company_position = new google.maps.LatLng(latitude,longitude);
              var marker = new google.maps.Marker({
                map: map,
                position: company_position,
                title: store_name[s]
              });
              marker.setMap(map);
              var title=store_name[s];
              var id=db_id[s];
              //按鈕事件
              attachSecretMessage(marker, title,id);
              //附近商家
            }
          }
          //按鈕事件
          function attachSecretMessage(marker, title,id) {
            marker.addListener('click', function() {
              window.location = "https://danniehotel.azurewebsites.net/Home/shop_register/shop_info.php?store="+title+"&db_id="+id;
            });
          }
    }

    //current image icon
    var image = '../images/icon_marker.png';
    var beachMarker = new google.maps.Marker({
        position: pos,
        map: map,
        icon: image
      });

    infoWindow.setPosition(pos);
        infoWindow.setContent("You are here");
        map.setCenter(pos);
    //current image icon 
    


    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}
//google map=====================================================================

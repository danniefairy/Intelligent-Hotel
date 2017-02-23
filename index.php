<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="./login/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="./login/login.js"></script>
</head>
<body>
<div class="materialContainer">
   <div class="box">

        <div class="title">Intelligent Hotel Service</div>
            <h2>&nbsp</h2><br>
            <img style="float:right; height:300px;" src="./login/icon.jpg" >
            <h2 style="font-size:1.5vw;">I.H.S provide every traveler the most convinent and diversified vacation. Without any annoying preparation for your itinerary, I.H.S can help you schedule your tour and give you a unforgettable memory.</h2><br>            
    </div>

   <div class="overbox">
      <div class="material-button alt-2"><span class="shape"></span></div>

      <div class="title"  style="text-align:center;">
        <h2 style="font-size:2.5vw;">Ready for your journey</h2>
        <h2 style="font-size:2vw;">Let's login and fulfill your dream!</h2>
        <!--FB登入-->
        <script type="text/javascript" src="./fbapp/fb.js"></script>
        
        <fb:login-button data-scope="public_profile,email" onlogin="checkLoginState();" data-size="xlarge" size="xlarge">Login with Facebook</fb:login-button>

      </div>
   </div>

</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<style type="text/css">
  html { 
  background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/slider-2.jpg) no-repeat center center fixed ; 

  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  overflow: hidden;
}

img{
  display: block;
  margin: auto;
  width: 100%;
  height: auto;
}

#login-button{
  cursor: pointer;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  padding: 100px;
  margin: auto;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: rgba(3,3,3,.8);
  overflow: hidden;
  opacity: 0.9;
  box-shadow: 10px 10px 30px #000;}






</style>
<body>
<div id="login-button">
  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </img>
  <script type="text/javascript" src="./fbapp/fb.js"></script>
        <fb:login-button data-scope="public_profile,email,user_friends" onlogin="checkLoginState();" data-size="xlarge" size="xlarge" ></fb:login-button>
</div>




</body>
</html>
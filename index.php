<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
  margin: 0;
  padding: 0;
  background: #fff;

  color: #fff;
  font-family: Arial;
  font-size: 12px;
}

.body{
  position: absolute;
  top: -20px;
  left: -20px;
  right: -40px;
  bottom: -40px;
  width: auto;
  height: auto;
  background-image: url(http://farm8.staticflickr.com/7244/7195625944_5a47ddbbef_b.jpg);
  background-size: cover;
  -webkit-filter: blur(2px);
  z-index: 0;
}


.header{
  position: absolute;
  top: calc(50% - 40px);
  left: calc(50% - 240px);
  z-index: 2;


}

.header div{
  float: right;
  color: #fff;
  font-family: 'Exo', sans-serif;
  font-size: 400%;
  font-weight: 200;

-webkit-animation-name: fadeIn; /*动画名称*/
    -webkit-animation-duration: 3s; /*动画持续时间*/
    -webkit-animation-iteration-count: 1; /*动画次数*/
    -webkit-animation-delay: 0s; /*延迟时间*/
}

.header div span{
  color: #5379fa !important;
}

.login{
  position: absolute;
  top: calc(50% - 65px);
  left: calc(52% );
  height: 150px;
  width: 350px;
  padding: 10px;
  z-index: 2;

-webkit-animation-name: fadeIn; /*动画名称*/
    -webkit-animation-duration: 5s; /*动画持续时间*/
    -webkit-animation-iteration-count: 1; /*动画次数*/
    -webkit-animation-delay: 0s; /*延迟时间*/
}

  @-webkit-keyframes fadeIn {
    0% {
        opacity: 0; /*初始状态 透明度为0*/
    }
    50% {
        opacity: 0; /*中间状态 透明度为0*/
    }
    100% {
        opacity: 1; /*结尾状态 透明度为1*/
    }
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}



hr { width: 170%; transition:width 1s;
-webkit-animation-name: long; /*动画名称*/
    -webkit-animation-duration: 3s; /*动画持续时间*/
    -webkit-animation-iteration-count: 1; /*动画次数*/
    -webkit-animation-delay: 1s; /*延迟时间*/ }

@-webkit-keyframes long {
    0% {
        width: 0%; /*初始状态 透明度为0*/
    }
    50% {
        width: 100%; /*中间状态 透明度为0*/
    }
    100% {
        width: 170%; /*结尾状态 透明度为1*/
    }
}
</style>
<body>
  <div class="body"></div>

  <div class="header">
    <div>Travel<span>Smart</span><hr></div>
  </div>

  <div class="login">
      <br>
      <br>
      <script type="text/javascript" src="./fbapp/fb.js"></script>
      <fb:login-button data-scope="public_profile,email,user_friends" onlogin="checkLoginState();" data-size="xlarge" size="xlarge" >Login</fb:login-button>
    
  </div>

</body>
</html>
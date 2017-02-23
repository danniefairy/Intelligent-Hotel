<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Login</title>
  
  
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>

    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
        .sign-up-htm{
            text-align: center;
            margin-top:60%;
        }
        .login_title{
            font-size:2vw;
        }
    </style>

</head>

<body>
  <div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Introduction</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Login</label>
        <div class="login-form">
            <div class="sign-in-htm">
               預留空間
            </div>
            <div class="sign-up-htm">
                <h1 class="login_title">Let's enjoy the journey</h1>
                <script type="text/javascript" src="./fbapp/fb.js"></script>
                <div class="fb-login-button" data-scope="public_profile,email" onlogin="checkLoginState();" data-size="xlarge"></div>
            </div>
        </div>
    </div>
</div>
  
</body>
</html>

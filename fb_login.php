<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript" src="./fbapp/fb.js"></script>
<div class="fb-login-button" data-scope="public_profile,email" onlogin="checkLoginState();"></div>
<?php
	session_start();
	if(isset($_SESSION['name']))
	{
		echo $_SESSION['name']."<br>".$_SESSION['gender']."<br>".$_SESSION['email'];
		foreach ($_SESSION['age_range'] as $key => $value) {
			echo $value;
		}
	}
?>
</body>
</html>
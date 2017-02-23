<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript" src="./fbapp/fb.js"></script>
<div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>
<?php
	session_start();
	if(isset($_SESSION['name']))
	{
		echo $_SESSION['name'];
	}
?>
</body>
</html>
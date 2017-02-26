
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<?php
		header("Content-Type:text/html; charset=utf-8");
	    include 'db_connect.php';
		if(isset($_GET['name'])){
			echo $_GET['name'].$_GET['gender'].$_GET['email'];
			echo '<script>console.log($_GET[\'name\'])</script>';
			$name=$_GET['name'];
			$gender=$_GET['gender'];
			$email=$_GET['email'];

			$search="SELECT * FROM `hotel` WHERE `name`=\"$name\" AND `email`=\"$email\"";
			$result=mysqli_query($connect,$search);
			if(mysqli_fetch_array($result))
			{
				echo "<br>exist";
			}
			else{
				$insert="INSERT INTO `hotel` (`name`,`gender`,`email`) VALUES (\"$name\",\"$gender\",\"$email\")";
				mysqli_query($connect,$insert);
				echo "<br>".mysqli_error($connect);
				echo "<br>".$insert;
			}

			$search="SELECT `id` FROM `hotel` WHERE `name`=\"$name\" AND `email`=\"$email\"";
			$result=mysqli_query($connect,$search);
			$id=mysqli_fetch_array($result)[0];
			$fb_id=$_GET['fb_id'];
			header("Location: ./Home/index.php?fb_id=".$fb_id."&db_id=".$id);
			die();
		}
	?>

</body>
</html>
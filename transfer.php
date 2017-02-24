
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	    include 'db_connect.php';
		if(isset($_GET['name'])){
			echo $_GET['name'].$_GET['gender'].$_GET['email'];
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
				echo "<br>".$insert;
			}

			$search="SELECT `id` FROM `hotel` WHERE `name`=\"$name\" AND `email`=\"$email\"";
			$result=mysqli_query($connect,$search);
			$id=mysqli_fetch_array($result)[0];

			header("Location: ./Home/index.php?id=".$id);
			die();
		}
	?>

</body>
</html>
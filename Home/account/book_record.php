<?php
	if(isset($_GET['db_id'])){
		$db_id=$_GET['db_id'];
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.dropbtn {
		    background-color: #4CAF50;
		    color: white;
		    padding: 16px;
		    font-size: 16px;
		    border: none;
		    cursor: pointer;
		    border-color: white;
		    border-style: solid;
		    border-width: 0.5px;
		}

		.dropdown {
		    position: relative;
		    display: inline-block;
		}

		.dropdown-content {
		    display: none;
		    position: absolute;
		    background-color: #f9f9f9;
		    min-width: 225px;
		    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		    z-index: 1;
		}

		.dropdown-content a {
		    color: black;
		    padding: 12px 16px;
		    text-decoration: none;
		    display: block;
		}

		.dropdown-content a:hover {background-color: #f1f1f1}

		.dropdown:hover .dropdown-content {
		    display: block;
		}

		.dropdown:hover .dropbtn {
		    background-color: #3e8e41;
		}
	</style>
</head>
<body>
<h3>Room History</h3>
	<p style="font-size:20px;">Sorted by check-in date:</p>
	<?php
	include "../connect_db.php";
	$search="SELECT * FROM `book` WHERE `db_id`=\"$db_id\" ORDER BY `check_in` DESC";
	$result=mysqli_query($connect,$search);
	while($row=mysqli_fetch_array($result)){
		echo "<div class=\"dropdown\">";
			//check in date
			echo "<button class=\"dropbtn\">$row[6]</button>";
			echo "<div class=\"dropdown-content\">";
			echo "<p style=\" font-size:20px;\">Name:$row[2]</p>";
			echo "<p style=\" font-size:20px;\">Check-out:$row[7]</p>";
			echo "<p style=\" font-size:20px;\">Level:$row[8]</p>";
			$adult=explode("/", $row[9])[0];
			$child=explode("/", $row[9])[1];
			echo "<p style=\" font-size:20px;\">People:$adult adult $child child </p>";
			echo "<p style=\" font-size:20px;\">Room:$row[10]</p>";
			echo "<p style=\" font-size:20px;\">Style:$row[11]</p>";
			echo "</div>";
		echo "</div>";
	} 
?>




</body>
</html>
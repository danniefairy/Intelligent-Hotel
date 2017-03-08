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
		    min-width: 160px;
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
<h3>Commodity History</h3>
	<p style="font-size:20px;">Sorted by date:</p>
	<?php
	include "../connect_db.php";
	$search="SELECT * FROM `transaction_history` WHERE `customer_id`=\"$db_id\" ORDER BY `date` DESC";
	$result=mysqli_query($connect,$search);
	while($row=mysqli_fetch_array($result)){
		echo "<div class=\"dropdown\">";
			echo "<button class=\"dropbtn\">$row[6]</button>";
			echo "<div class=\"dropdown-content\">";
			echo "<p style=\" font-size:20px;\">Name:$row[2]</p>";
			echo "<p style=\" font-size:20px;\">Store:$row[3]</p>";
			echo "<p style=\" font-size:20px;\">Num:$row[4]</p>";
			echo "<p style=\" font-size:20px;\">Price:$row[5]$</p>";
			echo "</div>";
		echo "</div>";
	} 
?>




</body>
</html>
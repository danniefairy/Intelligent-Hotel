<?php
	if(isset($_GET['fb_id'])){
		$fb_id=$_GET['fb_id'];
		$db_id=$_GET['db_id'];
		include "../connect_db.php";
		$search="SELECT * FROM `hotel` WHERE `id`=\"$db_id\"";
		$result=mysqli_query($connect,$search);
		$row=mysqli_fetch_array($result);
		$name=$row[1];
		$gender=$row[2];
		$email=$row[3];
		$card_name=$row[4];
		$card_num=$row[5];
		$card_cvv=$row[6];
		$card_exp=$row[7];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 20px;
        }

        td, th {
            border: 3px solid #000000;
            text-align: left;
            padding: 10px;
        }

        tr:nth-child(odd) {
            background-color: #dddddd;
        }
	</style>
</head>
<body>
<h3>Personal Info</h3>
<table>
	<tr>
		<td>Name</td>
		<td><?php echo $name; ?></td>
	</tr>
	<tr>
		<td>Gender</td>
		<td><?php echo $gender; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $email; ?></td>
	</tr>
	<tr>
		<td>CC</td>
		<td><?php echo $card_name; ?></td>
	</tr>
	<tr>
		<td>Number</td>
		<td><?php echo $card_num; ?></td>
	</tr>
	<tr>
		<td>CVV</td>
		<td><?php echo $card_cvv; ?></td>
	</tr>
	<tr>
		<td>Expire Date</td>
		<td><?php echo $card_exp; ?></td>
	</tr>
</table>
</body>
</html>
<?php
	session_start();
	if(!isset($_SESSION['fb_id'])){
		echo "<a href=\"../index.php\">Please enter with facebook!</a>";
		die();
	}
	else{
		if(!isset($_GET['manager'])){
			echo "<a href=\"index.php\">Please register your store first!</a>";
			die();
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Store Management</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		<!--table-->
		<style type="text/css">
			<style>
				table {
				    font-family: arial, sans-serif;
				    border-collapse: collapse;
				    width: 100%;
				}

				td, th {
				    border: 1px solid #000000;
				    text-align: left;
				    padding: 8px;
				}

				tr:nth-child(even) {
				    background-color: #dddddd;
				}
			</style>
		</style>
	</head>
	<body>
<!--==============================header=================================-->
		<header>
			<div class="container_12">
				<div class="grid_12">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
								<li><a href="index.php">Home</a></li>
								<li><a href="index-1.php">Room & Tour</a></li>
								<li><a href="index-2.php">SPECIAL OFFERS</a></li>
								<li class="current"><a href="shop_register/index.php">Store Management</a></li>
								<li><a href="../credit_card/index.php">Credit Card</a></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12">
					<h1>
						<a href="index.php">
							<img src="images/logo.png" alt="Your Happy Family">
						</a>
					</h1>
				</div>
			</div>
		</header>
<!--==============================Content=================================-->
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12">

			<!--左邊-->
				<div class="grid_7">
					<h3 class="head1">Gallery</h3>
				</div>
			<!--左邊-->

			<!--右邊-->
				<div class="grid_3 prefix_1">
					
					<h3>Management</h3>
					<form action="upload_get.php" method="post" enctype="multipart/form-data">
							Commodity:<br/>
							<input type="text" name="file_name" placeholder="Name"><br/><br/>
							Picture:<br/>
							<input type="file" name="file"><br/><br/>
							Description:<br>
							<textarea name="description" placeholder="Description of your commodity!"></textarea><br><br>
							<input type="submit" value="送出">	
							<br><br>
							<hr>	
						</form>

						<?php
						//利用GET刪除檔案
						if(isset($_GET['delete']))
							unlink("./upload/".$_GET['delete']);

						//利用GET重新命名
						if(isset($_GET['new']))
							rename($_GET['old'], $_GET['new']);
						

						/*
						*讀取資料夾目錄
						*/
						$dirlist=scandir('./shop_register/upload/');
						$i=count($dirlist);

						$db_id=$_SESSION['db_id'];
						include "connect_db.php";
						$search="SELECT * FROM `commodity` WHERE `db_id`=$db_id";
						while($row=mysqli_fetch_array($result))
						{
							echo $row[2];
						}
						echo 123;


						echo "<table>";
						//因為前兩個為.、..所以真正檔名從矩陣2開始
						for($k=2;$k<$i;$k++){
							$name=$dirlist[$k];
							echo "<tr>";
								echo "<td>";
									echo "<a href=./upload/$name>$name</a>";
								echo "</td>";
							//使用get來改變id
								echo "<td>";
									echo "&nbsp&nbsp<a href=\"?delete=$name\">delete</a>";
								echo "</td>";
							//更新名稱
								echo "<td>";
									echo "&nbsp&nbsp<a href=\"upload_rename.php?rename=./upload/$name\">rename</a>";
								echo "</td>";
							echo "</tr>";
						
						}
						echo "</table>";

						?>
				</div>
			<!--右邊-->

			</div>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="socials">
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy">
						Your Trip (c) 2014 | <a href="#">Privacy Policy</a> | Website Template Designed by <a href="http://www.templatemonster.com/" rel="nofollow">TemplateMonster.com</a>
					</div>
				</div>
			</div>
		</footer>
		<script>
		$(function (){
			$('#bookingForm').bookingForm({
				ownerEmail: '#'
			});
		})
		</script>
	</body>
</html>
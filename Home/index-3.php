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

<?php
					//刪除以及改名	
					include "connect_db.php";
					$db_id=$_SESSION['db_id'];
						//利用GET刪除檔案
						if(isset($_GET['delete'])){
							unlink("./shop_register/upload/".$_GET['delete']);
							$commodity=$_GET['delete'];
							$delete="DELETE FROM `commodity` WHERE `db_id_name`=\"$commodity\"";
							mysqli_query($connect,$delete);
						}

						//利用GET重新命名
						if(isset($_GET['new'])){
							rename($_GET['old'], $_GET['new']);
							$new=explode("/",$_GET['new'])[3];
							$old=explode("/",$_GET['old'])[3];
							$update="UPDATE `commodity` SET `db_id_name`=\"$new\" WHERE `db_id_name`=\"$old\"";
							mysqli_query($connect,$update);
						}

						if(isset($_POST['replenishment'])){
							$r_q=$_POST['replenishment'];
							$r_name=$_POST['r_name'];
							$update="UPDATE `commodity` SET `quantity`=\"$r_q\" WHERE `db_id`=\"$r_name\"";
							mysqli_query($connect,$update);
						}
						
						/*
						*讀取資料夾目錄
						*/
						//$dirlist=scandir('./shop_register/upload/');
						//$i=count($dirlist);

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

				input[type=text], select {
			    width: 100%;
			    padding: 12px 20px;
			    margin: 8px 0;
			    display: inline-block;
			    border: 1px solid #ccc;
			    border-radius: 4px;
			    box-sizing: border-box;
				}

				input[type=number], select {
			    width: 100%;
			    padding: 12px 20px;
			    margin: 8px 0;
			    display: inline-block;
			    border: 1px solid #ccc;
			    border-radius: 4px;
			    box-sizing: border-box;
				}
				textarea{
					width: 100%;
				    padding: 30px 20px;
				    margin: 8px 0;
				    display: inline-block;
				    border: 1px solid #ccc;
				    border-radius: 4px;
				    box-sizing: border-box;
				}

				input[type=submit] {
				    width: 100%;
				    background-color: #4CAF50;
				    color: white;
				    padding: 14px 20px;
				    margin: 8px 0;
				    border: none;
				    border-radius: 4px;
				    cursor: pointer;
				}

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
			<?php
				
				$title="SELECT `company_name` FROM shop WHERE `db_id`=\"$db_id\"";
				$title_db=mysqli_query($connect,$title);
				$store_title=mysqli_fetch_array($title_db)[0];
			?>
			<!--左邊-->
				<div class="grid_7">
					<h3 class="head1"><?php echo $store_title; ?></h3>
					<hr>
					<?php
					$search="SELECT * FROM `commodity` WHERE `db_id`=$db_id";
						$result=mysqli_query($connect,$search);
						$db_count=0;
						$num=mysqli_num_rows($result);
						while($row=mysqli_fetch_array($result))
						{
							$db_array[$db_count]=$row[2];
							$db_quantity[$db_count]=$row[5];
							$db_count=$db_count+1;
						}
						

						echo "<table>";
						echo "<tr>";
							echo "<td><Strong>Image</Strong></td>";
							echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<Strong>Delete</Strong></td>";
							echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<Strong>Rename</Strong></td>";
							echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<Strong>Quantity</Strong></td>";
						echo "</tr>";
						//因為前兩個為.、..所以真正檔名從矩陣2開始
						for($k=0;$k<$num;$k++){
							$name=$db_array[$k];
							$q=$db_quantity[$k];
							echo "<tr>";
								echo "<td>";
									echo "<a href=./shop_register/upload/$name>$name</a>";
								echo "</td>";
							//使用get來改變id
								echo "<td>";
									echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href=\"?manager=1&delete=$name\">delete</a>";
								echo "</td>";
							//更新名稱
								echo "<td>";
									echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href=\"upload_rename.php?rename=./shop_register/upload/$name\">rename</a>";
								echo "</td>";
							//數量
								echo "<td>";
									echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href=\"quantity_manage.php?name=$name\">$q</a>";
								echo "</td>";
							echo "</tr>";
						
						}
						echo "</table>";
					?>
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
							Quantity:<br/>
							<input type="number" name="quantity"><br/><br/>
							Description:<br>
							<textarea name="description" placeholder="Description of your commodity!"></textarea><br><br>
							<input type="submit" value="送出">	
							<br><br>
								
						</form>

						
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
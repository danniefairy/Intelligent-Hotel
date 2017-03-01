<!DOCTYPE html>
<html>
<head>
	<title>Upload File</title>
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
</head>
<body>

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
	$dirlist=scandir('./upload/');
	$i=count($dirlist);

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

	


</body>
</html>
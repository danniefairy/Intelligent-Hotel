<!DOCTYPE html>
<html>
<head>
	<title>Upload_file_get</title>
</head>
<body>
	<?php
		/*
		*$_FILES['UpFile']['tmp_name']上傳檔案存在server端地站存檔路徑以及檔名
		*$_FILES['UpFile']['name']上傳檔案在用戶端的原始檔名
		*$_FILES['UpFile']['type']上傳檔案類型
		*$_FILES['UpFile']['size']上傳檔案大小
		*$_FILES['UpFile']['error']錯誤代碼 (如果錯誤代碼為UPLOAD_ERR_OK表示上傳成功)
		*/

		//要傳到目前位置所建新的資料夾要用"./資料夾名稱/""
		$upload_dir='./upload/';
		if($_FILES['file']['error']==UPLOAD_ERR_OK){
			move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir.$_FILES['file']['name']);
			echo '上傳成功<br>';
			echo "原始檔名: ".$_FILES['file']['name']." <br>";
			echo "檔案類型: ".$_FILES['file']['type']." <br>";
			echo "檔案大小: ".$_FILES['file']['size']." <br>";
			echo "暫存檔名: ".$_FILES['file']['tmp_name']." <br>";
			//echo explode(".",$_FILES['file']['name'])[1];
			rename("./upload/".$_FILES['file']['name'], "./upload/".$_POST['file_name'].".".explode(".",$_FILES['file']['name'])[1]);


			session_start();
			$db_id=$_SESSION['db_id'];
			$name=$_POST['file_name'];
			$path="./upload/".$_POST['file_name'].".".explode(".",$_FILES['file']['name'])[1];
			$description=$_POST['description'];s
			include "connect_db.php";
			$insert="INSERT INTO `commodity` (`db_id`,`db_id_name`,`db_id_picture`,`db_id_description`) VALUES (\"$db_id\",\"$name\",\"$path\",\"$description\")";
			mysqli_query($connect,$insert);
		}
		else{
			echo "上傳失敗";
		}

	?>
	<form>
		<input type ="button" onclick="location.href='upload.php'" value="回到上一頁"></input>
	</form>
	
</body>
</html>

	
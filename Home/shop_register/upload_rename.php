<!DOCTYPE html>
<html>
<head>
	<title>Rename</title>
</head>
<body>
	<form name="rename" method="get" action="upload.php">
		舊檔案名稱:
		<input type="text" name="old" maxlength="50" value="<?php echo $_GET['rename'];?>">
		請輸入新檔案名稱:
		<input type="text" name="new" maxlength="50" >
		<input type="submit" value="修改">
	</form>

	
</body>
</html>
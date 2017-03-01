<!DOCTYPE html>
<html>
<head>
	<title>Rename</title>
</head>
<body>
	<form name="rename" method="get">
		舊檔案名稱:
		<input type="text" name="old" maxlength="50" value="<?php echo $_GET['rename'];?>">
		請輸入新檔案名稱:
		<input id="new_name" type="text" name="new" maxlength="50" >
		<input type="submit" value="修改" onclick="rename()">
	</form>
<script type="text/javascript">
	function rename(){
		var name = document.getElementById("new_name").value;
		window.location="index-3.php?manager=1&new="+name;
	}
</script>
	
</body>
</html>
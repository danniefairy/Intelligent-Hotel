<!DOCTYPE html>
<html>
<head>
	<title>Rename</title>
</head>
<body>
	<form method="get">
		舊檔案名稱:
		<input type="text" name="old" maxlength="50" value="<?php echo $_GET['rename'];?>">
		請輸入新檔案名稱:
		<input id="new_name" type="text" name="new" maxlength="50" >
		<button  onclick="rename()"></button>
	</form>
<script type="text/javascript">
	function rename(){
		var name = document.getElementById("new_name").value;
		//alert("./index-3.php?manager=1&new="+name);
		window.location.replace("./index-3.php?manager=1&new="+name);
	}
</script>
	
</body>
</html>
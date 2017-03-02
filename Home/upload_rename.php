<!DOCTYPE html>
<html>
<head>
	<title>Rename</title>
</head>
<body>
	<form>
		舊檔案名稱:
		<input type="text" id="old" maxlength="50" value="<?php echo $_GET['rename'];?>">
		<br>
		請輸入新檔案名稱:
		<input id="new_name" type="text" maxlength="50" >
		<input type="button" value="Submit"  onclick="newname()">
	</form>
<script type="text/javascript">
	function newname(){
		var name = document.getElementById("new_name").value;
		var oldname = document.getElementById("old").value;
		//alert("./index-3.php?manager=1&new="+name+"&old="+oldname);
		window.location="./index-3.php?manager=1&new="+name+"&old="+oldname;
	}
</script>
	
</body>
</html>
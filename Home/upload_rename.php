<!DOCTYPE html>
<html>
<head>
	<title>Rename</title>
</head>
<body>
<div style="position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);">
	<form >
		舊檔案名稱:<br>
		<input type="text" id="old" maxlength="50" value="<?php echo $_GET['rename'];?>">
		<br>
		請輸入新檔案名稱:<br>
		<input id="new_name" type="text" maxlength="50" >
		<br><br>
		<input type="button" value="Submit"  onclick="newname()">
	</form>
	</div>
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
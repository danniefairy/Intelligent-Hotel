<!DOCTYPE html>
<html>
<head>
	<title>Rename</title>
</head>
<style type="text/css">
	input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=button] {
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
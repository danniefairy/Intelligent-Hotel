<!DOCTYPE html>
<html>
<head>
	<title>Rename</title>
</head>
<style type="text/css">
input[type=number], select {
    width: 100%;
    padding: 12px 20px;
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
<body>
<div style="position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);">
	<form method="POST" action="index-3.php?manager=1">
		Replenishment:<br>
		<input type="number" name="replenishment"><br>
		<input type="text" name="r_name" value="<?php echo $_GET['name']; ?>">
		<input type="submit" value="Submit"">
	</form>
	</div>

	
</body>
</html>
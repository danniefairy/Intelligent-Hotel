<?php
	if(isset($_GET['name'])){
		echo $_GET['name'].$_GET['gender'].$_GET['email'];
		echo 'yes';
	}
	echo 'no';
?>
<?php
	if(isset($_SESSION['name'])){
		echo $_SESSION['name'];
		echo 'yes';
	}
	echo 'no';
?>
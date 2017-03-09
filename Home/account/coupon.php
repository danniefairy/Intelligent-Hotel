<?php
	if(isset($_GET['db_id'])){
		$db_id=$_GET['db_id'];
		session_start();
		$friendlist=$_SESSION['friends'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.dropbtn {
		    background-color: #4CAF50;
		    color: white;
		    padding: 16px;
		    font-size: 16px;
		    border: none;
		    cursor: pointer;
		    border-color: white;
		    border-style: solid;
		    border-width: 0.5px;
		}

		.dropdown {
		    position: relative;
		    display: inline-block;
		}

		.dropdown-content {
		    display: none;
		    position: absolute;
		    background-color: #f9f9f9;
		    min-width: 130px;
		    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		    z-index: 1;
		}

		.dropdown-content a {
		    color: black;
		    padding: 12px 16px;
		    text-decoration: none;
		    display: block;
		}

		.dropdown-content a:hover {background-color: #f1f1f1}

		.dropdown:hover .dropdown-content {
		    display: block;
		}

		.dropdown:hover .dropbtn {
		    background-color: #3e8e41;
		}
	</style>

<!--popup-->
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
<body>
<h3>Coupon Management</h3>
	<p style="font-size:15px;">You can click the number and go to the store and use those serial number for your discount!</p>
	<p style="font-size:20px;">Sorted by stores:</p>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?php
	include "../connect_db.php";

	//find store name
	$search_name="SELECT `db_id`,`company_name` FROM `shop`";
	$result_name=mysqli_query($connect,$search_name);
	while($row=mysqli_fetch_array($result_name)){
		$store_name[$row[0]]=$row[1];
	}

	$search="SELECT * FROM `coupon` WHERE `customer_id`=\"$db_id\"";
	$result=mysqli_query($connect,$search);
	while($row=mysqli_fetch_array($result)){
		echo "<div class=\"dropdown\">";
			$index=$row[2];
			echo "<button class=\"dropbtn\">$store_name[$index]</button>";
			echo "<div class=\"dropdown-content\">";
			echo "<a href=\"https://danniehotel.azurewebsites.net/Home/shop_register/shop_info.php?store=$store_name[$index]&db_id=$index\" style=\" font-size:20px;background-color:#FFA6A6; color:white;\"><i class=\"fa fa-hand-pointer-o\" style=\"font-size:24px;\"></i>$row[3]</a>";
			
			$serial_num=$row[3];
			echo "<a href=\"\" onclick=\"myclick($serial_num,$index)\" style=\" font-size:20px;background-color:#B0E0E6; color:white;\"><i class=\"fa fa-hand-pointer-o\" style=\"font-size:24px;\"></i>Send</a>";
			

			echo "</div>";
		echo "</div>";
	}

//對話框內的東西
echo "
		<a href=\"\" id=\"myBtn\" style=\"font-size:24px; color:white; background-color:#B0E0E6;\" hidden>Send</a>

		<div id=\"myModal\" class=\"modal\">

			<div class=\"modal-content\">
				<span class=\"close\">&times;</span>";
						    
					echo "<p>Some text in the Modal..</p>";
					$friend_count=count($friendlist);

					for($i=0;$i<$friend_count;$i++){
						$friend_name=$friendlist[$i]['name'];
						$friend_id=$friendlist[$i]['id'];
						echo "<a  href=\"\" onclick=\"direct_url($friend_name)\">$friend_name</a><br>";
					}
echo " 		</div>
		</div>";

?>




<!--popup-->
<script>
var serial_num;
var index;
var friend_name;
var name;
//呼叫

function myclick(serial_num,index){
	btn.onclick(serial_num,index);
		
}

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function(serial_num,index) {
    modal.style.display = "block";
    //alert(serial_num+"@"+index);

    var pop_window=setInterval(function()
    	{ 
    		if(typeof name!="undefined"){
    			alert(name);
    			//window.location = "./account/send_coupon.php?give_to="+name+"&store_id="+index+"&num="+serial_num;
    			clearInterval(pop_window);
    		}
    		 
    	}, 500);

}
function direct_url(friend_name){
    	name=friend_name;
    	alert(name);
    }
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>


</body>
</html>
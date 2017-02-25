<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./credit_card.css">
	<script type="text/javascript" src="./credit_card.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script src="jquery-3.1.1.min.js"></script>

</head>
<body>

<?php
	if(isset($_GET['wrong']))
		echo"<script type=\"text/javascript\">
		alert(\"Please complete the form!\");
	</script>";
?>

<!--credit card-->
<div class="cc-form">
  <h1><span class="glyphicon glyphicon-credit-card"></span>Credit Card</h1>
  <form id="cc-form" action="get.php">
    <div class="form-item text">
      <div>
        <label for="name">Name on card</label>
      </div>
      <input type="text" name="Name" id="name" value=""></input>
    </div>
    <div class="row">
      <div class="col-xs-8 form-item text">
        <div>
          <label for="number">Card number</label>
        </div>
        <input type="number" name="Number" id="number" value=""></input>
      </div>
      <div class="col-xs-4 form-item text">
        <div>
          <label for="password">CVV</label>
        </div>

        <input type="text" name="CVV" id="cvv" value=""></input>
      </div>
    </div>
<div class="row expires">
        <div class="exp-label">Expires</div>
  <div class="col-xs-6 form-item">
    <div class="sr-only">
          <label for="month" >Month</label>
        </div>

        <select id='month' name="month">
    <option value=''>--Month--</option>
    <option value='1'>January</option>
    <option value='2'>February</option>
    <option value='3'>March</option>
    <option value='4'>April</option>
    <option value='5'>May</option>
    <option value='6'>June</option>
    <option value='7'>July</option>
    <option value='8'>August</option>
    <option value='9'>September</option>
    <option value='10'>October</option>
    <option value='11'>November</option>
    <option value='12'>December</option>
    </select> 
  </div>
  <div class="col-xs-6 form-item">
    <div class="sr-only">
          <label for="year">Year</label>
        </div>

        <select name="year" id="year">
          <option value=''>--Year--</option>
    <option value='2016'>2016</option>
    <option value='2017'>2017</option>
    <option value='2018'>2018</option>
    <option value='2019'>2019</option>
    <option value='2020'>2020</option>
    <option value='2021'>2021</option>
          </select>
  </div>
</div>
    <div class="form-item">
      <input type='submit' value="Submit"></input>
    </div>
  </form>
</div>
<!--credit card-->
</body>
</html>
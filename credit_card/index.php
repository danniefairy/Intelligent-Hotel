<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="credit_card.css">
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
<div class="form"">
  <h1 style="text-align:center; font-size:40px;">Credit Card</h1>
  <hr>

  <form id="form" action="get.php">


      <h1>Name on card</h1>
      <input type="text" name="Name" id="name" value=""></input>

      <h1>Card number</h1>
      <input type="number" name="Number" id="number" value=""></input>
      
      <h1>CVV</h1>
      <input type="text" name="CVV" id="cvv" value=""></input>
      
      <h1>Expires</h1>
        <label for="month" >Month</label>
        <br>
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

          <br>

        <label>Year</label>
        <br>
          <select name="year" id="year">
          <option value=''>--Year--</option>
          <option value='2016'>2016</option>
          <option value='2017'>2017</option>
          <option value='2018'>2018</option>
          <option value='2019'>2019</option>
          <option value='2020'>2020</option>
          <option value='2021'>2021</option>
          </select>

      <br><br>
      <input type='submit' value="Submit"></input>
  </form>

<!--credit card-->
</body>
</html>
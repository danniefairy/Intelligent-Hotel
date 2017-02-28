<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="shop_register.css">
</head>
<body>
<div class="login">
    <h1>Shop Register</h1>
    <form method="post" action="register.php">
        <input type="text" name="name" placeholder="Company Name" required="required" />
        <input type="text" name="ein" placeholder="Employer Identification Number" required="required" />
        <input type="text" name="long" placeholder="Longtitude" required="required" />
        <input type="text" name="lat" placeholder="Latitude" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Register</button>
    </form>
</div>

</body>
</html>
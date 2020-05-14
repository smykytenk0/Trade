<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="input.css">
</head>
<body>
<?php

require_once 'connection.php';
if(isset($_POST['id_outlets'])&&isset($_POST['id_provider'])&&isset($_POST['id_goods'])&&isset($_POST['amount'])&&isset($_POST['price'])&&isset($_POST['data']))
{
	$link = mysqli_connect($host,$user,$password,$database)
		or die("Error" .mysqli_error($link));
	
	$id_outlets = htmlentities(mysqli_real_escape_string($link, $_POST['id_outlets']));
	$id_provider = htmlentities(mysqli_real_escape_string($link, $_POST['id_provider']));
	$id_goods = htmlentities(mysqli_real_escape_string($link, $_POST['id_goods']));
	$amount = htmlentities(mysqli_real_escape_string($link, $_POST['amount']));
	$price = htmlentities(mysqli_real_escape_string($link, $_POST['price']));
	$data = htmlentities(mysqli_real_escape_string($link, $_POST['data']));

	$query = "INSERT INTO orders VALUES(NULL, '$id_outlets','$id_provider','$id_goods','$amount','$price','$data')";
	
	$result = mysqli_query($link, $query) or die ("Error" .mysqli_error($link));
	if($result)
	{
		echo"<span style='color:blue;'>Data was putted into table</span>";
	}
	mysqli_close($link);
}
?>
<h2 class="input">Put a new order</h2>
<form method="POST">
<p>Enter id_outlets:<br>
<input type="text" name="id_outlets"/></p>
<p>Enter id_provider:<br>
<input type="text" name="id_provider"/></p>
<p>Enter id_goods:<br>
<input type="text" name="id_goods"/></p>
<p>Enter amount:<br>
<input type="text" name="amount"/></p>
<p>Enter price:<br>
<input type="text" name="price"/></p>
<p>Enter data:<br>
<input type="text" name="data"/></p>
<input type = "submit" value = "Input">
</form>
</body>
</html>


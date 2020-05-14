<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css.css">
</head>
<body>
<?php

require_once 'connection.php';
if(isset($_POST['name'])&&isset($_POST['age'])&&isset($_POST['sex'])&&isset($_POST['id_staff'])&&isset($_POST['id_goods'])&&isset($_POST['amount_goods'])&&isset($_POST['data']))
{
	$link = mysqli_connect($host,$user,$password,$database)
		or die("Error" .mysqli_error($link));
	
	$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
	$age = htmlentities(mysqli_real_escape_string($link, $_POST['age']));
	$sex = htmlentities(mysqli_real_escape_string($link, $_POST['sex']));
	$id_staff = htmlentities(mysqli_real_escape_string($link, $_POST['id_staff']));
	$id_goods = htmlentities(mysqli_real_escape_string($link, $_POST['id_goods']));
	$amount_goods = htmlentities(mysqli_real_escape_string($link, $_POST['amount_goods']));
	$data = htmlentities(mysqli_real_escape_string($link, $_POST['data']));

	$query = "INSERT INTO customers VALUES(NULL, '$name','$age','$sex','$id_staff','$id_goods','$amount_goods','$data')";
	
	$result = mysqli_query($link, $query) or die ("Error" .mysqli_error($link));
	if($result)
	{
		echo"<span style='color:blue;'>Data was putted into table</span>";
	}
	mysqli_close($link);
}
?>
<h2 class="input">Put a new outlet</h2>
<form method="POST">
<p>Enter name:<br>
<input type="text" name="name"/></p>
<p>Enter age:<br>
<input type="text" name="age"/></p>
<p>Enter sex:<br>
<input type="text" name="sex"/></p>
<p>Enter id_staff:<br>
<input type="text" name="id_staff"/></p>
<p>Enter id_goods:<br>
<input type="text" name="id_goods"/></p>
<p>Enter amount_goods:<br>
<input type="text" name="amount_goods"/></p>
<p>Enter data:<br>
<input type="text" name="data"/></p>
<input type = "submit" value = "Input">
</form>
</body>
</html>



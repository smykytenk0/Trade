<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css.css">
</head>
<body>
<?php

require_once 'connection.php';
if(isset($_POST['type_of_outlet'])&&isset($_POST['name'])&&isset($_POST['number_of_sections'])&&isset($_POST['manager'])&&isset($_POST['number_of_counters'])&&isset($_POST['rent'])&&isset($_POST['square'])&&isset($_POST['utilities']))
{
	$link = mysqli_connect($host,$user,$password,$database)
		or die("Error" .mysqli_error($link));
	
	$type_of_outlet = htmlentities(mysqli_real_escape_string($link, $_POST['type_of_outlet']));
	$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
	$number_of_sections = htmlentities(mysqli_real_escape_string($link, $_POST['number_of_sections']));
	$manager = htmlentities(mysqli_real_escape_string($link, $_POST['manager']));
	$number_of_counters = htmlentities(mysqli_real_escape_string($link, $_POST['number_of_counters']));
	$rent = htmlentities(mysqli_real_escape_string($link, $_POST['rent']));
	$square = htmlentities(mysqli_real_escape_string($link, $_POST['square']));
	$utilities = htmlentities(mysqli_real_escape_string($link, $_POST['utilities']));

	$query = "INSERT INTO outlets VALUES(NULL, '$type_of_outlet','$name','$number_of_sections','$manager','$number_of_counters','$rent','$square','$utilities')";
	
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
<p>Enter type_of_outlet:<br>
<input type="text" name="type_of_outlet"/></p>
<p>Enter name:<br>
<input type="text" name="name"/></p>
<p>Enter number_of_sections:<br>
<input type="text" name="number_of_sections"/></p>
<p>Enter manager:<br>
<input type="text" name="manager"/></p>
<p>Enter number_of_counters:<br>
<input type="text" name="number_of_counters"/></p>
<p>Enter rent:<br>
<input type="text" name="rent"/></p>
<p>Enter square:<br>
<input type="text" name="square"/></p>
<p>Enter utilities:<br>
<input type="text" name="utilities"/></p>
<input type = "submit" value = "Input">
</form>
</body>
</html>



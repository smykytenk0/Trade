<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="input.css">
</head>
<body>
<?php

require_once 'connection.php';
if(isset($_POST['type']))
{
	$link = mysqli_connect($host,$user,$password,$database)
		or die("Error" .mysqli_error($link));
	
	$type = htmlentities(mysqli_real_escape_string($link, $_POST['type']));
	
	$query = "INSERT INTO type_of_outlets VALUES(NULL,'$type')";
	
	$result = mysqli_query($link, $query) or die ("Error" .mysqli_error($link));
	if($result)
	{
		echo"<span style='color:blue;'>Data was putted into table</span>";
	}
	mysqli_close($link);
}
?>
<h2 class="input">Put a new type</h2>
<form method="POST">
<p>Enter type:<br>
<input type="text" name="type"/></p>
<input type = "submit" value = "Input">
</form>
</body>
</html>



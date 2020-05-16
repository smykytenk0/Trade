<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css.css">
</head>
<body>
	<header>
		<div class='main'><a href="index1.html">Головна</a></div>
		<div class='tables'><a href="tables.html">Розділи</a></div>
		<div class='requests'><a href="requests.html">Запити</a></div>
	</header>
	<div class="php">
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
</div>
<h2 class="input">Вкажіть новий тип торгової точки</h2>
<form method="POST">
<p>Введіть тип торгової точки:<br>
<input type="text" name="type"/></p>
<input type = "submit" value = "Input">
</form>
</body>
</html>



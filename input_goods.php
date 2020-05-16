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
if(isset($_POST['goods']))
{
	$link = mysqli_connect($host,$user,$password,$database)
		or die("Error" .mysqli_error($link));
	
	$goods = htmlentities(mysqli_real_escape_string($link, $_POST['goods']));
	
	$query = "INSERT INTO goods VALUES(NULL,'$goods')";
	
	$result = mysqli_query($link, $query) or die ("Error" .mysqli_error($link));
	if($result)
	{
		echo"<span style='color:blue;'>Data was putted into table</span>";
	}
	mysqli_close($link);
}
?>
</div>
<h2 class="input">Введіть новий товар</h2>
<form method="POST">
<p>Введіть товар:<br>
<input type="text" name="goods"/></p>
<input type = "submit" value = "Input">
</form>
</body>
</html>



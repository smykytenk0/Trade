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
if(isset($_POST['position'])&&isset($_POST['name'])&&isset($_POST['id_outlets'])&&isset($_POST['sallary']))
{
	$link = mysqli_connect($host,$user,$password,$database)
		or die("Error" .mysqli_error($link));
	
	$position = htmlentities(mysqli_real_escape_string($link, $_POST['position']));
	$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
	$id_outlets = htmlentities(mysqli_real_escape_string($link, $_POST['id_outlets']));
	$sallary = htmlentities(mysqli_real_escape_string($link, $_POST['sallary']));

	$query = "INSERT INTO staff VALUES(NULL, '$position','$name','$id_outlets','$sallary')";
	
	$result = mysqli_query($link, $query) or die ("Error" .mysqli_error($link));
	if($result)
	{
		echo"<span style='color:blue;'>Data was putted into table</span>";
	}
	mysqli_close($link);
}
?>
</div>
<h2 class="input">Вкажіть нового робітника</h2>
<form method="POST">
<p>Введіть посаду:<br>
<input type="text" name="position"/></p>
<p>Введіть ім'я:<br>
<input type="text" name="name"/></p>
<p>Введіть id торгової точки:<br>
<input type="text" name="id_outlets"/></p>
<p>Введіть зарплату:<br>
<input type="text" name="sallary"/></p>
<input type = "submit" value = "Input">
</form>
</body>
</html>



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
if(isset($_POST['id_of_type'])&&isset($_POST['name'])&&isset($_POST['number_of_sections'])&&isset($_POST['manager'])&&isset($_POST['number_of_counters'])&&isset($_POST['rent'])&&isset($_POST['square'])&&isset($_POST['utilities']))
{
	$link = mysqli_connect($host,$user,$password,$database)
		or die("Error" .mysqli_error($link));
	
	$id_of_type = htmlentities(mysqli_real_escape_string($link, $_POST['id_of_type']));
	$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
	$number_of_sections = htmlentities(mysqli_real_escape_string($link, $_POST['number_of_sections']));
	$manager = htmlentities(mysqli_real_escape_string($link, $_POST['manager']));
	$number_of_counters = htmlentities(mysqli_real_escape_string($link, $_POST['number_of_counters']));
	$rent = htmlentities(mysqli_real_escape_string($link, $_POST['rent']));
	$square = htmlentities(mysqli_real_escape_string($link, $_POST['square']));
	$utilities = htmlentities(mysqli_real_escape_string($link, $_POST['utilities']));

	$query = "INSERT INTO outlets VALUES(NULL, '$id_of_type','$name','$number_of_sections','$manager','$number_of_counters','$rent','$square','$utilities')";
	
	$result = mysqli_query($link, $query) or die ("Error" .mysqli_error($link));
	if($result)
	{
		echo"<span style='color:blue;'>Data was putted into table</span>";
	}
	mysqli_close($link);
}
?>
</div>
<h2 class="input">Вкажіть нову торгову точку</h2>
<form method="POST">
<p>Введіть id типу торгової точки:<br>
<input type="text" name="id_of_type"/></p>
<p>Введіть назву торгової точки:<br>
<input type="text" name="name"/></p>
<p>Вкажіть кількість секцій:<br>
<input type="text" name="number_of_sections"/></p>
<p>Введіть менеджер:<br>
<input type="text" name="manager"/></p>
<p>Введіть кількість продавців:<br>
<input type="text" name="number_of_counters"/></p>
<p>Введіть плату за оренду :<br>
<input type="text" name="rent"/></p>
<p>Введіть площу:<br>
<input type="text" name="square"/></p>
<p>Введіть комунальні послуги:<br>
<input type="text" name="utilities"/></p>
<input type = "submit" value = "Input">
</form>
</body>
</html>



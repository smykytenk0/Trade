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
</div>
<h2 class="input">Введіть нове замовлення</h2>
<form method="POST">
<p>Введіть id торгової точки:<br>
<input type="text" name="id_outlets"/></p>
<p>Введіть id постачальника:<br>
<input type="text" name="id_provider"/></p>
<p>Введіть id товару:<br>
<input type="text" name="id_goods"/></p>
<p>Введіть кількість:<br>
<input type="text" name="amount"/></p>
<p>Введіть ціну:<br>
<input type="text" name="price"/></p>
<p>Введіть дату:<br>
<input type="text" name="data"/></p>
<input type = "submit" value = "Input">
</form>
</body>
</html>


